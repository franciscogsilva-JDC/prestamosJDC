<?php

namespace App\Http\Controllers\Cms;

use App\Dependency;
use App\Http\Controllers\Controller;
use App\Modality;
use App\Program;
use App\ProgramType;
use App\WorkingDay;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private $menu_item = 8;
    private $title_page = 'Programas';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $programs = Program::withTrashed()->search(
            $request->name,
            $request->program_type_id,
            $request->dependency_id,
            $request->working_day_id,
            $request->modality_id
        )->orderBy('created_at', 'DESC')
            ->paginate(20)
            ->appends('name', $request->name)
            ->appends('program_type_id', $request->program_type_id)
            ->appends('dependency_id', $request->dependency_id)
            ->appends('working_day_id', $request->working_day_id)
            ->appends('modality_id', $request->modality_id);

        $programTypes   =   ProgramType::orderBy('name', 'ASC')->get();
        $dependencies   =   Dependency::orderBy('name', 'ASC')->get();
        $workingDays    =   WorkingDay::orderBy('name', 'ASC')->get();
        $modalities     =   Modality::orderBy('name', 'ASC')->get();

        return view('admin.programs.index')
            ->with('programs', $programs)
            ->with('programTypes', $programTypes)
            ->with('dependencies', $dependencies)
            ->with('workingDays', $workingDays)
            ->with('modalities', $modalities)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $programTypes   =   ProgramType::orderBy('name', 'ASC')->get();
        $dependencies   =   Dependency::orderBy('name', 'ASC')->get();
        $workingDays    =   WorkingDay::orderBy('name', 'ASC')->get();
        $modalities     =   Modality::orderBy('name', 'ASC')->get();

        return view('admin.programs.create_edit')
            ->with('programTypes', $programTypes)
            ->with('dependencies', $dependencies)
            ->with('workingDays', $workingDays)
            ->with('modalities', $modalities)
            ->with('title_page', 'Crear nuevo programa')
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

        $program                    =   new Program();
        $program->name              =   $request->name;
        $program->program_type_id   =   $request->program_type_id;        
        $program->dependency_id     =   $request->dependency_id;
        $program->save();

        $program->workingDays()->attach($request->workingDays);
        $program->modalities()->attach($request->modalities);

        return redirect()->route('programs.index')
            ->with('session_msg', '¡El nuevo programa, se ha creado correctamente!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $program        =   $this->validateProgram($id);
        $programTypes   =   ProgramType::orderBy('name', 'ASC')->get();
        $dependencies   =   Dependency::orderBy('name', 'ASC')->get();
        $workingDays    =   WorkingDay::orderBy('name', 'ASC')->get();
        $modalities     =   Modality::orderBy('name', 'ASC')->get();

        return view('admin.programs.create_edit')
            ->with('program', $program)
            ->with('programTypes', $programTypes)
            ->with('dependencies', $dependencies)
            ->with('workingDays', $workingDays)
            ->with('modalities', $modalities)
            ->with('title_page', 'Editar Programa: '.$program->name)
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

        $program                    =   $this->validateProgram($id);
        $program->name              =   $request->name;
        $program->program_type_id   =   $request->program_type_id;        
        $program->dependency_id     =   $request->dependency_id;
        $program->save();

        //Elimina todas las jornadas y modalidades asociadas en la entidad asociativa.
        $program->workingDays()->detach();
        $program->modalities()->detach();
        //Asigna todas las jornadas y modalidades seleccionadas y las guarda en la entidad asociativa.
        $program->workingDays()->attach($request->workingDays);
        $program->modalities()->attach($request->modalities);

        return redirect()->route('programs.index')
            ->with('session_msg', '¡El programa, se ha editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $program = $this->validateProgram($id);
        if($program->deleted_at){
            $program->restore();
            $message = 'Habilitado';
        }else{
            $program->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('programs.index')
                ->with('session_msg', 'El programa se ha '.$message.' correctamente');
        }             
    }
    
    public function destroyMulti(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy($item, true);
            }            
            return redirect()->route('programs.index')
                ->with('session_msg', 'Los programas, se han Habilitado/Inhabilitado correctamente');
        }else{            
            return redirect()->route('programs.index');
        }
    }

    private function getValidationRules($request){
        return [
            'name'              =>  'required|min:3',
            'program_type_id'   =>  'required',
            'dependency_id'     =>  'required',
            'workingDays'       =>  'required', 
            'modalities'        =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'name.required'             =>  'El nombre del Programa es obligatorio',
            'name.min'                  =>  'El nombre del Programa debe contener al menos 3 caracteres.',
            'program_type_id.required'  =>  'El tipo del Programa es obligatorio',
            'dependency_id.required'    =>  'La dependenca del Programa es obligatorio',
            'workingDays.required'      =>  'Un programa debe tener almenos 1 jornada', 
            'modalities.required'       =>  'Un programa debe tener almenos 1 modalidad'
        ];
    }

    private function validateProgram($id){
        try {
            $program = Program::withTrashed()->findOrFail($id);            
        }catch (ModelNotFoundException $e){
            $errors = collect(['El programa con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $program;
    }
}
