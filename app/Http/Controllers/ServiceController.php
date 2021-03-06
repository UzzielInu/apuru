<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Session;
use Validator;
use DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index');
    }

    public function getdata()
    {
      $service = Service::select('id','nombre','descripcion','tipo','created_at','updated_at');
      //dd($service);
      return Datatables::of($service)
      ->addColumn('actions', function($service) {
        return '
          <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="dropdown-menu">
                <a href="'.route('service.edit', $service->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
                <div class="dropdown-divider my-1"></div>
                <form id="del'.$service->id.'"  action="'.action('ServiceController@destroy', ['id' => $service->id]).'" method="POST">
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
      $service = new Service;
      return view('service.create', compact('service'));
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
        'nombre'  => 'required|max:50',
        'descripcion'   => 'required:max:70',
        'tipo'   => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $service = Service::create($request->all());
      return redirect('/service')->with('message', 'Servicio/Soporte Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $service = Service::find($id);
      if($service == NULL){
        return redirect('service')->with('errors','El item no existe');
      }
      return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->all());
      $validator = Validator::make($request->all(),
      [
        '_token' => 'required',
        'nombre'  => 'required',
        'descripcion'   => 'required',
        'tipo'   => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $service = Service::findOrFail($id);
      $service->fill($request->all())->save();
      return redirect('/service')->with('message', 'Servicio/Soporte Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      $request->user()->authorizeRoles(['admin']);
      $service = Service::find($id);
      try {
        $service->delete();
      } catch (\Exception $e) {
        return redirect('/service')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/service')->with('message', 'Servicio/Soporte Eliminado');
    }
}
