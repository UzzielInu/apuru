<?php

namespace App\Http\Controllers;

use App\ModelDevice;
use Illuminate\Http\Request;
use Session;
use Validator;
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
      $modeldevice = ModelDevice::select('id','marca','modelo','created_at','updated_at');
      //dd($modeldevice);
      return Datatables::of($modeldevice)
      ->addColumn('actions', function($modeldevice) {
        return '
            <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="dropdown-menu">
                <a href="'.route('modeldevice.edit', $modeldevice->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
                <form id="del'.$modeldevice->id.'" action="'.action('ModelDeviceController@destroy', ['id' => $modeldevice->id]).'" method="POST">
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
      $validator = Validator::make($request->all(),
      [
        '_token' => 'required',
        'marca'  => 'required',
        'modelo'  => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      $modeldevice = ModelDevice::create($request->all());
      return redirect('/modeldevice')->with('message', 'Modelo de dispositvo Guardado!');
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
    public function edit($id)
    {
      $modeldevice = ModelDevice::find($id);
      if($modeldevice == NULL){
        return redirect('modeldevice')->with('errors','El item no existe');
      }
      return view('modeldevice.edit', compact('modeldevice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelDevice  $modelDevice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->all());
      $validator = Validator::make($request->all(),
      [
        '_token' => 'required',
        'marca'  => 'required',
        'modelo'  => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $modeldevice = ModelDevice::findOrFail($id);
      $modeldevice->fill($request->all())->save();
      return redirect('/modeldevice')->with('message', 'Modelo de dispositvo Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelDevice  $modelDevice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $modeldevice = ModelDevice::find($id);
      try {
        $modeldevice->delete();
      } catch (\Exception $e) {
        return redirect('/modeldevice')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/modeldevice')->with('message', 'Modelo de dispositvo Eliminado');
    }
}
