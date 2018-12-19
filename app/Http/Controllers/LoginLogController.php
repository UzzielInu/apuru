<?php

namespace App\Http\Controllers;

use App\Login_log;
use Illuminate\Http\Request;
use Session;
use Validator;
use DataTables;

class LoginLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('logs.login');
    }

    public function getlogin()
    {
      $Logs = Login_log::with('user')->get();
      return Datatables::of($Logs)
      ->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\login_log  $login_log
     * @return \Illuminate\Http\Response
     */
    public function show(login_log $login_log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\login_log  $login_log
     * @return \Illuminate\Http\Response
     */
    public function edit(login_log $login_log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\login_log  $login_log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, login_log $login_log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\login_log  $login_log
     * @return \Illuminate\Http\Response
     */
    public function destroy(login_log $login_log)
    {
        //
    }
}
