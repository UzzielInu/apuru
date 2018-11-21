<?php

namespace App\Http\Controllers;

use App\HouseHolder;
use Illuminate\Http\Request;
use Validator;
use Session;
use DataTables;

class HouseHolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('householder.index');
    }

    /**
     * Show the form for creating a new resource.
       *
     * @return \Illuminate\Http\Response
     */
     public function getdata()
     {
       $householder = HouseHolder::with(array('location'=>function($query){
                      $query->select('id','clave');
                      }))->select('id','nombre','paterno','materno','extension','correo','location_id','created_at','updated_at');
       //dd($householder);
       return Datatables::of($householder)
       ->addColumn('actions', function($householder) {
         return '
          <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
             <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fas fa-bars fa-lg"></i>
             </button>
             <div class="dropdown-menu">
                 <a href="'.route('householder.edit', $householder->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
               <div class="dropdown-divider my-1"></div>
               <form id="del'.$householder->id.'" action="'.action('HouseHolderController@destroy', ['id' => $householder->id]).'" method="POST">
                 <input name="_token" type="hidden" value="'.csrf_token().'">
                 <input name="_method" type="hidden" value="DELETE">
                 <button type="button" class="dropdown-item dtbutton"><i class="fas fa-times-circle fa-fw fa-lg text-danger"></i> Eliminar</button>
               </form>
             </div>
           </div>';
       })
       ->rawColumns(['actions'])->toJson();
     }

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
     * @param  \App\HouseHolder  $houseHolder
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $householder = HouseHolder::find($id);
      if($householder == NULL){
        return redirect('householder')->with('errors','El item no existe');
      }
      return view('householder.show', compact('householder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HouseHolder  $houseHolder
     * @return \Illuminate\Http\Response
     */
    public function edit(HouseHolder $houseHolder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HouseHolder  $houseHolder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HouseHolder $houseHolder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HouseHolder  $houseHolder
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $householder = HouseHolder::find($id);
        try {
          $householder->delete();
        } catch (\Exception $e) {
          return redirect('/householder')->with('errors', 'Ha ocurrido un problema');
        }
        return redirect('/householder')->with('message', ' Encargado Eliminado');
      }
}
