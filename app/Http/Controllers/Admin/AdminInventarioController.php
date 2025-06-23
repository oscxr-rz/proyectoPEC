<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dispositivo;
use App\Models\Inventario;
use Illuminate\Http\Request;

class AdminInventarioController extends Controller
{
    public function index()
    {
        $inventariosData = Inventario::with('dispositivo')->get();
        $inventario = $inventariosData->toArray();

        return view('admin.inventario', compact('inventario'));
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'id_inventario' => 'required|integer|min:1',
                'fecha_salida'  => 'nullable|date',
                'precio_estimado' => 'nullable|numeric|min:0',
                'observaciones_inventario' => 'nullable|string'
            ]);

            $inventario = Inventario::find($request['id_inventario']);
            if (!$inventario) {
                return redirect()->back()->with([
                    'mensaje' => 'Producto no encontrado.'
                ]);
            }

            $inventario->update($request->only([
                'fecha_salida',
                'precio_estimado',
                'observaciones_inventario'
            ]));

            return redirect()->back()->with([
                'mensaje' => 'Producto actualizado correctamente.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al actualizar el producto: ' . $e->getMessage(),
            ]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id_inventario' => 'required|integer|min:1',
            ]);

            $inventario = Inventario::find($request['id_inventario']);

            if (!$inventario) {
                return redirect()->back()->with([
                    'mensaje' => 'Producto no encontrado.'
                ]);
            }

            if ($inventario['disponible'] === 1) {
                $inventario->update([
                    'disponible' => 0
                ]);
            } else {
                $inventario->update([
                    'disponible' => 1
                ]);
            }

            return redirect()->back()->with([
                'mensaje' => 'Producto actualizado correctamente.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al actualizar el producto: ' . $e->getMessage(),
            ]);
        }
    }
}
