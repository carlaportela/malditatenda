<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contrasenha' => 'required',
        ]);

        $credentials = [
            'correo' => $request->correo,
            'password' => $request->contrasenha, // Laravel buscará getAuthPassword()
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            if(Auth::user()->autorizado == 1){
                return redirect()->route('gestion');
            }
            return redirect('/')
                ->with('success', 'Bienvenido ' . Auth::user()->nombreUsuario);
        }

        return back()->withErrors([
            'login' => 'Correo electrónico o contraseña incorrectos',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}