<?php

namespace App\Http\Controllers\Cms;

use App\Building;
use App\Headquarter;
use App\Http\Controllers\Controller;
use App\PropertyType;
use App\Space;
use App\SpaceStatus;
use App\SpaceType;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    private $menu_item = 5;
    private $title_page = 'Espacios';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $spaces = Space::withTrashed()->search(
            $request->name,
            $request->max_persons,
            $request->space_type_id,
            $request->space_status_id,
            $request->property_type_id,
            $request->building_id,
            $request->headquarter_id
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('name', $request->name)
            ->appends('max_persons', $request->max_persons)
            ->appends('space_type_id', $request->space_type_id)
            ->appends('space_status_id', $request->space_status_id)
            ->appends('property_type_id', $request->property_type_id)
            ->appends('building_id', $request->building_id)
            ->appends('headquarter_id', $request->headquarter_id);

        $spaceTypes     =   SpaceType::orderBy('name', 'ASC')->get();
        $spaceStatuses  =   SpaceStatus::orderBy('name', 'ASC')->get();
        $propertyTypes  =   PropertyType::orderBy('name', 'ASC')->get();
        $buildings      =   Building::orderBy('name', 'ASC')->get();
        $headquarters   =   Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.spaces.index')
            ->with('spaces', $spaces)
            ->with('spaceTypes', $spaceTypes)
            ->with('spaceStatuses', $spaceStatuses)
            ->with('propertyTypes', $propertyTypes)
            ->with('buildings', $buildings)
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
        $spaceTypes     =   SpaceType::orderBy('name', 'ASC')->get();
        $spaceStatuses  =   SpaceStatus::orderBy('name', 'ASC')->get();
        $propertyTypes  =   PropertyType::orderBy('name', 'ASC')->get();
        $buildings      =   Building::orderBy('name', 'ASC')->get();
        $headquarters   =   Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.spaces.create_edit')
            ->with('spaceTypes', $spaceTypes)
            ->with('spaceStatuses', $spaceStatuses)
            ->with('propertyTypes', $propertyTypes)
            ->with('buildings', $buildings)
            ->with('headquarters', $headquarters)
            ->with('title_page', 'Crear nuevo espacio')
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

        $space = new Space();
        $this->setSpace($space, $request);

        return redirect()->route('spaces.index')
            ->with('session_msg', 'Se ha creado correctamente el espacio.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $space = $this->validateSpace($id);
        $spaceTypes     =   SpaceType::orderBy('name', 'ASC')->get();
        $spaceStatuses  =   SpaceStatus::orderBy('name', 'ASC')->get();
        $propertyTypes  =   PropertyType::orderBy('name', 'ASC')->get();
        $buildings      =   Building::orderBy('name', 'ASC')->get();
        $headquarters   =   Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.spaces.create_edit')
            ->with('space', $space)
            ->with('spaceTypes', $spaceTypes)
            ->with('spaceStatuses', $spaceStatuses)
            ->with('propertyTypes', $propertyTypes)
            ->with('buildings', $buildings)
            ->with('headquarters', $headquarters)
            ->with('title_page', 'Editar espacio: '.$space->name)
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

        $space = $this->validateSpace($id);
        $this->setSpace($space, $request);

        return redirect()->route('spaces.index')
            ->with('session_msg', '¡El espacio, se ha editado correctamente!');
    }

    private function setSpace($space, $request){
        $space->name                =   $request->name;
        $space->max_persons         =   $request->max_persons;
        $space->space_type_id       =   $request->space_type_id;
        $space->space_status_id     =   $request->space_status_id;
        $space->property_type_id    =   $request->property_type_id;
        $space->building_id         =   $request->building_id;
        $space->headquarter_id      =   $request->headquarter_id;
        $space->save();
                
        return $space->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $space = $this->validateSpace($id);
        if($space->deleted_at){
            $space->restore();
            $message = 'Habilitado';
        }else{
            $space->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('spaces.index')
                ->with('session_msg', 'El espacio se ha '.$message.' correctamente');
        }             
    }
    
    public function destroyMulti(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy($item, true);
            }            
            return redirect()->route('spaces.index')
                ->with('session_msg', 'Los espacios, se han Habilitado/Inhabilitado correctamente');
        }else{            
            return redirect()->route('spaces.index');
        }
    }

    private function getValidationRules($request){
        return [
            'name'              =>  'required|min:3',
            'space_type_id'     =>  'required',
            'space_status_id'   =>  'required',
            'property_type_id'  =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'             =>  'El nombre del espacio es obligatorio',
            'name.min'                  =>  'El nombre del espacio debe contener al menos 3 caracteres.',
            'space_type_id.required'    =>  'El tipo del espacio es obligatorio',
            'space_status_id.required'  =>  'El estado del espacio es obligatorio',
            'property_type_id.required' =>  'El tipo de propiedad del espacio es obligatoria'
        ];
    }

    private function validateSpace($id){
        try {
            $space = Space::withTrashed()->findOrFail($id);            
        }catch (ModelNotFoundException $e){
            $errors = collect(['El espacio con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $space;
    }
}