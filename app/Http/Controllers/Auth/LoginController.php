<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
    
    protected $redirectTo= "" ;
    public function redirectTo()
    {
        switch (Auth::user()->id_level) {
            case 1:
                    $this->redirectTo = '/admin';
                    return $this->redirectTo;
                break;

            case 2:
                    $this->redirectTo = '/waiter';
                    return $this->redirectTo;
                break;

            case 3:
                    $this->redirectTo = '/kasir';
                    return $this->redirectTo;
                break;

            case 4:
                    $this->redirectTo = '/owner';
                    return $this->redirectTo;
                break;
            
            default:
                    $this->redirectTo = '/login';
                    return $this->redirectTo;
                break;
        }
    }



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
