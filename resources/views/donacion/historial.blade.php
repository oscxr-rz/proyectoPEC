<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Historial de Donaciones</title>
</head>
<body class="bg-gradient-to-br from-slate-900 via-gray-900 to-slate-800 min-h-screen">
    @include('layouts.nav')
    
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-emerald-600 to-teal-600 rounded-full mb-6 shadow-2xl">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <h1 class="text-5xl font-bold bg-gradient-to-r from-emerald-400 via-teal-500 to-green-600 bg-clip-text text-transparent mb-4">
                Historial de Donaciones
            </h1>
            <div class="w-32 h-1 bg-gradient-to-r from-emerald-500 to-teal-600 mx-auto rounded-full mb-4"></div>
            <p class="text-gray-300 text-lg">Tu impacto positivo en la comunidad</p>
        </div>

        @if (!empty($historial))
            <div class="space-y-8">
                @foreach ($historial as $donacion)
                    <div class="bg-gradient-to-br from-slate-800/90 to-gray-800/90 backdrop-blur-sm rounded-3xl border border-gray-700/50 shadow-2xl overflow-hidden transform hover:scale-105 transition-all duration-300">
                        <!-- Header de la donación -->
                        <div class="bg-gradient-to-r from-emerald-600/20 via-teal-600/20 to-green-600/20 border-b border-gray-700/50 px-8 py-6">
                            <div class="flex items-center justify-between flex-wrap gap-4">
                                <div>
                                    <h3 class="text-2xl font-bold text-emerald-300 mb-2">
                                        Donación #{{ $donacion['id_donacion'] }}
                                    </h3>
                                    <div class="flex items-center space-x-6 text-gray-300 flex-wrap">
                                        <span class="flex items-center bg-slate-700/50 px-3 py-2 rounded-lg">
                                            <svg class="w-5 h-5 mr-2 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $donacion['fecha_donacion'] }}
                                        </span>
                                        <span class="flex items-center bg-slate-700/50 px-3 py-2 rounded-lg">
                                            <svg class="w-5 h-5 mr-2 text-teal-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $donacion['cantidad_dispositivos'] }} dispositivos
                                        </span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    @if ($donacion['estado'] == 'Recibida')
                                        <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium bg-gradient-to-r from-emerald-600/20 to-green-600/20 border border-emerald-500/30 text-emerald-300 shadow-lg">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            {{ $donacion['estado'] }}
                                        </span>
                                    @elseif ($donacion['estado'] == 'En proceso')
                                        <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium bg-gradient-to-r from-blue-600/20 to-indigo-600/20 border border-blue-500/30 text-blue-300 shadow-lg">
                                            <div class="w-2 h-2 bg-blue-400 rounded-full mr-2 animate-pulse"></div>
                                            {{ $donacion['estado'] }}
                                        </span>
                                    @elseif ($donacion['estado'] == 'Pendiente')
                                        <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium bg-gradient-to-r from-yellow-600/20 to-orange-600/20 border border-yellow-500/30 text-yellow-300 shadow-lg">
                                            <div class="w-2 h-2 bg-yellow-400 rounded-full mr-2"></div>
                                            {{ $donacion['estado'] }}
                                        </span>
                                    @elseif ($donacion['estado'] == 'Cancelada')
                                        <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium bg-gradient-to-r from-red-600/20 to-red-700/20 border border-red-500/30 text-red-300 shadow-lg">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            {{ $donacion['estado'] }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium bg-gradient-to-r from-gray-600/20 to-slate-600/20 border border-gray-500/30 text-gray-300 shadow-lg">
                                            {{ $donacion['estado'] }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Mensaje especial para donaciones recibidas -->
                        @if ($donacion['estado'] == 'Recibida')
                            <div class="bg-gradient-to-r from-emerald-600/10 via-teal-600/10 to-green-600/10 border-b border-emerald-500/20 px-8 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full flex items-center justify-center mr-3 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-emerald-300 font-medium">¡Gracias por tu donación! Ha sido recibida y procesada exitosamente.</p>
                                </div>
                            </div>
                        @endif

                        <!-- Mensaje especial para donaciones canceladas -->
                        @if ($donacion['estado'] == 'Cancelada')
                            <div class="bg-gradient-to-r from-red-600/10 via-red-700/10 to-red-800/10 border-b border-red-500/20 px-8 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-gradient-to-r from-red-500 to-red-600 rounded-full flex items-center justify-center mr-3 shadow-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                    <p class="text-red-300 font-medium">Esta donación ha sido cancelada.</p>
                                </div>
                            </div>
                        @endif

                        <!-- Contenido de la donación -->
                        <div class="p-8">
                            <h4 class="text-xl font-semibold text-teal-300 mb-6 flex items-center">
                                <svg class="w-6 h-6 mr-3 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Dispositivos Donados
                            </h4>
                            
                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                                @foreach ($donacion['dispositivos'] as $dispositivo)
                                    <div class="bg-gradient-to-br from-slate-700/40 to-gray-700/40 rounded-2xl border border-gray-600/40 p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                                        <div class="flex items-center mb-4">
                                            <div class="w-12 h-12 bg-gradient-to-r from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                                                @if (strtolower($dispositivo['categoria']['nombre_categoria']) == 'laptop' || strtolower($dispositivo['categoria']['nombre_categoria']) == 'computadora')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                                    </svg>
                                                @elseif (strtolower($dispositivo['categoria']['nombre_categoria']) == 'móvil' || strtolower($dispositivo['categoria']['nombre_categoria']) == 'celular')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                                    </svg>
                                                @elseif (strtolower($dispositivo['categoria']['nombre_categoria']) == 'tablet')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M3 12l6.414 6.414a2 2 0 001.414.586H19a2 2 0 002-2V7a2 2 0 00-2-2h-7.172a2 2 0 00-1.414.586L3 12z"></path>
                                                    </svg>
                                                @else
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                                                    </svg>
                                                @endif
                                            </div>
                                            <div>
                                                <h5 class="font-semibold text-emerald-300">{{ $dispositivo['nombre_dispositivo'] }}</h5>
                                                <p class="text-sm text-gray-400">{{ $dispositivo['categoria']['nombre_categoria'] }}</p>
                                            </div>
                                        </div>
                                        <div class="space-y-3 text-sm">
                                            <div class="flex justify-between items-center bg-slate-600/30 px-3 py-2 rounded-lg">
                                                <span class="text-gray-400">Marca:</span>
                                                <span class="font-medium text-gray-200">{{ $dispositivo['marca'] }}</span>
                                            </div>
                                            <div class="flex justify-between items-center bg-slate-600/30 px-3 py-2 rounded-lg">
                                                <span class="text-gray-400">Modelo:</span>
                                                <span class="font-medium text-gray-200">{{ $dispositivo['modelo'] }}</span>
                                            </div>
                                            <div class="flex justify-between items-center bg-slate-600/30 px-3 py-2 rounded-lg">
                                                <span class="text-gray-400">Estado:</span>
                                                @if (strtolower($dispositivo['estado_fisico']) == 'excelente')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-emerald-600/20 to-green-600/20 border border-emerald-500/30 text-emerald-300">{{ $dispositivo['estado_fisico'] }}</span>
                                                @elseif (strtolower($dispositivo['estado_fisico']) == 'bueno')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-green-600/20 to-lime-600/20 border border-green-500/30 text-green-300">{{ $dispositivo['estado_fisico'] }}</span>
                                                @elseif (strtolower($dispositivo['estado_fisico']) == 'regular')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-yellow-600/20 to-orange-600/20 border border-yellow-500/30 text-yellow-300">{{ $dispositivo['estado_fisico'] }}</span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-gray-600/20 to-slate-600/20 border border-gray-500/30 text-gray-300">{{ $dispositivo['estado_fisico'] }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if ($donacion['estado'] != 'Recibida' && $donacion['estado'] != 'Cancelada')
                                <div class="border-t border-gray-700/50 pt-6">
                                    <form action="{{ route('donacion.cancelar') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_donacion" id="id_donacion" value="{{ $donacion['id_donacion'] }}">
                                        <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600/20 to-red-700/20 border border-red-500/30 text-red-300 rounded-xl hover:from-red-600/30 hover:to-red-700/30 hover:border-red-400/50 transition-all duration-300 font-medium focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-800 shadow-lg hover:shadow-xl transform hover:scale-105">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Cancelar donación
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <div class="bg-gradient-to-br from-slate-800/50 to-gray-800/50 backdrop-blur-sm rounded-3xl border border-gray-700/50 p-12 max-w-2xl mx-auto">
                    <div class="w-24 h-24 bg-gradient-to-r from-emerald-600/20 to-teal-600/20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-emerald-300 mb-4">Aún no has hecho ninguna donación</h3>
                    <p class="text-gray-400 text-lg mb-8">¡Comienza a hacer la diferencia hoy mismo!</p>
                    <a href="{{ route('donacion') }}" class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 focus:ring-offset-gray-800">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Hacer mi primera donación
                    </a>
                    <div class="w-32 h-1 bg-gradient-to-r from-emerald-500 to-teal-600 mx-auto rounded-full mt-6"></div>
                </div>
            </div>
        @endif
    </main>
    
    @include('layouts.footer')
</body>
</html>