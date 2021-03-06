<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Validator;
use Session;
use DataTables;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('location.index');
    }

    public function getdata()
    {
      $location = Location::select('id','campus','edificio','departamento','nivel','areaTrabajo','clave','created_at','updated_at');
      //dd($location);
      return Datatables::of($location)
      ->addColumn('actions', function($location) {
        return '
          <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="dropdown-menu">
                <a href="'.route('location.edit', $location->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
              <form id="del'.$location->id.'" action="'.action('LocationController@destroy', ['id' => $location->id]).'" method="POST">
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
      $location = new Location;
      return view('location.create', compact('location'));
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
        'campus'  => 'required|max:5',
        'edificio'   => 'required|max:2',
        'departamento'   => 'required|max:50',
        'nivel'   => 'required|max:20',
        'areaTrabajo'   => 'required|max:25',
        'clave'   => 'required|max:15',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $location = Location::create($request->all());
      return redirect('/location')->with('message', 'Ubicacion Guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $location = Location::find($id);
      if($location == NULL){
        return redirect('location')->with('errors','El item no existe');
      }
      return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->all());
      $validator = Validator::make($request->all(),
      [
        '_token' => 'required',
        'campus'  => 'required|max:5',
        'edificio'   => 'required|max:2',
        'departamento'   => 'required|max:50',
        'nivel'   => 'required|max:20',
        'areaTrabajo'   => 'required|max:25',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $location = Location::findOrFail($id);
      $location->fill($request->all())->save();
      return redirect('/location')->with('message', ' Ubicacion Editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
      $request->user()->authorizeRoles(['admin']);
      $location = Location::find($id);
      try {
        $location->delete();
      } catch (\Exception $e) {
        return redirect('/location')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/location')->with('message', ' Ubicacion Eliminada');
    }
}
