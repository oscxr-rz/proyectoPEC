<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Galeria_enlace;
use App\Models\Galeria_imagen;
use Illuminate\Http\Request;

class AdminProyectosController extends Controller
{
    public function index()
    {
        $proyectosData = Galeria::with('enlaces', 'imagenes')->get();
        $proyectos = $proyectosData->toArray();

        return view('admin.proyectos', compact('proyectos'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'nombre_docente' => 'required|string|max:255',
                'UAC' => 'required|string|max:255',
                'semestre' => 'required|integer|between:1,6',
                'grupo' => 'required|string|in:A,B,C,D,E,F,G',
                'especialidad' => 'required|string|in:Alimentos y Bebidas,Contabilidad,Programación,Construcción,Logística,Ofimática',
                'progresion' => 'required|string|max:255',
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'fecha_realizacion' => 'required|date',
                'imagenes' => 'nullable|array',
                'imagenes.*.archivo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'enlaces' => 'nullable|array',
                'enlaces.*.titulo_enlace' => 'nullable|string|max:255',
                'enlaces.*.enlace' => 'nullable|string|url',
            ]);

            $proyecto = Galeria::create([
                'nombre_docente' => $request['nombre_docente'],
                'UAC' => $request['UAC'],
                'semestre' => $request['semestre'],
                'grupo' => $request['grupo'],
                'especialidad' => $request['especialidad'],
                'progresion' => $request['progresion'], // Corregido el typo
                'titulo' => $request['titulo'],
                'descripcion' => $request['descripcion'],
                'fecha_realizacion' => $request['fecha_realizacion']
            ]);

            if ($proyecto) {
                $this->createImagen($proyecto['id_galeria'], $request['imagenes']);
                $this->createEnlace($proyecto['id_galeria'], $request['enlaces']);
            }

            return redirect()->back()->with([
                'mensaje' => 'Proyecto creado exitosamente'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al crear el proyecto: ' . $e->getMessage()
            ]);
        }
    }

    private function createImagen($id, $imagenes)
    {
        if ($imagenes && is_array($imagenes)) {
            foreach ($imagenes as $imagenData) {
                if (isset($imagenData['archivo']) && $imagenData['archivo']) {
                    $imagen = $imagenData['archivo'];

                    // Generar un nombre único para la imagen con el ID del proyecto
                    $fileName = $id . '_' . time() . '_' . uniqid() . '.' . $imagen->getClientOriginalExtension();

                    // Almacenar la imagen en storage/app/public/images/galeria
                    $imagePath = $imagen->storeAs('images/galeria', $fileName, 'public');

                    // Generar la URL para acceder a la imagen
                    $imageUrl = asset('storage/' . $imagePath);

                    // Crear el registro en la base de datos
                    Galeria_imagen::create([
                        'id_galeria' => $id,
                        'imagen' => $imageUrl
                    ]);
                }
            }
        }
    }

    private function createEnlace($id, $enlaces)
    {
        if ($enlaces && is_array($enlaces)) {
            foreach ($enlaces as $enlaceData) {
                if (
                    isset($enlaceData['titulo_enlace']) && isset($enlaceData['enlace'])
                    && !empty($enlaceData['titulo_enlace']) && !empty($enlaceData['enlace'])
                ) {

                    Galeria_enlace::create([
                        'id_galeria' => $id,
                        'enlace' => $enlaceData['enlace'],
                        'titulo_enlace' => $enlaceData['titulo_enlace']
                    ]);
                }
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id_galeria' => 'required|integer|min:1|exists:galeria,id_galeria'
            ]);

            $eliminado = Galeria::where('id_galeria', $request['id_galeria'])->first();

            if ($eliminado) {
                // Eliminar las imágenes y enlaces relacionados
                $this->eliminarImagenes($request['id_galeria']);
                $this->eliminarEnlaces($request['id_galeria']);

                // Eliminar la galería principal
                $eliminado->delete();

                return redirect()->back()->with([
                    'mensaje' => 'Se eliminó el proyecto correctamente'
                ]);
            } else {
                return redirect()->back()->with([
                    'mensaje' => 'El proyecto no fue encontrado'
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'No se pudo eliminar el proyecto: ' . $e->getMessage()
            ]);
        }
    }

    private function eliminarImagenes($id)
    {
        $imagenes = Galeria_imagen::where('id_galeria', $id)->get();

        // Eliminar cada imagen individualmente para que los eventos del modelo se ejecuten
        foreach ($imagenes as $imagen) {
            $imagen->delete();
        }

        return $imagenes;
    }

    private function eliminarEnlaces($id)
    {
        $enlaces = Galeria_enlace::where('id_galeria', $id)->get();

        // Eliminar cada enlace individualmente para que los eventos del modelo se ejecuten
        foreach ($enlaces as $enlace) {
            $enlace->delete();
        }

        return $enlaces;
    }
}
