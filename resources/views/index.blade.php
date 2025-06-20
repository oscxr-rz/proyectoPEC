<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Basura Tecnológica - E-waste</title>
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

        .image-hover {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .image-hover:hover {
            transform: scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(34, 197, 94, 0.9), rgba(22, 163, 74, 0.8)),
                url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=1920&h=1080&fit=crop') center/cover;
            min-height: 100vh;
        }

        .section-dark {
            background: linear-gradient(135deg, #1f2937, #111827);
        }

        .section-green {
            background: linear-gradient(135deg, #059669, #047857);
        }

        .text-glow {
            text-shadow: 0 0 20px rgba(34, 197, 94, 0.5);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-gray-900">
    @include('layouts.nav')
    <!-- Hero Section -->
    <section class="hero-section flex items-center justify-center text-white relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ Storage::url('images/index/enmexico.jpg') }}" 
                 alt=""
                 class="w-full h-full object-cover object-center">
        </div>

        <!-- Gradient Overlay - hacia la derecha -->
        <div class="absolute inset-0 bg-gradient-to-r from-transparent from-0% via-transparent via-0% to-black to-100%"></div>

        <!-- Content Container -->
        <div class="relative z-10 w-full">
            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-screen">
                <!-- Espacio vacío para mostrar la imagen -->
                <div class="hidden lg:block"></div>
                
                <!-- Contenido del texto -->
                <div class="flex items-center justify-center lg:justify-start px-4 lg:px-8 xl:px-12">
                    <div class="text-center lg:text-left max-w-2xl">
                        <!-- Main Title -->
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-black mb-4 lg:mb-6 text-white drop-shadow-2xl">
                            Basura Tecnológica
                        </h1>

                        <!-- Subtitle -->
                        <p class="text-base sm:text-lg lg:text-xl xl:text-2xl text-white font-medium leading-relaxed mb-6 lg:mb-8 backdrop-blur-sm bg-black/40 rounded-2xl p-4 lg:p-6 border border-white/20 shadow-2xl">
                            Conoce el impacto ambiental de los desechos electrónicos y cómo podemos contribuir a un futuro más sostenible
                        </p>

                        <!-- CTA Button -->
                        <div class="flex justify-center lg:justify-start">
                            <button class="group relative overflow-hidden bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-bold py-4 px-8 lg:py-5 lg:px-12 rounded-full text-base lg:text-lg transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-green-500/30">
                                <span class="relative z-10 flex items-center">
                                    SABER MÁS
                                    <svg class="ml-3 w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>

    <!-- About Section -->
    <section class="section-dark py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <h2 class="text-4xl font-bold text-green-400 mb-6">
                        ¿Qué es la basura tecnológica?
                    </h2>
                    <p class="text-white leading-relaxed text-lg">
                        La basura electrónica, a menudo conocida como E-waste es un tipo de basura generada por la
                        electrónica en el mundo industrial, un tipo de basura que se genera cuando un dispositivo ya
                        sea teléfonos, tablets, computadoras, impresoras y entre una gran variedad de estos llegan
                        al fin de su vida útil dejando rastros de contaminación.
                    </p>
                    <p class="text-white leading-relaxed text-lg">
                        Normalmente contiene una serie de componentes peligrosos que tienen un gran impacto al medio
                        ambiente afectando incluso a la salud humana ya que al no tener un lugar para su reciclaje o
                        desecho terminan contaminando.
                    </p>
                </div>
                <div class="relative">
                    <img src="{{ Storage::url('images/index/basura_tecnologica.jpg') }}" alt="Equipo trabajando"
                        class="rounded-2xl shadow-2xl hover-lift">
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section class="section-green py-20">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Causes Section -->
            <div class="mb-20">
                <div class="section-green rounded-3xl overflow-hidden">
                    <div class="grid lg:grid-cols-2 gap-0 min-h-[400px]">
                        <div class="relative">
                            <img src="https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?w=600&h=400&fit=crop"
                                alt="" class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-8 lg:p-12 flex flex-col justify-center order-1 lg:order-2">
                            <h2 class="text-3xl font-bold text-white mb-6">
                                Causas de generación de la Basura Tecnológica
                            </h2>
                            <p class="text-white leading-relaxed text-lg mb-6">
                                Generalmente la basura tecnológica se genera a partir del fin de la vida útil de un
                                dispositivo electrónico donde este no es depositado en un sitio adecuado, donado
                                o vendido para su reparación, esta llega a zonas como ríos, basureros o quedar
                                almacenados en lugares no adecuados.
                            </p>
                            <p class="text-white leading-relaxed text-lg">
                                Mucha de esta basura contiene sustancias
                                tóxicas, metales pesados, componentes electrónicos, electromagnéticos y muy
                                contaminantes como pueden ser las baterías, microondas, impresoras, teclados y
                                adaptadores de corriente.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sustainable Development Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4">
            <!-- SDG Section -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-green-400 mb-4">
                        Tipos de Basura Tecnológica
                    </h2>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- SDG 1 -->
                    <div
                        class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 hover-lift">
                        <div class="relative h-48 bg-red-500 flex items-center justify-center">
                            <img src="{{ Storage::url('images/index/aire_acondicionado.jpeg') }}" alt=""
                                class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-green-400 mb-3">Equipos de temperatura</h3>
                            <p class="text-gray-300 mb-2"><strong>17%</strong></p>
                            <p class="text-white">Refrigeradores, aires acondicionados, bombas de calor</p>
                        </div>
                    </div>

                    <!-- SDG 3 -->
                    <div
                        class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 hover-lift">
                        <div class="relative h-48 bg-green-500 flex items-center justify-center">
                            <img src="{{ Storage::url('images/index/monitores.jpeg') }}" alt=""
                                class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-green-400 mb-3">Pantallas y monitores</h3>
                            <p class="text-gray-300 mb-2"><strong>8%</strong></p>
                            <p class="text-white">Televisores, monitores, laptops, tablets</p>
                        </div>
                    </div>

                    <!-- SDG 4 -->
                    <div
                        class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 hover-lift">
                        <div class="relative h-48 bg-red-600 flex items-center justify-center">
                            <img src="{{ Storage::url('images/index/lavadoras.jpeg') }}" alt=""
                                class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-green-400 mb-3">Equipos grandes</h3>
                            <p class="text-gray-300 mb-2"><strong>22%</strong></p>
                            <p class="text-white">Lavadoras, secadoras, paneles solares</p>
                        </div>
                    </div>

                    <!-- SDG 5 -->
                    <div
                        class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 hover-lift">
                        <div class="relative h-48 bg-red-500 flex items-center justify-center">
                            <img src="{{ Storage::url('images/index/lamparas.jpeg') }}" alt=""
                                class="absolute inset-0 w-full h-full object-cover">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-green-400 mb-3">Lámparas</h3>
                            <p class="text-gray-300 mb-2"><strong>3%</strong></p>
                            <p class="text-white">LED, fluorescentes, lámparas de descarga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- E-waste Information Section -->
    <section class="relative py-20 bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 overflow-hidden">
        <!-- Animated background particles -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-2 h-2 bg-emerald-400 rounded-full animate-ping opacity-75"></div>
            <div class="absolute top-3/4 right-1/4 w-1 h-1 bg-green-400 rounded-full animate-pulse"></div>
            <div class="absolute top-1/2 left-3/4 w-1.5 h-1.5 bg-teal-400 rounded-full animate-bounce"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Statistics Section -->
            <div class="mb-20">
                <div
                    class="backdrop-blur-sm bg-white/5 border border-white/10 rounded-3xl shadow-2xl p-8 lg:p-12 hover:bg-white/10 transition-all duration-500">
                    <div class="text-center mb-12">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-emerald-400 to-green-500 rounded-full mb-6 animate-pulse">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                </path>
                            </svg>
                        </div>
                        <h2
                            class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 via-green-400 to-teal-400 mb-4">
                            Global E-waste Monitor 2024
                        </h2>
                        <p class="text-xl text-emerald-100/80 font-medium">Estadísticas globales sobre residuos
                            electrónicos</p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div
                            class="group relative overflow-hidden text-center p-8 bg-gradient-to-br from-emerald-600/20 to-green-700/20 backdrop-blur-sm border border-emerald-500/30 rounded-2xl hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/20 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-emerald-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative z-10">
                                <div
                                    class="text-5xl font-black text-emerald-400 mb-3 group-hover:scale-110 transition-transform duration-300">
                                    62Mt</div>
                                <div class="text-emerald-300 font-bold mb-2 text-lg">Generación global 2022</div>
                                <div class="text-emerald-100/60 text-sm">Proyección 82 Mt para 2030</div>
                            </div>
                        </div>

                        <div
                            class="group relative overflow-hidden text-center p-8 bg-gradient-to-br from-green-600/20 to-emerald-700/20 backdrop-blur-sm border border-green-500/30 rounded-2xl hover:scale-105 hover:shadow-2xl hover:shadow-green-500/20 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-green-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative z-10">
                                <div
                                    class="text-5xl font-black text-green-400 mb-3 group-hover:scale-110 transition-transform duration-300">
                                    5%</div>
                                <div class="text-green-300 font-bold mb-2 text-lg">Crecimiento anual</div>
                                <div class="text-green-100/60 text-sm">2.6 Mt por año</div>
                            </div>
                        </div>

                        <div
                            class="group relative overflow-hidden text-center p-8 bg-gradient-to-br from-teal-600/20 to-emerald-700/20 backdrop-blur-sm border border-teal-500/30 rounded-2xl hover:scale-105 hover:shadow-2xl hover:shadow-teal-500/20 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-teal-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative z-10">
                                <div
                                    class="text-5xl font-black text-teal-400 mb-3 group-hover:scale-110 transition-transform duration-300">
                                    22.3%</div>
                                <div class="text-teal-300 font-bold mb-2 text-lg">Tasa de reciclaje</div>
                                <div class="text-teal-100/60 text-sm">Recolectado y reciclado formalmente</div>
                            </div>
                        </div>

                        <div
                            class="group relative overflow-hidden text-center p-8 bg-gradient-to-br from-emerald-600/20 to-teal-700/20 backdrop-blur-sm border border-emerald-500/30 rounded-2xl hover:scale-105 hover:shadow-2xl hover:shadow-emerald-500/20 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-emerald-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative z-10">
                                <div
                                    class="text-5xl font-black text-emerald-400 mb-3 group-hover:scale-110 transition-transform duration-300">
                                    $62B</div>
                                <div class="text-emerald-300 font-bold mb-2 text-lg">Valor perdido</div>
                                <div class="text-emerald-100/60 text-sm">En materiales recuperables</div>
                            </div>
                        </div>

                        <div
                            class="group relative overflow-hidden text-center p-8 bg-gradient-to-br from-green-600/20 to-teal-700/20 backdrop-blur-sm border border-green-500/30 rounded-2xl hover:scale-105 hover:shadow-2xl hover:shadow-green-500/20 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-green-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative z-10">
                                <div
                                    class="text-5xl font-black text-green-400 mb-3 group-hover:scale-110 transition-transform duration-300">
                                    26kg</div>
                                <div class="text-green-300 font-bold mb-2 text-lg">Líder per cápita</div>
                                <div class="text-green-100/60 text-sm">Noruega por habitante</div>
                            </div>
                        </div>

                        <div
                            class="group relative overflow-hidden text-center p-8 bg-gradient-to-br from-teal-600/20 to-green-700/20 backdrop-blur-sm border border-teal-500/30 rounded-2xl hover:scale-105 hover:shadow-2xl hover:shadow-teal-500/20 transition-all duration-300">
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-teal-400/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>
                            <div class="relative z-10">
                                <div
                                    class="text-5xl font-black text-teal-400 mb-3 group-hover:scale-110 transition-transform duration-300">
                                    34.2Mt</div>
                                <div class="text-teal-300 font-bold mb-2 text-lg">Asia lidera</div>
                                <div class="text-teal-100/60 text-sm">Seguida por Europa (13.8 Mt)</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Environmental Impact Section -->
            <section class="mb-20">
                <div
                    class="group relative overflow-hidden bg-gradient-to-r from-emerald-600/90 via-green-600/90 to-teal-600/90 backdrop-blur-sm rounded-3xl shadow-2xl text-white hover:shadow-emerald-500/25 transition-all duration-500">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-emerald-600/20 to-teal-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    </div>
                    <div class="grid lg:grid-cols-2 gap-0 min-h-[450px] relative z-10">
                        <div class="p-8 lg:p-12 flex flex-col justify-center">
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-4xl font-black text-white">
                                    Impactos Ambientales
                                </h2>
                            </div>
                            <div class="space-y-6">
                                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                                    <p class="leading-relaxed text-lg text-white/90 font-medium">
                                        La basura tecnológica contiene <span class="text-yellow-300 font-bold">metales
                                            pesados</span>
                                        (plomo y mercurio principalmente), sustancias tóxicas lo que sumado al manejo
                                        inadecuado contamina suelos y aguas subterráneas.
                                    </p>
                                </div>
                                <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20">
                                    <p class="leading-relaxed text-lg text-white/90 font-medium">
                                        Si estos se queman contamina el aire y tienen una <span
                                            class="text-red-300 font-bold">significante contribución</span> a la huella
                                        de carbono global y
                                        degradación de ecosistemas.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="relative overflow-hidden">
                            <div
                                class="absolute inset-0 bg-gradient-to-l from-transparent via-emerald-600/20 to-emerald-600/40">
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            <!-- Placeholder for image -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-green-400/20 to-emerald-600/40 flex items-center justify-center">
                                <img src="{{ Storage::url('images/index/enmexico.jpg') }}" alt=""
                                    class="absolute inset-0 w-full h-full object-cover">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Regulations Section -->
            <section class="mb-20">
                <div class="text-center mb-16">
                    <div
                        class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-emerald-400 to-green-500 rounded-full mb-6">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h2
                        class="text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-emerald-600 to-green-600 mb-4">
                        Regulaciones Actuales
                    </h2>
                    <p class="text-xl text-slate-300 font-medium">Marco normativo internacional y regional</p>
                </div>

                <div class="grid gap-6 md:grid-cols-2">
                    <div
                        class="group relative overflow-hidden bg-gradient-to-br from-white/95 to-emerald-50/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border-l-4 border-emerald-500 hover:shadow-2xl hover:shadow-emerald-500/20 hover:scale-[1.02] transition-all duration-300">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-400/10 to-transparent rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-black text-emerald-800 mb-4 flex items-center">
                                <span class="text-3xl mr-3">🌍</span> Global
                            </h3>
                            <p class="text-slate-700 leading-relaxed font-medium">
                                La Convención de Basilea actualizó sus anexos en 2022 para incluir
                                definiciones más específicas de e-waste peligroso y controlar mejor su comercio
                                transfronterizo.
                            </p>
                        </div>
                    </div>

                    <div
                        class="group relative overflow-hidden bg-gradient-to-br from-white/95 to-blue-50/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border-l-4 border-blue-500 hover:shadow-2xl hover:shadow-blue-500/20 hover:scale-[1.02] transition-all duration-300">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/10 to-transparent rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-black text-blue-800 mb-4 flex items-center">
                                <span class="text-3xl mr-3">🇪🇺</span> Unión Europea
                            </h3>
                            <p class="text-slate-700 leading-relaxed font-medium">
                                La Directiva WEEE revisada en 2023 establece objetivos de
                                recolección del 55% para 2025 y nuevos requisitos de trazabilidad digital.
                            </p>
                        </div>
                    </div>

                    <div
                        class="group relative overflow-hidden bg-gradient-to-br from-white/95 to-red-50/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border-l-4 border-red-500 hover:shadow-2xl hover:shadow-red-500/20 hover:scale-[1.02] transition-all duration-300">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-red-400/10 to-transparent rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-black text-red-800 mb-4 flex items-center">
                                <span class="text-3xl mr-3">🇺🇸</span> Estados Unidos
                            </h3>
                            <p class="text-slate-700 leading-relaxed font-medium">
                                32 estados tienen ahora legislación de e-waste, con California
                                liderando la implementación de "derecho a reparar" para dispositivos electrónicos.
                            </p>
                        </div>
                    </div>

                    <div
                        class="group relative overflow-hidden bg-gradient-to-br from-white/95 to-orange-50/95 backdrop-blur-sm rounded-2xl shadow-xl p-8 border-l-4 border-orange-500 hover:shadow-2xl hover:shadow-orange-500/20 hover:scale-[1.02] transition-all duration-300">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-orange-400/10 to-transparent rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500">
                        </div>
                        <div class="relative z-10">
                            <h3 class="text-2xl font-black text-orange-800 mb-4 flex items-center">
                                <span class="text-3xl mr-3">🌏</span> Mercados emergentes
                            </h3>
                            <p class="text-slate-700 leading-relaxed font-medium">
                                India implementó reglas extendidas de responsabilidad del
                                productor en 2023, mientras que Brasil lanzó su Sistema Nacional de Gestión de
                                Residuos Electrónicos.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Modal -->
    <div id="infoModal" class="fixed inset-0 bg-black bg-opacity-50 modal hidden z-50"
        onclick="closeModal('infoModal')">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-gray-800 rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden modal-content"
                onclick="event.stopPropagation()">
                <!-- Header del Modal -->
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?w=1000&h=400&fit=crop"
                        alt="Desechos electrónicos" class="w-full h-64 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <button onclick="closeModal('infoModal')"
                        class="absolute top-4 right-4 text-white bg-black bg-opacity-50 hover:bg-opacity-70 rounded-full p-2 transition-all duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <div class="absolute bottom-6 left-6">
                        <h3 class="text-3xl font-bold text-white mb-2">Crisis Global del E-waste</h3>
                        <p class="text-green-200 text-lg">Datos actualizados sobre el impacto ambiental</p>
                    </div>
                </div>

                <!-- Contenido del Modal -->
                <div class="p-8 max-h-96 overflow-y-auto">
                    <div class="space-y-6">
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-red-900/30 rounded-xl p-6">
                                <h4 class="text-xl font-bold text-red-400 mb-3">🚨 Datos Alarmantes</h4>
                                <ul class="text-white space-y-2">
                                    <li>• Solo el 22.3% se recicla correctamente</li>
                                    <li>• 77.7% termina en vertederos o es mal gestionado</li>
                                    <li>• $62 mil millones en materiales perdidos anualmente</li>
                                    <li>• Crecimiento del 5% anual en generación</li>
                                </ul>
                            </div>

                            <div class="bg-green-900/30 rounded-xl p-6">
                                <h4 class="text-xl font-bold text-green-400 mb-3">💡 Soluciones</h4>
                                <ul class="text-white space-y-2">
                                    <li>• Programas de recolección formal</li>
                                    <li>• Educación sobre reciclaje responsable</li>
                                    <li>• Diseño circular de productos</li>
                                    <li>• Políticas gubernamentales efectivas</li>
                                </ul>
                            </div>
                        </div>

                        <div class="bg-gray-700 rounded-xl p-6">
                            <h4 class="text-xl font-bold text-blue-400 mb-3">🌍 Impactos por Región</h4>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                                <div>
                                    <div class="text-2xl font-bold text-yellow-400">34.2Mt</div>
                                    <div class="text-gray-300 text-sm">Asia</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-blue-400">13.8Mt</div>
                                    <div class="text-gray-300 text-sm">Europa</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-green-400">7.4Mt</div>
                                    <div class="text-gray-300 text-sm">América</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-red-400">2.9Mt</div>
                                    <div class="text-gray-300 text-sm">África</div>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-purple-900/50 to-pink-900/50 rounded-xl p-6">
                            <h4 class="text-xl font-bold text-purple-300 mb-3">🔬 Componentes Tóxicos Principales</h4>
                            <div class="grid md:grid-cols-3 gap-4 text-sm text-white">
                                <div>
                                    <strong class="text-red-400">Metales Pesados:</strong>
                                    <br>Plomo, Mercurio, Cadmio
                                </div>
                                <div>
                                    <strong class="text-orange-400">Químicos:</strong>
                                    <br>BFR, PVC, Ftalatos
                                </div>
                                <div>
                                    <strong class="text-yellow-400">Gases:</strong>
                                    <br>CFC, HCFC, Amoníaco
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer del Modal -->
                <div class="bg-gray-700 px-8 py-4">
                    <div class="flex justify-between items-center">
                        <div class="text-gray-300 text-sm">
                            Fuente: Global E-waste Monitor 2024
                        </div>
                        <button onclick="closeModal('infoModal')"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-lg transition-colors duration-300">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
    <!-- JavaScript -->
    <script>
        // Función para abrir modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        // Función para cerrar modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => {
                    if (!modal.classList.contains('hidden')) {
                        modal.classList.add('hidden');
                        document.body.style.overflow = 'auto';
                    }
                });
            }
        });

        // Smooth scroll para el botón "SAIBA MAIS"
        document.querySelector('.hero-section button').addEventListener('click', function() {
            document.querySelector('.section-dark').scrollIntoView({
                behavior: 'smooth'
            });
        });

        // Animación de scroll para elementos
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observar elementos con animaciones
        document.addEventListener('DOMContentLoaded', function() {
            const animatedElements = document.querySelectorAll('.hover-lift');
            animatedElements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });

            // Abrir modal automáticamente al cargar la página
            setTimeout(() => {
                openModal('infoModal');
            }, 1000); // Espera 1 segundo después de que carga la página
        });

        // Easter egg: Click en el título del hero
        let clickCount = 0;
        document.querySelector('.hero-section h1').addEventListener('click', function() {
            clickCount++;
            if (clickCount >= 5) {
                this.classList.add('animate-pulse');
                setTimeout(() => {
                    this.classList.remove('animate-pulse');
                    clickCount = 0;
                }, 2000);
            }
        });
    </script>
</body>

</html>
