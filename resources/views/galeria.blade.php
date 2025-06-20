<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Galería de Trabajos</title>
    <style>
        .carousel-container {
            scroll-behavior: smooth;
        }

        .carousel-track {
            transition: transform 0.5s ease-in-out;
        }

        .carousel-track.no-transition {
            transition: none;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen">
    @include('layouts.nav')

    <main class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1
                class="text-5xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-4">
                Galería de Trabajos
            </h1>
            <p class="text-gray-600 text-lg">Explora nuestros proyectos organizados por semestre</p>
        </div>

        @php
            $trabajosPorSemestre = collect($trabajos)->groupBy('semestre')->sortKeys();
        @endphp

        <!-- Semestres -->
        @foreach ($trabajosPorSemestre as $semestre => $trabajosSemestre)
            <div class="mb-16">
                <!-- Semestre Header -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Semestre {{ $semestre }}</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
                </div>

                <!-- Carrusel del Semestre -->
                <div class="relative group carousel-wrapper" data-semestre="{{ $semestre }}">
                    <div class="overflow-hidden rounded-2xl">
                        <div id="carousel-track-{{ $semestre }}" class="carousel-track flex gap-6 pb-4"
                            style="width: calc(100% * 3);">
                            <!-- Primera copia de los trabajos -->
                            @foreach ($trabajosSemestre as $trabajo)
                                <div class="relative flex-shrink-0 w-80 h-96 group/item cursor-pointer">
                                    @if (count($trabajo['imagenes']) > 0)
                                        <img src="{{ asset('storage/' . $trabajo['imagenes'][0]['imagen']) }}"
                                            alt="{{ $trabajo['titulo'] }}"
                                            class="w-full h-full object-cover rounded-2xl shadow-lg transition-all duration-500 group-hover/item:shadow-2xl group-hover/item:scale-105">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl shadow-lg flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Overlay con información -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover/item:opacity-100 transition-all duration-500 rounded-2xl flex flex-col justify-end p-6">
                                        <div
                                            class="text-white transform translate-y-8 group-hover/item:translate-y-0 transition-transform duration-500">
                                            <h3 class="text-xl font-bold mb-3 leading-tight">{{ $trabajo['titulo'] }}
                                            </h3>
                                            <p class="text-gray-200 text-sm leading-relaxed line-clamp-4">
                                                {{ $trabajo['descripcion'] }}</p>

                                            <!-- Tags adicionales -->
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                <span
                                                    class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs">
                                                    {{ $trabajo['especialidad'] }}
                                                </span>
                                                <span
                                                    class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs">
                                                    Grupo {{ $trabajo['grupo'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Indicador de múltiples imágenes -->
                                    @if (count($trabajo['imagenes']) > 1)
                                        <div
                                            class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs">
                                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ count($trabajo['imagenes']) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <!-- Segunda copia de los trabajos (para efecto infinito) -->
                            @foreach ($trabajosSemestre as $trabajo)
                                <div class="relative flex-shrink-0 w-80 h-96 group/item cursor-pointer">
                                    @if (count($trabajo['imagenes']) > 0)
                                        <img src="{{ asset('storage/' . $trabajo['imagenes'][0]['imagen']) }}"
                                            alt="{{ $trabajo['titulo'] }}"
                                            class="w-full h-full object-cover rounded-2xl shadow-lg transition-all duration-500 group-hover/item:shadow-2xl group-hover/item:scale-105">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl shadow-lg flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Overlay con información -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover/item:opacity-100 transition-all duration-500 rounded-2xl flex flex-col justify-end p-6">
                                        <div
                                            class="text-white transform translate-y-8 group-hover/item:translate-y-0 transition-transform duration-500">
                                            <h3 class="text-xl font-bold mb-3 leading-tight">{{ $trabajo['titulo'] }}
                                            </h3>
                                            <p class="text-gray-200 text-sm leading-relaxed line-clamp-4">
                                                {{ $trabajo['descripcion'] }}</p>

                                            <!-- Tags adicionales -->
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                <span
                                                    class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs">
                                                    {{ $trabajo['especialidad'] }}
                                                </span>
                                                <span
                                                    class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs">
                                                    Grupo {{ $trabajo['grupo'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Indicador de múltiples imágenes -->
                                    @if (count($trabajo['imagenes']) > 1)
                                        <div
                                            class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs">
                                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ count($trabajo['imagenes']) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <!-- Tercera copia de los trabajos (para suavizar el bucle) -->
                            @foreach ($trabajosSemestre as $trabajo)
                                <div class="relative flex-shrink-0 w-80 h-96 group/item cursor-pointer">
                                    @if (count($trabajo['imagenes']) > 0)
                                        <img src="{{ asset('storage/' . $trabajo['imagenes'][0]['imagen']) }}"
                                            alt="{{ $trabajo['titulo'] }}"
                                            class="w-full h-full object-cover rounded-2xl shadow-lg transition-all duration-500 group-hover/item:shadow-2xl group-hover/item:scale-105">
                                    @else
                                        <div
                                            class="w-full h-full bg-gradient-to-br from-gray-200 to-gray-300 rounded-2xl shadow-lg flex items-center justify-center">
                                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Overlay con información -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent opacity-0 group-hover/item:opacity-100 transition-all duration-500 rounded-2xl flex flex-col justify-end p-6">
                                        <div
                                            class="text-white transform translate-y-8 group-hover/item:translate-y-0 transition-transform duration-500">
                                            <h3 class="text-xl font-bold mb-3 leading-tight">{{ $trabajo['titulo'] }}
                                            </h3>
                                            <p class="text-gray-200 text-sm leading-relaxed line-clamp-4">
                                                {{ $trabajo['descripcion'] }}</p>

                                            <!-- Tags adicionales -->
                                            <div class="flex flex-wrap gap-2 mt-4">
                                                <span
                                                    class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs">
                                                    {{ $trabajo['especialidad'] }}
                                                </span>
                                                <span
                                                    class="bg-white/20 backdrop-blur-sm px-2 py-1 rounded-full text-xs">
                                                    Grupo {{ $trabajo['grupo'] }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Indicador de múltiples imágenes -->
                                    @if (count($trabajo['imagenes']) > 1)
                                        <div
                                            class="absolute top-4 right-4 bg-black/50 backdrop-blur-sm text-white px-2 py-1 rounded-full text-xs">
                                            <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            {{ count($trabajo['imagenes']) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navegación del carrusel -->
                    <button onclick="moveCarousel('{{ $semestre }}', -1)"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button onclick="moveCarousel('{{ $semestre }}', 1)"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 rounded-full p-3 shadow-lg opacity-0 group-hover:opacity-100 transition-all duration-300 hover:scale-110 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </button>

                    <!-- Indicador de pausa -->
                    <div
                        class="absolute top-4 left-4 opacity-0 transition-opacity duration-300 pause-indicator-{{ $semestre }}">
                        <div
                            class="bg-black/50 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs flex items-center gap-2">
                            <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                            Auto-deslizamiento pausado
                        </div>
                    </div>
                </div>

                <!-- Contador de trabajos -->
                <div class="text-center mt-6">
                    <span class="text-gray-500 text-sm">{{ count($trabajosSemestre) }}
                        trabajo{{ count($trabajosSemestre) > 1 ? 's' : '' }} en este semestre</span>
                </div>
            </div>
        @endforeach
    </main>

    @include('layouts.footer')

    <script>
        // Estado de los carruseles
        const carouselStates = {};

        // Configuración
        const CONFIG = {
            cardWidth: 320 + 24, // w-80 (320px) + gap (24px)
            autoScrollInterval: 3000, // 3 segundos
            transitionDuration: 500 // 0.5 segundos
        };

        // Inicializar carruseles
        function initializeCarousels() {
            const carouselWrappers = document.querySelectorAll('.carousel-wrapper');

            carouselWrappers.forEach(wrapper => {
                const semestre = wrapper.dataset.semestre;
                const track = document.getElementById(`carousel-track-${semestre}`);
                const totalItems = track.children.length / 3; // Dividido por 3 porque tenemos 3 copias

                carouselStates[semestre] = {
                    currentIndex: 0,
                    totalItems: totalItems,
                    track: track,
                    wrapper: wrapper,
                    isAutoScrolling: true,
                    autoScrollTimer: null,
                    isTransitioning: false
                };

                // Posicionar en el segundo set (medio)
                track.style.transform = `translateX(-${totalItems * CONFIG.cardWidth}px)`;

                // Iniciar auto-scroll
                startAutoScroll(semestre);

                // Event listeners para pausar/reanudar auto-scroll solo en imágenes
                const workItems = wrapper.querySelectorAll('.group\\/item');
                workItems.forEach(item => {
                    item.addEventListener('mouseenter', () => pauseAutoScroll(semestre));
                    item.addEventListener('mouseleave', () => resumeAutoScroll(semestre));
                });

                // Touch events para mobile
                setupTouchEvents(wrapper, semestre);
            });
        }

        // Mover carrusel
        function moveCarousel(semestre, direction) {
            const state = carouselStates[semestre];
            if (!state || state.isTransitioning) return;

            state.isTransitioning = true;
            state.currentIndex += direction;

            // Calcular nueva posición
            const baseOffset = state.totalItems * CONFIG.cardWidth; // Offset base para estar en el segundo set
            const newTransform = baseOffset + (state.currentIndex * CONFIG.cardWidth);

            // Aplicar transformación
            state.track.style.transform = `translateX(-${newTransform}px)`;

            // Manejar bucle infinito
            setTimeout(() => {
                handleInfiniteLoop(semestre);
                state.isTransitioning = false;
            }, CONFIG.transitionDuration);
        }

        // Manejar bucle infinito
        function handleInfiniteLoop(semestre) {
            const state = carouselStates[semestre];

            // Si llegamos al final del segundo set, saltar al inicio del segundo set
            if (state.currentIndex >= state.totalItems) {
                state.currentIndex = 0;
                state.track.classList.add('no-transition');
                const baseOffset = state.totalItems * CONFIG.cardWidth;
                state.track.style.transform = `translateX(-${baseOffset}px)`;

                // Restaurar transiciones después de un frame
                requestAnimationFrame(() => {
                    state.track.classList.remove('no-transition');
                });
            }
            // Si vamos hacia atrás del segundo set, saltar al final del segundo set
            else if (state.currentIndex < 0) {
                state.currentIndex = state.totalItems - 1;
                state.track.classList.add('no-transition');
                const baseOffset = state.totalItems * CONFIG.cardWidth;
                const newTransform = baseOffset + (state.currentIndex * CONFIG.cardWidth);
                state.track.style.transform = `translateX(-${newTransform}px)`;

                // Restaurar transiciones después de un frame
                requestAnimationFrame(() => {
                    state.track.classList.remove('no-transition');
                });
            }
        }

        // Auto-scroll functions
        function startAutoScroll(semestre) {
            const state = carouselStates[semestre];
            if (!state) return;

            state.autoScrollTimer = setInterval(() => {
                if (state.isAutoScrolling && !state.isTransitioning) {
                    moveCarousel(semestre, 1);
                }
            }, CONFIG.autoScrollInterval);
        }

        function pauseAutoScroll(semestre) {
            const state = carouselStates[semestre];
            if (!state) return;

            state.isAutoScrolling = false;
            if (state.autoScrollTimer) {
                clearInterval(state.autoScrollTimer);
            }

            // Mostrar indicador de pausa
            const pauseIndicator = document.querySelector(`.pause-indicator-${semestre}`);
            if (pauseIndicator) {
                pauseIndicator.style.opacity = '1';
            }
        }

        function resumeAutoScroll(semestre) {
            const state = carouselStates[semestre];
            if (!state) return;

            state.isAutoScrolling = true;
            startAutoScroll(semestre);

            // Ocultar indicador de pausa
            const pauseIndicator = document.querySelector(`.pause-indicator-${semestre}`);
            if (pauseIndicator) {
                pauseIndicator.style.opacity = '0';
            }
        }

        // Touch events para mobile
        function setupTouchEvents(wrapper, semestre) {
            let startX = 0;
            let currentX = 0;
            let isDragging = false;

            wrapper.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                isDragging = true;
                pauseAutoScroll(semestre);
            });

            wrapper.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                currentX = e.touches[0].clientX;
                e.preventDefault();
            });

            wrapper.addEventListener('touchend', () => {
                if (!isDragging) return;

                const diffX = startX - currentX;
                const threshold = 50;

                if (Math.abs(diffX) > threshold) {
                    if (diffX > 0) {
                        moveCarousel(semestre, 1); // Swipe izquierda = siguiente
                    } else {
                        moveCarousel(semestre, -1); // Swipe derecha = anterior
                    }
                }

                isDragging = false;

                // Reanudar auto-scroll después de un delay
                setTimeout(() => {
                    resumeAutoScroll(semestre);
                }, 2000);
            });
        }

        // Inicializar cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', initializeCarousels);

        // Pausar todos los auto-scrolls cuando la página no está visible
        document.addEventListener('visibilitychange', () => {
            Object.keys(carouselStates).forEach(semestre => {
                if (document.hidden) {
                    pauseAutoScroll(semestre);
                } else {
                    resumeAutoScroll(semestre);
                }
            });
        });
    </script>

    <style>
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .line-clamp-4 {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .carousel-track {
            transition: transform 0.5s ease-in-out;
        }

        .carousel-track.no-transition {
            transition: none;
        }
    </style>
</body>

</html>
