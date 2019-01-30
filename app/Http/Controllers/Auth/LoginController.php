<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Carbon;
use App\Login_log;
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
    protected $redirectTo = '/test';

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
        // for login logs
        $user->loginLogs = new Login_log();
        $user->loginLogs->user_id = $user->id;
        $user->loginLogs->type = 'LOGIN';
        $user->loginLogs->save();

        if($user->roles()->count()>1){
          return redirect('/selectRol');
        }else{
          if(Auth::user()->hasRole('admin')){
            return redirect('/home');
          }else{
            return redirect('/test');
          }
        }
      }
      else{
        $user->last_login = Carbon\Carbon::now()->toDateTimeString();
        $user->save();
        // for login logs
        $loginLogs = new Login_log();
        $loginLogs->user_id = $user->id;
        $loginLogs->type = 'LOGIN';
        $loginLogs->save();

        if($user->roles()->count()>1){
          return redirect('/selectRol');
        }else{
          if(Auth::user()->hasRole('admin')){
            return redirect('/home');
          }else{
            return redirect('/test');
          }
        }
      }
    }

    public function logout(Request $request)
    {
      $user = Auth::user();
      $loginLogs = new Login_log();
      $loginLogs->user_id = $user->id;
      $loginLogs->type = 'LOGOUT';
      $loginLogs->save();

      $this->guard()->logout();
      $request->session()->invalidate();
      return $this->loggedOut($request) ?: redirect('/');
    }
}
