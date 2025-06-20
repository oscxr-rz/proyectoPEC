<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestión de Testimonios - Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #555;
            margin-top: 30px;
        }
        
        .alert {
            padding: 15px;
            margin: 15px 0;
            border-radius: 4px;
            border: 1px solid;
        }
        
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        
        .alert-error {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 2px dashed #ddd;
            border-radius: 4px;
            background-color: #fafafa;
        }
        
        .file-info {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        
        .btn-danger:hover {
            background-color: #c82333;
        }
        
        .video-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin: 15px 0;
            background-color: #fafafa;
        }
        
        .video-info {
            margin-bottom: 15px;
        }
        
        .video-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        
        .video-meta {
            font-size: 12px;
            color: #666;
            margin-bottom: 15px;
        }
        
        video {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        
        .actions {
            margin-top: 15px;
        }
        
        .no-videos {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
        
        hr {
            border: none;
            border-top: 1px solid #eee;
            margin: 30px 0;
        }
        
        .upload-section {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        
        .error {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestión de Testimonios</h1>

        <!-- Mostrar mensajes -->
        @if(session('mensaje'))
            <div class="alert {{ strpos(session('mensaje'), 'Error') !== false ? 'alert-error' : 'alert-success' }}">
                {{ session('mensaje') }}
            </div>
        @endif

        <!-- Formulario para subir video -->
        <div class="upload-section">
            <h2>Subir Nuevo Video</h2>
            <form action="{{ route('admin.testimonios.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="video">Seleccionar Video:</label>
                    <input type="file" name="video" id="video" accept=".mp4,.avi,.mov" required>
                    <div class="file-info">
                        Formatos permitidos: MP4, AVI, MOV | Tamaño máximo: 20MB
                    </div>
                    @error('video')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Subir Video</button>
            </form>
        </div>

        <hr>

        <!-- Lista de videos existentes -->
        <div>
            <h2>Videos Existentes ({{ count($testimonios) }})</h2>
            
            @if(count($testimonios) > 0)
                @foreach($testimonios as $testimonio)
                    <div class="video-card">
                        <div class="video-info">
                            <div class="video-title">{{ basename($testimonio) }}</div>
                            <div class="video-meta">
                                Ruta: {{ $testimonio }}
                                @if(Storage::disk('public')->exists($testimonio))
                                    | Tamaño: {{ number_format(Storage::disk('public')->size($testimonio) / 1024 / 1024, 2) }} MB
                                    | Modificado: {{ date('d/m/Y H:i', Storage::disk('public')->lastModified($testimonio)) }}
                                @endif
                            </div>
                        </div>
                        
                        <div>
                            <video width="400" height="300" controls>
                                <source src="{{ Storage::url($testimonio) }}" type="video/mp4">
                                <source src="{{ Storage::url($testimonio) }}" type="video/avi">
                                <source src="{{ Storage::url($testimonio) }}" type="video/quicktime">
                                Tu navegador no soporta la reproducción de videos.
                            </video>
                        </div>
                        
                        <div class="actions">
                            <form action="{{ route('admin.testimonios.delete') }}" method="POST" 
                                  onsubmit="return confirm('¿Estás seguro de que quieres eliminar este video?\n\nArchivo: {{ basename($testimonio) }}\n\nEsta acción no se puede deshacer.')" 
                                  style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="video" value="{{ $testimonio }}">
                                <button type="submit" class="btn btn-danger">Eliminar Video</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="no-videos">
                    <p>No hay videos disponibles.</p>
                    <p>Sube tu primer video testimonial usando el formulario de arriba.</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>