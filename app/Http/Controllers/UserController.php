<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use DataTables;

class UserController extends Controller
{
  public function index()
  {
    return view('users.index');
  }

  public function getdata()
  {
    $users = User::select('id','name','email','last_login','created_at','updated_at');
    return Datatables::of($users)
    ->addColumn('actions', function($user) {
      return '
        <div class="btn-group dropleft">
          <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bars fa-lg"></i>
          </button>
          <div class="dropdown-menu">
              <a href="'.route('users.edit', $user->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
            <div class="dropdown-divider"></div>
            <form action="'.action('UserController@destroy', ['id' => $user->id]).'" method="POST">
              <input name="_token" type="hidden" value="'.csrf_token().'">
              <input name="_method" type="hidden" value="DELETE">
              <button type="submit" class="dropdown-item"><i class="fas fa-times-circle fa-fw fa-lg text-danger"></i> Eliminar</button>
            </form>
          </div>
        </div>';
    })
    ->rawColumns(['actions'])->toJson();
  }

  public function create()
  {
    $user = new User;
    return view('users.create', compact('user'));
  }

   // Validator is often used on stores & updates
  public function store(Request $request)
  {
    // $validator = Validator::make($request->all(),
    // [
    //   '_token'  => 'required',
    //   'nombre'  => 'required',
    //   'version' => 'required',
    // ]);
    //
    // if ($validator->fails())
    // {
    //   return redirect()->back()->withErrors($validator->errors());
    // }
    // $os = OperativeSystem::create($request->all());
    // return redirect('/os')->with('message', 'Sistema Operativo Guardado');
  }

  public function show($id)
  {
      //
  }

  public function edit($id)
  {
    $user = User::find($id);
    if($user == NULL){
      return redirect('users')->with('errors','El item no existe');
    }
    return view('users.edit', compact('user'));
  }

  public function update(Request $request, $id)
  {
    // dd($request->all());
    // $validator = Validator::make($request->all(),
    // [
    //   '_token' => 'required',
    //   'nombre'  => 'required',
    //   'version'   => 'required',
    // ]);
    //
    // if ($validator->fails())
    // {
    //   return redirect()->back()->withErrors($validator->errors());
    // }
    //
    // $os = OperativeSystem::findOrFail($id);
    // $os->fill($request->all())->save();
    // return redirect('/os')->with('message', 'Sistema Operativo Editado!');
  }

  public function destroy($id)
  {
    // $os = OperativeSystem::find($id);
    // try {
    //   $os->delete();
    // } catch (\Exception $e) {
    //   return redirect('/os')->with('errors', 'Ha ocurrido un problema');
    // }
    return redirect('/users')->with('message', 'Work in progress');
  }
}
