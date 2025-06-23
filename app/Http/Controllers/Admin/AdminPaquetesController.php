<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paquete;
use Illuminate\Http\Request;

class AdminPaquetesController extends Controller
{
    public function index()
    {
        $paquetesData = Paquete::with('inventarios.dispositivo')->get();
        $paquetes = $paquetesData->toArray();

        return view('admin.paquetes', compact('paquetes'));
    }
}
