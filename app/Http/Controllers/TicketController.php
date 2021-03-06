<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Device;
use App\service;
use Illuminate\Http\Request;
use Validator;
use Session;
use DataTables;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('tickets.index');
    }

    public function getdata()
    {
      $ticket = Ticket::with('device.os','device.type','device.antivirus','device.householder','device.modeldevice','device.location','service')->select('id','observaciones','prioridad','cliente','estado','device_id','service_id','created_at','updated_at');
      //dd($ticket);
      return Datatables::of($ticket)
      ->addColumn('actions', function($ticket) {
        return '
          <div class="btn-group dropleft" data-toggle="tooltip" data-placement="top" title="Acciones">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bars fa-lg"></i>
          </button>
            <div class="dropdown-menu">
                <a href="'.route('ticket.show', $ticket->id).'" role="button" class="dropdown-item"><i class="fas fa-plus-circle    fa-fw fa-lg text-success"></i></i></i> Detalles </a>
                <div class="dropdown-divider my-1"></div>
                <a href="'.route('ticket.edit', $ticket->id).'" role="button" class="dropdown-item"><i class="fas fa-pencil-alt fa-fw fa-lg text-primary"></i> Editar</a>
                <div class="dropdown-divider my-1"></div>
                <form id="del'.$ticket->id.'" action="'.action('TicketController@destroy', ['id' => $ticket->id]).'" method="POST">
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
      $ticket = new Ticket;
      $services = Service::all();
      $devices = Device::all();
      return view('tickets.create', compact('ticket', 'services','devices'));
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
        'cliente'=>'required|max:20',
        'prioridad'=>'required|max:25',
        'estado'=>'required|max:15',
        'observaciones'=>'required|max:70',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      $ticket = Ticket::create($request->all());
      return redirect('/ticket')->with('message', 'Ticket Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $ticket = Ticket::find($id);
      if($ticket == NULL){
        return redirect('ticket')->with('errors','El item no existe');
      }
      return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::find($id);
        if($ticket == NULL){
          return redirect('ticket')->with('errors','El item no existe');
        }
        $devices  = Device::get(['id','noserie','type_id']);
        $services = Service::get(['id','nombre','tipo']);
        return view ('tickets.edit',compact('ticket','devices','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $validator = Validator::make($request->all(),
      [
        '_token'=>'required',
        'cliente'=>'required|max:20',
        'prioridad'=>'required|max:25',
        'estado'=>'required|max:15',
        'observaciones'=>'required|max:70',
        'device_id'=>'required',
        'service_id'=>'required',
      ]);

      if ($validator->fails())
      {
        return redirect()->back()->withErrors($validator->errors());
      }
      $ticket = Ticket::findOrFail($id);
      $ticket->fill($request->all())->save();
      return redirect('/ticket')->with('message', 'Ticket Editado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $request->user()->authorizeRoles(['admin']);
        $ticket = Ticket::find($id);
        try {
          $ticket->delete();
        } catch (\Exception $e) {
          return redirect('/ticket')->with('errors', 'Ha ocurrido un problema');
        }
        return redirect('/ticket')->with('message', ' Ticket Eliminado');
    }
}
