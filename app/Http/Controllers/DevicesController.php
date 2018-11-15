<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Validator;
use Session;
use DataTables;

class DevicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('devices.index');
    }

    public function getdata()
    {
      $device = Device::select('id','noSerie','dirIp','dirMAc','observaciones','operative_system_id','type_id','antivirus_id','model_device_id','house_holder_id','location_id','created_at','updated_at');
      //dd($device);
      return Datatables::of($device)
      ->addColumn('actions', function($device) {
        return '
          <div class="btn-group dropleft">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones
            </button>
            <div class="dropdown-menu">
                <a href="'.route('device.edit', $device->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
              <form action="'.action('DevicesController@destroy', ['id' => $device->id]).'" method="POST">
                <input name="_token" type="hidden" value="'.csrf_token().'">
                <input name="_method" type="hidden" value="DELETE">
                <button type="submit" class="dropdown-item"><i class="fas fa-times-circle fa-fw fa-lg text-danger"></i> Eliminar</button>
              </form>
            </div>
          </div>';
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
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show(Devices $devices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit(Devices $devices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Devices $devices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
