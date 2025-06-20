<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Testimonios</title>
    <style>
        .modal {
            backdrop-filter: blur(8px);
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            animation: slideUp 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .video-hover {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .video-hover:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .gradient-overlay {
            background: linear-gradient(45deg, rgba(34, 197, 94, 0.1), rgba(22, 163, 74, 0.1));
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.7);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .video-hover:hover .play-button {
            opacity: 1;
        }

        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
        }

        @media (max-width: 640px) {
            .testimonial-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }
    </style>
</head>

<body class="min-h-screen">
    @include('layouts.nav')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-green-800 mb-6 leading-tight">
                🎬 Testimonios
            </h1>
            <p class="text-xl text-green-700 max-w-3xl mx-auto leading-relaxed mb-8">
                Descubre las experiencias reales de nuestra comunidad a través de estos testimonios auténticos
            </p>
            
            <!-- Estadísticas -->
            <div class="flex justify-center items-center space-x-8 mb-8">
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">{{ count($testimonios) }}</div>
                    <div class="text-green-700 font-medium">{{ count($testimonios) === 1 ? 'Testimonio' : 'Testimonios' }}</div>
                </div>
                <div class="w-px h-12 bg-green-300"></div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-emerald-600">100%</div>
                    <div class="text-emerald-700 font-medium">Auténticos</div>
                </div>
            </div>
        </div>

        @if (!empty($testimonios))
            <!-- Videos Section -->
            <section class="mb-20">
                <div class="testimonial-grid">
                    @foreach($testimonios as $index => $testimonio)
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden video-hover" 
                             onclick="openVideoModal('{{ $testimonio }}', {{ $index }})">
                            <div class="relative">
                                <!-- Video Thumbnail -->
                                <div class="relative h-64 bg-gradient-to-br from-green-400 to-emerald-600 flex items-center justify-center">
                                    <video class="w-full h-full object-cover" preload="metadata" muted>
                                        <source src="{{ asset('storage/' . $testimonio) }}" type="video/{{ pathinfo($testimonio, PATHINFO_EXTENSION) }}">
                                    </video>
                                    
                                    <!-- Play Button Overlay -->
                                    <div class="play-button">
                                        <svg class="w-6 h-6 text-white ml-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6.3 2.841A1.5 1.5 0 004 4.11V15.89a1.5 1.5 0 002.3 1.269l9.344-5.89a1.5 1.5 0 000-2.538L6.3 2.84z"/>
                                        </svg>
                                    </div>
                                    
                                    <!-- Gradient Overlay -->
                                    <div class="absolute inset-0 gradient-overlay"></div>
                                </div>
                                
                                <!-- Card Content -->
                                <div class="p-6">
                                    <div class="flex items-center text-sm text-gray-600 mb-4">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                        </svg>
                                        Video Testimonio
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                            ✨ Experiencia Real
                                        </span>
                                        <button class="text-green-600 hover:text-green-800 font-medium text-sm flex items-center">
                                            Ver completo
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>

        @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="bg-white rounded-3xl shadow-xl p-12 max-w-2xl mx-auto">
                    <div class="text-8xl mb-6">🎬</div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">
                        No hay testimonios disponibles
                    </h2>
                    <div class="flex justify-center space-x-4">
                        <div class="bg-green-100 text-green-800 px-6 py-3 rounded-full font-medium">
                            📹 Próximamente nuevos testimonios
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 bg-black bg-opacity-75 modal hidden z-50" onclick="closeVideoModal()">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden modal-content" onclick="event.stopPropagation()">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-green-600 to-emerald-600 p-6 text-white">
                    <div class="flex justify-between items-center">
                        <div>
                            <h3 class="text-2xl font-bold" id="modalTitle">Testimonio</h3>
                            <p class="text-green-200">Experiencia auténtica de nuestra comunidad</p>
                        </div>
                        <button onclick="closeVideoModal()" class="text-white hover:text-gray-300 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Modal Content -->
                <div class="p-6">
                    <div class="mb-6">
                        <video id="modalVideo" class="w-full rounded-2xl shadow-lg" controls autoplay>
                            <source id="modalVideoSource" src="" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-4">
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                ✨ Testimonio Verificado
                            </span>
                            <span class="text-gray-600 text-sm flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Video Testimonio
                            </span>
                        </div>
                        
                        <button onclick="closeVideoModal()" class="bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-2 rounded-full font-medium transition-colors">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        function openVideoModal(videoPath, videoTitle, index) {
            const modal = document.getElementById('videoModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalVideo = document.getElementById('modalVideo');
            const modalVideoSource = document.getElementById('modalVideoSource');
            
            modalTitle.textContent = videoTitle;
            modalVideoSource.src = '/storage/' + videoPath;
            modalVideo.load();
            
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const modalVideo = document.getElementById('modalVideo');
            
            modalVideo.pause();
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeVideoModal();
            }
        });

        // Prevenir que el video se reproduzca automáticamente en las tarjetas
        document.addEventListener('DOMContentLoaded', function() {
            const videos = document.querySelectorAll('.video-hover video');
            videos.forEach(function(video) {
                video.addEventListener('mouseenter', function() {
                    this.currentTime = 2; // Mostrar frame a los 2 segundos
                });
            });
        });
    </script>
</body>

</html>