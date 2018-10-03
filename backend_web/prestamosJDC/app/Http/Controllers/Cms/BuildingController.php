<?php

namespace App\Http\Controllers\Cms;

use App\Building;
use App\Headquarter;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    private $menu_item = 10;
    private $title_page = 'Edificios';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $buildings = Building::withTrashed()->search(
            $request->search,
            $request->headquarter_id
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('search', $request->search)
            ->appends('headquarter_id', $request->headquarter_id);

        $headquarters = Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.buildings.index')
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
        $headquarters = Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.buildings.create_edit')
            ->with('headquarters', $headquarters)
            ->with('title_page', 'Crear nuevo Edificio')
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

        $building = new Building();
        $building->name = $request->name;
        $building->nomenclature = $request->nomenclature;
        $building->headquarter_id = $request->headquarter_id;
        $building->save();

        return redirect()->route('buildings.index')
            ->with('session_msg', '¡El nuevo edificio, se ha creado correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $building = $this->validateBuilding($id);
        $headquarters = Headquarter::orderBy('name', 'ASC')->get();

        return view('admin.buildings.create_edit')
            ->with('building', $building)
            ->with('headquarters', $headquarters)
            ->with('title_page', 'Editar edificio: '.$building->name)
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

        $building = $this->validateBuilding($id);
        $building->name = $request->name;
        $building->nomenclature = $request->nomenclature;
        $building->headquarter_id = $request->headquarter_id;
        $building->save();

        return redirect()->route('buildings.index')
            ->with('session_msg', 'Los cambios se han guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $building = $this->validateBuilding($id);
        if($building->deleted_at){
            $building->restore();
            $message = 'Habilitado';
        }else{
            $building->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('buildings.index')
                ->with('session_msg', 'El edificio se ha '.$message.' correctamente');
        }             
    }
    
    public function destroyMulti(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy($item, true);
            }            
            return redirect()->route('buildings.index')
                ->with('session_msg', 'Los edificios, se han Habilitado/Inhabilitado correctamente');
        }else{            
            return redirect()->route('buildings.index');
        }
    }

    private function getValidationRules($request){
        return [
            'name'              =>  'required|min:3',
            'nomenclature'           =>  'required|min:3',
            'headquarter_id'    =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'             =>  'El nombre del edificio es obligatorio',
            'name.min'                  =>  'El nombre del edificio debe contener al menos 3 caracteres.',
            'nomenclature.required'          =>  'La nomenclatura del edificio es obligatoria',
            'nomenclature.min'               =>  'La nomenclatura del edificio debe contener al menos 3 caracteres.',
            'headquarter_id.required'   =>  'La Ciudad del edificio es obligatoria'
        ];
    }

    private function validateBuilding($id){
        try {
            $building = Building::withTrashed()->findOrFail($id);            
        }catch (ModelNotFoundException $e){
            $errors = collect(['El edificio con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $building;
    }
}
