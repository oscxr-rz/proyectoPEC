<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SessionController extends Controller
{
    public function CreateSession($usuario) {

        $token = Str::random(60);

        session([
            'token' => $token, 
            'id_usuario' => $usuario['id_usuario'],
            'tipo' => $usuario['tipo_usuario']
        ]);
    }
}
