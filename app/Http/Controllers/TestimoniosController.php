<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimoniosController extends Controller
{
    public function index()
    {
        $testimonios = Storage::disk('public')->files('videos/testimonios');

        return view('testimonios', compact('testimonios'));
    }
}
