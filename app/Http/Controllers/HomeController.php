<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Antivirus;
use App\Device;
use App\HouseHolder;
use App\Location;
use App\ModelDevice;
use App\OperativeSystem;
use App\Service;
use App\Ticket;
use App\Type;
use App\User;
use App\Login_log;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $antivirus = Antivirus::count();
      $device = Device::count();
      $houseHolder = HouseHolder::count();
      $location = Location::count();
      $modelDevice = ModelDevice::count();
      $operativeSystem = OperativeSystem::count();
      $service = Service::count();
      $ticket = Ticket::count();
      $type = Type::count();
      $user = User::count();
      $today = Carbon::now();
      $domingo = 1;
      $lunes = 1;
      $martes = 1;
      $miercoles = 1;
      $jueves = 1;
      $viernes = 1;
      $sabado = Login_log::where('created_at','like', $today->format('Y-m-d').'%')->get()->unique('user_id');
      $baja = Ticket::where('prioridad','baja')->count();
      $media = Ticket::where('prioridad','media')->count();
      $alta = Ticket::where('prioridad','alta')->count();
      
      // dd($today->format('Y-m-d'), $sabado);
      $data = '1,5,6,9,2,3,12';
      // dd($antivirus);
      return view('home', compact('antivirus','device','houseHolder','location','modelDevice','operativeSystem','service','ticket','type','user','baja','media','alta','data'));
    }

    public function test()
    {
      return view('welcome');
    }
}
