<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class AdminDispositivosController extends Controller
{
    public function index()
    {
        $dispositivos = Dispositivo::with('donacion', 'categoria')
            ->whereHas('donacion', function ($query) {
                $query->where('estado', '!=', 'Cancelada');
            })
            ->get();

        return view('admin.dispositivos', compact('dispositivos'));
    }
}
