<?php

namespace App\Http\Controllers\Cms;

use App\Departament;
use App\Dependency;
use App\DniType;
use App\Gender;
use App\Http\Controllers\Controller;
use App\Town;
use App\User;
use App\UserStatus;
use App\UserType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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
        
        if($request->file('image')){
            $rules = [
                'image' => 'image|mimes:jpg,jpeg,png'
            ];

            $this->validate($request, $rules);
        }

        $resource = new Resource();
        $this->setResource($resource, $request);

        $resource->spaces()->attach($request->spaces);

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
        $resource = $this->validateResource($id);
        $userstatuses   =   userstatus::orderBy('name', 'ASC')->get();
        $resourceTypes      =   ResourceType::orderBy('name', 'ASC')->get();
        $dependencies       =   Dependency::orderBy('name', 'ASC')->get();
        $resourceCategories =   ResourceCategory::orderBy('name', 'ASC')->get();
        $physicalStates     =   PhysicalState::orderBy('name', 'ASC')->get();

        return view('admin.users.create_edit')
            ->with('resource', $resource)
            ->with('userstatuses', $userstatuses)
            ->with('resourceTypes', $resourceTypes)
            ->with('dependencies', $dependencies)
            ->with('resourceCategories', $resourceCategories)
            ->with('physicalStates', $physicalStates)
            ->with('title_page', 'Editar usuario: '.$resource->name)
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
        
        if($request->file('image')){
            $rules = [
                'image' => 'image|mimes:jpg,jpeg,png'
            ];

            $this->validate($request, $rules);
        }

        $resource = $this->validateResource($id);
        $this->setResource($resource, $request);
        
        $resource->spaces()->detach();
        $resource->spaces()->attach($request->spaces);

        return redirect()->route('users.index')
            ->with('session_msg', '¡El usuario, se ha editado correctamente!');
    }

    private function setResource($resource, $request){
        $resource->name                 =   $request->name;
        $resource->reference            =   $request->reference;
        $resource->description          =   $request->description;
        $resource->resource_type_id     =   $request->resource_type_id;        
        $resource->resource_status_id   =   $request->resource_status_id;
        $resource->dependency_id        =   $request->dependency_id;
        $resource->resource_category_id =   $request->resource_category_id;
        $resource->physical_state_id    =   $request->physical_state_id;
        $resource->save();

        if ($request->file('image')) {
            if($resource->image) {
                if(file_exists(public_path().str_replace(env('APP_URL'), '/', $resource->image))){
                    unlink(public_path().str_replace(env('APP_URL'), '/', $resource->image));
                    unlink(public_path().str_replace(env('APP_URL'), '/', $resource->image_thumbnail));
                }
            }
            $file       =   $request->file('image');
            $nameImg    =   'prestamosjdc_resource_'.$resource->id.'_'.time().'.'.$file->getClientOriginalExtension();
            $path       =   public_path().'/img/users/';
            $file->move($path, $nameImg);

            $thumbnail = Image::make($path.$nameImg)->resize(200, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            $nameImg_thumbnail = 'prestamosjdc_resource_'.$resource->id.'_'.time().'_thumbnail'.'.'.$file->getClientOriginalExtension();
            $thumbnail->save($path.$nameImg_thumbnail);

            $resource->image = asset('/img/users/'.$nameImg);
            $resource->image_thumbnail = asset('/img/users/'.$nameImg_thumbnail);
        }

        return $resource->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $resource = $this->validateResource($id);
        if($resource->deleted_at){
            $resource->restore();
            $message = 'Habilitado';
        }else{
            $resource->delete();
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

    private function getValidationRules($request){
        return [
            'name'                  =>  'required|min:3',
            'resource_status_id'    =>  'required',
            'resource_type_id'      =>  'required',
            'dependency_id'         =>  'required',
            'resource_category_id'  =>  'required',
            'physical_state_id'     =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'                 =>  'El nombre del usuario es obligatorio',
            'name.min'                      =>  'El nombre del usuario debe contener al menos 3 caracteres.',
            'resource_status_id.required'   =>  'El estado del usuario es obligatorio',
            'resource_type_id.required'     =>  'El tipo del usuario es obligatorio',
            'dependency_id.required'        =>  'La dependenca del usuario es obligatoria',
            'resource_category_id.required' =>  'La categoria del usuario es obligatoria',
            'physical_state_id.required'    =>  'El estado físico del usuario es obligatorio'
        ];
    }

    private function validateResource($id){
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