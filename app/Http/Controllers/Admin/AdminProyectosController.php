<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeria;
use App\Models\Galeria_enlace;
use App\Models\Galeria_imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

                    // Crear el registro en la base de datos
                    Galeria_imagen::create([
                        'id_galeria' => $id,
                        'imagen' => $imagePath
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

    public function put(Request $request)
    {
        try {
            $request->validate([
                'id_galeria' => 'required|integer|min:1|exists:galeria,id_galeria',
                'nombre_docente' => 'required|string|max:255',
                'UAC' => 'required|string|max:255',
                'semestre' => 'required|integer|between:1,6',
                'grupo' => 'required|string|in:A,B,C,D,E,F,G',
                'especialidad' => 'required|string|in:Alimentos y Bebidas,Contabilidad,Programación,Construcción,Logística,Ofimática',
                'progresion' => 'required|string|max:255',
                'titulo' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'fecha_realizacion' => 'required|date',
                // Validaciones para imágenes existentes
                'imagenes_existentes' => 'nullable|array',
                'imagenes_existentes.*.id_galeria_imagen' => 'nullable|integer|exists:galeria_imagen,id_galeria_imagen',
                'imagenes_existentes.*.imagen' => 'nullable|string',
                'imagenes_existentes.*.archivo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                // Validaciones para enlaces existentes
                'enlaces_existentes' => 'nullable|array',
                'enlaces_existentes.*.id_galeria_enlace' => 'nullable|integer|exists:galeria_enlace,id_galeria_enlace',
                'enlaces_existentes.*.titulo_enlace' => 'nullable|string|max:255',
                'enlaces_existentes.*.enlace' => 'nullable|string|url',
                // Validaciones para nuevos elementos
                'imagenes' => 'nullable|array',
                'imagenes.*.archivo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'enlaces' => 'nullable|array',
                'enlaces.*.titulo_enlace' => 'nullable|string|max:255',
                'enlaces.*.enlace' => 'nullable|string|url',
                // Campos para eliminación
                'eliminar_imagenes' => 'nullable|string',
                'eliminar_enlaces' => 'nullable|string',
            ]);

            $proyecto = Galeria::findOrFail($request['id_galeria']);

            // Actualizar datos básicos del proyecto
            $proyecto->update($request->only([
                'nombre_docente',
                'UAC',
                'semestre',
                'grupo',
                'especialidad',
                'progresion',
                'titulo',
                'descripcion',
                'fecha_realizacion'
            ]));

            // Procesar eliminación de imágenes
            if ($request->filled('eliminar_imagenes')) {
                $imagenesAEliminar = explode(',', $request->input('eliminar_imagenes'));
                $imagenesAEliminar = array_filter($imagenesAEliminar); // Remover valores vacíos

                foreach ($imagenesAEliminar as $idImagen) {
                    $imagen = Galeria_imagen::find($idImagen);
                    if ($imagen && $imagen->id_galeria == $request['id_galeria']) {
                        // Eliminar archivo físico
                        if (Storage::disk('public')->exists($imagen->imagen)) {
                            Storage::disk('public')->delete($imagen->imagen);
                        }
                        // Eliminar registro de BD
                        $imagen->delete();
                    }
                }
            }

            // Procesar eliminación de enlaces
            if ($request->filled('eliminar_enlaces')) {
                $enlacesAEliminar = explode(',', $request->input('eliminar_enlaces'));
                $enlacesAEliminar = array_filter($enlacesAEliminar); // Remover valores vacíos

                foreach ($enlacesAEliminar as $idEnlace) {
                    $enlace = Galeria_enlace::find($idEnlace);
                    if ($enlace && $enlace->id_galeria == $request['id_galeria']) {
                        $enlace->delete();
                    }
                }
            }

            // Actualizar imágenes existentes
            if ($request->has('imagenes_existentes') && is_array($request->input('imagenes_existentes'))) {
                foreach ($request->input('imagenes_existentes') as $index => $imagenData) {
                    // Verificar si existe ID de imagen y no está marcada para eliminar
                    if (isset($imagenData['id_galeria_imagen']) && !empty($imagenData['id_galeria_imagen'])) {
                        $imagen = Galeria_imagen::find($imagenData['id_galeria_imagen']);

                        if ($imagen && $imagen->id_galeria == $request['id_galeria']) {
                            // Prioridad 1: Si se subió un nuevo archivo, reemplazar
                            if ($request->hasFile("imagenes_existentes.{$index}.archivo")) {
                                $nuevoArchivo = $request->file("imagenes_existentes.{$index}.archivo");

                                // Eliminar archivo anterior
                                if (Storage::disk('public')->exists($imagen->imagen)) {
                                    Storage::disk('public')->delete($imagen->imagen);
                                }

                                // Subir nuevo archivo
                                $fileName = $request['id_galeria'] . '_' . time() . '_' . uniqid() . '.' . $nuevoArchivo->getClientOriginalExtension();
                                $imagePath = $nuevoArchivo->storeAs('images/galeria', $fileName, 'public');

                                // Actualizar registro
                                $imagen->update(['imagen' => $imagePath]);
                            }
                            // Prioridad 2: Si se modificó la URL (campo texto) y no hay archivo nuevo
                            elseif (isset($imagenData['imagen']) && !empty($imagenData['imagen'])) {
                                // Solo actualizar si la URL es diferente
                                if ($imagenData['imagen'] !== $imagen->imagen) {
                                    $imagen->update(['imagen' => $imagenData['imagen']]);
                                }
                            }
                        }
                    }
                }
            }

            // Actualizar enlaces existentes
            if ($request->has('enlaces_existentes') && is_array($request->input('enlaces_existentes'))) {
                foreach ($request->input('enlaces_existentes') as $enlaceData) {
                    // Verificar si existe ID de enlace y no está marcado para eliminar
                    if (isset($enlaceData['id_galeria_enlace']) && !empty($enlaceData['id_galeria_enlace'])) {
                        $enlace = Galeria_enlace::find($enlaceData['id_galeria_enlace']);

                        if ($enlace && $enlace->id_galeria == $request['id_galeria']) {
                            // Preparar datos para actualizar
                            $datosActualizar = [];

                            // Solo actualizar si los campos tienen valores
                            if (isset($enlaceData['titulo_enlace']) && !empty($enlaceData['titulo_enlace'])) {
                                $datosActualizar['titulo_enlace'] = $enlaceData['titulo_enlace'];
                            }

                            if (isset($enlaceData['enlace']) && !empty($enlaceData['enlace'])) {
                                $datosActualizar['enlace'] = $enlaceData['enlace'];
                            }

                            // Solo actualizar si hay datos para cambiar
                            if (!empty($datosActualizar)) {
                                $enlace->update($datosActualizar);
                            }
                        }
                    }
                }
            }

            // Crear nuevas imágenes
            $this->createImagen($proyecto['id_galeria'], $request['imagenes'] ?? []);

            // Crear nuevos enlaces
            $this->createEnlace($proyecto['id_galeria'], $request['enlaces'] ?? []);

            return redirect()->back()->with([
                'mensaje' => 'Proyecto actualizado exitosamente'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al actualizar el proyecto: ' . $e->getMessage()
            ]);
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
                // Eliminar las imágenes físicas y registros de la base de datos
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

        foreach ($imagenes as $imagen) {
            // Extraer la ruta relativa
            $rutaRelativa = $imagen['imagen'];

            // Eliminar el archivo físico del storage
            if (Storage::disk('public')->exists($rutaRelativa)) {
                Storage::disk('public')->delete($rutaRelativa);
            }

            // Eliminar el registro de la base de datos
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
