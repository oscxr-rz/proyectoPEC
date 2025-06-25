<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Centro_acopio;
use App\Models\Paquete;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminVentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('paquete.inventarios.dispositivo')->get()->toArray();

        $paquetes = Paquete::with('inventarios.dispositivo')->get()->toArray();

        $centros = Centro_acopio::get()->toArray();

        return view('admin.ventas', compact('ventas', 'centros', 'paquetes'));
    }

    public function create(Request $request)
    {
        try {
            // Procesar paquetes antes de la validación
            $paquetesData = $request->input('paquetes');

            // Si paquetes es un array con un solo elemento que es un string JSON
            if (is_array($paquetesData) && count($paquetesData) === 1 && is_string($paquetesData[0])) {
                $paquetesProcessed = json_decode($paquetesData[0], true);
            }
            // Si paquetes ya es un array de IDs (convertir strings a integers)
            elseif (is_array($paquetesData)) {
                $paquetesProcessed = array_map('intval', array_filter($paquetesData));
            }
            // Si paquetes es un string JSON
            elseif (is_string($paquetesData)) {
                $decoded = json_decode($paquetesData, true);
                $paquetesProcessed = is_array($decoded) ? array_map('intval', array_filter($decoded)) : [];
            } else {
                $paquetesProcessed = [];
            }

            // Reemplazar en el request
            $request->merge(['paquetes' => $paquetesProcessed]);

            // Validación de datos
            $validatedData = $request->validate([
                'precio_total' => 'required|numeric|min:0',
                'metodo_pago' => 'nullable|string|max:50',
                'paquetes' => 'required|array|min:1', // Array de paquetes
                'paquetes.*' => 'integer|exists:paquete,id_paquete', // Cada paquete debe ser entero y existir
                'id_centro_acopio' => 'required|exists:centro_acopio,id_centro_acopio'
            ]);

            return DB::transaction(function () use ($validatedData) {
                // Verificar que todos los paquetes estén disponibles
                $paquetes = Paquete::whereIn('id_paquete', $validatedData['paquetes'])->get();

                if ($paquetes->count() !== count($validatedData['paquetes'])) {
                    throw new \Exception('Uno o más paquetes no fueron encontrados');
                }

                // Verificar que ningún paquete esté ya vendido
                $paquetesVendidos = $paquetes->where('id_venta', '!=', null);
                if ($paquetesVendidos->count() > 0) {
                    $idsVendidos = $paquetesVendidos->pluck('id_paquete')->toArray();
                    throw new \Exception('Los siguientes paquetes ya han sido vendidos: ' . implode(', ', $idsVendidos));
                }

                // Crear la venta
                $venta = Venta::create([
                    'precio_total' => $validatedData['precio_total'],
                    'metodo_pago' => $validatedData['metodo_pago'] === 'null' ? null : $validatedData['metodo_pago'],
                    'id_centro_acopio' => $validatedData['id_centro_acopio']
                ]);

                // Actualizar todos los paquetes con el ID de la venta
                Paquete::whereIn('id_paquete', $validatedData['paquetes'])
                    ->update(['id_venta' => $venta->id_venta]); // Usar -> en lugar de ['']

                return redirect()->back()->with([
                    'mensaje' => 'Venta creada correctamente con ' . count($validatedData['paquetes']) . ' paquete(s)'
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'No se pudo procesar la venta: ' . $e->getMessage()
            ]);
        }
    }
}
