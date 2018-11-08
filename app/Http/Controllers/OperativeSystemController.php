<?php

namespace App\Http\Controllers;

use App\OperativeSystem;
use Illuminate\Http\Request;
use DataTables;

class OperativeSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('os.index');
    }


    public function getdata()
    {
      $os = OperativeSystem::select('nombre','version','created_at');
      //dd($os);
      return Datatables::of($os)
      ->addColumn('actions', function($os) {
                    return '<a href="www.google.com" target="_blank" class="btn btn-dark">Acciones</a>';
      })
      ->rawColumns(['actions'])->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $os = new OperativeSystem;
      return view('os.create', compact('os'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $os = OperativeSystem::create($request->all());
      return redirect(url('/os'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OperativeSistem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function show(OperativeSistem $operativeSistem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OperativeSistem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function edit(OperativeSistem $operativeSistem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OperativeSistem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OperativeSistem $operativeSistem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OperativeSistem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OperativeSistem $operativeSistem)
    {
        //
    }
}
