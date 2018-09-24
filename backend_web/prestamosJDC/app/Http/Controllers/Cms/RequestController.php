<?php

namespace App\Http\Controllers\Cms;

use App\AuthorizationStatus;
use App\Complement;
use App\Complements;
use App\Dependency;
use App\Http\Controllers\Controller;
use App\Request as Application;
use App\RequestType;
use App\Resource;
use App\Space;
use App\User;
use App\UserType;
use Illuminate\Http\Request;

class RequestController extends Controller{
    private $menu_item = 2;
    private $title_page = 'Solicitudes';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
		$requests = Application::withTrashed()->search(
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
            ->with('requests', $requests)
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
        $users = User::orderBy('name', 'ASC')->get();
        $spaces = Space::orderBy('name', 'ASC')->get();
        $dependencies = Dependency::orderBy('name', 'ASC')->get();

        return view('admin.requests.create_edit')
            ->with('requestTypes', $requestTypes)
            ->with('users', $users)
            ->with('spaces', $spaces)
            ->with('dependencies', $dependencies)
            ->with('title_page', 'Crear nueva solicitud')
            ->with('menu_item', $this->menu_item);
    }

    public function getSpaceResources(){
        $space_id = request()->input('space_id');
        return Resource::whereHas('spaces', function($spaces) use($space_id){
            $spaces->where('space_id', $space_id);
        })->get();       
    }

    public function getDependenciesResources(){
        $dependency_id = request()->input('dependency_id');
        return Resource::where('dependency_id', $dependency_id)->get();        
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
}
