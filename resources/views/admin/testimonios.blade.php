<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Gestión de Testimonios - Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'SF Pro Display', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: white;
            min-height: 100vh;
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-card {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }
        
        .glow-effect {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.3);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        .pulse-animation {
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .ios-shadow {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            position: relative;
        }
        
        /* Background decorative elements */
        .bg-decorations {
            position: fixed;
            inset: 0;
            overflow: hidden;
            z-index: 0;
        }
        
        .decoration {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }
        
        .decoration-1 {
            top: 10%;
            left: 10%;
            width: 120px;
            height: 120px;
            background: #3b82f6;
            animation: float 8s ease-in-out infinite;
        }
        
        .decoration-2 {
            top: 20%;
            right: 15%;
            width: 80px;
            height: 80px;
            background: #8b5cf6;
            animation: float 8s ease-in-out infinite;
            animation-delay: -2s;
        }
        
        .decoration-3 {
            bottom: 30%;
            left: 15%;
            width: 100px;
            height: 100px;
            background: #ec4899;
            animation: float 8s ease-in-out infinite;
            animation-delay: -4s;
        }
        
        .decoration-4 {
            bottom: 15%;
            right: 20%;
            width: 90px;
            height: 90px;
            background: #06b6d4;
            animation: float 8s ease-in-out infinite;
            animation-delay: -6s;
        }
        
        h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
            position: relative;
            z-index: 10;
        }
        
        h2 {
            color: #e2e8f0;
            margin-bottom: 1.5rem;
            font-weight: 600;
            font-size: 1.5rem;
        }
        
        .alert {
            padding: 1rem 1.5rem;
            margin: 1.5rem 0;
            border-radius: 12px;
            border: 1px solid;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border-color: rgba(34, 197, 94, 0.3);
            color: #86efac;
        }
        
        .alert-error {
            background: rgba(239, 68, 68, 0.1);
            border-color: rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }
        
        .upload-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            padding: 2rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 3rem;
            position: relative;
            z-index: 10;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #e2e8f0;
            font-size: 1rem;
        }
        
        input[type="file"] {
            width: 100%;
            padding: 1rem;
            border: 2px dashed rgba(59, 130, 246, 0.5);
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.05);
            color: #e2e8f0;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        input[type="file"]:hover {
            border-color: rgba(59, 130, 246, 0.8);
            background: rgba(59, 130, 246, 0.1);
        }
        
        .file-info {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-top: 0.5rem;
        }
        
        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.6);
        }
        
        .btn-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
        }
        
        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.6);
        }
        
        .videos-section {
            position: relative;
            z-index: 10;
        }
        
        .video-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 2rem;
            margin: 1.5rem 0;
            transition: all 0.3s ease;
        }
        
        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: rgba(59, 130, 246, 0.3);
        }
        
        .video-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #f1f5f9;
            margin-bottom: 0.75rem;
        }
        
        .video-meta {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 1.5rem;
            line-height: 1.5;
        }
        
        video {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }
        
        .actions {
            margin-top: 1.5rem;
        }
        
        .no-videos {
            text-align: center;
            padding: 4rem 2rem;
            color: #94a3b8;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .no-videos p {
            margin: 0.5rem 0;
            font-size: 1.125rem;
        }
        
        .no-videos p:first-child {
            font-weight: 600;
            font-size: 1.25rem;
        }
        
        hr {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 3rem 0;
        }
        
        .error {
            color: #fca5a5;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
        
        .section-counter {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 600;
            margin-left: 0.5rem;
        }
        
        /* Custom modal styles */
        .modal-overlay {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .modal-content {
            background: linear-gradient(135deg, #1e293b, #334155);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px 15px;
            }
            
            h1 {
                font-size: 2rem;
            }
            
            .upload-section, .video-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Background decorative elements -->
    <div class="bg-decorations">
        <div class="decoration decoration-1"></div>
        <div class="decoration decoration-2"></div>
        <div class="decoration decoration-3"></div>
        <div class="decoration decoration-4"></div>
    </div>

    @include('admin.layouts.nav')
    
    <main>
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
                <h2>📁 Subir Nuevo Video</h2>
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
                    <button type="submit" class="btn btn-primary">🚀 Subir Video</button>
                </form>
            </div>
            
            <hr>
            
            <!-- Lista de videos existentes -->
            <div class="videos-section">
                <h2>🎬 Videos Existentes <span class="section-counter">{{ count($testimonios) }}</span></h2>
                
                @if(count($testimonios) > 0)
                <!-- Grid layout for videos -->
                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($testimonios as $testimonio)
                    <div class="video-card group">
                        <div class="video-info">
                            <div class="video-title truncate">{{ basename($testimonio) }}</div>
                            <div class="video-meta">
                                <div class="flex items-center gap-2 mb-1">
                                    <span>📂</span>
                                    <span class="text-xs truncate">{{ dirname($testimonio) }}</span>
                                </div>
                                @if(Storage::disk('public')->exists($testimonio))
                                <div class="flex items-center gap-4 text-xs">
                                    <span class="flex items-center gap-1">
                                        <span>📊</span>
                                        {{ number_format(Storage::disk('public')->size($testimonio) / 1024 / 1024, 2) }} MB
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <span>🕒</span>
                                        {{ date('d/m/Y', Storage::disk('public')->lastModified($testimonio)) }}
                                    </span>
                                </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="relative">
                            <video class="w-full h-48 object-cover rounded-lg" controls preload="metadata">
                                <source src="{{ Storage::url($testimonio) }}" type="video/mp4">
                                <source src="{{ Storage::url($testimonio) }}" type="video/avi">
                                <source src="{{ Storage::url($testimonio) }}" type="video/quicktime">
                                Tu navegador no soporta la reproducción de videos.
                            </video>
                        </div>
                        
                        <div class="actions mt-4">
                            <button onclick="openDeleteModal('{{ $testimonio }}')" class="btn btn-danger w-full">
                                🗑️ Eliminar Video
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <div class="no-videos">
                    <p>📹 No hay videos disponibles</p>
                    <p>Sube tu primer video testimonial usando el formulario de arriba.</p>
                </div>
                @endif
            </div>
        </div>
    </main>
    
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 z-50 hidden">
        <div class="modal-overlay fixed inset-0 flex items-center justify-center p-4">
            <div class="modal-content rounded-2xl max-w-md w-full mx-4 p-6 shadow-2xl">
                <div class="text-center">
                    <!-- Icon -->
                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100 bg-opacity-20 mb-4">
                        <svg class="h-8 w-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z" />
                        </svg>
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-lg font-semibold text-gray-100 mb-2">
                        Confirmar Eliminación
                    </h3>
                    
                    <!-- Message -->
                    <div class="text-gray-300 mb-6">
                        <p class="mb-3">¿Estás seguro de que quieres eliminar este video?</p>
                        <div class="bg-gray-800 bg-opacity-50 rounded-lg p-3 text-sm">
                            <p class="text-gray-400 mb-1">Archivo:</p>
                            <p id="deleteFileName" class="text-gray-200 font-mono text-xs break-all"></p>
                        </div>
                        <p class="text-red-400 text-sm mt-3">⚠️ Esta acción no se puede deshacer</p>
                    </div>
                    
                    <!-- Buttons -->
                    <div class="flex gap-3 justify-center">
                        <button onclick="closeDeleteModal()" class="px-6 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200 font-medium">
                            Cancelar
                        </button>
                        <button onclick="confirmDelete()" class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 font-medium">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Hidden form for deletion -->
    <form id="deleteForm" action="{{ route('admin.testimonios.delete') }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
        <input type="hidden" name="video" id="deleteVideoInput">
    </form>

    @include('admin.layouts.footer')
    
    <script>
        let currentVideoToDelete = '';
        
        function openDeleteModal(videoPath) {
            currentVideoToDelete = videoPath;
            const fileName = videoPath.split('/').pop();
            document.getElementById('deleteFileName').textContent = fileName;
            document.getElementById('deleteModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
        
        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
            currentVideoToDelete = '';
        }
        
        function confirmDelete() {
            if (currentVideoToDelete) {
                document.getElementById('deleteVideoInput').value = currentVideoToDelete;
                document.getElementById('deleteForm').submit();
            }
        }
        
        // Close modal when clicking outside
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeDeleteModal();
            }
        });
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeDeleteModal();
            }
        });
    </script>
    
</body>
</html>