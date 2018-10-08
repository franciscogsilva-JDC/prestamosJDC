<?php

namespace App\Http\Controllers\Cms;

use App\Authorization;
use App\AuthorizationStatus;
use App\Complement;
use App\Complements;
use App\Dependency;
use App\Http\Controllers\Controller;
use App\ParticipantType;
use App\Request as Application;
use App\RequestType;
use App\Resource;
use App\Space;
use App\SpaceType;
use App\User;
use App\UserType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

class RequestController extends Controller{
    private $menu_item = 2;
    private $title_page = 'Solicitudes';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
		$applications = Application::withTrashed()->search(
            $request->search, //user name or user dni
            $request->request_type_id,
            $request->authorization_status_id,
            $request->user_type_id,
            $request->start_date,
            $request->end_date,
            $request->received_date
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('search', $request->search)
            ->appends('request_type_id', $request->request_type_id)
            ->appends('authorization_status_id', $request->authorization_status_id)
            ->appends('user_type_id', $request->user_type_id)
            ->appends('start_date', $request->start_date)
            ->appends('end_date', $request->end_date)
            ->appends('received_date', $request->received_date);

        $requestTypes = RequestType::orderBy('name', 'ASC')->get();
        $authorizationStatuses = AuthorizationStatus::orderBy('name', 'ASC')->get();
        $userTypes = UserType::orderBy('name', 'ASC')->get();

        return view('admin.requests.index')
            ->with('requests', $applications)
            ->with('requestTypes', $requestTypes)
            ->with('authorizationStatuses', $authorizationStatuses)
            ->with('userTypes', $userTypes)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }

    /**
     * Show the form for creating a new requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        $requestTypes = RequestType::orderBy('name', 'ASC')->get();
        $statusTypes = SpaceType::orderBy('name', 'ASC')->get();
        $participantTypes = ParticipantType::orderBy('name', 'ASC')->get();
        $authorizationStatuses = AuthorizationStatus::orderBy('name', 'ASC')->get();
        $users = User::orderBy('name', 'ASC')->get();
        //$spaces = Space::orderBy('name', 'ASC')->get();
        $dependencies = Dependency::orderBy('name', 'ASC')->get();

        return view('admin.requests.create_edit')
            ->with('requestTypes', $requestTypes)
            ->with('statusTypes', $statusTypes)
            ->with('users', $users)
            //->with('spaces', $spaces)
            ->with('dependencies', $dependencies)
            ->with('participantTypes', $participantTypes)
            ->with('authorizationStatuses', $authorizationStatuses)
            ->with('title_page', 'Crear nueva solicitud')
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
        $start_date_full = Carbon::parse($request->start_date.' '.$request->start_time, config('app.timezone'));
        $end_date_full = Carbon::parse($request->end_date.' '.$request->end_time, config('app.timezone'));
        $errors = null;

        if($start_date_full >= $end_date_full){
            $errors = collect(['La fecha de inicio de la solicitud no puede ser MAYOR o IGUAL a la fecha de finalización de la solicitud.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }

        //Type = 1 => Espacio
        //Type = 2 => Recurso
        if($request->request_type_id == 1){
            $this->validate($request, $this->getValidationSpaceRequestRules($request), $this->getValidationSpaceRequestMessages($request));

            if($start_date_full <= Carbon::now()->addDays(config('prestamosjdc.minimum_days_for_spaces_loans'))){
                $errors = collect(['La fecha de inicio de la solicitud no puede ser menor a '.config('prestamosjdc.minimum_days_for_spaces_loans').' días para Espacios Físicos.']);
                return back()
                    ->withInput()
                    ->with('errors', $errors); 
            }

            if($request->participants <= 0){
                $errors = collect(['El número TOTAL de participantes no puede ser menor o igual a 0 (cero)']);
                return back()
                    ->withInput()
                    ->with('errors', $errors);
            }else{
                if($request->participants > Space::find($request->space_id)->max_persons){
                    $errors = collect(['El número TOTAL de participantes es mayor a la capacidad del espacio seleccionado.']);
                    return back()
                        ->withInput()
                        ->with('errors', $errors);
                }
                if(($request->internal_participants + $request->external_participants) != $request->participants){
                    $errors = collect(['El número TOTAL de participantes no coincide con la suma del número de participantes EXTERNOS y el número de participantes INTERNOS']);
                    return back()
                        ->withInput()
                        ->with('errors', $errors);
                }
            }
        }elseif($request->request_type_id == 2){
            $this->validate($request, $this->getValidationResourceRequestRules($request), $this->getValidationResourceRequestMessages($request));
            //Si es un Elemento Audiovisual
            if((Resource::find($request->resources_dep)->category->id == 2)){
                //Si es un Estudiante
                if(User::find($request->user_id)->type->id == 3){
                    $this->validate(
                        $request, 
                        [
                            'responsible_id' => 'required|numeric'
                        ],
                        [
                            'responsible_id.required' => 'El responsable es obligatorio.',
                            'responsible_id.numeric'  => 'El responsable debe ser un valor numerico.'
                        ]
                    );
                }

                if($start_date_full <= Carbon::now()->addDays(config('prestamosjdc.minimum_days_for_audiovisual_element_loans'))){
                    $errors = collect(['La fecha de inicio de la solicitud no puede ser menor a '.config('prestamosjdc.minimum_days_for_audiovisual_element_loans').' días para elementos de tipo AUDIOVISUAL.']); 
                    return back()
                        ->withInput()
                        ->with('errors', $errors);
                }
            }elseif((Resource::find($request->resources_dep)->category->id == 3 || Resource::find($request->resources_dep)->category->id == 4)){
                //Si es un elemento de Musuica o Folclorico
                if($start_date_full <= Carbon::now()->addDays(config('prestamosjdc.minimum_days_for_musical_or_folklore_elements'))){
                    $errors = collect(['La fecha de inicio de la solicitud no puede ser menor a '.config('prestamosjdc.minimum_days_for_musical_or_folklore_elements').' días para elementos de tipo AUDIOVISUAL.']);
                    return back()
                        ->withInput()
                        ->with('errors', $errors);
                }
            }elseif(Resource::find($request->resources_dep)->category->id == 1){
                //Si es un elemento Deportivo
                if($end_date_full > $start_date_full->addHours(2)){
                    $errors = collect(['La Fecha y Hora de entrega de la solicitud no puede ser mayor de 2 HORAS para elementos de tipo DEPORTIVO.']);
                    return back()
                        ->withInput()
                        ->with('errors', $errors);
                }
            }
        }

        $application = new Application();
        $application = $this->setApplication($application, $request);
        $application->participantTypes()->attach($request->participantsTypes);

        $authorization = new Authorization();
        $authorization->request_id = $application->id;
        $authorization->authorization_status_id = $request->authorization_status_id;
        $authorization->approved_by = $request->authorization_status_id===2?Auth::user()->id:null;
        $authorization->save();

        if($request->request_type_id == 1){
            $authorization->spaces()->attach($request->space_id);
            $space = Space::find($request->space_id);
            $space->space_status_id = 2;
            $space->save();

            $authorization->resources()->attach($request->resources);
            if($request->resources){
                foreach ($request->resources as $res) {
                    $res = Resource::find($resource);
                    $res->resource_status_id = 2;
                    $res->save();
                }
            }
        }elseif($request->request_type_id == 2){
            $authorization->resources()->attach($request->resources_dep);            
            if($request->resources_dep){
                foreach ($request->resources_dep as $res) {
                    $res = Resource::find($resource);
                    $res->resource_status_id = 2;
                    $res->save();
                }
            }            
        }

        return redirect()->route('requests.index')
            ->with('session_msg', 'Se ha creado la solicitud.');
    }

    private function setApplication($application, $request){
        $application->participants          =   $request->participants;
        $application->internal_participants =   $request->internal_participants;
        $application->external_participants =   $request->external_participants;
        $application->value                 =   $application->calculeSpaceValue();        
        $application->description           =   $request->description;
        $application->user_id               =   $request->user_id;
        $application->responsible_id        =   $request->responsible_id;
        $application->request_type_id       =   $request->request_type_id;
        $application->start_date            =   Carbon::parse($request->start_date.' '.$request->start_time, config('app.timezone'));
        $application->end_date              =   Carbon::parse($request->end_date.' '.$request->end_time, config('app.timezone'));
        $application->save();
        return $application;
    }

    /**
     *  Trae los espacios por tipo de espacio.
     */
    public function getSpacesByType(){
        return Space::where('space_status_id', 1)->where('space_type_id', request()->input('space_type_id'))->get();       
    }

    /**
     *  Trae los recursos NO Devolutivos asociados a un espacio.
     */
    public function getSpaceResources(){
        $space_id = request()->input('space_id');
        return Resource::where('resource_status_id', 1)->where('resource_type_id', 2)->whereHas('spaces', function($spaces) use($space_id){
            $spaces->where('space_id', $space_id);
        })->get();       
    }

    /**
     *  Trae los recursos devolutivos asociados a una dependencia.
     */
    public function getDependenciesResources(){
        $dependency_id = request()->input('dependency_id');
        return Resource::where('resource_status_id', 1)->where('resource_type_id', 1)->where('dependency_id', $dependency_id)->get();        
    }

    public function getComplements(){
        return Complement::orderBy('name', 'ASC')->get();
    }

    public function validateResource(){
        $resource_id = request()->input('resource_id');
        if(Resource::find($resource_id)->category->id == 2){
            return 'true';
        }else{
            return 'false';
        }
    }

    private function getValidationRules($request){
        return [
            'user_id'                   =>  'required|numeric',
            'request_type_id'           =>  'required|numeric',
            'start_date'                =>  'required',
            'start_time'                =>  'required',
            'end_date'                  =>  'required',
            'end_time'                  =>  'required',
            'authorization_status_id'   =>  'required|numeric'
        ];
    }

    private function getValidationMessages($request){
        return [
            'user_id.required'                  =>  'El solicitante es obligatorio.',
            'user_id.numeric'                   =>  'El solicitante debe ser un valor numerico.',
            'request_type_id.required'          =>  'El tipo de solicitud es obligatorio.',
            'request_type_id.numeric'           =>  'El tipo de solicitud debe ser un valor numerico.',
            'start_date.required'               =>  'La fecha de inicio de la solicitud es obligatoria.',
            'start_time.required'               =>  'La hora de inicio de la solicitud es obligatoria.',
            'end_date.required'                 =>  'La fecha de finalización de la solicitud es obligatoria.',
            'end_time.required'                 =>  'La hora de finalización de la solicitud es obligatoria.',
            'authorization_status_id.required'  =>  'El estado de la autorización de la actual solicitud es obligatorio.',
            'authorization_status_id.numeric'   =>  'El estado de la autorización de la actual solicitud debe ser un valor numerico.'
        ];
    }

    private function getValidationSpaceRequestRules($request){
        return [
            'responsible_id'        =>  'required|numeric',
            'description'           =>  'required|min:20',
            'space_id'              =>  'required|numeric',
            'participantsTypes'     =>  'required',
            'participants'          =>  'required|numeric',
            'internal_participants' =>  'required|numeric',
            'external_participants' =>  'required|numeric'
        ];
    }

    private function getValidationSpaceRequestMessages($request){
        return [
            'responsible_id.required'           =>  'El responsable es obligatorio.',
            'responsible_id.numeric'            =>  'El responsable debe ser un valor numerico.',
            'description.required'              =>  'La descripción es obligatoria.',
            'description.min'                   =>  'La descripción debe tener un mínimo de 20 carácteres.',
            'space_id.required'                 =>  'El espacio es obligatorio.',
            'space_id.numeric'                  =>  'El espacio debe ser un valor numerico.',
            'participantsTypes.required'        =>  'El tipo de participantes es obligatorio.',
            'participants.required'             =>  'El número TOTAL de participantes es obligatorio.',
            'participants.numeric'              =>  'El número TOTAL de participantes debe ser un valor numerico.',
            'internal_participants.required'    =>  'El número TOTAL de participantes INTERNOS es obligatorio.',
            'internal_participants.numeric'     =>  'El número TOTAL de participantes INTERNOS debe ser un valor numerico.',
            'external_participants.required'    =>  'El número TOTAL de participantes EXTERNOS es obligatorio.',
            'external_participants.numeric'     =>  'El número TOTAL de participantes EXTERNOS debe ser un valor numerico.'
        ];
    }

    private function getValidationResourceRequestRules($request){
        return [
            'dependency_id' =>  'required|numeric',
            'resources_dep' =>  'required|numeric'
        ];
    }

    private function getValidationResourceRequestMessages($request){
        return [
            'dependency_id.required'    =>  'La dependencia es obligatorio.',
            'dependency_id.numeric'     =>  'La dependencia debe ser un valor numerico.',
            'resources_dep.required'    =>  'El recurso es obligatorio.',
            'resources_dep.numeric'     =>  'El recurso debe ser un valor numerico.'
        ];
    }
}
