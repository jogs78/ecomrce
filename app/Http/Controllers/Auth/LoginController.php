<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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
        if ($user->hasRole('Encargado')) {
            return redirect('/encargado');
        } elseif ($user->hasRole('Cliente')) {
            return redirect('/cliente');
        } elseif ($user->hasRole('Contador')) {
            return redirect('/contador');
        } elseif ($user->hasRole('Supervisor')) {
            return redirect('/supervisor');
        } elseif ($user->hasRole('Vendedor')) {
            return redirect('/vendedor');
        }
        return redirect('/home');
    }

}
