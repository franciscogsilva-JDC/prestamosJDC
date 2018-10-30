<?php

namespace App\Http\Controllers\Web;

use App\Authorization;
use App\Dependency;
use App\Http\Controllers\Controller;
use App\ParticipantType;
use App\Request as Application;
use App\RequestType;
use App\Resource;
use App\Space;
use App\SpaceType;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    private $menu_item = 2;
    private $title_page = 'Solicitudes';

    /**
     * Show the form for creating a new requests.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    	$user_type = Auth::user()->type->id;
    	if($user_type == 1 || $user_type == 6 || $user_type == 7 || $user_type == 8){
    		return redirect()->route('requests.create');
    	}elseif($user_type == 2 || $user_type == 3){
        	$requestTypes = RequestType::where('id', 2)
        		->orWhere('id', 3);
    	}elseif($user_type == 4){
        	$requestTypes = RequestType::where('id', 1)
        		->orWhere('id', 2)
        		->orWhere('id', 3);
    	}elseif($user_type == 5){
        	$requestTypes = RequestType::where('id', 1);
    	}

    	$requestTypes = $requestTypes->orderBy('name', 'ASC')->get();

        $spaceTypes = SpaceType::orderBy('name', 'ASC')->get();
        $participantTypes = ParticipantType::orderBy('name', 'ASC')->get();
        $dependencies = Dependency::orderBy('name', 'ASC')->get();

        return view('front.requests.create_edit')
            ->with('requestTypes', $requestTypes)
            ->with('spaceTypes', $spaceTypes)
            ->with('dependencies', $dependencies)
            ->with('participantTypes', $participantTypes)
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
        $user = Auth::user();
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
            $user_type_id = $user->user_type_id;

            if($user_type_id == 3 || $user_type_id == 2){
                $errors = collect(['El tipo de usuario seleccionado no puede realizar este tipo de solicitudes']);
                return back()
                    ->withInput()
                    ->with('errors', $errors);
            }

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
        $authorization->authorization_status_id = 1;
        $authorization->save();

        if($request->request_type_id == 1){
            $authorization->spaces()->attach($request->space_id);
            $space = Space::find($request->space_id);
            $space->space_status_id = 2;
            $space->save();

            $authorization->resources()->attach($request->resources);
            if($request->resources){
                foreach ($request->resources as $res) {
                    $resource = Resource::find($res);
                    $resource->resource_status_id = 2;
                    $resource->save();
                }
            }
        }elseif($request->request_type_id == 2){
            $authorization->resources()->attach($request->resources_dep);            
            if($request->resources_dep){
                $res = Resource::find($request->resources_dep);
                $res->resource_status_id = 2;
                $res->save();
            }            
        }

        return redirect()->route('welcome')
            ->with('session_msg', 'Se ha creado la solicitud correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $type=false){
        $application = $this->validateApplication($id);
        if($application->deleted_at){

        }else{
            $beforeAuthorization = $application->authorizations()->orderBy('created_at', 'DESC')->first();
            if($application->request_type_id == 1){
                $space = $beforeAuthorization->spaces()->orderBy('created_at', 'DESC')->first();
                $space->space_status_id = 1;
                $space->save();
            }

            $beforeResources = $beforeAuthorization->resources()->get();
            if($beforeResources->count()>0){
                foreach ($beforeResources as $befRes) {
                    $befRes->resource_status_id = 1;
                    $befRes->save();
                }
            }
        
            $authorization = new Authorization();
            $authorization->request_id = $application->id;
            $authorization->authorization_status_id = 4;
            $authorization->approved_by = Auth::user()->id;
            $authorization->save();
            $application->delete();
            $message = 'Inhabilitado';
        }
        if(!$type){
            return redirect()->route('requests.index')
                ->with('session_msg', 'La solicitud se ha '.$message.' correctamente');
        }             
    }

    private function validateApplication($id){
        try {
            $application = Application::withTrashed()->findOrFail($id);            
        }catch (ModelNotFoundException $e){
            $errors = collect(['La Solicitud con ID '.$id.' no se encuentra.']);
            return back()
                ->withInput()
                ->with('errors', $errors);
        }
        return $application;
    }

    private function setApplication($application, $request){
        $application->participants          =   $request->participants;
        $application->internal_participants =   $request->internal_participants;
        $application->external_participants =   $request->external_participants;
        $application->value                 =   $application->calculeSpaceValue();        
        $application->description           =   $request->description;
        $application->user_id               =   Auth::user()->id;
        $application->responsible_id        =   Auth::user()->id;
        $application->request_type_id       =   $request->request_type_id;
        $application->start_date            =   Carbon::parse($request->start_date.' '.$request->start_time, config('app.timezone'));
        $application->end_date              =   Carbon::parse($request->end_date.' '.$request->end_time, config('app.timezone'));
        $application->save();
        return $application;
    }

    private function getValidationRules($request){
        return [
            'request_type_id'           =>  'required|numeric',
            'start_date'                =>  'required',
            'start_time'                =>  'required',
            'end_date'                  =>  'required',
            'end_time'                  =>  'required'
        ];
    }

    private function getValidationMessages($request){
        return [
            'request_type_id.required'          =>  'El tipo de solicitud es obligatorio.',
            'request_type_id.numeric'           =>  'El tipo de solicitud debe ser un valor numerico.',
            'start_date.required'               =>  'La fecha de inicio de la solicitud es obligatoria.',
            'start_time.required'               =>  'La hora de inicio de la solicitud es obligatoria.',
            'end_date.required'                 =>  'La fecha de finalización de la solicitud es obligatoria.',
            'end_time.required'                 =>  'La hora de finalización de la solicitud es obligatoria.'
        ];
    }

    private function getValidationSpaceRequestRules($request){
        return [
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
