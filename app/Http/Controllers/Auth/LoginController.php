<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth;

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

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Intentar iniciar sesión con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // La autenticación fue exitosa
            $user = Auth::user();
    
            // Redirigir según el rol del usuario
            switch ($user->role) {
                case 'Encargado':
                    return redirect()->route('encargado');
                case 'Cliente':
                    return redirect()->route('cliente');
                case 'Contador':
                    return redirect()->route('contador');
                case 'Supervisor':
                    return redirect()->route('supervisor');
                case 'Vendedor':
                    return redirect()->route('vendedor');
                default:
                    return redirect('/home');
            }
        } else {
            // La autenticación falló
            return back()->withErrors(['email' => 'Correo electrónico o contraseña incorrectos.']);
        }
    }
    

}
