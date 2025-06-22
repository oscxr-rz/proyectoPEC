<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Session\SessionController;
use App\Models\Usuario;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends SessionController
{
    public function index()
    {
        return view('auth.register');
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellido' => 'required|string',
            'telefono' => 'required|numeric',
            'correo' => 'required|email',
            'contraseña' => 'required|string'
        ]);

        $usuario = Usuario::where('telefono', $request['telefono'])->orWhere('correo', $request['correo'])->first();

        if ($usuario) {
            return redirect()->back()->with([
                'mensaje' => 'Este telefono o email ya existen'
            ]);
        }

        $usuario = Usuario::create([
            'nombre' => $request['nombre'],
            'apellido' => $request['apellido'],
            'telefono' => $request['telefono'],
            'correo' => $request['correo'],
            'contraseña' => Hash::make($request['contraseña'])
        ]);

        if (!$usuario) {
            return redirect()->back()->with([
                'mensaje' => 'No se pudo crear la cuenta'
            ]);
        }

        $this->CreateSession($usuario);

        return redirect()->route('home');
    }
}
