<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Session;
use Validator;
use DataTables;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('type.index');
    }

    public function getdata()
    {
      $type = Type::select('id','nombre','created_at');
      //dd($type);
      return Datatables::of($type)
      ->addColumn('actions', function($type) {
        return '
          <div class="btn-group dropleft">
            <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Acciones
            </button>
            <div class="dropdown-menu">
                <a href="'.route('type.edit', $type->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
              <div class="dropdown-divider"></div>
              <form action="'.action('TypeController@destroy', ['id' => $type->id]).'" method="POST">
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
      $type = new Type;
      return view('type.create', compact('type'));
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
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      $type = type::create($request->all());
      return redirect('/type')->with('message', 'Tipo de hardware Guardado!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $type = Type::find($id);
      if($type == NULL){
        return redirect('type')->with('errors','El item no existe');
      }
      return view('type.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(),
      [
        '_token' => 'required',
        'nombre'  => 'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }

      $type = Type::findOrFail($id);
      $type->fill($request->all())->save();
      return redirect('/type')->with('message', 'Tipo de hardware Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $type = Type::find($id);
      try {
        $type->delete();
      } catch (\Exception $e) {
        return redirect('/type')->with('errors', 'Ha ocurrido un problema');
      }
      return redirect('/type')->with('message', 'Tipo de hardware Eliminado');

    }
}
