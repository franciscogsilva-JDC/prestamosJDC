<?php

namespace App\Http\Controllers\Web;

use App\Departament;
use App\DniType;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Town;
use Auth;
use Illuminate\Http\Request;
use Image;

class UserController extends Controller
{
    private $menu_item = 4;
    private $title_page = 'Usuarios';

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(){
    	$user = Auth::user();
        $dniTypes       =   DniType::orderBy('name', 'ASC')->get();
        $genders        =   Gender::orderBy('name', 'ASC')->get();
        $departaments   =   Departament::orderBy('name', 'ASC')->get();
        $towns          =   $user->town_id?Town::where('id', $user->town_id)->orderBy('name', 'ASC')->get():Town::orderBy('name', 'ASC')->get();

        return view('front.users.create_edit')
            ->with('user', $user)
            ->with('dniTypes', $dniTypes)
            ->with('genders', $genders)
            ->with('departaments', $departaments)
            ->with('towns', $towns)
            ->with('title_page', 'Editar Perfil')
            ->with('menu_item', 165);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){        
    	$user = Auth::user();
    	if($user->type->id == 1 || $user->type->id == 6 || $user->type->id == 7 || $user->type->id == 8){
    		return redirect()->route('users.edit', $user->id);
    	}

        $this->validate($request, $this->getValidationRules($request), $this->getValidationMessages($request));

        if($user->dni != $request->dni){
            $this->validate($request, $this->getValidationDniRule($request), $this->getValidationDniMessage($request));            
        }if($request->user_type_id == 3){
            $this->validate($request, $this->getValidationSemesterRule($request), $this->getValidationSemesterMessage($request));
        }if($request->file('image')){
            $rules = [
                'image' => 'image|mimes:jpg,jpeg,png'
            ];

            $this->validate($request, $rules);
        }

        $this->setUser($user, $request);

        return redirect()->route('welcome')
            ->with('session_msg', '¡Perfil actualizado correctamente!');
    }

    private function setUser($user, $request, $generatedPassword=null){
        $user->dni              =   $request->dni;
        $user->company_name     =   $request->company_name;
        $user->cellphone_number =   $request->cellphone_number;
        $user->semester         =   $request->semester;
        $user->dni_type_id      =   $request->dni_type_id;
        $user->gender_id        =   $request->gender_id;
        $user->town_id          =   $request->town_id;
        $user->save();

        if($request->file('image')){
            if($user->image) {
                if($user->image != asset('/img/system32/icon.png')){
                    if(file_exists(public_path().str_replace(env('APP_URL'), '/', $user->image))){
                        unlink(public_path().str_replace(env('APP_URL'), '/', $user->image));
                        unlink(public_path().str_replace(env('APP_URL'), '/', $user->image_thumbnail));
                    }
                }
            }
            $file       =   $request->file('image');
            $nameImg    =   'prestamosjdc_user_'.$user->id.'_'.time().'.'.$file->getClientOriginalExtension();
            $path       =   public_path().'/img/users/';
            $file->move($path, $nameImg);

            $thumbnail = Image::make($path.$nameImg)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $nameImg_thumbnail = 'prestamosjdc_user_'.$user->id.'_'.time().'_thumbnail'.'.'.$file->getClientOriginalExtension();
            $thumbnail->save($path.$nameImg_thumbnail);

            $user->image = asset('/img/users/'.$nameImg);
            $user->image_thumbnail = asset('/img/users/'.$nameImg_thumbnail);
        }

        return $user->save();
    }

    private function getValidationDniRule($request){
        return [
            'dni' => 'required|numeric|unique:users',
        ];
    }

    private function getValidationSemesterRule($request){
        return [
            'semester' => 'required|numeric'
        ];
    }

    private function getValidationSemesterMessage($request){
        return [
            'semester.required' => 'El semestre del usuario es obligatorio',
            'semester.numeric' => 'El semestre del usuario debe ser un número'
        ];
    }

    private function getValidationDniMessage($request){
        return [
            'dni.required'    =>  'El número de identidad del Usuario es obligatorio',
            'dni.numeric'     =>  'El campo número de identidad debe ser un número',
            'dni.unique'      =>  'El número de identidad ingresado ya se encuentra en uso'
        ];
    }

    private function getValidationRules($request){
        return [
            'cellphone_number'  =>  'required|numeric',
            'dni_type_id'       =>  'required',
            'gender_id'         =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'cellphone_number.required' =>  'El número telefonico del usuario es obligatorio',
            'cellphone_number.numeric'  =>  'El número telefonico del usuario debe ser un número',
            'dni_type_id.required'      =>  'El tipo de documento de identidad del usuario es obligatorio',
            'gender_id.required'        =>  'El genero del usuario es obligatorio'
        ];
    }
}
