<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Proyectos</title>
    <script>
        // Modal para imágenes con galería mejorada
        let currentImages = [];
        let currentImageIndex = 0;

        function openModal(images, startIndex = 0) {
            currentImages = Array.isArray(images) ? images : [images];
            currentImageIndex = startIndex;

            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            const imageCounter = document.getElementById('imageCounter');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');

            updateModalImage();
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';

            // Mostrar/ocultar botones de navegación
            prevBtn.style.display = currentImages.length > 1 ? 'block' : 'none';
            nextBtn.style.display = currentImages.length > 1 ? 'block' : 'none';
            imageCounter.style.display = currentImages.length > 1 ? 'block' : 'none';
        }

        function updateModalImage() {
            const modalImage = document.getElementById('modalImage');
            const imageCounter = document.getElementById('imageCounter');

            modalImage.src = currentImages[currentImageIndex];
            imageCounter.textContent = `${currentImageIndex + 1} / ${currentImages.length}`;
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % currentImages.length;
            updateModalImage();
        }

        function prevImage() {
            currentImageIndex = currentImageIndex === 0 ? currentImages.length - 1 : currentImageIndex - 1;
            updateModalImage();
        }

        function closeModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal con ESC y navegación con flechas
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            } else if (e.key === 'ArrowRight' && currentImages.length > 1) {
                nextImage();
            } else if (e.key === 'ArrowLeft' && currentImages.length > 1) {
                prevImage();
            }
        });
    </script>
    <style>
        .shape-blob {
            filter: blur(80px);
            opacity: 0.1;
        }

        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .glass-effect-dark {
            backdrop-filter: blur(20px);
            background: rgba(21, 128, 61, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
        }

        .text-shadow {
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .hover-glow:hover {
            box-shadow: 0 0 40px rgba(34, 197, 94, 0.25);
            transform: translateY(-8px);
        }

        .animate-float {
            animation: float 8s ease-in-out infinite;
        }

        .animate-float-delayed {
            animation: float 8s ease-in-out infinite 4s;
        }

        .animate-float-slow {
            animation: float 12s ease-in-out infinite 2s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-30px) rotate(2deg);
            }

            66% {
                transform: translateY(-15px) rotate(-1deg);
            }
        }

        .gradient-text {
            background: linear-gradient(135deg, #16a34a, #22c55e, #15803d);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .eco-pattern {
            background-image:
                radial-gradient(circle at 20% 50%, rgba(34, 197, 94, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(21, 128, 61, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(22, 163, 74, 0.1) 0%, transparent 50%);
        }

        .leaf-decoration::before {
            content: '🌿';
            position: absolute;
            top: -10px;
            right: -10px;
            font-size: 24px;
            opacity: 0.7;
        }

        .recycle-icon::before {
            content: '♻️';
            margin-right: 8px;
        }

        .project-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .project-card:hover {
            transform: translateY(-12px) scale(1.02);
        }

        .image-grid-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .image-grid-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(34, 197, 94, 0.1), rgba(21, 128, 61, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .image-grid-item:hover::before {
            opacity: 1;
        }

        .semester-indicator {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            position: relative;
            overflow: hidden;
        }

        .semester-indicator::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .modal-backdrop {
            background: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
        }

        .nav-button {
            background: rgba(34, 197, 94, 0.9);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .nav-button:hover {
            background: rgba(34, 197, 94, 1);
            transform: scale(1.1);
        }

        /* Responsive adjustments for decorative elements */
        @media (max-width: 768px) {
            .leaf-decoration::before {
                font-size: 16px;
                top: -5px;
                right: -5px;
            }
        }
    </style>
</head>

<body
    class="bg-gray-900 min-h-screen relative overflow-x-hidden eco-pattern">
    <!-- Formas de fondo decorativas mejoradas -->
    <div class="fixed inset-0 pointer-events-none">
        <!-- Elementos principales - ajustados para responsive -->
        <div
            class="absolute top-20 left-2 sm:left-10 w-40 h-40 sm:w-80 sm:h-80 rounded-full shape-blob animate-float">
        </div>
        <div
            class="absolute top-40 sm:top-60 right-2 sm:right-20 w-48 h-48 sm:w-96 sm:h-96 rounded-full shape-blob animate-float-delayed">
        </div>
        <div
            class="absolute bottom-40 left-1/4 w-36 h-36 sm:w-72 sm:h-72 rounded-full shape-blob animate-float-slow">
        </div>
        <div
            class="absolute top-1/3 right-1/3 w-32 h-32 sm:w-64 sm:h-64 rounded-full shape-blob animate-float">
        </div>

        <!-- Elementos adicionales para más dinamismo - ocultos en móvil -->
        <div
            class="hidden sm:block absolute bottom-20 right-10 w-48 h-48 rounded-full shape-blob animate-float-delayed">
        </div>
        <div
            class="hidden sm:block absolute top-2/3 left-10 w-56 h-56 rounded-full shape-blob animate-float-slow">
        </div>
        <div
            class="hidden lg:block absolute top-10 right-1/2 w-40 h-40 rounded-full shape-blob animate-float">
        </div>

        <!-- Formas orgánicas adicionales - solo desktop -->
        <div
            class="hidden lg:block absolute top-1/2 left-1/2 w-32 h-32 rounded-full shape-blob animate-float-delayed opacity-50">
        </div>
        <div
            class="hidden lg:block absolute bottom-1/3 right-1/4 w-44 h-44 rounded-full shape-blob animate-float opacity-30">
        </div>
    </div>

    <!-- Modal mejorado para imágenes con navegación -->
    <div id="imageModal" class="fixed inset-0 modal-backdrop z-50 hidden items-center justify-center p-2 sm:p-4"
        onclick="closeModal()">
        <div class="relative max-w-[95vw] sm:max-w-6xl max-h-[95vh] sm:max-h-full" onclick="event.stopPropagation()">
            <img id="modalImage"
                class="max-w-full max-h-full object-contain rounded-lg sm:rounded-2xl shadow-2xl border-2 sm:border-4 border-green-500/50"
                alt="Imagen ampliada">

            <!-- Contador de imágenes -->
            <div id="imageCounter"
                class="absolute top-2 sm:top-4 left-2 sm:left-4 bg-green-600 text-white px-2 py-1 sm:px-4 sm:py-2 rounded-full text-sm sm:text-base font-semibold shadow-lg">
                1 / 1
            </div>

            <!-- Botón cerrar -->
            <button onclick="closeModal()"
                class="absolute top-2 sm:top-4 right-2 sm:right-4 text-white bg-red-500 hover:bg-red-600 rounded-full p-2 sm:p-3 transition-all duration-200 shadow-lg">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>

            <!-- Botones de navegación -->
            <button id="prevBtn" onclick="prevImage()"
                class="nav-button absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 text-white p-2 sm:p-3 rounded-full shadow-lg">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>

            <button id="nextBtn" onclick="nextImage()"
                class="nav-button absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 text-white p-2 sm:p-3 rounded-full shadow-lg">
                <svg class="w-4 h-4 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>
        </div>
    </div>

    @include('layouts.nav')

    <main class="relative z-10 max-w-7xl mx-auto px-2 sm:px-4 lg:px-8 py-8 sm:py-16">
        <!-- Header Section mejorado -->
        <div class="text-center mb-12 sm:mb-24">
            <div class="relative">
                <h1
                    class="text-3xl sm:text-5xl lg:text-7xl font-black text-white mb-4 sm:mb-8 text-shadow relative px-2">
                    <span class="recycle-icon"></span>Nuestros Proyectos
                </h1>
            </div>
            <div
                class="w-20 sm:w-40 h-1 sm:h-2 mx-auto mb-5 sm:mb-10 rounded-full shadow-lg">
            </div>
            <p class="text-sm sm:text-xl text-white max-w-4xl mx-auto leading-relaxed font-medium px-4">
                Descubre los proyectos diseñados por los docentes del CBTis No. 150 y desarrollados por los estudiantes, alineados con el PEC 2024/2.
            </p>
        </div>

        @if (!empty($primero))
            <div class="mb-16 sm:mb-32">
                <div class="flex items-center mb-10 sm:mb-20">
                    <div
                        class="semester-indicator text-white px-4 sm:px-8 lg:px-12 py-4 sm:py-6 lg:py-8 rounded-r-full shadow-2xl hover-glow transition-all duration-300 relative leaf-decoration">
                        <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold">1er Semestre</h3>
                    </div>
                    <div
                        class="flex-1 h-2 sm:h-3 bg-gradient-to-r from-green-500 to-transparent ml-4 sm:ml-10 rounded-full shadow-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($primero as $trabajo)
                        <div
                            class="project-card glass-effect rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-green-200/50 hover-glow">
                            <div class="bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 h-2 sm:h-3"></div>

                            <div class="p-4 sm:p-6 lg:p-10">
                                <div class="mb-6 sm:mb-10">
                                    <div class="flex flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-8">
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🏫 Grupo: {{ $trabajo['semestre'] }}o. "{{ $trabajo['grupo'] }}"
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🧑‍🏫 Docente: {{ $trabajo['nombre_docente'] }}
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🎯 {{ $trabajo['especialidad'] }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-4 sm:mb-6 text-shadow">
                                        {{ $trabajo['titulo'] }}</h3>

                                    <div
                                        class="space-y-2 sm:space-y-4 text-green-700 mb-4 sm:mb-8 glass-effect-dark p-3 sm:p-6 rounded-xl sm:rounded-2xl text-sm sm:text-base">
                                        <p><span class="font-bold text-green-800">📚 UAC:</span> {{ $trabajo['UAC'] }}
                                        </p>
                                        <p><span class="font-bold text-green-800">📈 Progresión:</span>
                                            {{ $trabajo['progresion'] }}</p>
                                        <p><span class="font-bold text-green-800">📅 Fecha:</span>
                                            {{ $trabajo['fecha_realizacion'] }}</p>
                                    </div>

                                    <p
                                        class="text-green-800 leading-relaxed mb-6 sm:mb-10 glass-effect p-3 sm:p-6 rounded-xl sm:rounded-2xl border border-green-200 text-sm sm:text-base">
                                        {{ $trabajo['descripcion'] }}
                                    </p>
                                </div>

                                @if (!empty($trabajo['imagenes']))
                                    <div class="mb-6 sm:mb-10">
                                        <h4
                                            class="text-lg sm:text-xl font-semibold text-green-800 mb-3 sm:mb-6 flex items-center">
                                            🖼️ Galería del Proyecto
                                        </h4>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            @foreach ($trabajo['imagenes'] as $index => $imagen)
                                                <div class="image-grid-item group cursor-pointer relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg"
                                                    onclick="openModal([@foreach ($trabajo['imagenes'] as $img)'{{ asset('storage/' . $img['imagen']) }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                        alt="Imagen del proyecto"
                                                        class="w-full h-24 sm:h-36 object-cover transition-all duration-300 group-hover:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-green-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-between p-2 sm:p-4">
                                                        <span class="text-white text-xs sm:text-sm font-semibold">Ver
                                                            imagen</span>
                                                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($trabajo['enlaces']))
                                    <div class="space-y-2 sm:space-y-4">
                                        @foreach ($trabajo['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="flex items-center justify-between bg-gradient-to-r from-green-600 to-emerald-600 text-white px-4 sm:px-8 py-3 sm:py-5 rounded-xl sm:rounded-2xl hover:from-green-500 hover:to-emerald-500 transition-all duration-300 group shadow-lg hover:shadow-xl text-sm sm:text-base">
                                                <span class="font-semibold flex items-center truncate pr-2">
                                                    🔗 {{ $enlace['titulo_enlace'] }}
                                                </span>
                                                <svg class="w-4 h-4 sm:w-6 sm:h-6 group-hover:translate-x-2 transition-transform duration-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (!empty($segundo))
            <div class="mb-16 sm:mb-32">
                <div class="flex items-center mb-10 sm:mb-20">
                    <div
                        class="semester-indicator text-white px-4 sm:px-8 lg:px-12 py-4 sm:py-6 lg:py-8 rounded-r-full shadow-2xl hover-glow transition-all duration-300 relative leaf-decoration">
                        <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold">2do Semestre</h3>
                    </div>
                    <div
                        class="flex-1 h-2 sm:h-3 bg-gradient-to-r from-emerald-500 to-transparent ml-4 sm:ml-10 rounded-full shadow-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($segundo as $trabajo)
                        <div
                            class="project-card glass-effect rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-emerald-200/50 hover-glow">
                            <div class="bg-gradient-to-r from-emerald-500 via-green-500 to-teal-500 h-2 sm:h-3"></div>

                            <div class="p-4 sm:p-6 lg:p-10">
                                <div class="mb-6 sm:mb-10">
                                    <div class="flex flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-8">
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🏫 Grupo: {{ $trabajo['semestre'] }}o. "{{ $trabajo['grupo'] }}"
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🧑‍🏫 Docente: {{ $trabajo['nombre_docente'] }}
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-emerald-500 to-green-500 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🎯 {{ $trabajo['especialidad'] }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-4 sm:mb-6 text-shadow">
                                        {{ $trabajo['titulo'] }}</h3>

                                    <div
                                        class="space-y-2 sm:space-y-4 text-green-700 mb-4 sm:mb-8 glass-effect-dark p-3 sm:p-6 rounded-xl sm:rounded-2xl text-sm sm:text-base">
                                        <p><span class="font-bold text-green-800">📚 UAC:</span> {{ $trabajo['UAC'] }}
                                        </p>
                                        <p><span class="font-bold text-green-800">📈 Progresión:</span>
                                            {{ $trabajo['progresion'] }}</p>
                                        <p><span class="font-bold text-green-800">📅 Fecha:</span>
                                            {{ $trabajo['fecha_realizacion'] }}</p>
                                    </div>

                                    <p
                                        class="text-green-800 leading-relaxed mb-6 sm:mb-10 glass-effect p-3 sm:p-6 rounded-xl sm:rounded-2xl border border-green-200 text-sm sm:text-base">
                                        {{ $trabajo['descripcion'] }}
                                    </p>
                                </div>

                                @if (!empty($trabajo['imagenes']))
                                    <div class="mb-6 sm:mb-10">
                                        <h4
                                            class="text-lg sm:text-xl font-semibold text-green-800 mb-3 sm:mb-6 flex items-center">
                                            🖼️ Galería del Proyecto
                                        </h4>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            @foreach ($trabajo['imagenes'] as $index => $imagen)
                                                <div class="image-grid-item group cursor-pointer relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg"
                                                    onclick="openModal([@foreach ($trabajo['imagenes'] as $img)'{{ asset('storage/' . $img['imagen']) }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                        alt="Imagen del proyecto"
                                                        class="w-full h-24 sm:h-36 object-cover transition-all duration-300 group-hover:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-emerald-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-between p-2 sm:p-4">
                                                        <span class="text-white text-xs sm:text-sm font-semibold">Ver
                                                            imagen</span>
                                                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($trabajo['enlaces']))
                                    <div class="space-y-2 sm:space-y-4">
                                        @foreach ($trabajo['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="flex items-center justify-between bg-gradient-to-r from-emerald-600 to-green-600 text-white px-4 sm:px-8 py-3 sm:py-5 rounded-xl sm:rounded-2xl hover:from-emerald-500 hover:to-green-500 transition-all duration-300 group shadow-lg hover:shadow-xl text-sm sm:text-base">
                                                <span class="font-semibold flex items-center truncate pr-2">
                                                    🔗 {{ $enlace['titulo_enlace'] }}
                                                </span>
                                                <svg class="w-4 h-4 sm:w-6 sm:h-6 group-hover:translate-x-2 transition-transform duration-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (!empty($tercero))
            <div class="mb-16 sm:mb-32">
                <div class="flex items-center mb-10 sm:mb-20">
                    <div
                        class="semester-indicator text-white px-4 sm:px-8 lg:px-12 py-4 sm:py-6 lg:py-8 rounded-r-full shadow-2xl hover-glow transition-all duration-300 relative leaf-decoration">
                        <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold">3er Semestre</h3>
                    </div>
                    <div
                        class="flex-1 h-2 sm:h-3 bg-gradient-to-r from-teal-500 to-transparent ml-4 sm:ml-10 rounded-full shadow-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($tercero as $trabajo)
                        <div
                            class="project-card glass-effect rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-teal-200/50 hover-glow">
                            <div class="bg-gradient-to-r from-teal-500 via-emerald-500 to-green-500 h-2 sm:h-3"></div>

                            <div class="p-4 sm:p-6 lg:p-10">
                                <div class="mb-6 sm:mb-10">
                                    <div class="flex flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-8">
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🏫 Grupo: {{ $trabajo['semestre'] }}o. "{{ $trabajo['grupo'] }}"
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🧑‍🏫 Docente: {{ $trabajo['nombre_docente'] }}
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-teal-500 to-emerald-500 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🎯 {{ $trabajo['especialidad'] }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-4 sm:mb-6 text-shadow">
                                        {{ $trabajo['titulo'] }}</h3>

                                    <div
                                        class="space-y-2 sm:space-y-4 text-green-700 mb-4 sm:mb-8 glass-effect-dark p-3 sm:p-6 rounded-xl sm:rounded-2xl text-sm sm:text-base">
                                        <p><span class="font-bold text-green-800">📚 UAC:</span> {{ $trabajo['UAC'] }}
                                        </p>
                                        <p><span class="font-bold text-green-800">📈 Progresión:</span>
                                            {{ $trabajo['progresion'] }}</p>
                                        <p><span class="font-bold text-green-800">📅 Fecha:</span>
                                            {{ $trabajo['fecha_realizacion'] }}</p>
                                    </div>

                                    <p
                                        class="text-green-800 leading-relaxed mb-6 sm:mb-10 glass-effect p-3 sm:p-6 rounded-xl sm:rounded-2xl border border-green-200 text-sm sm:text-base">
                                        {{ $trabajo['descripcion'] }}
                                    </p>
                                </div>

                                @if (!empty($trabajo['imagenes']))
                                    <div class="mb-6 sm:mb-10">
                                        <h4
                                            class="text-lg sm:text-xl font-semibold text-green-800 mb-3 sm:mb-6 flex items-center">
                                            🖼️ Galería del Proyecto
                                        </h4>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            @foreach ($trabajo['imagenes'] as $index => $imagen)
                                                <div class="image-grid-item group cursor-pointer relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg"
                                                    onclick="openModal([@foreach ($trabajo['imagenes'] as $img)'{{ asset('storage/' . $img['imagen']) }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                        alt="Imagen del proyecto"
                                                        class="w-full h-24 sm:h-36 object-cover transition-all duration-300 group-hover:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-teal-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-between p-2 sm:p-4">
                                                        <span class="text-white text-xs sm:text-sm font-semibold">Ver
                                                            imagen</span>
                                                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($trabajo['enlaces']))
                                    <div class="space-y-2 sm:space-y-4">
                                        @foreach ($trabajo['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="flex items-center justify-between bg-gradient-to-r from-teal-600 to-emerald-600 text-white px-4 sm:px-8 py-3 sm:py-5 rounded-xl sm:rounded-2xl hover:from-teal-500 hover:to-emerald-500 transition-all duration-300 group shadow-lg hover:shadow-xl text-sm sm:text-base">
                                                <span class="font-semibold flex items-center truncate pr-2">
                                                    🔗 {{ $enlace['titulo_enlace'] }}
                                                </span>
                                                <svg class="w-4 h-4 sm:w-6 sm:h-6 group-hover:translate-x-2 transition-transform duration-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (!empty($cuarto))
            <div class="mb-16 sm:mb-32">
                <div class="flex items-center mb-10 sm:mb-20">
                    <div
                        class="semester-indicator text-white px-4 sm:px-8 lg:px-12 py-4 sm:py-6 lg:py-8 rounded-r-full shadow-2xl hover-glow transition-all duration-300 relative leaf-decoration">
                        <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold">4to Semestre</h3>
                    </div>
                    <div
                        class="flex-1 h-2 sm:h-3 bg-gradient-to-r from-cyan-500 to-transparent ml-4 sm:ml-10 rounded-full shadow-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($cuarto as $trabajo)
                        <div
                            class="project-card glass-effect rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-cyan-200/50 hover-glow">
                            <div class="bg-gradient-to-r from-cyan-500 via-teal-500 to-emerald-500 h-2 sm:h-3"></div>

                            <div class="p-4 sm:p-6 lg:p-10">
                                <div class="mb-6 sm:mb-10">
                                    <div class="flex flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-8">
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🏫 Grupo: {{ $trabajo['semestre'] }}o. "{{ $trabajo['grupo'] }}"
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🧑‍🏫 Docente: {{ $trabajo['nombre_docente'] }}
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-cyan-500 to-teal-500 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🎯 {{ $trabajo['especialidad'] }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-4 sm:mb-6 text-shadow">
                                        {{ $trabajo['titulo'] }}</h3>

                                    <div
                                        class="space-y-2 sm:space-y-4 text-green-700 mb-4 sm:mb-8 glass-effect-dark p-3 sm:p-6 rounded-xl sm:rounded-2xl text-sm sm:text-base">
                                        <p><span class="font-bold text-green-800">📚 UAC:</span> {{ $trabajo['UAC'] }}
                                        </p>
                                        <p><span class="font-bold text-green-800">📈 Progresión:</span>
                                            {{ $trabajo['progresion'] }}</p>
                                        <p><span class="font-bold text-green-800">📅 Fecha:</span>
                                            {{ $trabajo['fecha_realizacion'] }}</p>
                                    </div>

                                    <p
                                        class="text-green-800 leading-relaxed mb-6 sm:mb-10 glass-effect p-3 sm:p-6 rounded-xl sm:rounded-2xl border border-green-200 text-sm sm:text-base">
                                        {{ $trabajo['descripcion'] }}
                                    </p>
                                </div>

                                @if (!empty($trabajo['imagenes']))
                                    <div class="mb-6 sm:mb-10">
                                        <h4
                                            class="text-lg sm:text-xl font-semibold text-green-800 mb-3 sm:mb-6 flex items-center">
                                            🖼️ Galería del Proyecto
                                        </h4>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            @foreach ($trabajo['imagenes'] as $index => $imagen)
                                                <div class="image-grid-item group cursor-pointer relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg"
                                                    onclick="openModal([@foreach ($trabajo['imagenes'] as $img)'{{ asset('storage/' . $img['imagen']) }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                        alt="Imagen del proyecto"
                                                        class="w-full h-24 sm:h-36 object-cover transition-all duration-300 group-hover:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-cyan-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-between p-2 sm:p-4">
                                                        <span class="text-white text-xs sm:text-sm font-semibold">Ver
                                                            imagen</span>
                                                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($trabajo['enlaces']))
                                    <div class="space-y-2 sm:space-y-4">
                                        @foreach ($trabajo['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="flex items-center justify-between bg-gradient-to-r from-cyan-600 to-teal-600 text-white px-4 sm:px-8 py-3 sm:py-5 rounded-xl sm:rounded-2xl hover:from-cyan-500 hover:to-teal-500 transition-all duration-300 group shadow-lg hover:shadow-xl text-sm sm:text-base">
                                                <span class="font-semibold flex items-center truncate pr-2">
                                                    🔗 {{ $enlace['titulo_enlace'] }}
                                                </span>
                                                <svg class="w-4 h-4 sm:w-6 sm:h-6 group-hover:translate-x-2 transition-transform duration-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (!empty($quinto))
            <div class="mb-16 sm:mb-32">
                <div class="flex items-center mb-10 sm:mb-20">
                    <div
                        class="semester-indicator text-white px-4 sm:px-8 lg:px-12 py-4 sm:py-6 lg:py-8 rounded-r-full shadow-2xl hover-glow transition-all duration-300 relative leaf-decoration">
                        <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold">5to Semestre</h3>
                    </div>
                    <div
                        class="flex-1 h-2 sm:h-3 bg-gradient-to-r from-blue-500 to-transparent ml-4 sm:ml-10 rounded-full shadow-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($quinto as $trabajo)
                        <div
                            class="project-card glass-effect rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-blue-200/50 hover-glow">
                            <div class="bg-gradient-to-r from-blue-500 via-cyan-500 to-teal-500 h-2 sm:h-3"></div>

                            <div class="p-4 sm:p-6 lg:p-10">
                                <div class="mb-6 sm:mb-10">
                                    <div class="flex flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-8">
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🏫 Grupo: {{ $trabajo['semestre'] }}o. "{{ $trabajo['grupo'] }}"
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🧑‍🏫 Docente: {{ $trabajo['nombre_docente'] }}
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-blue-500 to-cyan-500 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🎯 {{ $trabajo['especialidad'] }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-4 sm:mb-6 text-shadow">
                                        {{ $trabajo['titulo'] }}</h3>

                                    <div
                                        class="space-y-2 sm:space-y-4 text-green-700 mb-4 sm:mb-8 glass-effect-dark p-3 sm:p-6 rounded-xl sm:rounded-2xl text-sm sm:text-base">
                                        <p><span class="font-bold text-green-800">📚 UAC:</span> {{ $trabajo['UAC'] }}
                                        </p>
                                        <p><span class="font-bold text-green-800">📈 Progresión:</span>
                                            {{ $trabajo['progresion'] }}</p>
                                        <p><span class="font-bold text-green-800">📅 Fecha:</span>
                                            {{ $trabajo['fecha_realizacion'] }}</p>
                                    </div>

                                    <p
                                        class="text-green-800 leading-relaxed mb-6 sm:mb-10 glass-effect p-3 sm:p-6 rounded-xl sm:rounded-2xl border border-green-200 text-sm sm:text-base">
                                        {{ $trabajo['descripcion'] }}
                                    </p>
                                </div>

                                @if (!empty($trabajo['imagenes']))
                                    <div class="mb-6 sm:mb-10">
                                        <h4
                                            class="text-lg sm:text-xl font-semibold text-green-800 mb-3 sm:mb-6 flex items-center">
                                            🖼️ Galería del Proyecto
                                        </h4>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            @foreach ($trabajo['imagenes'] as $index => $imagen)
                                                <div class="image-grid-item group cursor-pointer relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg"
                                                    onclick="openModal([@foreach ($trabajo['imagenes'] as $img)'{{ asset('storage/' . $img['imagen']) }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                        alt="Imagen del proyecto"
                                                        class="w-full h-24 sm:h-36 object-cover transition-all duration-300 group-hover:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-between p-2 sm:p-4">
                                                        <span class="text-white text-xs sm:text-sm font-semibold">Ver
                                                            imagen</span>
                                                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($trabajo['enlaces']))
                                    <div class="space-y-2 sm:space-y-4">
                                        @foreach ($trabajo['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="flex items-center justify-between bg-gradient-to-r from-blue-600 to-cyan-600 text-white px-4 sm:px-8 py-3 sm:py-5 rounded-xl sm:rounded-2xl hover:from-blue-500 hover:to-cyan-500 transition-all duration-300 group shadow-lg hover:shadow-xl text-sm sm:text-base">
                                                <span class="font-semibold flex items-center truncate pr-2">
                                                    🔗 {{ $enlace['titulo_enlace'] }}
                                                </span>
                                                <svg class="w-4 h-4 sm:w-6 sm:h-6 group-hover:translate-x-2 transition-transform duration-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (!empty($sexto))
            <div class="mb-16 sm:mb-32">
                <div class="flex items-center mb-10 sm:mb-20">
                    <div
                        class="semester-indicator text-white px-4 sm:px-8 lg:px-12 py-4 sm:py-6 lg:py-8 rounded-r-full shadow-2xl hover-glow transition-all duration-300 relative leaf-decoration">
                        <h3 class="text-2xl sm:text-4xl lg:text-5xl font-bold">6to Semestre</h3>
                    </div>
                    <div
                        class="flex-1 h-2 sm:h-3 bg-gradient-to-r from-purple-500 to-transparent ml-4 sm:ml-10 rounded-full shadow-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($sexto as $trabajo)
                        <div
                            class="project-card glass-effect rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-purple-200/50 hover-glow">
                            <div class="bg-gradient-to-r from-purple-500 via-blue-500 to-cyan-500 h-2 sm:h-3"></div>

                            <div class="p-4 sm:p-6 lg:p-10">
                                <div class="mb-6 sm:mb-10">
                                    <div class="flex flex-wrap gap-2 sm:gap-4 mb-4 sm:mb-8">
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🏫 Grupo: {{ $trabajo['semestre'] }}o. "{{ $trabajo['grupo'] }}"
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-green-700 to-green-800 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🧑‍🏫 Docente: {{ $trabajo['nombre_docente'] }}
                                        </span>
                                        <span
                                            class="bg-gradient-to-r from-purple-500 to-blue-500 text-white px-3 py-1 sm:px-5 sm:py-3 rounded-full text-xs sm:text-sm font-semibold shadow-lg">
                                            🎯 {{ $trabajo['especialidad'] }}
                                        </span>
                                    </div>

                                    <h3
                                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-800 mb-4 sm:mb-6 text-shadow">
                                        {{ $trabajo['titulo'] }}</h3>

                                    <div
                                        class="space-y-2 sm:space-y-4 text-green-700 mb-4 sm:mb-8 glass-effect-dark p-3 sm:p-6 rounded-xl sm:rounded-2xl text-sm sm:text-base">
                                        <p><span class="font-bold text-green-800">📚 UAC:</span> {{ $trabajo['UAC'] }}
                                        </p>
                                        <p><span class="font-bold text-green-800">📈 Progresión:</span>
                                            {{ $trabajo['progresion'] }}</p>
                                        <p><span class="font-bold text-green-800">📅 Fecha:</span>
                                            {{ $trabajo['fecha_realizacion'] }}</p>
                                    </div>

                                    <p
                                        class="text-green-800 leading-relaxed mb-6 sm:mb-10 glass-effect p-3 sm:p-6 rounded-xl sm:rounded-2xl border border-green-200 text-sm sm:text-base">
                                        {{ $trabajo['descripcion'] }}
                                    </p>
                                </div>

                                @if (!empty($trabajo['imagenes']))
                                    <div class="mb-6 sm:mb-10">
                                        <h4
                                            class="text-lg sm:text-xl font-semibold text-green-800 mb-3 sm:mb-6 flex items-center">
                                            🖼️ Galería del Proyecto
                                        </h4>
                                        <div class="grid grid-cols-2 gap-2 sm:gap-4">
                                            @foreach ($trabajo['imagenes'] as $index => $imagen)
                                                <div class="image-grid-item group cursor-pointer relative rounded-xl sm:rounded-2xl overflow-hidden shadow-lg"
                                                    onclick="openModal([@foreach ($trabajo['imagenes'] as $img)'{{ asset('storage/' . $img['imagen']) }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                        alt="Imagen del proyecto"
                                                        class="w-full h-24 sm:h-36 object-cover transition-all duration-300 group-hover:scale-110">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-purple-900/70 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-end justify-between p-2 sm:p-4">
                                                        <span class="text-white text-xs sm:text-sm font-semibold">Ver
                                                            imagen</span>
                                                        <svg class="w-4 h-4 sm:w-6 sm:h-6 text-white" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if (!empty($trabajo['enlaces']))
                                    <div class="space-y-2 sm:space-y-4">
                                        @foreach ($trabajo['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="flex items-center justify-between bg-gradient-to-r from-purple-600 to-blue-600 text-white px-4 sm:px-8 py-3 sm:py-5 rounded-xl sm:rounded-2xl hover:from-purple-500 hover:to-blue-500 transition-all duration-300 group shadow-lg hover:shadow-xl text-sm sm:text-base">
                                                <span class="font-semibold flex items-center truncate pr-2">
                                                    🔗 {{ $enlace['titulo_enlace'] }}
                                                </span>
                                                <svg class="w-4 h-4 sm:w-6 sm:h-6 group-hover:translate-x-2 transition-transform duration-300 flex-shrink-0"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                    </path>
                                                </svg>
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    @include('layouts.footer')
</body>

</html>
