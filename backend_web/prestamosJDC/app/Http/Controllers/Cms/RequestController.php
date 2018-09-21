<?php

namespace App\Http\Controllers\Cms;

use App\AuthorizationStatus;
use App\Http\Controllers\Controller;
use App\Request as Application;
use App\RequestType;
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
            $request->start_date,
            $request->end_date
        )->orderBy('created_at', 'DESC')
            ->paginate(config('prestamosjdc.items_per_page_paginator'))
            ->appends('search', $request->search)
            ->appends('request_type_id', $request->request_type_id)
            ->appends('authorization_status_id', $request->authorization_status_id)
            ->appends('start_date', $request->start_date)
            ->appends('end_date', $request->end_date);

        $requestTypes = RequestType::orderBy('name', 'ASC')->get();
        $authorizationStatuses = AuthorizationStatus::orderBy('name', 'ASC')->get();

        return view('admin.requests.index')
            ->with('requests', $requests)
            ->with('requestTypes', $requestTypes)
            ->with('authorizationStatuses', $authorizationStatuses)
            ->with('title_page', $this->title_page)
            ->with('menu_item', $this->menu_item);
    }
}
