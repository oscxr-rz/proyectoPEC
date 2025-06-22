<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Dispositivo;
use App\Models\Donacion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonacionesController extends Controller
{
    public function index()
    {
        $categoriasData = Categoria::where('activo', 1)->get();
        $categorias = $categoriasData->toArray();

        return view('donacion.donar', compact('categorias'));
    }

    public function historial()
    {
        $historialData = Donacion::where('id_usuario', session('id_usuario'))->with('dispositivos.categoria')->get()->sortByDesc('fecha_donacion');
        $historial = $historialData->toArray();

        return view('donacion.historial', compact('historial'));
    }

    public function cancelar(Request $request)
    {
        $request->validate([
            'id_donacion' => 'required|integer|min:1'
        ]);

        $donacion = Donacion::where('id_donacion', $request['id_donacion'])->first();
        $donacion->update([
            'estado' => 'Cancelada'
        ]);

        return redirect()->back();
    }

    public function donacion(Request $request)
    {
        $data = $request->validate([
            'fecha_donacion' => 'required|date',
            'dispositivos' => 'required|array|min:1',
            'dispositivos.*.nombre_dispositivo' => 'required|string',
            'dispositivos.*.marca' => 'required|string',
            'dispositivos.*.modelo' => 'required|string',
            'dispositivos.*.descripcion' => 'required|string',
            'dispositivos.*.estado_fisico' => 'required|string',
            'dispositivos.*.id_categoria' => 'required|integer|min:1',
        ]);

        try {
            return DB::transaction(function () use ($data) {
                $fecha_donacion = $data['fecha_donacion'];
                $dispositivos = $data['dispositivos'];

                $this->verificarFecha($fecha_donacion);
                $cantidad = $this->cantidadDispositivos($dispositivos);
                $donacion = $this->crearDonacion(session('id_usuario'), $cantidad, $fecha_donacion);
                $dispositivosCreate = $this->crearDispositivos($dispositivos, $donacion['id_donacion']);

                return redirect()->back()->with([
                    'mensaje' => 'La donación se creó exitosamente tu id de donación es: ' . $donacion['id_donacion']
                ]);
            });
        } catch (Exception  $e) {
            $mensaje = $this->mensajeError($e);
            return redirect()->back()->with([
                'mensaje' => $mensaje
            ]);
        }
    }

    private function verificarFecha($fecha_donacion)
    {
        $fecha_actual = now()->toDateString();

        if ($fecha_donacion <= $fecha_actual) {
            throw new Exception('fecha');
        }
    }

    private function cantidadDispositivos($dispositivos)
    {
        return count($dispositivos);
    }

    private function crearDonacion($idUsuario, $cantidad, $fecha)
    {

        $donacion = Donacion::create([
            'fecha_donacion' => $fecha,
            'cantidad_dispositivos' => $cantidad,
            'id_usuario' => $idUsuario
        ]);

        if (!$donacion) {
            throw new Exception("donacion");
        }

        return $donacion;
    }

    private function crearDispositivos($dispositivos, $idDonacion)
    {
        foreach ($dispositivos as $dispositivo) {
            $dispositivoCreate = Dispositivo::create([
                'nombre_dispositivo' => $dispositivo['nombre_dispositivo'],
                'marca' => $dispositivo['marca'],
                'modelo' => $dispositivo['modelo'],
                'descripcion' =>  $dispositivo['descripcion'],
                'estado_fisico'  => $dispositivo['estado_fisico'],
                'id_categoria' => $dispositivo['id_categoria'],
                'id_donacion' => $idDonacion
            ]);

            if (!$dispositivoCreate) {
                throw new Exception('dispositivos');
            }

            $dispositivosData[] = $dispositivoCreate;
        }

        return $dispositivosData;
    }

    private function mensajeError(Exception $e)
    {
        $mensaje = $e->getMessage();

        if (str_contains($mensaje, 'fecha')) {
            return 'Error, la fecha no puede ser menor o igual a la fecha actual';
        }

        if (str_contains($mensaje, 'donacion')) {
            return 'Error, no se pudo crear la donación';
        }

        if (str_contains($mensaje, 'dispositivos')) {
            return 'Error, no se pudieron agregar los dispositivos';
        }

        return 'Ups, hubo un error inesperado';
    }
}
