<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <title>E-waste - Estadísticas</title>
    <style>
        .chart-container {
            position: relative;
            height: 250px;
        }

        @media (min-width: 640px) {
            .chart-container {
                height: 300px;
            }
        }

        @media (min-width: 768px) {
            .chart-container {
                height: 350px;
            }
        }

        @media (min-width: 1024px) {
            .chart-container {
                height: 400px;
            }
        }

        @media (min-width: 1280px) {
            .chart-container {
                height: 450px;
            }
        }
    </style>
</head>

<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen">
    @include('layouts.nav')

    <main class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-6 sm:py-8 md:py-10 lg:py-12">
        <!-- Hero Section -->
        <div class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-16">
            <h1
                class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-green-800 mb-3 sm:mb-4 lg:mb-6 leading-tight px-2">
                Residuos Electrónicos en México
            </h1>
            <p
                class="text-base sm:text-lg md:text-xl lg:text-xl text-green-700 max-w-3xl mx-auto leading-relaxed px-3 sm:px-4">
                Análisis de la generación y gestión de basura tecnológica en nuestro país
            </p>
        </div>

        <!-- Mexico Stats Hero -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div
                class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl text-white overflow-hidden">
                <div class="grid lg:grid-cols-2 gap-0 items-stretch">
                    <div class="p-4 sm:p-6 md:p-8 lg:p-12">
                        <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-3 sm:mb-4 lg:mb-6">México y
                            los Residuos Electrónicos</h2>
                        <div class="space-y-2 sm:space-y-3 lg:space-y-4">
                            <div class="flex items-center">
                                <div class="bg-white/20 rounded-full p-2 sm:p-2 lg:p-3 mr-3 lg:mr-4 flex-shrink-0">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg sm:text-xl lg:text-2xl font-bold">11.8 kg</p>
                                    <p class="text-green-100 text-xs sm:text-sm lg:text-base">por persona al año</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-white/20 rounded-full p-2 sm:p-2 lg:p-3 mr-3 lg:mr-4 flex-shrink-0">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg sm:text-xl lg:text-2xl font-bold">1.5 millones</p>
                                    <p class="text-green-100 text-xs sm:text-sm lg:text-base">de toneladas anuales</p>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="bg-white/20 rounded-full p-2 sm:p-2 lg:p-3 mr-3 lg:mr-4 flex-shrink-0">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-lg sm:text-xl lg:text-2xl font-bold">3er lugar</p>
                                    <p class="text-green-100 text-xs sm:text-sm lg:text-base">en el continente americano
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center overflow-hidden">
                        <img src="{{ Storage::url('images/index/enmexico.jpg') }}"
                            alt="Residuos electrónicos en México" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </section>

        <!-- Types Section with Chart -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div class="text-center mb-6 sm:mb-8 lg:mb-12">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-800 mb-2 sm:mb-3 lg:mb-4 px-2">
                    Tipos de Basura Tecnológica
                </h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 px-3 sm:px-4">Distribución por categorías según
                    Global E-waste Monitor 2024</p>
            </div>

            <div class="grid xl:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-start">
                <!-- Chart -->
                <div
                    class="bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-4 sm:p-6 lg:p-8 order-2 xl:order-1">
                    <div class="chart-container">
                        <canvas id="wasteTypesChart"></canvas>
                    </div>
                </div>

                <!-- Categories List -->
                <div class="space-y-2 sm:space-y-3 lg:space-y-4 order-1 xl:order-2">
                    <div
                        class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-3 sm:p-4 lg:p-6 border-l-4 border-green-500">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-2">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-green-800 mb-1 sm:mb-0">Equipos
                                pequeños</h3>
                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-green-600">35%</span>
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm lg:text-base">Aspiradoras, microondas, herramientas
                            eléctricas, dispositivos médicos</p>
                    </div>

                    <div
                        class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-3 sm:p-4 lg:p-6 border-l-4 border-emerald-500">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-2">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-green-800 mb-1 sm:mb-0">Equipos
                                grandes</h3>
                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-emerald-600">22%</span>
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm lg:text-base">Lavadoras, secadoras, paneles solares
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-3 sm:p-4 lg:p-6 border-l-4 border-teal-500">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-2">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-green-800 mb-1 sm:mb-0">Equipos de
                                temperatura</h3>
                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-teal-600">17%</span>
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm lg:text-base">Refrigeradores, aires acondicionados,
                            bombas de calor</p>
                    </div>

                    <div
                        class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-3 sm:p-4 lg:p-6 border-l-4 border-lime-500">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-2">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-green-800 mb-1 sm:mb-0">Equipos
                                pequeños de TI</h3>
                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-lime-600">15%</span>
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm lg:text-base">Smartphones, GPS, computadoras,
                            impresoras</p>
                    </div>

                    <div
                        class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-3 sm:p-4 lg:p-6 border-l-4 border-green-400">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-2">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-green-800 mb-1 sm:mb-0">Pantallas
                                y monitores</h3>
                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-green-500">8%</span>
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm lg:text-base">Televisores, monitores, laptops,
                            tablets</p>
                    </div>

                    <div
                        class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-3 sm:p-4 lg:p-6 border-l-4 border-emerald-400">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-2">
                            <h3 class="text-base sm:text-lg lg:text-xl font-bold text-green-800 mb-1 sm:mb-0">Lámparas
                            </h3>
                            <span class="text-lg sm:text-xl lg:text-2xl font-bold text-emerald-500">3%</span>
                        </div>
                        <p class="text-gray-700 text-xs sm:text-sm lg:text-base">LED, fluorescentes, lámparas de
                            descarga</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Generación de E-waste en América -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div class="bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-4 sm:p-6 md:p-8 lg:p-12">
                <div class="text-center mb-6 sm:mb-8 lg:mb-12">
                    <h2
                        class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-800 mb-2 sm:mb-3 lg:mb-4 px-2">
                        Generación de E-waste en América
                    </h2>
                    <p class="text-base sm:text-lg lg:text-xl text-gray-600 px-3 sm:px-4">Comparativa de los principales
                        países generadores</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-center">
                    <div class="bg-gray-50 rounded-lg sm:rounded-xl lg:rounded-2xl p-4 sm:p-6 lg:p-8 w-full">
                        <div class="chart-container w-full h-64 sm:h-72 md:h-80 lg:h-96 xl:h-[400px]">
                            <canvas id="americasChart" class="w-full h-full"></canvas>
                        </div>
                    </div>

                    <div class="space-y-3 sm:space-y-4 lg:space-y-6">
                        <div
                            class="bg-gradient-to-r from-green-500 to-green-600 text-white rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold">🇺🇸 Estados Unidos</h3>
                                    <p class="text-green-100 text-xs sm:text-sm lg:text-base">Líder continental</p>
                                </div>
                                <div class="text-left sm:text-right">
                                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold">7.2</p>
                                    <p class="text-green-100 text-xs sm:text-sm lg:text-base">millones de toneladas</p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold">🇧🇷 Brasil</h3>
                                    <p class="text-emerald-100 text-xs sm:text-sm lg:text-base">Segundo lugar</p>
                                </div>
                                <div class="text-left sm:text-right">
                                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold">2.4</p>
                                    <p class="text-emerald-100 text-xs sm:text-sm lg:text-base">millones de toneladas
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="mb-2 sm:mb-0">
                                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold">🇲🇽 México</h3>
                                    <p class="text-teal-100 text-xs sm:text-sm lg:text-base">Tercer lugar</p>
                                </div>
                                <div class="text-left sm:text-right">
                                    <p class="text-xl sm:text-2xl lg:text-3xl font-bold">1.5</p>
                                    <p class="text-teal-100 text-xs sm:text-sm lg:text-base">millones de toneladas</p>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-100 rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6">
                            <div class="text-center">
                                <p class="text-sm sm:text-base lg:text-lg font-semibold text-gray-700 mb-2">Dato
                                    importante:</p>
                                <p class="text-gray-800 text-xs sm:text-sm lg:text-base">En México solo el <span
                                        class="text-red-600 font-bold text-base sm:text-lg lg:text-xl">4%</span> de los
                                    residuos electrónicos se reciclan adecuadamente</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Crisis del Reciclaje -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div
                class="bg-gradient-to-r from-red-600 to-red-700 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl text-white p-4 sm:p-6 md:p-8 lg:p-12">
                <div class="text-center mb-6 sm:mb-8 lg:mb-12">
                    <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-2 sm:mb-3 lg:mb-4 px-2">Crisis
                        del Reciclaje en México</h2>
                    <p class="text-base sm:text-lg lg:text-xl text-red-100 px-3 sm:px-4">Solo 4% de residuos
                        electrónicos se reciclan correctamente</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-6 sm:gap-8 lg:gap-12 items-center">
                    <div
                        class="bg-white/10 backdrop-blur-sm rounded-lg sm:rounded-xl lg:rounded-2xl p-4 sm:p-6 lg:p-8 w-full">
                        <div class="chart-container w-full h-64 sm:h-72 md:h-80 lg:h-96 xl:h-[400px]">
                            <canvas id="recyclingChart" class="w-full h-full"></canvas>
                        </div>
                    </div>

                    <div class="space-y-3 sm:space-y-4 lg:space-y-6">
                        <div
                            class="bg-white/20 backdrop-blur-sm rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 sm:mb-3 lg:mb-4">⚠️ El Problema
                            </h3>
                            <ul class="space-y-1 sm:space-y-2 text-red-100 text-xs sm:text-sm lg:text-base">
                                <li>• 96% termina en basureros o sitios inadecuados</li>
                                <li>• 11.8 kg per cápita = peso de una Smart TV de 50"</li>
                                <li>• Contaminación de suelos y agua</li>
                                <li>• Pérdida de materiales valiosos</li>
                            </ul>
                        </div>

                        <div
                            class="bg-white/20 backdrop-blur-sm rounded-lg sm:rounded-xl lg:rounded-2xl p-3 sm:p-4 lg:p-6">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-2 sm:mb-3 lg:mb-4">💡 La Oportunidad
                            </h3>
                            <ul class="space-y-1 sm:space-y-2 text-red-100 text-xs sm:text-sm lg:text-base">
                                <li>• Recuperación de metales preciosos</li>
                                <li>• Creación de empleos verdes</li>
                                <li>• Reducción de impacto ambiental</li>
                                <li>• Economía circular</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Regulations Section -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div class="text-center mb-6 sm:mb-8 lg:mb-12">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-800 mb-2 sm:mb-3 lg:mb-4 px-2">
                    Regulaciones Actuales
                </h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 px-3 sm:px-4">Marco normativo internacional y
                    regional</p>
            </div>

            <div class="space-y-3 sm:space-y-4 lg:space-y-6">
                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-green-500">
                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-green-800 mb-2 sm:mb-3 lg:mb-4">🌍 Global
                    </h3>
                    <p class="text-gray-800 leading-relaxed text-xs sm:text-sm lg:text-base">
                        La Convención de Basilea actualizó sus anexos en 2022 para incluir
                        definiciones más específicas de e-waste peligroso y controlar mejor su comercio
                        transfronterizo.
                    </p>
                </div>

                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-emerald-500">
                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-emerald-800 mb-2 sm:mb-3 lg:mb-4">🇪🇺
                        Unión Europea</h3>
                    <p class="text-gray-800 leading-relaxed text-xs sm:text-sm lg:text-base">
                        La Directiva WEEE revisada en 2023 establece objetivos de
                        recolección del 55% para 2025 y nuevos requisitos de trazabilidad digital.
                    </p>
                </div>

                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-teal-500">
                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-teal-800 mb-2 sm:mb-3 lg:mb-4">🇺🇸
                        Estados
                        Unidos</h3>
                    <p class="text-gray-800 leading-relaxed text-xs sm:text-sm lg:text-base">
                        32 estados tienen ahora legislación de e-waste, con California
                        liderando la implementación de "derecho a reparar" para dispositivos electrónicos.
                    </p>
                </div>

                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-lime-500">
                    <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-lime-800 mb-2 sm:mb-3 lg:mb-4">🌎 Mercados
                        emergentes</h3>
                    <p class="text-gray-800 leading-relaxed text-xs sm:text-sm lg:text-base">
                        India implementó reglas extendidas de responsabilidad del
                        productor en 2023, mientras que Brasil lanzó su Sistema Nacional de Gestión de
                        Residuos Electrónicos.
                    </p>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section
            class="text-center bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-6 sm:p-8 lg:p-12 text-white">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-3 sm:mb-4 lg:mb-6 px-2">¡México necesita actuar ya!
            </h2>
            <p class="text-base sm:text-lg lg:text-xl mb-4 sm:mb-6 lg:mb-8 max-w-2xl mx-auto px-3 sm:px-4">
                Con solo 4% de reciclaje, tenemos una enorme oportunidad de mejora para proteger nuestro medio ambiente.
            </p>
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 lg:gap-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-3 py-2 sm:px-4 sm:py-2 lg:px-6 lg:py-3">
                    <span class="font-semibold text-xs sm:text-sm lg:text-base">🏭 Crear más centros de
                        reciclaje</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-3 py-2 sm:px-4 sm:py-2 lg:px-6 lg:py-3">
                    <span class="font-semibold text-xs sm:text-sm lg:text-base">📚 Educación ambiental</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-3 py-2 sm:px-4 sm:py-2 lg:px-6 lg:py-3">
                    <span class="font-semibold text-xs sm:text-sm lg:text-base">⚖️ Regulaciones más estrictas</span>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')

    <script>
        // Función para obtener configuración responsiva
        function getResponsiveConfig() {
            const width = window.innerWidth;
            return {
                legendPosition: width < 768 ? 'bottom' : 'right',
                fontSize: width < 480 ? 10 : width < 768 ? 11 : 12,
                titleSize: width < 480 ? 14 : width < 768 ? 16 : 18,
                padding: width < 480 ? 10 : width < 768 ? 15 : 20,
                aspectRatio: width < 768 ? 1.2 : 2
            };
        }

        // Configuración común para todas las gráficas
        function getCommonOptions(config) {
            return {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: config.legendPosition,
                        labels: {
                            font: {
                                size: config.fontSize
                            },
                            padding: config.padding,
                            usePointStyle: true,
                            boxWidth: window.innerWidth < 480 ? 12 : 20
                        }
                    },
                    tooltip: {
                        titleFont: {
                            size: config.fontSize
                        },
                        bodyFont: {
                            size: config.fontSize - 1
                        },
                        padding: config.padding
                    }
                },
                layout: {
                    padding: {
                        top: config.padding,
                        bottom: config.padding,
                        left: config.padding / 2,
                        right: config.padding / 2
                    }
                }
            };
        }

        // Gráfica de tipos de residuos (Doughnut)
        function createWasteTypesChart() {
            const ctx = document.getElementById('wasteTypesChart');
            if (!ctx) return;

            const config = getResponsiveConfig();

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        'Equipos pequeños',
                        'Equipos grandes',
                        'Equipos de temperatura',
                        'Equipos pequeños de TI',
                        'Pantallas y monitores',
                        'Lámparas'
                    ],
                    datasets: [{
                        data: [35, 22, 17, 15, 8, 3],
                        backgroundColor: [
                            '#10b981', // green-500
                            '#059669', // emerald-600
                            '#0d9488', // teal-600
                            '#65a30d', // lime-600
                            '#22c55e', // green-500
                            '#34d399' // emerald-400
                        ],
                        borderWidth: window.innerWidth < 480 ? 1 : 2,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    ...getCommonOptions(config),
                    cutout: window.innerWidth < 480 ? '50%' : '60%',
                    plugins: {
                        ...getCommonOptions(config).plugins,
                        legend: {
                            ...getCommonOptions(config).plugins.legend,
                            display: window.innerWidth >= 480
                        },
                        tooltip: {
                            ...getCommonOptions(config).plugins.tooltip,
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Gráfica de comparación de América (Bar)
        function createAmericasChart() {
            const ctx = document.getElementById('americasChart');
            if (!ctx) return;

            const config = getResponsiveConfig();

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Estados Unidos', 'Brasil', 'México', 'Argentina', 'Canadá'],
                    datasets: [{
                        label: 'Millones de toneladas',
                        data: [7.2, 2.4, 1.5, 0.8, 0.7],
                        backgroundColor: [
                            '#10b981', // green-500
                            '#059669', // emerald-600
                            '#0d9488', // teal-600
                            '#65a30d', // lime-600
                            '#22c55e' // green-500
                        ],
                        borderRadius: window.innerWidth < 480 ? 4 : 8,
                        borderSkipped: false,
                    }]
                },
                options: {
                    ...getCommonOptions(config),
                    indexAxis: window.innerWidth < 768 ? 'y' : 'x',
                    scales: {
                        x: {
                            display: window.innerWidth >= 768,
                            ticks: {
                                font: {
                                    size: config.fontSize
                                }
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            ticks: {
                                font: {
                                    size: config.fontSize
                                }
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        }
                    },
                    plugins: {
                        ...getCommonOptions(config).plugins,
                        legend: {
                            display: false
                        },
                        tooltip: {
                            ...getCommonOptions(config).plugins.tooltip,
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y || context.parsed.x + ' millones de toneladas';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Gráfica de reciclaje (Pie)
        function createRecyclingChart() {
            const ctx = document.getElementById('recyclingChart');
            if (!ctx) return;

            const config = getResponsiveConfig();

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Reciclado correctamente', 'Mal gestionado'],
                    datasets: [{
                        data: [4, 96],
                        backgroundColor: [
                            '#22c55e', // green-500
                            '#ef4444' // red-500
                        ],
                        borderWidth: window.innerWidth < 480 ? 2 : 3,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    ...getCommonOptions(config),
                    plugins: {
                        ...getCommonOptions(config).plugins,
                        legend: {
                            ...getCommonOptions(config).plugins.legend,
                            position: 'bottom',
                            labels: {
                                ...getCommonOptions(config).plugins.legend.labels,
                                color: '#ffffff'
                            }
                        },
                        tooltip: {
                            ...getCommonOptions(config).plugins.tooltip,
                            callbacks: {
                                label: function(context) {
                                    return context.label + ': ' + context.parsed + '%';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Función para redimensionar todas las gráficas
        function resizeCharts() {
            Chart.helpers.each(Chart.instances, function(instance) {
                instance.resize();
            });
        }

        // Event listeners
        document.addEventListener('DOMContentLoaded', function() {
            // Crear gráficas con un pequeño delay para asegurar que el DOM esté listo
            setTimeout(() => {
                createWasteTypesChart();
                createAmericasChart();
                createRecyclingChart();
            }, 100);
        });

        // Redimensionar gráficas cuando cambie el tamaño de la ventana
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                // Destruir y recrear las gráficas para aplicar nueva configuración responsiva
                Chart.helpers.each(Chart.instances, function(instance) {
                    instance.destroy();
                });

                setTimeout(() => {
                    createWasteTypesChart();
                    createAmericasChart();
                    createRecyclingChart();
                }, 100);
            }, 250);
        });

        // Función adicional para optimizar rendimiento en móviles
        function optimizeForMobile() {
            const isMobile = window.innerWidth < 768;

            if (isMobile) {
                // Reducir animaciones en móviles para mejor rendimiento
                Chart.defaults.animation.duration = 500;
                Chart.defaults.transitions.active.animation.duration = 300;
            } else {
                // Restaurar animaciones normales en desktop
                Chart.defaults.animation.duration = 1000;
                Chart.defaults.transitions.active.animation.duration = 400;
            }
        }

        // Llamar la optimización al cargar
        document.addEventListener('DOMContentLoaded', optimizeForMobile);
        window.addEventListener('resize', optimizeForMobile);
    </script>
</body>

</html>
