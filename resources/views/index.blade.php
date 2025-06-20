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
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen">
    @include('layouts.nav')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-green-800 mb-6 leading-tight">
                Basura Tecnológica
            </h1>
            <p class="text-xl text-green-700 max-w-3xl mx-auto leading-relaxed mb-8">
                Conoce el impacto ambiental de los desechos electrónicos y cómo podemos contribuir a un futuro más
                sostenible
            </p>

            <!-- Nueva imagen con modal -->
            <div class="max-w-2xl mx-auto mb-8">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden image-hover"
                    onclick="openModal('infoModal')">
                    <img src="https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?w=800&h=400&fit=crop"
                        alt="Panorama general de desechos electrónicos" class="w-full h-64 object-cover">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <span class="text-white text-lg font-semibold bg-black bg-opacity-50 px-6 py-3 rounded-full">
                            🔍 Descubre más sobre el E-waste
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- What is E-waste Section -->
        <section class="mb-20">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid lg:grid-cols-2 gap-0 min-h-[400px]">
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <h2 class="text-3xl font-bold text-green-800 mb-6">
                            ¿Qué es la basura tecnológica?
                        </h2>
                        <p class="text-green-700 leading-relaxed text-lg mb-6">
                            La basura electrónica, a menudo conocida como E-waste es un tipo de basura generada por la
                            electrónica en el mundo industrial, un tipo de basura que se genera cuando un dispositivo ya
                            sea teléfonos, tablets, computadoras, impresoras y entre una gran variedad de estos llegan
                            al fin de su vida útil dejando rastros de contaminación.
                        </p>
                        <p class="text-green-700 leading-relaxed text-lg">
                            Normalmente contiene una serie de componentes peligrosos que tienen un gran impacto al medio
                            ambiente afectando incluso a la salud humana ya que al no tener un lugar para su reciclaje o
                            desecho terminan contaminando.
                        </p>
                    </div>
                    <div class="relative">
                        <img src="{{ Storage::url('images/index/basura_tecnologica.jpg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Causes Section -->
        <section class="mb-20">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid lg:grid-cols-2 gap-0 min-h-[400px]">
                    <div class="relative">
                        <img src="{{ Storage::url('images/index/basura_tecnologica2.jpeg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-8 lg:p-12 flex flex-col justify-center order-1 lg:order-2">
                        <h2 class="text-3xl font-bold text-green-800 mb-6">
                            Causas de generación de la Basura Tecnológica
                        </h2>
                        <p class="text-green-700 leading-relaxed text-lg mb-6">
                            Generalmente la basura tecnológica se genera a partir del fin de la vida útil de un
                            dispositivo electrónico donde este no es depositado en un sitio adecuado, donado
                            o vendido para su reparación, esta llega a zonas como ríos, basureros o quedar
                            almacenados en lugares no adecuados.
                        </p>
                        <p class="text-green-700 leading-relaxed text-lg">
                            Mucha de esta basura contiene sustancias
                            tóxicas, metales pesados, componentes electrónicos, electromagnéticos y muy
                            contaminantes como pueden ser las baterías, microondas, impresoras, teclados y
                            adaptadores de corriente.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Types Section -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-green-800 mb-4">
                    Tipos de Basura Tecnológica
                </h2>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48">
                        <img src="{{ Storage::url('images/index/aire_acondicionado.jpeg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-green-800 mb-3">Equipos de temperatura</h3>
                        <p class="text-gray-600 mb-2"><strong>17%</strong></p>
                        <p class="text-green-700">Refrigeradores, aires acondicionados, bombas de calor</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48">
                        <img src="{{ Storage::url('images/index/monitores.jpeg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-green-800 mb-3">Pantallas y monitores</h3>
                        <p class="text-gray-600 mb-2"><strong>8%</strong></p>
                        <p class="text-green-700">Televisores, monitores, laptops, tablets</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48">
                        <img src="{{ Storage::url('images/index/lavadoras.jpeg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-green-800 mb-3">Equipos grandes</h3>
                        <p class="text-gray-600 mb-2"><strong>22%</strong></p>
                        <p class="text-green-700">Lavadoras, secadoras, paneles solares</p>
                    </div>
                </div>

                <div
                    class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48">
                        <img src="{{ Storage::url('images/index/lamparas.jpeg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-green-800 mb-3">Lámparas</h3>
                        <p class="text-gray-600 mb-2"><strong>3%</strong></p>
                        <p class="text-green-700">LED, fluorescentes, lámparas de descarga</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Environmental Impact Section -->
        <section class="mb-20">
            <div
                class="bg-gradient-to-r from-green-800 to-emerald-700 rounded-3xl shadow-xl text-white overflow-hidden">
                <div class="grid lg:grid-cols-2 gap-0 min-h-[400px]">
                    <div class="p-8 lg:p-12 flex flex-col justify-center">
                        <h2 class="text-3xl font-bold mb-6">
                            Impactos Ambientales
                        </h2>
                        <p class="leading-relaxed text-lg mb-6 text-green-100">
                            La basura tecnológica contiene metales pesados
                            (plomo y mercurio principalmente), sustancias tóxicas lo que sumado al manejo
                            inadecuado contamina suelos y aguas subterráneas.
                        </p>
                        <p class="leading-relaxed text-lg text-green-100">
                            Si estos se queman contamina
                            el aire y tienen una significante contribución a la huella de carbono global y
                            degradación de ecosistemas.
                        </p>
                    </div>
                    <div class="relative">
                        <img src="{{ Storage::url('images/index/enmexico.jpg') }}" alt=""
                            class="absolute inset-0 w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-l from-transparent to-green-800/20"></div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section class="mb-20">
            <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-12">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-green-800 mb-4">
                        Global E-waste Monitor 2024
                    </h2>
                    <p class="text-xl text-gray-600">Estadísticas globales sobre residuos electrónicos</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div class="text-center p-6 bg-green-50 rounded-2xl">
                        <div class="text-4xl font-bold text-green-600 mb-2">62Mt</div>
                        <div class="text-green-800 font-semibold mb-2">Generación global 2022</div>
                        <div class="text-gray-600 text-sm">Proyección 82 Mt para 2030</div>
                    </div>

                    <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                        <div class="text-4xl font-bold text-emerald-600 mb-2">5%</div>
                        <div class="text-emerald-800 font-semibold mb-2">Crecimiento anual</div>
                        <div class="text-gray-600 text-sm">2.6 Mt por año</div>
                    </div>

                    <div class="text-center p-6 bg-green-50 rounded-2xl">
                        <div class="text-4xl font-bold text-green-600 mb-2">22.3%</div>
                        <div class="text-green-800 font-semibold mb-2">Tasa de reciclaje</div>
                        <div class="text-gray-600 text-sm">Recolectado y reciclado formalmente</div>
                    </div>

                    <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                        <div class="text-4xl font-bold text-emerald-600 mb-2">$62B</div>
                        <div class="text-emerald-800 font-semibold mb-2">Valor perdido</div>
                        <div class="text-gray-600 text-sm">En materiales recuperables</div>
                    </div>

                    <div class="text-center p-6 bg-green-50 rounded-2xl">
                        <div class="text-4xl font-bold text-green-600 mb-2">26kg</div>
                        <div class="text-green-800 font-semibold mb-2">Líder per cápita</div>
                        <div class="text-gray-600 text-sm">Noruega por habitante</div>
                    </div>

                    <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                        <div class="text-4xl font-bold text-emerald-600 mb-2">34.2Mt</div>
                        <div class="text-emerald-800 font-semibold mb-2">Asia lidera</div>
                        <div class="text-gray-600 text-sm">Seguida por Europa (13.8 Mt)</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Regulations Section -->
        <section class="mb-20">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-green-800 mb-4">
                    Regulaciones Actuales
                </h2>
                <p class="text-xl text-gray-600">Marco normativo internacional y regional</p>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-green-500">
                    <h3 class="text-2xl font-bold text-green-800 mb-4">🌍 Global</h3>
                    <p class="text-gray-700 leading-relaxed">
                        La Convención de Basilea actualizó sus anexos en 2022 para incluir
                        definiciones más específicas de e-waste peligroso y controlar mejor su comercio
                        transfronterizo.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-emerald-500">
                    <h3 class="text-2xl font-bold text-emerald-800 mb-4">🇪🇺 Unión Europea</h3>
                    <p class="text-gray-700 leading-relaxed">
                        La Directiva WEEE revisada en 2023 establece objetivos de
                        recolección del 55% para 2025 y nuevos requisitos de trazabilidad digital.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-green-500">
                    <h3 class="text-2xl font-bold text-green-800 mb-4">🇺🇸 Estados Unidos</h3>
                    <p class="text-gray-700 leading-relaxed">
                        32 estados tienen ahora legislación de e-waste, con California
                        liderando la implementación de "derecho a reparar" para dispositivos electrónicos.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 border-l-4 border-emerald-500">
                    <h3 class="text-2xl font-bold text-emerald-800 mb-4">🌏 Mercados emergentes</h3>
                    <p class="text-gray-700 leading-relaxed">
                        India implementó reglas extendidas de responsabilidad del
                        productor en 2023, mientras que Brasil lanzó su Sistema Nacional de Gestión de
                        Residuos Electrónicos.
                    </p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section
            class="text-center bg-gradient-to-r from-green-600 to-emerald-600 rounded-3xl shadow-xl p-12 text-white">
            <h2 class="text-3xl font-bold mb-6">¡Únete al cambio!</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Cada acción cuenta para reducir el impacto de los desechos electrónicos en nuestro planeta.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3">
                    <span class="font-semibold">♻️ Recicla responsablemente</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3">
                    <span class="font-semibold">🔧 Repara antes de reemplazar</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-6 py-3">
                    <span class="font-semibold">🎁 Dona equipos funcionales</span>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal -->
    <div id="infoModal" class="fixed inset-0 bg-black bg-opacity-50 modal hidden z-50"
        onclick="closeModal('infoModal')">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-3xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-hidden modal-content"
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
                        <p class="text-green-200 text-lg">Un problema que crece cada año</p>
                    </div>
                </div>

                <!-- Contenido del Modal -->
                <div class="p-8 overflow-y-auto max-h-96">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-2xl font-bold text-green-800 mb-4">📱 Dispositivos a recibir</h4>
                            <div class="space-y-3">
                                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded">
                                    <p class="text-red-900"><strong>Tecnologicos simples:</strong> </p>
                                    <li class="text-gray-800"><strong>Tijeras</strong> </li>
                                    <li class="text-gray-800"><strong>Cubiertos metálicos
                                            (cucharas, tenedore, cuchillos)</strong> </li>
                                    <li class="text-gray-800"><strong> Herramientas mecánicas
                                            (pinzas, martillos
                                            desarmadores, llaves, etc.)</strong> </li>
                                    <li class="text-gray-800"><strong> Chapas</strong> </li>
                                    <li class="text-gray-800"><strong>Llaves de puertas y de agua</strong> </li>
                                    <li class="text-gray-800"><strong>Monedas antiguas</strong> </li>
                                    <li class="text-gray-800"><strong> Trastes de aluminio y peltre.</strong> </li>
                                    <li class="text-gray-800"><strong>Padecería de sillas
                                            metálicas.</strong> </li>
                                </div>
                                <div class="bg-orange-50 border-l-4 border-orange-400 p-4 rounded">
                                    <li class="text-orange-900"> <strong>Tecnologicos compuestos</strong></li>
                                    <li class="text-yellow-800"> <strong>Monitores de computadoras</strong></li>
                                    <li class="text-yellow-800"> <strong>C.P.U. </strong></li>
                                    <li class="text-yellow-800"> <strong>Televisores antiguos</strong></li>
                                    <li class="text-yellow-800"> <strong> Pantallas de computadora y TV</strong></li>
                                    <li class="text-yellow-800"> <strong> Laptops</strong></li>
                                    <li class="text-yellow-800"> <strong> Tablets</strong></li>
                                    <li class="text-yellow-800"> <strong> Multifuncionales, Impresoras, copiadora,
                                            escaner</strong></li>
                                    <li class="text-yellow-800"> <strong>Máquina de escribir eléctrica y
                                            mecánica</strong></li>
                                    <li class="text-yellow-800"> <strong>Cámara fotográfica</strong></li>
                                    <li class="text-yellow-800"> <strong>Teclados</strong></li>
                                    <li class="text-yellow-800"> <strong> control remoto</strong></li>
                                    <li class="text-yellow-800"> <strong>Modulares, Estéreos, tocadiscos,
                                            videocasetera, radios, grabadoras.</strong></li>
                                    <li class="text-yellow-800"> <strong>Herramientas de motor (taladro, esmeril,
                                            desbrozadora, cortadora, bomba de agua, podadora,sierra eléctrica</strong>
                                    </li>
                                    <li class="text-yellow-800"> <strong>Electrodomésticos. (Planchas, lavadoras,
                                            estufas Hornos de microondas, licuadoras, ventiladores)</strong></li>
                                    <li class="text-yellow-800"> <strong>Juguetes electrónicos.</strong></li>
                                    <li class="text-yellow-800"> <strong> Extensiones, cables normales de plástico.
                                        </strong></li>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-2xl font-bold text-green-800 mb-4">Lugar y Horario</h4>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <span class="text-2xl mr-3">🏫</span>
                                    <div>
                                        <h2 class="font-semibold text-gray-800">CBTis No. 150.</h2>

                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <span class="text-2xl mr-3">📅</span>
                                    <div>
                                        <h2 class="font-semibold text-gray-800">26 de junio 2025.</h2>

                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <span class="text-2xl mr-3">🕒</span>
                                    <div>
                                        <h2 class="font-semibold text-gray-800">De 9:00 A 13:00 hrs.</h2>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('layouts.footer')
    
    <script>
        function openModal(modalId) {
            document.getElementById(modalId).classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Cerrar modal con tecla Escape
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeModal('infoModal');
            }
        });
    </script>
    <script>
        window.addEventListener('load', function() {
            // Quita la clase 'hidden' para mostrar el modal al cargar
            document.getElementById('infoModal').classList.remove('hidden');
        });

        function cerrarModal() {
            // Vuelve a ocultar el modal
            document.getElementById('infoModal').classList.add('hidden');
        }
    </script>

</body>

</html>
