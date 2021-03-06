<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Validator;
use Session;
use DataTables;
use App\OperativeSystem;
use App\Type;
use App\Antivirus;
use App\ModelDevice;
use App\HouseHolder;
use App\Location;

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

      $device = Device::with([
        'antivirus'=> function($query) { $query->select('id','nombre','version');},
        'os'=> function($query) { $query->select('id','nombre','version');},
        'type'=> function($query) { $query->select('id','nombre');},
        'modelDevice'=> function($query) { $query->select('id','marca','modelo');},
        'location'=> function($query) { $query->select('id','clave');},
        'householder'=> function($query) { $query->select('id','nombre','paterno','materno');},
      ])->select('id','noSerie','noInventario','dirIp','dirMAc','observaciones','operative_system_id','type_id','antivirus_id','model_device_id','house_holder_id','location_id','created_at','updated_at');
      //dd($device);
      return Datatables::of($device)
      ->addColumn('actions', function($device) {
        return '
          <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="dropdown-menu">
              <a href="'.route('device.show', $device->id).'" role="button" class="dropdown-item"><i class="fas fa-plus-circle fa-fw fa-lg text-success"></i></i></i> Detalles </a>
              <div class="dropdown-divider my-1"></div>
              <a href="'.route('device.edit', $device->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
              <form id="del'.$device->id.'" action="'.action('DevicesController@destroy', ['id' => $device->id]).'" method="POST">
                <input name="_token" type="hidden" value="'.csrf_token().'">
                <input name="_method" type="hidden" value="DELETE">
                <button type="button" class="dropdown-item dtbutton"><i class="fas fa-times-circle fa-fw fa-lg text-danger"></i> Eliminar</button>
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
      $device = new Device;
      $oss = OperativeSystem::get(['id','nombre','version']);
      $types = Type::get(['id','nombre']);
      $antivirus = Antivirus::get(['id','nombre','version']);
      $models = ModelDevice::get(['id','marca','modelo']);
      $householders = HouseHolder::get(['id','nombre','paterno','materno']);
      $locations = Location::get(['id','clave','departamento','areaTrabajo']);
      return view('devices.create',compact('device','oss','types','antivirus','models','householders','locations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),
      [
        '_token'=>'required',
        'noSerie'=>array( 'required','regex:/([a-zA-Z0-9]{3,50})/u','max:25' ),
        'noInventario'=>array( 'required','regex:/([0-9]{5,10})/u','max:10' ),
        'dirIp'=> array( 'required','regex:/(^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$)/u','max:15' ),
        'dirMac'=>array( 'required','regex:/(^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$)/u','max:18' ),
        'observaciones'=>array( 'required','regex:/([a-zA-Z0-9]{1,50})/u','max:70' ),
        'operative_system_id'=>'required',
        'type_id'=>'required',
        'antivirus_id'=>'required',
        'model_device_id'=>'required',
        'house_holder_id'=>'required',
        'location_id'=>'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      $device = Device::create($request->all());
      return redirect('/device')->with('message', 'Dispositivo Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $device = Device::find($id);
      if($device == NULL){
        return redirect('device')->with('errors','El item no existe');
      }
      return view('devices.show', compact('device'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $device = Device::find($id);
      if($device == NULL){
        return redirect('antivirus')->with('errors','El item no existe');
      }
      $oss = OperativeSystem::get(['id','nombre','version']);
      $types = Type::get(['id','nombre']);
      $antivirus = Antivirus::get(['id','nombre','version']);
      $models = ModelDevice::get(['id','marca','modelo']);
      $householders = HouseHolder::get(['id','nombre','paterno','materno']);
      $locations = Location::get(['id','clave','departamento','areaTrabajo']);
      return view('devices.edit',compact('device','oss','types','antivirus','models','householders','locations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(),
      [
        '_token'=>'required',
        'noSerie'=>array( 'required','regex:/([a-zA-Z0-9]{3,50})/u','max:25' ),
        'noInventario'=>array( 'required','regex:/([0-9]{5,10})/u','max:10' ),
        'dirIp'=> array( 'required','regex:/(^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$)/u','max:15' ),
        'dirMac'=>array( 'required','regex:/(^([0-9a-fA-F][0-9a-fA-F]:){5}([0-9a-fA-F][0-9a-fA-F])$)/u','max:18' ),
        'observaciones'=>array( 'required','regex:/([a-zA-Z0-9]{1,70})/u','max:70' ),
        'operative_system_id'=>'required',
        'type_id'=>'required',
        'antivirus_id'=>'required',
        'model_device_id'=>'required',
        'house_holder_id'=>'required',
        'location_id'=>'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $device = Device::findOrFail($id);
      $device->fill($request->all())->save();
      return redirect('/device')->with('message', 'Dispositivo Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Devices  $devices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      $request->user()->authorizeRoles(['admin']);
      $device = Device::find($id);
      try {
        $device->delete();
      } catch (\Exception $e) {
        return redirect('/device')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/device')->with('message', ' Dispositivo Eliminado');
    }
}
