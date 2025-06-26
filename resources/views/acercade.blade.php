<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <title>Acerca de</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #1a202c;
            /* Ejemplo: gris oscuro */
            color: #f1f5f9;
            /* texto más claro para contraste */
        }

        .gradient-bg {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            33% {
                transform: translateY(-20px) rotate(1deg);
            }

            66% {
                transform: translateY(-10px) rotate(-1deg);
            }
        }

        .pulse-glow {
            animation: pulse-glow 3s ease-in-out infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(16, 150, 109, 0.3);
            }

            50% {
                box-shadow: 0 0 40px rgba(16, 150, 109, 0.6), 0 0 60px rgba(16, 150, 109, 0.3);
            }
        }

        .tech-pattern {
            background-image:
                radial-gradient(circle at 25% 25%, rgba(16, 150, 109, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(30, 37, 52, 0.1) 0%, transparent 50%);
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .text-gradient {
            background: linear-gradient(135deg, #065f46, #10966D, #34d399);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .border-gradient {
            border: 2px solid transparent;
            background: linear-gradient(135deg, #1E2534, #10966D) border-box;
            -webkit-mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: exclude;
            mask: linear-gradient(#fff 0 0) padding-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
        }

        .tribe-card {
            position: relative;
            overflow: hidden;
        }

        .tribe-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.8s ease;
        }

        .tribe-card:hover::before {
            left: 100%;
        }

        .decorative-dots {
            background-image: radial-gradient(circle, rgba(16, 150, 109, 0.3) 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>

<body class="bg-gay-900 text-gray-100 min-h-screen">

    <!-- Fondo decorativo -->
    <div class="fixed inset-0 tech-pattern pointer-events-none opacity-50"></div>
    <div class="fixed top-10 right-10 w-32 h-32 decorative-dots opacity-30 rounded-full floating-animation"></div>
    <div class="fixed bottom-10 left-10 w-24 h-24 decorative-dots opacity-20 rounded-full floating-animation"
        style="animation-delay: -2s;"></div>

    @include('layouts.nav')
    <main class="relative max-w-7xl mx-auto px-6 py-20 space-y-20">


        <!-- Título principal mejorado -->
        <div class="text-center space-y-6">
            <h1 class="text-6xl md:text-7xl font-black text-white leading-tight">
                Acerca de
            </h1>
        </div>

        <br>
        <br>

        <!-- Sección general mejorada -->
        <section class="space-y-12">

            <!-- Recuadro 2 - Planeación -->
            <div class="relative group">
                <div class="relative text-white p-10 rounded-3xl shadow-2xl card-hover pulse-glow">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold mb-6 text-white">🚀 Planeación del proyecto del grupo 4-D</h3>
                            <p class="text-lg leading-relaxed text-gray-100">
                                El proyecto consiste en la creación de una página web enlazada al sitio principal del
                                CBTis 150, como parte de una campaña sobre la basura tecnológica. El objetivo es poner
                                en marcha un centro de acopio de residuos tecnológicos que funcione en conjunto con esta
                                página.

                                La página web tendrá fines educativos. La solicitud del cliente fue clara: se requiere
                                una plataforma que permita registrar residuos tecnológicos para su donación al plantel
                                educativo. Además, servirá para brindar información sobre el tema, así como para mostrar
                                trabajos realizados por otras especialidades, con el propósito de promover y fomentar la
                                correcta disposición de la basura tecnológica en lugares adecuados.

                                Asimismo, se explicarán las tecnologías y metodologías utilizadas en el desarrollo del
                                proyecto.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recuadro 3: Tribus mejorado -->
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000">
                </div>
                <div class="relative bg-[#1E2534] text-white p-10 rounded-3xl shadow-2xl card-hover">
                    <div class="text-center mb-8">
                        <h3 class="text-3xl font-bold text-white mb-4">🏛️ Organización por Tribus</h3>
                        <p class="text-lg leading-relaxed text-gray-200 max-w-4xl mx-auto">
                            Las tribus son una parte fundamental del proyecto, ya que permiten dividir la carga de
                            trabajo. Cada tribu cuenta con un líder que facilita su organización y coordinación. Todas
                            las tribus están integradas por los miembros del grupo 4D.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Tribu Back-end -->
                        <div
                            class="tribe-card bg-gradient-to-br from-gray-800 to-gray-900 p-6 rounded-2xl border border-green-500/20 hover:border-green-400/40 transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🖥️</span>
                                </div>
                                <h4 class="text-xl font-bold text-green-400">Back-end</h4>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-green-300">Líder:</span> LOPEZ CRUZ DULCE MARINA</p>
                                <div class="text-gray-300">
                                    <p class="font-medium text-white mb-1">Integrantes:</p>
                                    <p>• ARANGO RUIZ OSCAR MARIANO</p>
                                    <p>• CRUZ MANUEL BENJAMIN FERNANDO</p>
                                    <p>• VILLANUEVA VASQUEZ DIANA SOFIA</p>
                                </div>
                                <div class="mt-3 p-2 bg-green-500/10 rounded-lg">
                                    <p class="text-xs text-green-300">🔧 Se encarga de que todo lo visual funcione</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tribu Front-end -->
                        <div
                            class="tribe-card bg-gradient-to-br from-purple-800 to-purple-900 p-6 rounded-2xl border border-purple-500/20 hover:border-purple-400/40 transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🎨</span>
                                </div>
                                <h4 class="text-xl font-bold text-purple-400">Front-end</h4>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-purple-300">Líder:</span> BOBADILLA DIAZ AYELEN
                                    ESTEFANI</p>
                                <div class="text-gray-300">
                                    <p class="font-medium text-white mb-1">Integrantes:</p>
                                    <p>• HERNANDEZ AQUINO LUIS FERNANDO</p>
                                    <p>• HERNANDEZ BARRIGA JESUS ANTONIO</p>
                                    <p>• SANCHEZ VASQUEZ JOSHUAN ADOLFO</p>
                                </div>
                                <div class="mt-3 p-2 bg-purple-500/10 rounded-lg">
                                    <p class="text-xs text-purple-300">🧑‍🎨 Crear el diseño que verá el usuario</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tribu Base de datos -->
                        <div
                            class="tribe-card bg-gradient-to-br from-blue-800 to-blue-900 p-6 rounded-2xl border border-blue-500/20 hover:border-blue-400/40 transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🗄️</span>
                                </div>
                                <h4 class="text-xl font-bold text-blue-400">Base de datos</h4>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-blue-300">Líder:</span> TORRES PEREZ HALI YANELI</p>
                                <div class="text-gray-300">
                                    <p class="font-medium text-white mb-1">Integrantes:</p>
                                    <p>• LOPEZ SANTIAGO JOANA LIZBETH</p>
                                    <p>• SANTIAGO MARTINEZ JOSUE</p>
                                    <p>• VILLANUEVA LUIS GUILLERMO SILVERIO</p>
                                </div>
                                <div class="mt-3 p-2 bg-blue-500/10 rounded-lg">
                                    <p class="text-xs text-blue-300">📊 Desarrollar la base de datos y organizar
                                        registros</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tribu Despliegue -->
                        <div
                            class="tribe-card bg-gradient-to-br from-orange-800 to-orange-900 p-6 rounded-2xl border border-orange-500/20 hover:border-orange-400/40 transition-all duration-300">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-orange-500 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">🌐</span>
                                </div>
                                <h4 class="text-xl font-bold text-orange-400">Despliegue</h4>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-orange-300">Líder:</span> PEREZ ARANGO ALEXA MALAK
                                </p>
                                <div class="text-gray-300">
                                    <p class="font-medium text-white mb-1">Integrantes:</p>
                                    <p>• CRUZ MATIAS ANGEL</p>
                                    <p>• RIOS SANCHEZ DAMIAN</p>
                                    <p>• SANTIAGO MARTINEZ ERICK</p>
                                    <p>• MARTINEZ CABALLERO WENDY</p>
                                </div>
                                <div class="mt-3 p-2 bg-orange-500/10 rounded-lg">
                                    <p class="text-xs text-orange-300">🚀 Subir la página a un servidor</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tribu Documentación -->
                        <div
                            class="tribe-card bg-gradient-to-br from-indigo-800 to-indigo-900 p-6 rounded-2xl border border-indigo-500/20 hover:border-indigo-400/40 transition-all duration-300 md:col-span-2 lg:col-span-1">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                    <span class="text-xl">📑</span>
                                </div>
                                <h4 class="text-xl font-bold text-indigo-400">Documentación</h4>
                            </div>
                            <div class="space-y-2 text-sm">
                                <p><span class="font-semibold text-indigo-300">Líder:</span> DE LA LUZ MENDOZA ABIGAIL
                                </p>
                                <div class="text-gray-300">
                                    <p class="font-medium text-white mb-1">Integrantes:</p>
                                    <p>• PEREZ MARTINEZ KALED</p>
                                    <p>• LOPEZ MATIAS EDGAR HUMBERTO</p>
                                    <p>• MORALES GOMEZ LUIS ENRIQUE</p>
                                </div>
                                <div class="mt-3 p-2 bg-indigo-500/10 rounded-lg">
                                    <p class="text-xs text-indigo-300">🗂️ Recolectar y registrar lo realizado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recuadro 4 - Metodología -->
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000">
                </div>
                <div class="relative bg-[#10966D] text-white p-10 rounded-3xl shadow-2xl card-hover">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center mr-4">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-white">Metodología: Scrum ⚡</h3>
                            </div>
                            <div class="space-y-4 text-gray-100">
                                <p class="text-lg leading-relaxed">
                                    Para este proyecto utilizamos la metodología Scrum, lo que nos permitió organizarnos
                                    mejor y trabajar por etapas. Debido al tiempo limitado —solo 6 o 7 días—, dividimos
                                    el trabajo en tribus para hacerlo más ágil y eficiente.
                                </p>
                                <p class="text-lg leading-relaxed">
                                    Cada día revisábamos los avances, lo pendiente y cualquier problema, lo que nos
                                    ayudó a mantener el enfoque y aprovechar mejor el tiempo.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            </div>

            <div class="max-w-6xl mx-auto px-4">
                <!-- Header con título -->
                <div class="rounded-2xl p-8 mb-8 text-center relative overflow-hidden">
                    <!-- Decorative dots -->
                    <div class="absolute top-4 right-4 grid grid-cols-6 gap-1 opacity-20">
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                        <div class="w-2 h-2 bg-white rounded-full"></div>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-white">
                        Stack Tecnológico
                    </h1>
                </div><!-- Primera fila de tecnologías -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6 mb-8">
                    <!-- MySQL -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://www.mysql.com/common/logos/logo-mysql-170x115.png" alt="MySQL Logo"
                                class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">MySQL</h3>
                        <p class="text-sm text-gray-600">Base de datos</p>
                    </div>

                    <!-- Pencil Project -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 rounded-full bg-white flex items-center justify-center border overflow-hidden">
                            <img src="https://th.bing.com/th/id/R.d9285589f83103a324cd06d5beafdf71?rik=035tSrGbLYz9Bg&pid=ImgRaw&r=0"
                                alt="Pencil Project Logo" class="w-10 h-10 object-contain"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="w-16 h-16 bg-yellow-400 rounded-full items-center justify-center"
                                style="display:none;">
                                <span class="text-white font-bold text-2xl transform rotate-12"
                                    style="font-family: serif;">P</span>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Pencil </h3>
                        <p class="text-sm text-gray-600">Back end</p>
                    </div>



                    <!-- Tailwind CSS -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg"
                                alt="Tailwind CSS Logo" class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Tailwind CSS</h3>
                        <p class="text-sm text-gray-600">Front-end</p>
                    </div>

                    <!-- Laravel -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg"
                                alt="Laravel Logo" class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Laravel</h3>
                        <p class="text-sm text-gray-600">Back-end</p>
                    </div>

                    <!-- PHP -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/2/27/PHP-logo.svg" alt="PHP Logo"
                                class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">PHP</h3>
                        <p class="text-sm text-gray-600">Back-end</p>
                    </div>
                </div>

                <!-- Segunda fila de tecnologías -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div
                            class="w-16 h-16 mx-auto mb-4 rounded-full bg-white flex items-center justify-center border overflow-hidden">
                            <img src="https://th.bing.com/th/id/OIP.UWs8rVqYDc7LoOAHAExI1gAAAA?rs=1&pid=ImgDetMain&cb=idpwebpc2"
                                class="w-10 h-10 object-contain"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <div class="w-16 h-16 bg-yellow-400 rounded-full items-center justify-center"
                                style="display:none;">
                                <span class="text-white font-bold text-2xl transform rotate-12"
                                    style="font-family: serif;">P</span>
                            </div>
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Aiven </h3>
                        <p class="text-sm text-gray-600">Test y despliege </p>
                    </div>

                    <!-- Hostinger -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://s3-eu-west-1.amazonaws.com/tpd/logos/580cbf960000ff0005966f44/0x0.png"
                                alt="Hostinger Logo" class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Hostinger</h3>
                        <p class="text-sm text-gray-600">Test y despliegue</p>
                    </div>

                    <!-- Visual Studio Code -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Visual_Studio_Code_1.35_icon.svg"
                                alt="VS Code Logo" class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">Visual Studio Code</h3>
                        <p class="text-sm text-gray-600">Editor de texto</p>
                    </div>

                    <!-- GitHub -->
                    <div class="tech-card bg-white rounded-xl p-6 shadow-md text-center">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-full flex items-center justify-center">
                            <img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png"
                                alt="GitHub Logo" class="w-10 h-10">
                        </div>
                        <h3 class="font-semibold text-gray-800 mb-1">GitHub y GitHub Desktop</h3>
                        <p class="text-sm text-gray-600">Control de versiones</p>
                    </div>
                </div>

            </div>

            <!-- Recuadro 5 - Tecnologías -->
            <div class="relative group">
                <div
                    class="absolute -inset-1 bg-gradient-to-r from-gray-600 to-slate-600 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000">
                </div>
                <div class="relative bg-[#1E2534] text-white p-4 sm:p-6 lg:p-10 rounded-3xl shadow-2xl card-hover">
                    <div class="text-center mb-6 sm:mb-8">
                        <div class="inline-flex items-center space-x-3 mb-4">
                            <div
                                class="w-10 h-10 sm:w-12 sm:h-12 bg-green-500 rounded-xl flex items-center justify-center">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl sm:text-2xl font-bold text-green-400">Descripción de Tecnologías</h3>
                        </div>
                    </div>
                    <div class="max-w-4xl mx-auto">
                        <p class="text-base sm:text-lg leading-relaxed text-gray-200 text-center">
                            MySQL es un sistema de gestión de bases de datos muy utilizado, ya que permite almacenar y
                            organizar información de forma eficiente. Laravel es un framework de desarrollo web en PHP
                            que facilita la creación de aplicaciones al ofrecer herramientas y estructuras prediseñadas.
                            Por su parte, los frameworks de estilos ayudan a diseñar interfaces visualmente atractivas y
                            adaptables a distintos dispositivos.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Título Principal -->
            <div class="text-center mb-8 sm:mb-12 fade-in">
                <div
                    class="inline-flex items-center space-x-2 bg-white/60 backdrop-blur-sm px-4 sm:px-6 py-3 rounded-full shadow-lg border border-gray-200">
                    <span class="text-2xl sm:text-3xl">📚</span>
                    <h2 class="text-xl sm:text-2xl font-bold text-white">Fuentes de Investigación</h2>
                </div>
            </div>

            <!-- Grid de Referencias -->
            <div class="grid gap-4 sm:gap-6 md:grid-cols-2 lg:grid-cols-1">

                <!-- Referencia 1 -->
                <div
                    class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-green-500">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-green-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-green-700">Forti, V., Baldé, C. P., Kuehr, R., & Bel, G.</strong>
                                (2023).
                                <em class="text-gray-700">The Global E-waste Monitor 2023: Quantities, flows, and the
                                    circular economy potential</em>.
                                United Nations University/United Nations Institute for Training and Research,
                                International Telecommunication Union, and International Solid Waste Association.
                            </p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span
                                    class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Global
                                    Report</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">2023</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referencia 2 -->
                <div class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-blue-500"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-blue-700">Forti, V., Baldé, C. P., Kuehr, R., & Bel, G.</strong>
                                (2024).
                                <em class="text-gray-700">The Global E-waste Monitor 2024: Advancing sustainable
                                    electronics</em>.
                                United Nations University/United Nations Institute for Training and Research.
                            </p>
                            <div class="mt-3 flex flex-wrap gap-2">
                                <span
                                    class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">Latest
                                    Edition</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">2024</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referencia 3 -->
                <div class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-purple-500"
                    style="animation-delay: 0.2s;">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-purple-700">Méndez, E.</strong> (2024, mayo 16).
                                México genera 1.5 millones de toneladas de basura electrónica al año.
                                <em class="text-gray-700">Excélsior</em>.
                            </p>
                            <div class="mt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">Artículo
                                        Nacional</span>
                                    <span
                                        class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">México</span>
                                </div>
                                <a href="https://www.excelsior.com.mx/nacional/mexico-genera-15-millones-de-toneladas-de-basura-electronica-al-ano/1652456"
                                    class="inline-flex items-center space-x-1 text-purple-600 hover:text-purple-800 font-medium transition-colors group"
                                    target="_blank" rel="noopener noreferrer">
                                    <span class="text-sm">Ver artículo</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referencia 4 -->
                <div class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-orange-500"
                    style="animation-delay: 0.3s;">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-orange-700">Xavier, L. H., Silva, M. B., & Oliveira, R. S.</strong>
                                (2023).
                                Electronic waste management in developing countries: A systematic review of challenges
                                and opportunities.
                                <em class="text-gray-700">Waste Management, 154</em>, 245-258.
                            </p>
                            <div class="mt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full text-xs font-medium">Revista
                                        Académica</span>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">DOI</span>
                                </div>
                                <a href="https://doi.org/10.1016/j.wasman.2022.09.015"
                                    class="inline-flex items-center space-x-1 text-orange-600 hover:text-orange-800 font-medium transition-colors group"
                                    target="_blank" rel="noopener noreferrer">
                                    <span class="text-sm">DOI Link</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referencia 5 -->
                <div class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-red-500"
                    style="animation-delay: 0.4s;">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-red-700">Schwaber, K., & Sutherland, J.</strong> (2020).
                                <em class="text-gray-700">The Scrum Guide: The Definitive Guide to Scrum</em>.
                                Scrum.org and ScrumInc.
                            </p>
                            <div class="mt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-red-100 text-red-800 rounded-full text-xs font-medium">Metodología</span>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Scrum</span>
                                </div>
                                <a href="https://scrumguides.org/scrum-guide.html"
                                    class="inline-flex items-center space-x-1 text-red-600 hover:text-red-800 font-medium transition-colors group"
                                    target="_blank" rel="noopener noreferrer">
                                    <span class="text-sm">Ver guía</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referencia 6 -->
                <div class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-yellow-500"
                    style="animation-delay: 0.5s;">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-yellow-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-yellow-700">Oracle Corporation.</strong> (2023).
                                <em class="text-gray-700">MySQL Documentation: Complete Reference Manual</em>.
                                Oracle Corporation.
                            </p>
                            <div class="mt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">Documentación
                                        Técnica</span>
                                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">MySQL</span>
                                </div>
                                <a href="https://dev.mysql.com/doc/"
                                    class="inline-flex items-center space-x-1 text-yellow-600 hover:text-yellow-800 font-medium transition-colors group"
                                    target="_blank" rel="noopener noreferrer">
                                    <span class="text-sm">Documentación</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Referencia 7 -->
                <div class="slide-in bg-white/90 backdrop-blur-sm rounded-2xl p-4 sm:p-6 shadow-lg hover-lift transition-all duration-300 border-l-4 border-pink-500"
                    style="animation-delay: 0.6s;">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <div class="w-3 h-3 bg-pink-500 rounded-full mt-2 flex-shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-gray-800 leading-relaxed text-sm sm:text-base">
                                <strong class="text-pink-700">Laravel.</strong> (2023).
                                <em class="text-gray-700">Laravel Documentation: The PHP Framework for Web
                                    Artisans</em>.
                                Laravel LLC.
                            </p>
                            <div class="mt-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                <div class="flex flex-wrap gap-2">
                                    <span
                                        class="px-3 py-1 bg-pink-100 text-pink-800 rounded-full text-xs font-medium">Framework
                                        PHP</span>
                                    <span
                                        class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs">Laravel</span>
                                </div>
                                <a href="https://laravel.com/docs"
                                    class="inline-flex items-center space-x-1 text-pink-600 hover:text-pink-800 font-medium transition-colors group"
                                    target="_blank" rel="noopener noreferrer">
                                    <span class="text-sm">Ver docs</span>
                                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

    </main>
    @include('layouts.footer')

    <!-- Scripts mejorados -->
    <script>
        const btn = document.getElementById("menuButton");
        const dropdown = document.getElementById("menuDropdown");
        const chevron = document.getElementById("chevron");

        btn.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();

            const isHidden = dropdown.classList.contains("hidden");

            if (isHidden) {
                dropdown.classList.remove("hidden");
                dropdown.style.opacity = "0";
                dropdown.style.transform = "translateX(-50%) translateY(-10px) scale(0.95)";

                requestAnimationFrame(() => {
                    dropdown.style.transition = "all 0.3s cubic-bezier(0.4, 0, 0.2, 1)";
                    dropdown.style.opacity = "1";
                    dropdown.style.transform = "translateX(-50%) translateY(0) scale(1)";
                });

                chevron.style.transform = "rotate(180deg)";
            } else {
                dropdown.style.opacity = "0";
                dropdown.style.transform = "translateX(-50%) translateY(-10px) scale(0.95)";
                chevron.style.transform = "rotate(0deg)";

                setTimeout(() => {
                    dropdown.classList.add("hidden");
                }, 300);
            }
        });

        // Cerrar al hacer clic fuera
        document.addEventListener("click", (e) => {
            if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
                if (!dropdown.classList.contains("hidden")) {
                    dropdown.style.opacity = "0";
                    dropdown.style.transform = "translateX(-50%) translateY(-10px) scale(0.95)";
                    chevron.style.transform = "rotate(0deg)";

                    setTimeout(() => {
                        dropdown.classList.add("hidden");
                    }, 300);
                }
            }
        });

        // Animaciones de entrada
        window.addEventListener("load", () => {
            const cards = document.querySelectorAll(".card-hover");
            cards.forEach((card, index) => {
                card.style.opacity = "0";
                card.style.transform = "translateY(20px)";

                setTimeout(() => {
                    card.style.transition = "all 0.6s cubic-bezier(0.4, 0, 0.2, 1)";
                    card.style.opacity = "1";
                    card.style.transform = "translateY(0)";
                }, index * 200);
            });
        });

        // Parallax suave para elementos decorativos
        window.addEventListener("scroll", () => {
            const scrolled = window.pageYOffset;
            const decorativeElements = document.querySelectorAll(".floating-animation");

            decorativeElements.forEach((el, index) => {
                const speed = 0.5 + (index * 0.1);
                el.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });
    </script>
</body>

</html>
