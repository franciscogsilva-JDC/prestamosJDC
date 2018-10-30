<?php

namespace App\Http\Controllers\Cms;

use App\Departament;
use App\Dependency;
use App\DniType;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Mail\PasswordUserEmail;
use App\Mail\VerificationEmail;
use App\Town;
use App\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Image;

class UserController extends Controller
{
    private $menu_item = 4;
    private $title_page = 'Usuarios';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $users = User::withTrashed()->search(
            $request->search, //name or reference
            $request->user_type_id,
            $request->user_status_id,
            $request->dependency_id,
            $request->gender_id,
            $request->town_id
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('search', $request->search)
            ->appends('user_type_id', $request->user_type_id)
            ->appends('user_status_id', $request->user_status_id)
            ->appends('dependency_id', $request->dependency_id)
            ->appends('gender_id', $request->gender_id)
            ->appends('town_id', $request->town_id);

        $userTypes      =   UserType::orderBy('name', 'ASC')->get();
        $userStatuses   =   UserStatus::orderBy('name', 'ASC')->get();
        $dependencies   =   Dependency::orderBy('name', 'ASC')->get();
        $genders        =   Gender::orderBy('name', 'ASC')->get();
        $towns          =   Town::orderBy('name', 'ASC')->get();

        return view('admin.users.index')
            ->with('users', $users)
            ->with('userTypes', $userTypes)
            ->with('userStatuses', $userStatuses)
            ->with('dependencies', $dependencies)
            ->with('genders', $genders)
            ->with('towns', $towns)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $userTypes      =   UserType::orderBy('name', 'ASC')->get();
        $userStatuses   =   UserStatus::orderBy('name', 'ASC')->get();
        $dependencies   =   Dependency::orderBy('name', 'ASC')->get();
        $genders        =   Gender::orderBy('name', 'ASC')->get();
        $departaments   =   Departament::orderBy('name', 'ASC')->get();
        $dniTypes       =   DniType::orderBy('name', 'ASC')->get();

        return view('admin.users.create_edit')
            ->with('userTypes', $userTypes)
            ->with('userStatuses', $userStatuses)
            ->with('dependencies', $dependencies)
            ->with('genders', $genders)
            ->with('departaments', $departaments)
            ->with('dniTypes', $dniTypes)
            ->with('title_page', 'Crear nuevo usuario')
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->validate($request, $this->getValidationRules($request), $this->getValidationMessages($request));
        $this->validate($request, $this->getValidationEmailRule($request), $this->getValidationEmailMessage($request));
        $this->validate($request, $this->getValidationDniRule($request), $this->getValidationDniMessage($request));

        if($request->user_type_id == 3){
            $this->validate($request, $this->getValidationSemesterRule($request), $this->getValidationSemesterMessage($request));
        }
        
        if($request->file('image')){
            $rules = [
                'image' => 'image|mimes:jpg,jpeg,png'
            ];

            $this->validate($request, $rules);
        }

        $user = new User();
        $generatedPassword = str_random(8);
        $this->setUser($user, $request, $generatedPassword);
        $user->confirmation_code = str_random(100);
        $user->save();

        if($user->user_type_id == 1 || $user->user_type_id == 4){
            $user->attendedDependencies()->attach($request->dependencies);
        }

        //Mail::to($user->email)->send(new VerificationEmail($user));

        //Mail::to($user->email)->send(new PasswordUserEmail($user, $generatedPassword));

        return redirect()->route('users.index')
            ->with('session_msg', 'Se ha creado correctamente el usuario.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $user = $this->validateUser($id);
        $dniTypes       =   DniType::orderBy('name', 'ASC')->get();
        $userTypes      =   UserType::orderBy('name', 'ASC')->get();
        $dependencies   =   Dependency::orderBy('name', 'ASC')->get();
        $userStatuses   =   UserStatus::orderBy('name', 'ASC')->get();
        $genders        =   Gender::orderBy('name', 'ASC')->get();
        $departaments   =   Departament::orderBy('name', 'ASC')->get();
        $towns          =   $user->town_id?Town::where('id', $user->town_id)->orderBy('name', 'ASC')->get():Town::orderBy('name', 'ASC')->get();

        return view('admin.users.create_edit')
            ->with('user', $user)
            ->with('dniTypes', $dniTypes)
            ->with('userTypes', $userTypes)
            ->with('dependencies', $dependencies)
            ->with('userStatuses', $userStatuses)
            ->with('genders', $genders)
            ->with('departaments', $departaments)
            ->with('towns', $towns)
            ->with('title_page', 'Editar usuario: '.$user->name)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        
        $user = $this->validateUser($id);
        $this->validate($request, $this->getValidationRules($request), $this->getValidationMessages($request));

        if($user->email != $request->email){
            $this->validate($request, $this->getValidationEmailRule($request), $this->getValidationEmailMessage($request));            
        }if($user->dni != $request->dni){
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

        if($user->user_type_id == 1 || $user->user_type_id == 4){
            if($user->attendedDependencies){
                $user->attendedDependencies()->detach();                
            }
            $user->attendedDependencies()->attach($request->dependencies);
        }

        return redirect()->route('users.index')
            ->with('session_msg', '¡El usuario, se ha editado correctamente!');
    }

    private function setUser($user, $request, $generatedPassword=null){
        $user->name             =   $request->name;
        $user->email            =   $request->email;
        if($generatedPassword){
            $user->password = bcrypt($generatedPassword);
        }
        $user->dni              =   $request->dni;
        $user->company_name     =   $request->company_name;
        $user->cellphone_number =   $request->cellphone_number;
        $user->semester         =   $request->semester;
        $user->user_type_id     =   $request->user_type_id;
        $user->user_status_id   =   $request->user_status_id;
        $user->dni_type_id      =   $request->dni_type_id;
        $user->dependency_id    =   $request->dependency_id;
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
        }elseif(!$user->image){
            $user->image            =   asset('/img/system32/icon.png');
            $user->image_thumbnail  =   asset('/img/system32/icon.png');
        }

        return $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $user = $this->validateUser($id);
        if($user->deleted_at){
            $user->restore();
            $message = 'Habilitado';
        }else{
            $user->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('users.index')
                ->with('session_msg', 'El usuario se ha '.$message.' correctamente');
        }             
    }
    
    public function destroyMulti(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy($item, true);
            }            
            return redirect()->route('users.index')
                ->with('session_msg', 'Los usuarios, se han Habilitado/Inhabilitado correctamente');
        }else{            
            return redirect()->route('users.index');
        }
    }

    private function getValidationEmailRule($request){
        return [
            'email' => 'required|email|unique:users'
        ];
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

    private function getValidationEmailMessage($request){
        return [
            'email.required'    =>  'El email del Usuario es obligatorio',
            'email.email'       =>  'El campo email debe ser un Correo Electrónico',
            'email.unique'      =>  'El email ingresado ya se encuentra en uso'
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
            'name'              =>  'required|min:3',
            'cellphone_number'  =>  'required|numeric',
            'user_type_id'      =>  'required',
            'user_status_id'    =>  'required',
            'dni_type_id'       =>  'required',
            'gender_id'         =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'             =>  'El nombre del usuario es obligatorio',
            'name.min'                  =>  'El nombre del usuario debe contener al menos 3 caracteres.',
            'cellphone_number.required' =>  'El número telefonico del usuario es obligatorio',
            'cellphone_number.numeric'  =>  'El número telefonico del usuario debe ser un número',
            'user_type_id.required'     =>  'El tipo de usuario es obligatoria',
            'user_status_id.required'   =>  'El estado del usuario es obligatoria',
            'dni_type_id.required'      =>  'El tipo de documento de identidad del usuario es obligatorio',
            'gender_id.required'        =>  'El genero del usuario es obligatorio'
        ];
    }

    private function validateUser($id){
        try {
            $user = User::withTrashed()->findOrFail($id);
        }catch (ModelNotFoundException $e){
            $errors = collect(['El usuario con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $user;
    }
}