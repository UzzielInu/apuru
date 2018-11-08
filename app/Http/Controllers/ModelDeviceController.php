<?php

namespace App\Http\Controllers;

use App\ModelDevice;
use Illuminate\Http\Request;
use DataTables;

class ModelDeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('modeldevice.index');
    }

    public function getdata()
    {
      $modelDevice = ModelDevice::select('marca','modelo','created_at');
      //dd($modelDevice);
      return Datatables::of($modelDevice)
      ->addColumn('actions', function($modelDevice) {
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
        $modeldevice = new ModelDevice;
        return view('modeldevice.create',compact('modeldevice'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $modeldevice = ModelDevice::create($request->all());
        return redirect(url('/modeldevice'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelDevice  $modelDevice
     * @return \Illuminate\Http\Response
     */
    public function show(ModelDevice $modelDevice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelDevice  $modelDevice
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelDevice $modelDevice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelDevice  $modelDevice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelDevice $modelDevice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelDevice  $modelDevice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelDevice $modelDevice)
    {
        //
    }
}
