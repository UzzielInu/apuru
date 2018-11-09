<?php

namespace App\Http\Controllers;

use App\Antivirus;
use Illuminate\Http\Request;
use Session;
use Validator;
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
      $antivirus = Antivirus::select('id','nombre','version','created_at');
      //dd($antivirus);
      return Datatables::of($antivirus)
      ->addColumn('actions', function($antivirus) {
        return '
          <div class="btn-group dropleft">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones
            </button>
            <div class="dropdown-menu">
                <a href="'.route('antivirus.edit', $antivirus->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
              <form action="'.action('AntivirusController@destroy', ['id' => $antivirus->id]).'" method="POST">
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
      $antivirus = new Antivirus;
        return view('antivirus.create',compact('antivirus'));
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
          'nombre'  => 'required',
          'version'   => 'required',
        ]);

        if ($validator->fails())
        {
          return redirect()->back()->withErrors($validator->errors());
        }
        $antivirus = Antivirus::create($request->all());
        return redirect('/antivirus')->with('message', 'Antivirus Guardado');
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
    public function edit($id)
    {
      $antivirus = Antivirus::find($id);
      if($antivirus == NULL){
        return redirect('antivirus')->with('errors','El item no existe');
      }
      return view('antivirus.edit', compact('antivirus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Antivirus  $antivirus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
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

      $antivirus = Antivirus::findOrFail($id);
      $antivirus->fill($request->all())->save();
      return redirect('/antivirus')->with('message', ' Antivirus Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Antivirus  $antivirus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $antivirus = Antivirus::find($id);
      try {
        $antivirus->delete();
      } catch (\Exception $e) {
        return redirect('/antivirus')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/antivirus')->with('message', ' Antivirus Eliminado');
    }
}
