<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\UpdateEstadoDonacion;
use App\Models\Donacion;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            return DB::transaction(function () use ($request) {

                $donacion = Donacion::where('id_donacion', $request['id_donacion'])
                    ->with('dispositivos')
                    ->first();

                if (!$donacion) {
                    return redirect()->back()->with([
                        'mensaje' => 'No se pudo encontrar la donación especificada.'
                    ]);
                }

                $dispositivos = $donacion['dispositivos']->toArray();

                // Actualizar estado de la donación
                $donacion->update([
                    'estado' => 'Recibida'
                ]);

                // Agregar dispositivos al inventario
                $inventarioResult = $this->addInventario($dispositivos);

                if (!$inventarioResult) {
                    throw new \Exception('Error al agregar dispositivos al inventario');
                }

                // Enviar email de notificación
                Mail::to($request['correo_usuario'])->send(
                    new UpdateEstadoDonacion($request['correo_usuario'], $dispositivos, $donacion['id_donacion'])
                );

                return redirect()->back()->with('mensaje', 'Estado de la donación actualizado correctamente.');
            });
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al actualizar el estado de la donación: ' . $e->getMessage()
            ]);
        }
    }

    private function addInventario($dispositivos)
    {
        foreach ($dispositivos as $dispositivo) {
            $add = Inventario::create([
                'id_dispositivo' => $dispositivo['id_dispositivo']
            ]);

            // Si falla la creación de cualquier registro, retornar false
            if (!$add) {
                return false;
            }
        }

        return true;
    }
}
