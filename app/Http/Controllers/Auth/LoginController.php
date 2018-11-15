<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
      if(is_null($user->last_login)){
        $user->last_login = Carbon\Carbon::now()->toDateTimeString();
        $user->save();
        return redirect('/home')->with('errors','ESTE ES TU PRIMER LOGIN, cambia tu contraseña');
      }
      else{
        $user->last_login = Carbon\Carbon::now()->toDateTimeString();
        $user->save();
        return redirect('/home');
      }
    }
}
