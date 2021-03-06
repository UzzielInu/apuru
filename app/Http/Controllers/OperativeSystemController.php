<?php

namespace App\Http\Controllers;

use App\OperativeSystem;
use Illuminate\Http\Request;
use Session;
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
      $os = OperativeSystem::select('id','nombre','version','created_at','updated_at');
      //dd($os);
      return Datatables::of($os)
      ->addColumn('actions', function($os) {
        return '
          <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bars fa-lg"></i>
            </button>
            <div class="dropdown-menu">
                <a href="'.route('os.edit', $os->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider my-1"></div>
              <form id="del'.$os->id.'" action="'.action('OperativeSystemController@destroy', ['id' => $os->id]).'" method="POST">
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
        'nombre'  => 'required|max:15',
        'version' => 'required|max:25',
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
      if($os == NULL){
        return redirect('os')->with('errors','El item no existe');
      }
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
        'nombre'  => 'required:max15',
        'version'   => 'required|max:25',
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
    public function destroy(Request $request, $id)
    {
      $request->user()->authorizeRoles(['admin']);
      $os = OperativeSystem::find($id);
      try {
        $os->delete();
      } catch (\Exception $e) {
        return redirect('/os')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/os')->with('message', 'Sistema Operativo Eliminado');
    }
}
