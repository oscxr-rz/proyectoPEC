<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class AdminCategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::where('activo', 1)->get()->toArray();

        return view('admin.categorias', compact('categorias'));
    }
    public function create(Request $request)
    {
        try {
            $request->validate([
                'nombre_categoria' => 'required|string',
                'descripcion_categoria' => 'required|string',
            ]);

            $categoria = Categoria::create([
                'nombre_categoria' => $request['nombre_categoria'],
                'descripcion_categoria' => $request['descripcion_categoria']
            ]);

            if (!$categoria) {
                return redirect()->back()->with([
                    'mensaje' => 'No se pudo crear la categoria.'
                ]);
            }

            return redirect()->back()->with([
                'mensaje' => 'Categoria creada correctamente.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al crear la donacion.'
            ]);
        }
    }

    public function delete(Request $request)
    {
        try {
            $request->validate([
                'id_categoria' => 'required|exists:categoria,id_categoria'
            ]);

            $categoria = Categoria::where('id_categoria', $request['id_categoria'])->first();

            if(!$categoria)
            {
                return redirect()->back()->with([
                    'mensaje' => 'Categoria no encontrada.'
                ]);
            }

            $categoria->update([
                'activo' => 0
            ]);

            if(!$categoria)
            {
                return redirect()->back()->with([
                    'mensaje' => 'No se pudo eliminar la categoria.'
                ]);
            }

            return redirect()->back()->with([
                'mensaje' => 'La categoria se elimino correctamente.'
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error, no se pudo eliminar la categoria.'
            ]);
        }
    }
}
