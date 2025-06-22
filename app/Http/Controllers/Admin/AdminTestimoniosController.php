<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimoniosController extends Controller
{
    public function index()
    {
        $testimonios = Storage::disk('public')->files('videos/testimonios');

        return view('admin.testimonios', compact('testimonios'));
    }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'video' => 'required|file|mimes:mp4,avi,mov|max:20480', // Max 20MB
            ]);

            $path = $request->file('video')->store('videos/testimonios', 'public');

            return redirect()->route('admin.testimonios')->with([
                'mensaje' => 'Video subido correctamente.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with([
                'mensaje' => 'Error al subir el video: ' . $e->getMessage()
            ]);
        }
    }

    public function delete(Request $request)
    {
        $request->validate([
            'video' => 'required|string',
        ]);

        $videoPath = $request['video'];

        if (Storage::disk('public')->exists($videoPath)) {
            Storage::disk('public')->delete($videoPath);
            return redirect()->route('admin.testimonios')->with([
                'mensaje' => 'Video eliminado correctamente.'
            ]);
        } else {
            return redirect()->back()->with([
                'mensaje' => 'El video no se pudo eliminar.'
            ]);
        }
    }
}
