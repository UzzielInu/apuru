<?php

namespace App\Http\Controllers;

use App\Antivirus;
use Illuminate\Http\Request;
use DataTables;

class AntivirusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('antivirus.index');
    }

    public function getdata()
    {
      $antivirus = Antivirus::select('nombre','version','created_at');
      // dd($antivirus);
      return Datatables::of($antivirus)
      ->addColumn('actions', function($antivirus) {
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
     * @param  \App\Antivirus  $antivirus
     * @return \Illuminate\Http\Response
     */
    public function show(Antivirus $antivirus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Antivirus  $antivirus
     * @return \Illuminate\Http\Response
     */
    public function edit(Antivirus $antivirus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antivirus  $antivirus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Antivirus $antivirus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antivirus  $antivirus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Antivirus $antivirus)
    {
        //
    }
}
