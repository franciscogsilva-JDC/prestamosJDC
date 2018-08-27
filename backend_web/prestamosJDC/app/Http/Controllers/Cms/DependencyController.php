<?php

namespace App\Http\Controllers\Cms;

use App\Dependency;
use App\Headquarter;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class DependencyController extends Controller
{
    private $menu_item = 7;
    private $title_page = 'Dependencias';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $dependencies = Dependency::withTrashed()->search(
            $request->search,
            $request->headquarter_id
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('search', $request->search)
            ->appends('headquarter_id', $request->headquarter_id);

        $headquarters = Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.dependencies.index')
            ->with('dependencies', $dependencies)
            ->with('headquarters', $headquarters)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $headquarters   =   Headquarter::orderBy('name', 'ASC')->get();
        $attendants     =   User::where('user_type_id', 1)->orWhere('user_type_id', 4)->orderBy('name', 'ASC')->get();

        return view('admin.dependencies.create_edit')
            ->with('headquarters', $headquarters)
            ->with('attendants', $attendants)
            ->with('title_page', 'Crear nueva dependencia')
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

        $dependency = new Dependency();
        $dependency->name               =   $request->name;
        $dependency->email              =   $request->email;
        $dependency->headquarter_id     =   $request->headquarter_id;
        $dependency->save();

        $dependency->attendants()->attach($request->attendants);

        return redirect()->route('dependencies.index')
            ->with('session_msg', '¡La nueva dependencia, se ha creado correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $dependency     =   $this->validateDependency($id);
        $headquarters   =   Headquarter::orderBy('name', 'ASC')->get();
        $attendants     =   User::where('user_type_id', 1)->orWhere('user_type_id', 4)->orderBy('name', 'ASC')->get();

        return view('admin.dependencies.create_edit')
            ->with('dependency', $dependency)
            ->with('headquarters', $headquarters)
            ->with('attendants', $attendants)
            ->with('title_page', 'Editar Programa: '.$dependency->name)
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

        $this->validate($request, $this->getValidationRules($request), $this->getValidationMessages($request));

        $dependency = $this->validateDependency($id);

        if($dependency->email != $request->email){
            $this->validate($request, $this->getValidationEmailRule($request), $this->getValidationEmailMessage($request));
        }

        $dependency->name               =   $request->name;
        $dependency->email              =   $request->email;
        $dependency->headquarter_id     =   $request->headquarter_id;
        $dependency->save();

        //Elimina todas los responsables asociadas en la entidad asociativa.
        $dependency->attendants()->detach();
        //Asigna todas los responsables seleccionadas y las guarda en la entidad asociativa.
        $dependency->attendants()->attach($request->attendants);

        return redirect()->route('dependencies.index')
            ->with('session_msg', '¡La dependencia, se ha editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $dependency = $this->validateDependency($id);
        if($dependency->deleted_at){
            $dependency->restore();
            $message = 'Habilitado';
        }else{
            $dependency->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('dependencies.index')
                ->with('session_msg', 'La dependencia se ha '.$message.' correctamente');
        }             
    }
    
    public function destroyMulti(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy($item, true);
            }            
            return redirect()->route('dependencies.index')
                ->with('session_msg', 'Las dependencias, se han Habilitado/Inhabilitado correctamente');
        }else{            
            return redirect()->route('dependencies.index');
        }
    }

    private function getValidationEmailRule($request){
        return [
            'email' => 'required|email|unique:dependencies'
        ];
    }

    private function getValidationEmailMessage($request){
        return [
            'email.required'    =>  'El email de la Dependencia es obligatorio',
            'email.email'       =>  'El campo email debe ser un Correo Electrónico',
            'email.unique'      =>  'El email ingresado ya se encuentra en uso'
        ];
    }

    private function getValidationRules($request){
        return [
            'name'              =>  'required|min:3', 
            'headquarter_id'    =>  'required',
            'attendants'        =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'             =>  'El nombre de la Dependencia es obligatorio',
            'name.min'                  =>  'El nombre de la Dependencia debe contener al menos 3 caracteres.',
            'headquarter_id.required'   =>  'La Sede de la Dependencia es obligatorio',
            'attendants.required'       =>  'Una Dependencia debe tener almenos 1 responsable'
        ];
    }

    private function validateDependency($id){
        try {
            $dependency = Dependency::withTrashed()->findOrFail($id);            
        }catch (ModelNotFoundException $e){
            $errors = collect(['La Dependencia con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $dependency;
    }
}
