<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventario;
use App\Models\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPaquetesController extends Controller
{
    public function index()
    {
        $paquetesData = Paquete::with('inventarios.dispositivo')->get();
        $paquetes = $paquetesData->toArray();

        $inventarios = Inventario::where('id_paquete', null)->with('dispositivo')->get()->toArray();


        return view('admin.paquetes', compact('paquetes', 'inventarios'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'peso_total' => 'nullable|numeric|min:0',
                'descripcion' => 'nullable|string',
                'id_venta' => 'nullable|exists:venta,id_venta',
                'inventarios' => 'nullable|array',
                'inventarios.*' => 'exists:inventario,id_inventario',
            ]);

            return DB::transaction(function () use ($request) {
                // Crear el paquete
                $paquete = Paquete::create([
                    'peso_total' => $request['peso_total'] ?? null,
                    'descripcion' => $request['descripcion'] ?? null,
                    'id_venta' => $request['id_venta'] ?? null
                ]);

                // Asignar inventarios al paquete si se proporcionaron
                if (!empty($request['inventarios'])) {
                    $inventarios = array_filter($request['inventarios']); // Remover valores vacíos

                    if (!empty($inventarios)) {
                        Inventario::whereIn('id_inventario', $inventarios)
                            ->whereNull('id_paquete') // Solo inventarios disponibles
                            ->update(['id_paquete' => $paquete['id_paquete']]);
                    }
                }

                return redirect()->back()->with([
                    'mensaje' => 'Paquete creado correctamente con ID: ' . $paquete->id_paquete
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'No se pudo crear el paquete: ' . $e->getMessage()
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'peso_total' => 'nullable|numeric',
                'descripcion' => 'nullable|string',
                'id_venta' => 'nullable|exists:venta,id_venta',
                'eliminar_inventarios' => 'nullable|string',
                'nuevos_inventarios' => 'nullable|array',
                'nuevos_inventarios.*' => 'exists:inventario,id_inventario',
            ]);

            return DB::transaction(function () use ($request) {
                $paquete = Paquete::findOrFail($request['id_paquete']);

                $paquete->update([
                    'peso_total' => $request['peso_total'] ?? null,
                    'descripcion' => $request['descripcion'] ?? null,
                    'id_venta' => $request['id_venta'] ?? null,
                ]);

                $this->updateInventario($request, $paquete['id_paquete']);

                return redirect()->back()->with([
                    'mensaje' => 'Paquete actualizado correctamente.'
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'No se pudo actualizar el paquete: ' . $e->getMessage()
            ]);
        }
    }

    private function updateInventario($request, $paqueteId)
    {
        // Eliminar inventarios marcados para eliminar
        if (!empty($request['eliminar_inventarios'])) {
            $inventariosEliminar = explode(',', $request['eliminar_inventarios']);
            $inventariosEliminar = array_filter($inventariosEliminar); // Remover valores vacíos

            if (!empty($inventariosEliminar)) {
                Inventario::whereIn('id_inventario', $inventariosEliminar)
                    ->update(['id_paquete' => null]);
            }
        }

        // Agregar nuevos inventarios al paquete
        if (!empty($request['nuevos_inventarios'])) {
            $nuevosInventarios = array_filter($request['nuevos_inventarios']); // Remover valores vacíos

            if (!empty($nuevosInventarios)) {
                Inventario::whereIn('id_inventario', $nuevosInventarios)
                    ->whereNull('id_paquete') // Solo inventarios disponibles
                    ->update(['id_paquete' => $paqueteId]);
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id_paquete' => 'required|exists:paquete,id_paquete',
            ]);

            return DB::transaction(function () use ($request) {
                $paquete = Paquete::findOrFail($request['id_paquete']);

                // Liberar todos los inventarios del paquete antes de eliminarlo
                Inventario::where('id_paquete', $request['id_paquete'])
                    ->update(['id_paquete' => null]);

                // Eliminar el paquete
                $paquete->delete();

                return redirect()->back()->with([
                    'mensaje' => 'Paquete eliminado correctamente. Los dispositivos han sido liberados al inventario.'
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'No se pudo eliminar el paquete: ' . $e->getMessage()
            ]);
        }
    }
}
