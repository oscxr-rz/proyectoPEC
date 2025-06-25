<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Ventas - Admin</title>
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

        .venta-card {
            background: linear-gradient(135deg, rgba(51, 65, 85, 0.8) 0%, rgba(71, 85, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .venta-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            border-color: rgba(56, 189, 248, 0.4);
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

        .inventario-item {
            background: rgba(51, 65, 85, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            padding: 15px;
            margin: 10px 0;
            border-radius: 12px;
            backdrop-filter: blur(8px);
        }

        .paquete-seleccionado {
            border: 2px solid #10b981;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2) 0%, rgba(5, 150, 105, 0.1) 100%);
        }

        .filter-chip {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.8) 0%, rgba(139, 92, 246, 0.6) 100%);
            border: 1px solid rgba(59, 130, 246, 0.3);
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }

        .filter-chip:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .filter-chip.active {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-color: #10b981;
        }

        .search-container {
            position: relative;
        }

        .search-results {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            z-index: 50;
            max-height: 300px;
            overflow-y: auto;
            background: rgba(30, 41, 59, 0.95);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            backdrop-filter: blur(12px);
            margin-top: 4px;
        }

        .search-result-item {
            padding: 12px 16px;
            cursor: pointer;
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            transition: all 0.2s ease;
        }

        .search-result-item:hover {
            background: rgba(59, 130, 246, 0.1);
        }

        .search-result-item:last-child {
            border-bottom: none;
        }
    </style>
</head>

<body class="text-gray-100">
    @include('admin.layouts.nav')

    <div class="min-h-screen p-3 sm:p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-8 sm:mb-12">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold gradient-text mb-4">Gestión de Ventas</h1>
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

            <!-- Create New Sale Section -->
            <div class="section-card p-4 sm:p-6 md:p-8 rounded-2xl mb-8 sm:mb-12">
                <div class="flex items-center mb-6 sm:mb-8">
                    <span class="text-2xl sm:text-3xl mr-3 sm:mr-4">💰</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Crear Nueva Venta</h3>
                </div>

                <form action="{{ route('admin.ventas.post') }}" method="POST" class="space-y-4 sm:space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <div>
                            <label for="precio_total" class="block text-sm font-medium text-gray-300 mb-2">Precio
                                Total:</label>
                            <input type="text" id="precio_total" name="precio_total" required value="0"
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                        </div>

                        <div>
                            <label for="metodo_pago" class="block text-sm font-medium text-gray-300 mb-2">Método de
                                Pago:</label>
                            <select id="metodo_pago" name="metodo_pago" required
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                                <option value="null">NO</option>
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="id_centro_acopio" class="block text-sm font-medium text-gray-300 mb-2">ID Centro
                                de Acopio:</label>
                            <select name="id_centro_acopio" id="id_centro_acopio" required
                                class="w-full px-3 sm:px-4 py-2 sm:py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 text-sm sm:text-base">
                                <option value="null">Seleccionar..</option>
                                @foreach ($centros as $centro)
                                    <option value="{{ $centro['id_centro_acopio'] }}">{{ $centro['nombre'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Paquetes Seleccionados -->
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-4">Paquetes Seleccionados:</label>
                        <div id="paquetes-seleccionados"
                            class="min-h-[100px] bg-slate-700/30 border-2 border-dashed border-gray-500/50 rounded-xl p-4 mb-4">
                            <div id="paquetes-placeholder" class="text-center text-gray-400 py-8">
                                <span class="text-4xl mb-2 block">📦</span>
                                <p>Haz clic en los paquetes disponibles para agregarlos a la venta</p>
                            </div>
                        </div>
                        <!-- Container for hidden inputs - this is where package IDs will be added as array -->
                        <div id="paquetes-hidden-inputs"></div>
                    </div>

                    <div class="flex justify-between items-center pt-4 sm:pt-6 border-t border-gray-600/30">
                        <div class="text-sm text-gray-400">
                            <span id="total-paquetes">0</span> paquete(s) seleccionado(s)
                        </div>
                        <button type="submit" id="crear-venta-btn" disabled
                            class="bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 sm:px-12 py-3 sm:py-4 rounded-xl font-medium transition-all duration-300 transform shadow-lg text-sm sm:text-base cursor-not-allowed">
                            🚀 Crear Venta
                        </button>
                    </div>
                </form>
            </div>

            <!-- Search and Filters Section -->
            <div class="section-card p-4 sm:p-6 md:p-8 rounded-2xl mb-8 sm:mb-12">
                <div class="flex items-center mb-6 sm:mb-8">
                    <span class="text-2xl sm:text-3xl mr-3 sm:mr-4">🔍</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Buscar y Filtrar</h3>
                </div>

                <!-- Search Bar -->
                <div class="search-container mb-6">
                    <div class="relative">
                        <input type="text" id="search-input"
                            placeholder="Buscar por ID de paquete, dispositivo, marca, modelo..."
                            class="w-full px-4 py-3 pl-12 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                        <svg class="absolute left-4 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <div id="search-results" class="search-results hidden"></div>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap gap-3 mb-6">
                    <button
                        class="filter-chip active px-4 py-2 rounded-full text-sm font-medium text-white transition-all duration-300"
                        data-filter="all">
                        📦 Todos
                    </button>
                    <button
                        class="filter-chip px-4 py-2 rounded-full text-sm font-medium text-white transition-all duration-300"
                        data-filter="disponible">
                        ✅ Disponibles
                    </button>
                    <button
                        class="filter-chip px-4 py-2 rounded-full text-sm font-medium text-white transition-all duration-300"
                        data-filter="vendido">
                        ❌ Vendidos
                    </button>
                    <button
                        class="filter-chip px-4 py-2 rounded-full text-sm font-medium text-white transition-all duration-300"
                        data-filter="peso-alto">
                        ⚖️ Peso Alto (>10kg)
                    </button>
                    <button
                        class="filter-chip px-4 py-2 rounded-full text-sm font-medium text-white transition-all duration-300"
                        data-filter="peso-bajo">
                        🪶 Peso Bajo (≤10kg)
                    </button>
                    <button
                        class="filter-chip px-4 py-2 rounded-full text-sm font-medium text-white transition-all duration-300"
                        data-filter="con-descripcion">
                        📝 Con Descripción
                    </button>
                </div>

                <!-- Clear Filters Button -->
                <button id="clear-filters"
                    class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-red-600 hover:to-red-700 transition-all duration-300">
                    🗑️ Limpiar Filtros
                </button>
            </div>

            <!-- Available Packages Section -->
            <div class="section-card p-4 sm:p-6 md:p-8 rounded-2xl mb-8 sm:mb-12">
                <div class="flex items-center mb-6 sm:mb-8">
                    <span class="text-2xl sm:text-3xl mr-3 sm:mr-4">📦</span>
                    <h3 class="text-xl sm:text-2xl font-bold text-white">Paquetes Disponibles</h3>
                    <span id="paquetes-count"
                        class="ml-auto bg-blue-500 text-white px-3 py-1 rounded-full text-sm font-medium"></span>
                </div>

                @if (!empty($paquetes))
                    <div id="paquetes-container" class="grid gap-6 sm:gap-8">
                        @foreach ($paquetes as $paquete)
                            <div class="venta-card paquete-item p-4 sm:p-6 rounded-2xl transition-all duration-300 
                            {{ $paquete['id_venta'] === null ? 'cursor-pointer' : 'opacity-60' }}"
                                data-paquete-id="{{ $paquete['id_paquete'] }}"
                                data-peso="{{ $paquete['peso_total'] }}"
                                data-descripcion="{{ $paquete['descripcion'] ?: '' }}"
                                data-status="{{ $paquete['id_venta'] === null ? 'disponible' : 'vendido' }}"
                                data-dispositivos="{{ implode(',', array_column(array_column($paquete['inventarios'] ?? [], 'dispositivo'), 'nombre_dispositivo')) }}"
                                data-marcas="{{ implode(',', array_column(array_column($paquete['inventarios'] ?? [], 'dispositivo'), 'marca')) }}"
                                data-modelos="{{ implode(',', array_column(array_column($paquete['inventarios'] ?? [], 'dispositivo'), 'modelo')) }}">

                                <!-- Package Header -->
                                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-4 sm:mb-6">
                                    <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-4 mb-4 lg:mb-0">
                                        <div
                                            class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-bold mb-2 sm:mb-0 w-fit">
                                            ID: {{ $paquete['id_paquete'] }}
                                        </div>
                                        @if ($paquete['id_venta'] === null)
                                            <span class="status-badge status-disponible w-fit">Disponible</span>
                                        @else
                                            <span
                                                class="status-badge bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-1 rounded-full text-xs font-bold w-fit">
                                                ❌ Vendido
                                            </span>
                                        @endif
                                    </div>

                                    @if ($paquete['id_venta'] === null)
                                        <div class="paquete-check hidden">
                                            <div
                                                class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                                ✓ Seleccionado
                                            </div>
                                        </div>
                                    @else
                                        <div class="bg-gray-600 text-white px-3 py-1 rounded-full text-sm font-bold">
                                            🔒 No Disponible
                                        </div>
                                    @endif
                                </div>

                                <!-- Package Details -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
                                    <div class="bg-slate-800/50 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                        <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1">Peso Total</p>
                                        <p class="text-white font-semibold text-sm sm:text-base">
                                            {{ $paquete['peso_total'] }} kg</p>
                                    </div>
                                    <div class="bg-slate-800/50 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                        <p class="text-gray-400 text-xs sm:text-sm font-medium mb-1">Descripción</p>
                                        <p class="text-white font-semibold text-sm sm:text-base">
                                            {{ $paquete['descripcion'] ?: 'Sin descripción' }}</p>
                                    </div>
                                    @if ($paquete['id_venta'] !== null)
                                        <div
                                            class="bg-red-900/30 p-3 sm:p-4 rounded-xl border border-red-600/30 sm:col-span-2">
                                            <p class="text-red-400 text-xs sm:text-sm font-medium mb-1">Estado de Venta
                                            </p>
                                            <p class="text-red-300 font-semibold text-sm sm:text-base">
                                                Vendido - ID Venta: {{ $paquete['id_venta'] }}
                                            </p>
                                        </div>
                                    @endif
                                </div>

                                @if (!empty($paquete['inventarios']))
                                    <div class="mb-6 sm:mb-8">
                                        <h4 class="text-lg sm:text-xl font-bold text-white mb-4 flex items-center">
                                            <span
                                                class="w-2 h-2 {{ $paquete['id_venta'] === null ? 'bg-blue-500' : 'bg-red-500' }} rounded-full mr-3"></span>
                                            Dispositivos en el Paquete
                                        </h4>
                                        <div class="grid gap-4">
                                            @foreach ($paquete['inventarios'] as $inventario)
                                                <div
                                                    class="bg-slate-800/30 p-3 sm:p-4 rounded-xl border border-gray-600/30">
                                                    <div
                                                        class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
                                                        <div>
                                                            <p class="text-gray-400 text-xs font-medium mb-1">
                                                                Dispositivo</p>
                                                            <p class="text-white font-semibold text-sm">
                                                                {{ $inventario['dispositivo']['nombre_dispositivo'] }}
                                                            </p>
                                                        </div>
                                                        <div>
                                                            <p class="text-gray-400 text-xs font-medium mb-1">Marca</p>
                                                            <p class="text-white font-semibold text-sm">
                                                                {{ $inventario['dispositivo']['marca'] }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-gray-400 text-xs font-medium mb-1">Modelo
                                                            </p>
                                                            <p class="text-white font-semibold text-sm">
                                                                {{ $inventario['dispositivo']['modelo'] }}</p>
                                                        </div>
                                                        <div>
                                                            <p class="text-gray-400 text-xs font-medium mb-1">Estado
                                                            </p>
                                                            <p class="text-white font-semibold text-sm">
                                                                {{ $inventario['dispositivo']['estado_fisico'] }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 sm:py-16">
                        <div class="text-6xl sm:text-8xl mb-4">📦</div>
                        <h4 class="text-xl sm:text-2xl font-bold text-gray-400 mb-4">No hay paquetes disponibles</h4>
                        <p class="text-gray-500 text-sm sm:text-base">Los paquetes creados aparecerán aquí</p>
                    </div>
                @endif

                <!-- Mensaje de sin resultados para filtros -->
                <div id="no-results" class="text-center py-12 sm:py-16 hidden">
                    <div class="text-6xl sm:text-8xl mb-4">🔍</div>
                    <h4 class="text-xl sm:text-2xl font-bold text-gray-400 mb-4">No se encontraron resultados</h4>
                    <p class="text-gray-500 text-sm sm:text-base">Intenta con otros filtros o términos de búsqueda</p>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')

    <script>
        // Variables globales
        let paquetesSeleccionados = [];
        let allPaquetes = [];
        let filteredPaquetes = [];
        let currentFilter = 'all';

        // Inicializar al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            initializePaquetes();
            initializeSearch();
            initializeFilters();
            updatePaquetesCount();
        });

        // Inicializar paquetes
        function initializePaquetes() {
            const paqueteItems = document.querySelectorAll('.paquete-item');
            allPaquetes = Array.from(paqueteItems);
            filteredPaquetes = [...allPaquetes];

            // Agregar event listeners para selección de paquetes
            paqueteItems.forEach(item => {
                item.addEventListener('click', function() {
                    togglePaqueteSelection(this);
                });
            });
        }

        // Función para seleccionar/deseleccionar paquetes
        function togglePaqueteSelection(paqueteElement) {
            // Solo permitir selección si el paquete está disponible
            if (paqueteElement.dataset.status === 'vendido') {
                return; // No hacer nada si está vendido
            }

            const paqueteId = paqueteElement.dataset.paqueteId;
            const isSelected = paquetesSeleccionados.includes(paqueteId);

            if (isSelected) {
                // Deseleccionar
                paquetesSeleccionados = paquetesSeleccionados.filter(id => id !== paqueteId);
                paqueteElement.classList.remove('paquete-seleccionado');
                paqueteElement.querySelector('.paquete-check').classList.add('hidden');
            } else {
                // Seleccionar
                paquetesSeleccionados.push(paqueteId);
                paqueteElement.classList.add('paquete-seleccionado');
                paqueteElement.querySelector('.paquete-check').classList.remove('hidden');
            }

            updatePaquetesSeleccionados();
            updateFormButton();
        }

        // Actualizar paquetes seleccionados en el formulario
        function updatePaquetesSeleccionados() {
            const container = document.getElementById('paquetes-seleccionados');
            const placeholder = document.getElementById('paquetes-placeholder');
            const hiddenInputsContainer = document.getElementById('paquetes-hidden-inputs');
            const totalPaquetes = document.getElementById('total-paquetes');

            // Limpiar contenido anterior
            container.innerHTML = '';
            hiddenInputsContainer.innerHTML = '';

            if (paquetesSeleccionados.length === 0) {
                // Mostrar placeholder
                container.innerHTML = `
            <div id="paquetes-placeholder" class="text-center text-gray-400 py-8">
                <span class="text-4xl mb-2 block">📦</span>
                <p>Haz clic en los paquetes disponibles para agregarlos a la venta</p>
            </div>
        `;
            } else {
                // Mostrar paquetes seleccionados
                paquetesSeleccionados.forEach(paqueteId => {
                    const paqueteElement = document.querySelector(`[data-paquete-id="${paqueteId}"]`);
                    if (paqueteElement) {
                        const peso = paqueteElement.dataset.peso;
                        const descripcion = paqueteElement.dataset.descripcion || 'Sin descripción';

                        // Crear elemento visual
                        const paqueteDiv = document.createElement('div');
                        paqueteDiv.className =
                            'bg-green-900/20 border border-green-500/30 p-4 rounded-xl mb-3 flex items-center justify-between';
                        paqueteDiv.innerHTML = `
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                            ID: ${paqueteId}
                        </div>
                        <div class="text-sm text-gray-300">
                            <span class="font-medium">${peso} kg</span> - ${descripcion}
                        </div>
                    </div>
                    <button type="button" onclick="removePaqueteFromSelection('${paqueteId}')" 
                            class="text-red-400 hover:text-red-300 transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                `;
                        container.appendChild(paqueteDiv);

                        // Crear input hidden para el formulario
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'paquetes[]';
                        hiddenInput.value = paqueteId;
                        hiddenInputsContainer.appendChild(hiddenInput);
                    }
                });
            }

            // Actualizar contador
            totalPaquetes.textContent = paquetesSeleccionados.length;
        }

        // Remover paquete de la selección
        function removePaqueteFromSelection(paqueteId) {
            const paqueteElement = document.querySelector(`[data-paquete-id="${paqueteId}"]`);
            if (paqueteElement) {
                paqueteElement.classList.remove('paquete-seleccionado');
                paqueteElement.querySelector('.paquete-check').classList.add('hidden');
            }

            paquetesSeleccionados = paquetesSeleccionados.filter(id => id !== paqueteId);
            updatePaquetesSeleccionados();
            updateFormButton();
        }

        // Actualizar estado del botón de crear venta
        function updateFormButton() {
            const button = document.getElementById('crear-venta-btn');

            if (paquetesSeleccionados.length > 0) {
                button.disabled = false;
                button.className =
                    'bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white px-6 sm:px-12 py-3 sm:py-4 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 shadow-lg text-sm sm:text-base cursor-pointer';
            } else {
                button.disabled = true;
                button.className =
                    'bg-gradient-to-r from-gray-500 to-gray-600 text-white px-6 sm:px-12 py-3 sm:py-4 rounded-xl font-medium transition-all duration-300 transform shadow-lg text-sm sm:text-base cursor-not-allowed';
            }
        }

        // Inicializar búsqueda
        function initializeSearch() {
            const searchInput = document.getElementById('search-input');
            const searchResults = document.getElementById('search-results');
            let searchTimeout;

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();

                // Limpiar timeout anterior
                clearTimeout(searchTimeout);

                if (query.length === 0) {
                    hideSearchResults();
                    showAllPaquetes();
                    return;
                }

                // Debounce la búsqueda
                searchTimeout = setTimeout(() => {
                    performSearch(query);
                }, 300);
            });

            // Cerrar resultados al hacer clic fuera
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                    hideSearchResults();
                }
            });
        }

        // Realizar búsqueda
        function performSearch(query) {
            const searchResults = document.getElementById('search-results');
            const lowerQuery = query.toLowerCase();

            const matches = allPaquetes.filter(paquete => {
                const paqueteId = paquete.dataset.paqueteId.toLowerCase();
                const dispositivos = paquete.dataset.dispositivos.toLowerCase();
                const marcas = paquete.dataset.marcas.toLowerCase();
                const modelos = paquete.dataset.modelos.toLowerCase();
                const descripcion = paquete.dataset.descripcion.toLowerCase();

                return paqueteId.includes(lowerQuery) ||
                    dispositivos.includes(lowerQuery) ||
                    marcas.includes(lowerQuery) ||
                    modelos.includes(lowerQuery) ||
                    descripcion.includes(lowerQuery);
            });

            showSearchResults(matches, query);
            highlightSearchResults(matches);
        }

        // Mostrar resultados de búsqueda
        function showSearchResults(matches, query) {
            const searchResults = document.getElementById('search-results');

            if (matches.length === 0) {
                searchResults.innerHTML = `
            <div class="search-result-item text-center py-4">
                <span class="text-gray-400">No se encontraron resultados para "${query}"</span>
            </div>
        `;
            } else {
                searchResults.innerHTML = matches.slice(0, 5).map(paquete => {
                    const dispositivos = paquete.dataset.dispositivos.split(',').slice(0, 2).join(', ');
                    const status = paquete.dataset.status === 'disponible' ? '✅ Disponible' : '❌ Vendido';
                    const statusClass = paquete.dataset.status === 'disponible' ? 'text-green-400' : 'text-red-400';

                    return `
                <div class="search-result-item" onclick="scrollToPaquete('${paquete.dataset.paqueteId}')">
                    <div class="flex items-center justify-between">
                        <div>
                            <div class="font-medium text-white">ID: ${paquete.dataset.paqueteId}</div>
                            <div class="text-sm text-gray-300">${dispositivos}${paquete.dataset.dispositivos.split(',').length > 2 ? '...' : ''}</div>
                        </div>
                        <div class="text-xs ${statusClass} font-medium">${status}</div>
                    </div>
                </div>
            `;
                }).join('');

                if (matches.length > 5) {
                    searchResults.innerHTML += `
                <div class="search-result-item text-center text-gray-400 text-sm">
                    Y ${matches.length - 5} resultado(s) más...
                </div>
            `;
                }
            }

            searchResults.classList.remove('hidden');
        }

        // Ocultar resultados de búsqueda
        function hideSearchResults() {
            const searchResults = document.getElementById('search-results');
            searchResults.classList.add('hidden');
        }

        // Resaltar resultados de búsqueda
        function highlightSearchResults(matches) {
            // Ocultar todos los paquetes
            allPaquetes.forEach(paquete => {
                paquete.style.display = 'none';
            });

            // Mostrar solo los que coinciden
            matches.forEach(paquete => {
                paquete.style.display = 'block';
            });

            // Actualizar contador y mensaje de no resultados
            updatePaquetesCount();
            updateNoResultsMessage(matches.length === 0);
        }

        // Mostrar todos los paquetes
        function showAllPaquetes() {
            allPaquetes.forEach(paquete => {
                paquete.style.display = 'block';
            });
            updatePaquetesCount();
            updateNoResultsMessage(false);
        }

        // Scroll hacia un paquete específico
        function scrollToPaquete(paqueteId) {
            const paqueteElement = document.querySelector(`[data-paquete-id="${paqueteId}"]`);
            if (paqueteElement) {
                hideSearchResults();
                paqueteElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });

                // Efecto de resaltado temporal
                paqueteElement.style.boxShadow = '0 0 20px rgba(59, 130, 246, 0.6)';
                setTimeout(() => {
                    paqueteElement.style.boxShadow = '';
                }, 2000);
            }
        }

        // Inicializar filtros
        function initializeFilters() {
            const filterButtons = document.querySelectorAll('.filter-chip');
            const clearFiltersBtn = document.getElementById('clear-filters');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filter = this.dataset.filter;

                    // Actualizar estado visual de los botones
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    currentFilter = filter;
                    applyFilter(filter);
                });
            });

            clearFiltersBtn.addEventListener('click', function() {
                // Limpiar búsqueda
                document.getElementById('search-input').value = '';
                hideSearchResults();

                // Resetear filtro a 'all'
                filterButtons.forEach(btn => btn.classList.remove('active'));
                document.querySelector('[data-filter="all"]').classList.add('active');

                currentFilter = 'all';
                applyFilter('all');
            });
        }

        // Aplicar filtro
        function applyFilter(filter) {
            let filtered = [];

            switch (filter) {
                case 'all':
                    filtered = [...allPaquetes];
                    break;
                case 'disponible':
                    filtered = allPaquetes.filter(paquete =>
                        paquete.dataset.status === 'disponible'
                    );
                    break;
                case 'vendido':
                    filtered = allPaquetes.filter(paquete =>
                        paquete.dataset.status === 'vendido'
                    );
                    break;
                case 'peso-alto':
                    filtered = allPaquetes.filter(paquete =>
                        parseFloat(paquete.dataset.peso) > 10
                    );
                    break;
                case 'peso-bajo':
                    filtered = allPaquetes.filter(paquete =>
                        parseFloat(paquete.dataset.peso) <= 10
                    );
                    break;
                case 'con-descripcion':
                    filtered = allPaquetes.filter(paquete =>
                        paquete.dataset.descripcion && paquete.dataset.descripcion.trim() !== ''
                    );
                    break;
                default:
                    filtered = [...allPaquetes];
            }

            filteredPaquetes = filtered;

            // Ocultar todos los paquetes
            allPaquetes.forEach(paquete => {
                paquete.style.display = 'none';
            });

            // Mostrar solo los filtrados
            filtered.forEach(paquete => {
                paquete.style.display = 'block';
            });

            updatePaquetesCount();
            updateNoResultsMessage(filtered.length === 0);
        }

        // Actualizar contador de paquetes
        function updatePaquetesCount() {
            const countElement = document.getElementById('paquetes-count');
            const visiblePaquetes = allPaquetes.filter(paquete =>
                paquete.style.display !== 'none'
            ).length;

            countElement.textContent = `${visiblePaquetes} paquete${visiblePaquetes !== 1 ? 's' : ''}`;
        }

        // Actualizar mensaje de no resultados
        function updateNoResultsMessage(show) {
            const noResultsElement = document.getElementById('no-results');
            const paquetesContainer = document.getElementById('paquetes-container');

            if (show) {
                noResultsElement.classList.remove('hidden');
                if (paquetesContainer) {
                    paquetesContainer.classList.add('hidden');
                }
            } else {
                noResultsElement.classList.add('hidden');
                if (paquetesContainer) {
                    paquetesContainer.classList.remove('hidden');
                }
            }
        }

        // Funciones auxiliares para el cálculo de precios
        function calculateTotalPrice() {
            let total = 0;

            paquetesSeleccionados.forEach(paqueteId => {
                const paqueteElement = document.querySelector(`[data-paquete-id="${paqueteId}"]`);
                if (paqueteElement) {
                    const peso = parseFloat(paqueteElement.dataset.peso) || 0;
                    // Aquí puedes implementar tu lógica de cálculo de precio
                    // Por ejemplo: precio por kg * peso
                    total += peso * 10; // Ejemplo: 10 pesos por kg
                }
            });

            return total;
        }

        // Actualizar precio total automáticamente
        function updatePrecioTotal() {
            const precioTotalInput = document.getElementById('precio_total');
            const total = calculateTotalPrice();

            if (precioTotalInput && paquetesSeleccionados.length > 0) {
                precioTotalInput.value = total.toFixed(2);
            } else if (precioTotalInput) {
                precioTotalInput.value = '0';
            }
        }

        // Validación del formulario
        function validateForm() {
            const precioTotal = document.getElementById('precio_total').value;
            const metodoPago = document.getElementById('metodo_pago').value;
            const centroAcopio = document.getElementById('id_centro_acopio').value;

            if (!precioTotal || parseFloat(precioTotal) <= 0) {
                alert('El precio total debe ser mayor a 0');
                return false;
            }

            if (metodoPago === 'null') {
                alert('Debe seleccionar un método de pago');
                return false;
            }

            if (centroAcopio === 'null') {
                alert('Debe seleccionar un centro de acopio');
                return false;
            }

            if (paquetesSeleccionados.length === 0) {
                alert('Debe seleccionar al menos un paquete');
                return false;
            }

            return true;
        }

        // Event listener para el formulario
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[action*="ventas.post"]');
            if (form) {
                form.addEventListener('submit', function(e) {
                    if (!validateForm()) {
                        e.preventDefault();
                    }
                });
            }

            // Actualizar precio total cuando se seleccionen paquetes
            const originalUpdatePaquetesSeleccionados = updatePaquetesSeleccionados;
            updatePaquetesSeleccionados = function() {
                originalUpdatePaquetesSeleccionados();
                updatePrecioTotal();
            };
        });
    </script>
</body>

</html>
