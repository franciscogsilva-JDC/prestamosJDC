<?php

namespace App\Http\Controllers\Cms;

use App\Dependency;
use App\Http\Controllers\Controller;
use App\Modality;
use App\Program;
use App\ProgramType;
use App\WorkingDay;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    private $menu_item = 8;
    private $title_page = 'Programas CMS';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $programs = Program::search(
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //
    }
    
    public function destroy_multi(Request $request){
        if(isset($request->items_to_delete)){
            foreach ($request->items_to_delete as $item) {
                $this->destroy(Program::find($item), true);
            }
            
            return redirect()->route('programs.index')
                ->with('session_msg', 'Los programas, se han inhabilitado correctamente');
        }else{            
            return redirect()->route('programs.index');
        }
    }
}
