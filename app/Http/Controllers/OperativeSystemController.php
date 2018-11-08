<?php

namespace App\Http\Controllers;

use App\OperativeSystem;
use Illuminate\Http\Request;
USE Session;
use Validator;
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
      $os = OperativeSystem::select('id','nombre','version','created_at');
      //dd($os);
      return Datatables::of($os)
      ->addColumn('actions', function($os) {
        return '
          <div class="btn-group dropleft">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones
            </button>
            <div class="dropdown-menu">
                <a href="'.route('os.edit', $os->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
              <form action="'.action('OperativeSystemController@destroy', ['id' => $os->id]).'" method="POST">
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
      $os = new OperativeSystem;
      return view('os.create', compact('os'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     // Validator is often used on stores & updates
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(),
      [
        '_token'  => 'required',
        'nombre'  => 'required',
        'version' => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      $os = OperativeSystem::create($request->all());
      return redirect('/os')->with('message', 'Sistema Operativo Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OperativeSystem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function show(OperativeSystem $operativeSistem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OperativeSystem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $os = OperativeSystem::find($id);
      return view('os.edit', compact('os'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OperativeSystem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($request->all());
      $validator = Validator::make($request->all(),
      [
        '_token' => 'required',
        'nombre'  => 'required',
        'version'   => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $os = OperativeSystem::findOrFail($id);
      $os->fill($request->all())->save();
      return redirect('/os')->with('message', 'Sistema Operativo Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OperativeSystem  $operativeSistem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $os = OperativeSystem::find($id);
      try {
        $os->delete();
      } catch (\Exception $e) {
        return redirect('/os')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/os')->with('message', 'Sistema Operativo Eliminado');
    }
}
