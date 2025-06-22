<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UpdateEstadoDonacion;
use App\Models\Donacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminDonacionesController extends Controller
{
    public function index()
    {
        $donacionesData = Donacion::where('estado', '!=', 'Cancelada')->with('usuario', 'dispositivos')->get()->sortByDesc('fecha_donacion');
        $donaciones = $donacionesData->toArray();

        return view('admin.donaciones', compact('donaciones'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id_donacion' => 'required|integer|min:1',
            'correo_usuario' => 'required|email'
        ]);

        try {
            $donacion = Donacion::where('id_donacion', $request['id_donacion'])->with('dispositivos')->first();

            if (!$donacion) {
                return redirect()->back()->with([
                    'mensaje' => 'No se pudo actualizar el estado de la donación.'
                ]);
            }

            $dispositivos = $donacion['dispositivos']->toArray();

            $donacion->update([
                'estado' => 'Recibida'
            ]);

            Mail::to($request['correo_usuario'])->send(new UpdateEstadoDonacion($request['correo_usuario'], $dispositivos));

            return redirect()->back()->with('mensaje', 'Estado de la donación actualizado correctamente.');

        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al actualizar el estado de la donación: ' . $e->getMessage()
            ]);
        }
    }
}
