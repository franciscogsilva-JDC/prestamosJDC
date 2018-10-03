<?php

namespace App\Http\Controllers\Cms;

use App\Departament;
use App\Headquarter;
use App\Http\Controllers\Controller;
use App\Town;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class HeadquarterController extends Controller
{
    private $menu_item = 9;
    private $title_page = 'Sedes';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $headquarters = Headquarter::withTrashed()->search(
            $request->search,
            $request->town_id
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('search', $request->search)
            ->appends('town_id', $request->town_id);

        $towns = Town::orderBy('name', 'ASC')->get();

        return view('admin.headquarters.index')
            ->with('headquarters', $headquarters)
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
        $departaments   =   Departament::orderBy('name', 'ASC')->get();

        return view('admin.headquarters.create_edit')
            ->with('departaments', $departaments)
            ->with('title_page', 'Crear nueva Sede')
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

        $headquarter = new Headquarter();
        $headquarter->name = $request->name;
        $headquarter->address = $request->address;
        $headquarter->town_id = $request->town_id;
        $headquarter->save();

        return redirect()->route('headquarters.index')
            ->with('session_msg', '¡La nueva Sede, se ha creado correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $headquarter = $this->validateHeadquarter($id);
        $departaments = Departament::orderBy('name', 'ASC')->get();
        $towns = $headquarter->town_id?Town::where('id', $headquarter->town_id)->orderBy('name', 'ASC')->get():Town::orderBy('name', 'ASC')->get();

        return view('admin.headquarters.create_edit')
            ->with('headquarter', $headquarter)
            ->with('departaments', $departaments)
            ->with('towns', $towns)
            ->with('title_page', 'Editar Sede: '.$headquarter->name)
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

        $headquarter = $this->validateHeadquarter($id);
        $headquarter->name = $request->name;
        $headquarter->address = $request->address;
        $headquarter->town_id = $request->town_id;
        $headquarter->save();

        return redirect()->route('headquarters.index')
            ->with('session_msg', 'Los cambios se han guardado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $headquarter = $this->validateHeadquarter($id);
        if($headquarter->deleted_at){
            $headquarter->restore();
            $message = 'Habilitado';
        }else{
            $headquarter->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('headquarters.index')
                ->with('session_msg', 'La Sede se ha '.$message.' correctamente');
        }             
    }
    
    public function destroyMulti(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy($item, true);
            }            
            return redirect()->route('headquarters.index')
                ->with('session_msg', 'Las Sedes, se han Habilitado/Inhabilitado correctamente');
        }else{            
            return redirect()->route('headquarters.index');
        }
    }

    private function getValidationRules($request){
        return [
            'name'              =>  'required|min:3',
            'address'           =>  'required|min:3',
            'town_id'    =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'             =>  'El nombre de la Sede es obligatorio',
            'name.min'                  =>  'El nombre de la Sede debe contener al menos 3 caracteres.',
            'address.required'          =>  'La dirección de la Sede es obligatoria',
            'address.min'               =>  'La dirección de la Sede debe contener al menos 3 caracteres.',
            'town_id.required'   =>  'La Ciudad de la Sede es obligatoria'
        ];
    }

    private function validateHeadquarter($id){
        try {
            $headquarter = Headquarter::withTrashed()->findOrFail($id);            
        }catch (ModelNotFoundException $e){
            $errors = collect(['La Sede con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $headquarter;
    }
}
