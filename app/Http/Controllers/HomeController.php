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
      
      // dd($antivirus);
      return view('home', compact('antivirus','device','houseHolder','location','modelDevice','operativeSystem','service','ticket','type','user'));
    }
}
