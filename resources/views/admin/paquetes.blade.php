<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Paquetes - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'slate-800': '#1e293b',
                        'slate-700': '#334155',
                        'slate-600': '#475569',
                        'slate-500': '#64748b',
                    }
                }
            }
        }
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            min-height: 100vh;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(4px);
        }

        .modal-content {
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            margin: 2% auto;
            padding: 20px;
            border-radius: 16px;
            width: 95%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            border: 1px solid rgba(148, 163, 184, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        }

        @media (min-width: 768px) {
            .modal-content {
                width: 90%;
                padding: 30px;
            }
        }

        .close {
            color: #94a3b8;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 15px;
            transition: color 0.3s ease;
            z-index: 10001;
        }

        @media (min-width: 768px) {
            .close {
                right: 20px;
                top: 15px;
            }
        }

        .close:hover {
            color: #f8fafc;
        }

        .inventario-item {
            background: rgba(51, 65, 85, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            padding: 15px;
            margin: 10px 0;
            border-radius: 12px;
            backdrop-filter: blur(8px);
        }

        .paquete-card {
            background: linear-gradient(135deg, rgba(51, 65, 85, 0.8) 0%, rgba(71, 85, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .paquete-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            border-color: rgba(56, 189, 248, 0.4);
        }

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #8b5cf6 50%, #06b6d4 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.7) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            backdrop-filter: blur(8px);
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .status-disponible {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
        }

        .status-vendido {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
        }

        .search-container {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.7) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            backdrop-filter: blur(8px);
        }

        .hidden-package {
            display: none !important;
        }

        @media (max-width: 640px) {
            .modal-content {
                margin: 5% auto;
                width: 98%;
                padding: 15px;
            }

            .inventario-item {
                padding: 10px;
            }

            .close {
                font-size: 24px;
                right: 10px;
                top: 10px;
            }
        }
    </style>
</head>

<body class="text-gray-100">
    @include('admin.layouts.nav')
    <div class="min-h-screen p-3 sm:p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8 sm:mb-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold gradient-text mb-4">Gestión de Paquetes</h1>
                <div class="w-16 sm:w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            <!-- Alerta de mensaje de sesión -->
            @if (session('mensaje'))
                <div id="sessionAlert"
                    class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg transform transition-all duration-300 ease-in-out">
                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('mensaje') }}</span>
                    </div>
                </div>
                <script>
                    setTimeout(function() {
                        const alert = document.getElementById('sessionAlert');
                        if (alert) {
                            alert.style.opacity = '0';
                            alert.style.transform = 'translateX(100%)';
                            setTimeout(() => alert.remove(), 300);
                        }
                    }, 3000);
                </script>
            @endif

            <!-- Search Section -->
            <div class="search-container p-4 sm:p-6 md:p-8 rounded-2xl mb-8 sm:mb-12">
                <div class="flex items-center mb-6">
                    <span class="text-2xl sm:text-3xl mr-3 sm:mr-4">🔍</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Buscar Paquetes</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div>
                        <label for="search-id" class="block text-sm font-medium text-gray-300 mb-2">ID Paquete:</label>
                        <input type="text" id="search-id" placeholder="Buscar por ID..."
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    </div>

                    <div>
                        <label for="search-status" class="block text-sm font-medium text-gray-300 mb-2">Estado:</label>
                        <select id="search-status"
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                            <option value="">Todos</option>
                            <option value="disponible">Disponible</option>
                            <option value="vendido">Vendido</option>
                        </select>
                    </div>

                    <div>
                        <label for="search-peso" class="block text-sm font-medium text-gray-300 mb-2">Peso (kg):</label>
                        <input type="number" id="search-peso" placeholder="Peso mínimo..." step="0.01"
                            min="0"
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    </div>

                    <div>
                        <label for="search-venta" class="block text-sm font-medium text-gray-300 mb-2">ID Venta:</label>
                        <input type="text" id="search-venta" placeholder="Buscar por ID venta..."
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label for="search-descripcion"
                            class="block text-sm font-medium text-gray-300 mb-2">Descripción:</label>
                        <input type="text" id="search-descripcion" placeholder="Buscar en descripción..."
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    </div>
                    <div class="flex items-end">
                        <button type="button" onclick="limpiarBusqueda()"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-medium transition-all duration-300 text-sm sm:text-base">
                            🗑️ Limpiar
                        </button>
                    </div>
                </div>
            </div>

            <!-- Add New Package Section -->
            <div class="section-card p-4 sm:p-6 md:p-8 rounded-2xl mb-8 sm:mb-12">
                <div class="flex items-center mb-6 sm:mb-8">
                    <span class="text-2xl sm:text-3xl mr-3 sm:mr-4">📦</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Agregar nuevo paquete</h3>
                </div>

                <form action="{{ route('admin.paquetes.post') }}" method="POST" class="space-y-4 sm:space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label for="peso_total" class="block text-sm font-medium text-gray-300 mb-2">Peso Total
                                (kg):</label>
                            <input type="number" name="peso_total" id="peso_total" step="0.01" min="0"
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                        </div>

                        <div>
                            <label for="id_venta" class="block text-sm font-medium text-gray-300 mb-2">ID Venta
                                (opcional):</label>
                            <input type="number" name="id_venta" id="id_venta"
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                        </div>
                    </div>

                    <div>
                        <label for="descripcion"
                            class="block text-sm font-medium text-gray-300 mb-2">Descripción:</label>
                        <textarea name="descripcion" id="descripcion" rows="3"
                            class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 resize-vertical text-sm sm:text-base"></textarea>
                    </div>

                    <!-- Sección de inventarios -->
                    <div class="bg-slate-800/30 p-4 sm:p-6 rounded-xl border border-gray-600/30">
                        <h4 class="text-base sm:text-lg font-bold text-white mb-4 flex items-center">
                            📱 Dispositivos del Inventario
                        </h4>
                        <div id="inventarios-container"></div>
                        <button type="button"
                            class="bg-green-500 hover:bg-green-600 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 text-sm sm:text-base"
                            onclick="agregarCampoInventario()">
                            ➕ Agregar dispositivo
                        </button>
                    </div>

                    <div class="flex justify-end pt-4 sm:pt-6 border-t border-gray-600/30">
                        <button type="submit"
                            class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 sm:px-12 py-3 sm:py-4 rounded-xl font-medium hover:from-teal-600 hover:to-teal-700 transition-all duration-300 transform hover:scale-105 shadow-lg text-sm sm:text-base">
                            🚀 Crear Paquete
                        </button>
                    </div>
                </form>
            </div>

            @if (!empty($paquetes))
                <!-- Results Counter -->
                <div class="mb-6">
                    <p class="text-gray-400 text-sm sm:text-base">
                        Mostrando <span id="results-count">{{ count($paquetes) }}</span> de {{ count($paquetes) }}
                        paquetes
                    </p>
                </div>

                <!-- Packages Grid -->
                <div class="grid gap-6 sm:gap-8 mb-8 sm:mb-12" id="packages-container">
                    @foreach ($paquetes as $paquete)
                        <div class="paquete-card p-4 sm:p-6 md:p-8 rounded-2xl"
                            data-package-id="{{ $paquete['id_paquete'] }}"
                            data-package-status="{{ !empty($paquete['id_venta']) ? 'vendido' : 'disponible' }}"
                            data-package-peso="{{ $paquete['peso_total'] }}"
                            data-package-venta="{{ $paquete['id_venta'] ?? '' }}"
                            data-package-descripcion="{{ strtolower($paquete['descripcion'] ?? '') }}">
                            <!-- Package Header -->
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4 sm:mb-6">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-4 lg:mb-0">
                                    <div
                                        class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-bold mb-2 sm:mb-0 w-fit">
                                        ID: {{ $paquete['id_paquete'] }}
                                    </div>
                                    @if (!empty($paquete['id_venta']))
                                        <span class="status-badge status-vendido w-fit">Vendido</span>
                                    @else
                                        <span class="status-badge status-disponible w-fit">Disponible</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Package Details -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 mb-4 sm:mb-6">
                                <div class="bg-slate-800/50 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                    <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1">Peso Total</p>
                                    <p class="text-white font-semibold text-sm sm:text-base">
                                        {{ $paquete['peso_total'] }} kg</p>
                                </div>
                                <div class="bg-slate-800/50 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                    <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1">Fecha de Creación</p>
                                    <p class="text-white font-semibold text-sm sm:text-base">
                                        {{ $paquete['fecha_creacion'] }}
                                    </p>
                                </div>
                                @if (!empty($paquete['id_venta']))
                                    <div class="bg-slate-800/50 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                        <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1">ID Venta</p>
                                        <p class="text-white font-semibold text-sm sm:text-base">
                                            {{ $paquete['id_venta'] }}</p>
                                    </div>
                                @endif
                            </div>

                            @if (!empty($paquete['descripcion']))
                                <p class="text-gray-300 leading-relaxed mb-6 sm:mb-8 text-sm sm:text-base">
                                    {{ $paquete['descripcion'] }}</p>
                            @endif

                            @if (!empty($paquete['inventarios']))
                                <div class="mb-6 sm:mb-8">
                                    <h4 class="text-lg sm:text-xl font-bold text-white mb-4 flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                                        Dispositivos en el Paquete
                                    </h4>
                                    <div class="grid gap-4">
                                        @foreach ($paquete['inventarios'] as $inventario)
                                            <div
                                                class="bg-slate-800/30 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                                <div
                                                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                                                    <div>
                                                        <p class="text-gray-400 text-xs font-medium mb-1">Inventario ID
                                                        </p>
                                                        <p class="text-white font-semibold text-sm">
                                                            {{ $inventario['id_inventario'] }}
                                                        </p>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-400 text-xs font-medium mb-1">Producto</p>
                                                        <p class="text-white font-semibold text-sm">
                                                            {{ $inventario['dispositivo']['nombre_dispositivo'] }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-400 text-xs font-medium mb-1">Marca/Modelo
                                                        </p>
                                                        <p class="text-white font-semibold text-sm">
                                                            {{ $inventario['dispositivo']['marca'] }}
                                                            {{ $inventario['dispositivo']['modelo'] }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-400 text-xs font-medium mb-1">Estado</p>
                                                        <p class="text-white font-semibold text-sm">
                                                            {{ $inventario['dispositivo']['estado_fisico'] }}</p>
                                                    </div>
                                                </div>
                                                <div class="mt-2">
                                                    <p class="text-gray-400 text-xs font-medium mb-1">Fecha de Ingreso
                                                    </p>
                                                    <p class="text-gray-300 text-xs sm:text-sm">
                                                        {{ $inventario['fecha_ingreso'] }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div
                                class="flex flex-col sm:flex-row flex-wrap gap-3 sm:gap-4 pt-4 sm:pt-6 border-t border-gray-600/30">
                                <button type="button"
                                    class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-xl font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg text-sm sm:text-base"
                                    onclick="abrirModalEdicion('{{ $paquete['id_paquete'] }}')">
                                    ✏️ Actualizar Paquete
                                </button>

                                <!-- Botón de eliminación con alerta estilizada -->
                                <form action="{{ route('admin.paquetes.delete') }}" method="POST"
                                    style="display: inline;" class="w-full sm:w-auto">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id_paquete" value="{{ $paquete['id_paquete'] }}">
                                    <button type="submit"
                                        class="w-full sm:w-auto bg-gradient-to-r from-red-500 to-red-600 text-white px-6 sm:px-8 py-2 sm:py-3 rounded-xl font-medium hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg text-sm sm:text-base"
                                        onclick="return mostrarAlertaEliminacion(event, '{{ $paquete['id_paquete'] }}')">
                                        🗑️ Eliminar Paquete
                                    </button>
                                </form>

                                <!-- Modal de confirmación de eliminación personalizado -->
                                <div id="deleteModal"
                                    class="hidden fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
                                    <div
                                        class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-2xl shadow-2xl border border-red-500/30 max-w-md w-full mx-4 transform transition-all duration-300 scale-95">
                                        <!-- Header -->
                                        <div class="flex items-center justify-center p-6 pb-4">
                                            <div
                                                class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-red-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Content -->
                                        <div class="px-6 pb-6 text-center">
                                            <h3 class="text-xl font-bold text-white mb-2">¿Eliminar Paquete?</h3>
                                            <p class="text-gray-300 mb-6">Esta acción no se puede deshacer. El paquete
                                                será eliminado permanentemente del sistema.</p>

                                            <!-- Buttons -->
                                            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                                                <button onclick="cerrarAlertaEliminacion()"
                                                    class="px-6 py-3 bg-gray-600 hover:bg-gray-700 text-white rounded-xl font-medium transition-all duration-300 transform hover:scale-105">
                                                    ❌ Cancelar
                                                </button>
                                                <button onclick="confirmarEliminacion()"
                                                    class="px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg">
                                                    🗑️ Sí, Eliminar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal de edición -->
                                <div id="modal-{{ $paquete['id_paquete'] }}" class="modal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <span class="close"
                                                onclick="cerrarModal('{{ $paquete['id_paquete'] }}')">&times;</span>
                                            <h3 class="text-xl sm:text-2xl font-bold text-white">✏️ Editar Paquete</h3>
                                            <p class="text-gray-400 text-sm mt-2">Modifica los datos del paquete y sus
                                                dispositivos</p>
                                        </div>

                                        <div class="modal-body">
                                            <form action="{{ route('admin.paquetes.put') }}" method="POST"
                                                class="space-y-6">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id_paquete"
                                                    value="{{ $paquete['id_paquete'] }}">

                                                <!-- Información básica -->
                                                <div class="bg-slate-800/40 p-6 rounded-xl border border-gray-600/30">
                                                    <h4
                                                        class="text-lg font-semibold text-white mb-4 flex items-center">
                                                        📦 Información del Paquete
                                                    </h4>

                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                        <div>
                                                            <label for="peso_total_{{ $paquete['id_paquete'] }}"
                                                                class="block text-sm font-medium text-gray-300 mb-2">Peso
                                                                Total (kg):</label>
                                                            <input type="number" name="peso_total"
                                                                id="peso_total_{{ $paquete['id_paquete'] }}"
                                                                value="{{ $paquete['peso_total'] }}" step="0.01"
                                                                min="0"
                                                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                                        </div>

                                                        <div>
                                                            <label for="id_venta_{{ $paquete['id_paquete'] }}"
                                                                class="block text-sm font-medium text-gray-300 mb-2">ID
                                                                Venta:</label>
                                                            <input type="number" name="id_venta"
                                                                id="id_venta_{{ $paquete['id_paquete'] }}"
                                                                value="{{ $paquete['id_venta'] ?? '' }}"
                                                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                                        </div>
                                                    </div>

                                                    <div class="mt-6">
                                                        <label for="descripcion_{{ $paquete['id_paquete'] }}"
                                                            class="block text-sm font-medium text-gray-300 mb-2">Descripción:</label>
                                                        <textarea name="descripcion" id="descripcion_{{ $paquete['id_paquete'] }}" rows="3"
                                                            class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 resize-vertical"
                                                            placeholder="Descripción del paquete...">{{ $paquete['descripcion'] ?? '' }}</textarea>
                                                    </div>
                                                </div>

                                                <!-- Sección de inventarios existentes -->
                                                <div class="bg-slate-800/40 p-6 rounded-xl border border-gray-600/30">
                                                    <h4
                                                        class="text-lg font-semibold text-white mb-4 flex items-center">
                                                        📱 Dispositivos del Inventario
                                                    </h4>

                                                    <div id="inventarios-existentes-{{ $paquete['id_paquete'] }}"
                                                        class="space-y-3">
                                                        @if (!empty($paquete['inventarios']))
                                                            @foreach ($paquete['inventarios'] as $inventario)
                                                                <div class="inventario-item bg-slate-700/30 p-4 rounded-lg border border-gray-600/20"
                                                                    id="inventario-existente-{{ $inventario['id_inventario'] }}">
                                                                    <input type="hidden"
                                                                        name="inventarios_existentes[{{ $loop->index }}][id_inventario]"
                                                                        value="{{ $inventario['id_inventario'] }}">
                                                                    <div
                                                                        class="flex flex-col sm:flex-row items-start sm:items-center justify-between space-y-3 sm:space-y-0">
                                                                        <div class="flex-1">
                                                                            <p class="text-white font-medium">
                                                                                {{ $inventario['dispositivo']['nombre_dispositivo'] }}
                                                                            </p>
                                                                            <p class="text-gray-400 text-sm">
                                                                                {{ $inventario['dispositivo']['marca'] }}
                                                                                {{ $inventario['dispositivo']['modelo'] }}
                                                                            </p>
                                                                            <span
                                                                                class="text-xs text-blue-400 bg-blue-500/20 px-2 py-1 rounded-full mt-1 inline-block">
                                                                                ID: {{ $inventario['id_inventario'] }}
                                                                            </span>
                                                                        </div>
                                                                        <button type="button"
                                                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2"
                                                                            onclick="marcarInventarioParaEliminar('{{ $inventario['id_inventario'] }}', '{{ $paquete['id_paquete'] }}')">
                                                                            <span>🗑️</span>
                                                                            <span
                                                                                class="hidden sm:inline">Eliminar</span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        @endif
                                                    </div>

                                                    <!-- Campo oculto para inventarios a eliminar -->
                                                    <input type="hidden" name="eliminar_inventarios"
                                                        id="eliminar-inventarios-{{ $paquete['id_paquete'] }}"
                                                        value="">

                                                    <!-- Nuevos inventarios -->
                                                    <div id="nuevos-inventarios-{{ $paquete['id_paquete'] }}"
                                                        class="mt-4"></div>

                                                    <div class="mt-4 pt-4 border-t border-gray-600/30">
                                                        <button type="button"
                                                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 flex items-center space-x-2"
                                                            onclick="agregarCampoInventarioModal('{{ $paquete['id_paquete'] }}')">
                                                            <span>➕</span>
                                                            <span>Agregar dispositivo</span>
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Botones de acción -->
                                                <div
                                                    class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-600/30">
                                                    <button type="button"
                                                        onclick="cerrarModal('{{ $paquete['id_paquete'] }}')"
                                                        class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105">
                                                        ❌ Cancelar
                                                    </button>
                                                    <button type="submit"
                                                        class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                                        💾 Guardar Cambios
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 sm:py-16">
                    <div class="text-6xl sm:text-8xl mb-4">📦</div>
                    <h3 class="text-xl sm:text-2xl font-bold text-gray-400 mb-4">No hay paquetes disponibles</h3>
                    <p class="text-gray-500 text-sm sm:text-base">Crea tu primer paquete usando el formulario de arriba
                    </p>
                </div>
            @endif
        </div>
    </div>

    @include('admin.layouts.footer')

    <script>
        let formToSubmit = null;

        function mostrarAlertaEliminacion(event, paqueteId) {
            event.preventDefault();
            formToSubmit = event.target.closest('form');

            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');

            // Animación de entrada
            setTimeout(() => {
                modal.querySelector('.transform').classList.remove('scale-95');
                modal.querySelector('.transform').classList.add('scale-100');
            }, 10);

            return false;
        }

        function cerrarAlertaEliminacion() {
            const modal = document.getElementById('deleteModal');

            // Animación de salida
            modal.querySelector('.transform').classList.remove('scale-100');
            modal.querySelector('.transform').classList.add('scale-95');

            setTimeout(() => {
                modal.classList.add('hidden');
                formToSubmit = null;
            }, 300);
        }

        function confirmarEliminacion() {
            if (formToSubmit) {
                formToSubmit.submit();
            }
        }

        // Cerrar modal al hacer clic fuera
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('deleteModal');
            if (event.target === modal) {
                cerrarAlertaEliminacion();
            }
        });
    </script>

    <script>
        let inventarioCounter = 0;
        let inventarios = @json($inventarios ?? []);

        function agregarCampoInventario() {
            const container = document.getElementById('inventarios-container');
            const div = document.createElement('div');
            div.className =
                'inventario-item flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4';
            div.id = `inventario-${inventarioCounter}`;

            let options = '<option value="">Seleccionar dispositivo...</option>';
            inventarios.forEach(inventario => {
                options +=
                    `<option value="${inventario.id_inventario}">${inventario.dispositivo.nombre_dispositivo} - ${inventario.dispositivo.marca} ${inventario.dispositivo.modelo}</option>`;
            });

            div.innerHTML = `
                <select name="inventarios[]" class="flex-1 px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    ${options}
                </select>
                <button type="button" onclick="eliminarCampoInventario(${inventarioCounter})" class="bg-red-500 hover:bg-red-600 text-white px-3 sm:px-4 py-2 rounded-xl transition-colors duration-300 text-sm w-full sm:w-auto">
                    🗑️
                </button>
            `;

            container.appendChild(div);
            inventarioCounter++;
        }

        function eliminarCampoInventario(id) {
            const elemento = document.getElementById(`inventario-${id}`);
            if (elemento) {
                elemento.remove();
            }
        }

        function agregarCampoInventarioModal(paqueteId) {
            const container = document.getElementById(`nuevos-inventarios-${paqueteId}`);
            const div = document.createElement('div');
            div.className =
                'inventario-item flex flex-col sm:flex-row items-start sm:items-center space-y-2 sm:space-y-0 sm:space-x-4';
            div.id = `nuevo-inventario-${paqueteId}-${inventarioCounter}`;

            let options = '<option value="">Seleccionar dispositivo...</option>';
            inventarios.forEach(inventario => {
                options +=
                    `<option value="${inventario.id_inventario}">${inventario.dispositivo.nombre_dispositivo} - ${inventario.dispositivo.marca} ${inventario.dispositivo.modelo}</option>`;
            });

            div.innerHTML = `
                <select name="nuevos_inventarios[]" class="flex-1 px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                    ${options}
                </select>
                <button type="button" onclick="eliminarCampoInventarioModal('${paqueteId}', ${inventarioCounter})" class="bg-red-500 hover:bg-red-600 text-white px-3 sm:px-4 py-2 rounded-xl transition-colors duration-300 text-sm w-full sm:w-auto">
                    🗑️
                </button>
            `;

            container.appendChild(div);
            inventarioCounter++;
        }

        function eliminarCampoInventarioModal(paqueteId, id) {
            const elemento = document.getElementById(`nuevo-inventario-${paqueteId}-${id}`);
            if (elemento) {
                elemento.remove();
            }
        }

        function marcarInventarioParaEliminar(inventarioId, paqueteId) {
            const elemento = document.getElementById(`inventario-existente-${inventarioId}`);
            if (elemento) {
                elemento.style.display = 'none';

                // Agregar el ID al campo oculto de inventarios a eliminar
                const campoEliminar = document.getElementById(`eliminar-inventarios-${paqueteId}`);
                let idsEliminar = campoEliminar.value ? campoEliminar.value.split(',') : [];
                if (!idsEliminar.includes(inventarioId)) {
                    idsEliminar.push(inventarioId);
                    campoEliminar.value = idsEliminar.join(',');
                }
            }
        }

        function abrirModalEdicion(paqueteId) {
            const modal = document.getElementById(`modal-${paqueteId}`);
            if (modal) {
                modal.style.display = 'block';
                document.body.style.overflow = 'hidden';
            }
        }

        function cerrarModal(paqueteId) {
            const modal = document.getElementById(`modal-${paqueteId}`);
            if (modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        // Cerrar modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        }

        // Funciones de búsqueda
        function filtrarPaquetes() {
            const searchId = document.getElementById('search-id').value.toLowerCase();
            const searchStatus = document.getElementById('search-status').value;
            const searchPeso = parseFloat(document.getElementById('search-peso').value) || 0;
            const searchVenta = document.getElementById('search-venta').value.toLowerCase();
            const searchDescripcion = document.getElementById('search-descripcion').value.toLowerCase();

            const paquetes = document.querySelectorAll('[data-package-id]');
            let visibleCount = 0;

            paquetes.forEach(paquete => {
                const id = paquete.getAttribute('data-package-id').toLowerCase();
                const status = paquete.getAttribute('data-package-status');
                const peso = parseFloat(paquete.getAttribute('data-package-peso'));
                const venta = paquete.getAttribute('data-package-venta').toLowerCase();
                const descripcion = paquete.getAttribute('data-package-descripcion');

                let mostrar = true;

                // Filtro por ID
                if (searchId && !id.includes(searchId)) {
                    mostrar = false;
                }

                // Filtro por estado
                if (searchStatus && status !== searchStatus) {
                    mostrar = false;
                }

                // Filtro por peso mínimo
                if (searchPeso > 0 && peso < searchPeso) {
                    mostrar = false;
                }

                // Filtro por ID de venta
                if (searchVenta && !venta.includes(searchVenta)) {
                    mostrar = false;
                }

                // Filtro por descripción
                if (searchDescripcion && !descripcion.includes(searchDescripcion)) {
                    mostrar = false;
                }

                if (mostrar) {
                    paquete.classList.remove('hidden-package');
                    visibleCount++;
                } else {
                    paquete.classList.add('hidden-package');
                }
            });

            // Actualizar contador de resultados
            document.getElementById('results-count').textContent = visibleCount;
        }

        function limpiarBusqueda() {
            document.getElementById('search-id').value = '';
            document.getElementById('search-status').value = '';
            document.getElementById('search-peso').value = '';
            document.getElementById('search-venta').value = '';
            document.getElementById('search-descripcion').value = '';

            // Mostrar todos los paquetes
            const paquetes = document.querySelectorAll('[data-package-id]');
            paquetes.forEach(paquete => {
                paquete.classList.remove('hidden-package');
            });

            // Actualizar contador
            document.getElementById('results-count').textContent = paquetes.length;
        }

        // Event listeners para búsqueda en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            const searchInputs = [
                'search-id',
                'search-status',
                'search-peso',
                'search-venta',
                'search-descripcion'
            ];

            searchInputs.forEach(inputId => {
                const input = document.getElementById(inputId);
                if (input) {
                    input.addEventListener('input', filtrarPaquetes);
                    if (input.tagName === 'SELECT') {
                        input.addEventListener('change', filtrarPaquetes);
                    }
                }
            });
        });
    </script>
</body>

</html>
