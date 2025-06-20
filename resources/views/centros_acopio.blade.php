<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>E-waste Oaxaca - Gestión Local de Residuos Electrónicos</title>
</head>

<body class="min-h-screen bg-gray-900">
    @include('layouts.nav')

    <main class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6 lg:px-8 py-6 sm:py-8 md:py-10 lg:py-12">
        <!-- Hero Section -->
        <div class="text-center mb-8 sm:mb-10 md:mb-12 lg:mb-16">
            <h1
                class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-green-800 mb-3 sm:mb-4 lg:mb-6 leading-tight px-2">
                Gestión de E-waste en Oaxaca
            </h1>
            <p
                class="text-base sm:text-lg md:text-xl lg:text-xl text-green-700 max-w-3xl mx-auto leading-relaxed px-3 sm:px-4">
                Centros de acopio y regulaciones para residuos electrónicos desde el nivel local hasta nacional
            </p>
        </div>

        <!-- Nivel Local Section -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div
                class="bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl text-white p-4 sm:p-6 md:p-8 lg:p-12">
                <div class="grid lg:grid-cols-2 gap-4 sm:gap-6 lg:gap-8 items-start">
                    <div>
                        <h2
                            class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-3 sm:mb-4 lg:mb-6 flex items-center">
                            🏘️ Nivel Local
                            <span
                                class="ml-3 text-base sm:text-lg font-normal bg-white/20 px-3 py-1 rounded-full">Ocotlán
                                de Morelos</span>
                        </h2>
                        <p class="text-green-100 leading-relaxed mb-4 sm:mb-6 text-sm sm:text-base lg:text-lg">
                            Aunque en la localidad de Ocotlán de Morelos, Oaxaca, apenas existan centros especializados
                            en el manejo de e-waste, existen campañas de concientización como las Yardas Rosas y en
                            localidades cercanas hay centros de acopio regulados.
                        </p>
                    </div>

                    <div
                        class="bg-white/10 backdrop-blur-sm rounded-xl lg:rounded-2xl p-4 sm:p-6 lg:p-8 flex items-center justify-center min-h-[150px] sm:min-h-[200px] lg:min-h-[250px]">
                        <div class="text-center">
                            <svg class="w-12 h-12 sm:w-16 sm:h-16 lg:w-20 lg:h-20 mx-auto mb-3 sm:mb-4"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <p class="text-sm sm:text-base font-medium">E-waste Oaxaca</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Centros de Acopio Cercanos -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div class="text-center mb-6 sm:mb-8 lg:mb-12">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-800 mb-2 sm:mb-3 lg:mb-4 px-2">
                    Centros de Acopio Cercanos
                </h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 px-3 sm:px-4">Opciones disponibles en
                    localidades vecinas</p>
            </div>

            <div class="grid md:grid-cols-2 gap-4 sm:gap-6 lg:gap-8">
                <!-- Santa María Coyotepec -->
                <div
                    class="bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-4 sm:p-6 lg:p-8 border-l-4 border-green-500">
                    <div class="flex items-start mb-4">
                        <div class="bg-green-100 rounded-full p-2 sm:p-3 mr-3 lg:mr-4 flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-green-800 mb-2">Santa María
                                Coyotepec</h3>
                            <p class="text-gray-700 text-sm sm:text-base mb-3">Planta de reciclaje especializada</p>
                        </div>
                    </div>

                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 text-gray-500 mr-2 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                            </svg>
                            <span class="text-gray-600">Cinco de Mayo No. 1, Santa María Coyotepec, Oaxaca</span>
                        </div>
                        <div class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 text-gray-500 mr-2 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <span class="text-gray-600">951 569 0184</span>
                        </div>
                        <div class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 text-gray-500 mr-2 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                            <span class="text-gray-600">Contacto: Ing. Alberto Cisneros Morales</span>
                        </div>
                        <a href="https://oaxacarecicla.blogspot.com/p/acopio.html"
                            class="inline-flex items-center text-green-600 hover:text-green-700 text-sm sm:text-base font-medium mt-2">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                            </svg>
                            Más información
                        </a>
                    </div>
                </div>

                <!-- Villa de Zaachila -->
                <div
                    class="bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-4 sm:p-6 lg:p-8 border-l-4 border-emerald-500">
                    <div class="flex items-start mb-4">
                        <div class="bg-emerald-100 rounded-full p-2 sm:p-3 mr-3 lg:mr-4 flex-shrink-0">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-emerald-800 mb-2">Villa de Zaachila
                            </h3>
                            <p class="text-gray-700 text-sm sm:text-base mb-3">Centro de acopio regional</p>
                        </div>
                    </div>

                    <div class="space-y-2 sm:space-y-3">
                        <div class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 text-gray-500 mr-2 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                            </svg>
                            <span class="text-gray-600">Guelache 301, San Sebastián, Villa de Zaachila, Oaxaca</span>
                        </div>
                        <div class="flex items-center text-sm sm:text-base">
                            <svg class="w-4 h-4 text-gray-500 mr-2 flex-shrink-0" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path
                                    d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                            </svg>
                            <span class="text-gray-600">951 394 5266</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nivel Estatal -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div
                class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl text-white p-4 sm:p-6 md:p-8 lg:p-12">
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 text-center">
                    🏛️ Nivel Estatal - Estado de Oaxaca
                </h2>

                <div class="grid lg:grid-cols-2 gap-6 sm:gap-8">
                    <!-- Oaxaca Verde -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl lg:rounded-2xl p-4 sm:p-6 lg:p-8">
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4">🌱 Oaxaca Verde</h3>
                        <div class="space-y-2 sm:space-y-3">
                            <div class="flex items-center text-sm sm:text-base">
                                <svg class="w-4 h-4 text-emerald-200 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                </svg>
                                <span class="text-emerald-100">Av. Ferrocarril S/N, entre Crespo y Morelos, Eucaliptos,
                                    Oaxaca de Juárez</span>
                            </div>
                            <a href="https://oaxacaverde.com.mx/"
                                class="inline-flex items-center text-emerald-200 hover:text-white text-sm sm:text-base font-medium">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M19 19H5V5h7V3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2v-7h-2v7zM14 3v2h3.59l-9.83 9.83 1.41 1.41L19 6.41V10h2V3h-7z" />
                                </svg>
                                oaxacaverde.com.mx
                            </a>
                        </div>
                    </div>

                    <!-- Centro RAEE -->
                    <div class="bg-white/10 backdrop-blur-sm rounded-xl lg:rounded-2xl p-4 sm:p-6 lg:p-8">
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold mb-3 sm:mb-4">♻️ Centro RAEE</h3>
                        <div class="space-y-2 sm:space-y-3">
                            <div class="flex items-start text-sm sm:text-base">
                                <svg class="w-4 h-4 text-emerald-200 mr-2 mt-1 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                </svg>
                                <span class="text-emerald-100">Carretera a Puerto Ángel, Col. Guillermo González
                                    Guardado</span>
                            </div>
                            <div class="flex items-center text-sm sm:text-base">
                                <svg class="w-4 h-4 text-emerald-200 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                </svg>
                                <span class="text-emerald-100">Contacto: Sr. Abelardo Castro</span>
                            </div>
                            <div class="flex items-center text-sm sm:text-base">
                                <svg class="w-4 h-4 text-emerald-200 mr-2 flex-shrink-0" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                                </svg>
                                <span class="text-emerald-100">951 168 0570</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Nivel Nacional -->
        <section class="mb-8 sm:mb-12 md:mb-16 lg:mb-20">
            <div class="text-center mb-6 sm:mb-8 lg:mb-12">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-bold text-green-800 mb-2 sm:mb-3 lg:mb-4 px-2">
                    🇲🇽 Nivel Nacional - México
                </h2>
                <p class="text-base sm:text-lg lg:text-xl text-gray-600 px-3 sm:px-4">Marco regulatorio y empresas
                    líderes en gestión de e-waste</p>
            </div>

            <!-- Empresa Líder -->
            <div
                class="bg-white rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-4 sm:p-6 lg:p-8 mb-6 sm:mb-8 border-l-4 border-blue-500">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 rounded-full p-2 sm:p-3 mr-3 lg:mr-4 flex-shrink-0">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-blue-800">🏢 REMSA</h3>
                        <p class="text-gray-700 text-sm sm:text-base">Empresa mexicana socialmente sustentable líder en
                            equipos electrónicos</p>
                    </div>
                </div>
            </div>

            <!-- Regulaciones -->
            <div class="space-y-4 sm:space-y-6">
                <h3 class="text-lg sm:text-xl lg:text-2xl font-bold text-green-800 mb-4 text-center">
                    ⚖️ Marco Regulatorio Nacional
                </h3>

                <!-- LGPGIR -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-green-500">
                    <div class="flex items-start mb-3">
                        <div class="bg-green-100 rounded-full p-2 mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-green-800 mb-2">
                                Ley General para la Prevención y Gestión Integral de los Residuos (LGPGIR) - 2003
                            </h4>
                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                                Regula el manejo de residuos, incluyendo la basura electrónica. Clasifica los aparatos
                                electrónicos como residuos de manejo especial y obliga a tratarlos adecuadamente para
                                evitar contaminación.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- NOM-161 -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-emerald-500">
                    <div class="flex items-start mb-3">
                        <div class="bg-emerald-100 rounded-full p-2 mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-emerald-800 mb-2">
                                NOM-161-SEMARNAT-2011
                            </h4>
                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                                Exige a las empresas que fabrican o venden electrónicos presentar planes para
                                recolectarlos y reciclarlos al final de su vida útil. Ayuda a reducir la acumulación de
                                residuos tecnológicos.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Convenio de Basilea -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-teal-500">
                    <div class="flex items-start mb-3">
                        <div class="bg-teal-100 rounded-full p-2 mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-teal-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-teal-800 mb-2">
                                Convenio de Basilea - Firmado 1989, Ratificado 1991
                            </h4>
                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                                Prohíbe la importación ilegal de basura electrónica de otros países, protegiendo el
                                medio ambiente y la salud pública nacional.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Referencia Internacional -->
                <div
                    class="bg-white rounded-lg sm:rounded-xl lg:rounded-2xl shadow-lg p-4 sm:p-6 lg:p-8 border-l-4 border-blue-500">
                    <div class="flex items-start mb-3">
                        <div class="bg-blue-100 rounded-full p-2 mr-3 flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base sm:text-lg font-bold text-blue-800 mb-2">
                                🇪🇺 Directiva RAEE - Unión Europea (2003) - Referencia Internacional
                            </h4>
                            <p class="text-gray-700 text-sm sm:text-base leading-relaxed">
                                Aunque no aplica en México, obliga a los fabricantes europeos a reciclar sus productos.
                                Sirve de modelo para mejorar las políticas de reciclaje electrónico en nuestro país.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section
            class="text-center bg-gradient-to-r from-green-600 to-emerald-600 rounded-xl sm:rounded-2xl lg:rounded-3xl shadow-xl p-6 sm:p-8 lg:p-12 text-white">
            <h2 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-3 sm:mb-4 lg:mb-6 px-2">
                🌟 Impacto de las Regulaciones
            </h2>
            <p
                class="text-base sm:text-lg lg:text-xl mb-4 sm:mb-6 lg:mb-8 max-w-4xl mx-auto px-3 sm:px-4 leading-relaxed">
                Estas leyes ayudan a controlar, reducir y reciclar la basura electrónica, protegiendo tanto al medio
                ambiente como a las personas en todos los niveles: local, estatal y nacional.
            </p>
            <div class="flex flex-wrap justify-center gap-2 sm:gap-3 lg:gap-4">
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-3 py-2 sm:px-4 sm:py-2 lg:px-6 lg:py-3">
                    <span class="font-semibold text-xs sm:text-sm lg:text-base">🛡️ Protección ambiental</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-3 py-2 sm:px-4 sm:py-2 lg:px-6 lg:py-3">
                    <span class="font-semibold text-xs sm:text-sm lg:text-base">♻️ Reciclaje responsable</span>
                </div>
                <div class="bg-white/20 backdrop-blur-sm rounded-full px-3 py-2 sm:px-4 sm:py-2 lg:px-6 lg:py-3">
                    <span class="font-semibold text-xs sm:text-sm lg:text-base">🌍 Salud pública</span>
                </div>
            </div>
        </section>
    </main>

    @include('layouts.footer')
</body>

</html>
