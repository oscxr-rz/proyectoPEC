<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Dispositivos - Admin</title>
</head>

<body class="bg-slate-800">
    @include('admin.layouts.nav')

    <main class="mx-4 p-4 lg:p-8 lg:mx-auto">
        <h1 class="text-2xl lg:text-4xl font-bold text-center mb-6 lg:mb-8 text-purple-400">Gestión de Dispositivos</h1>

        <!-- Buscador y Filtros -->
        <div class="mb-6 lg:mb-8 space-y-4">
            <!-- Buscador -->
            <div class="flex justify-center">
                <div class="relative w-full max-w-md">
                    <input type="text" id="searchInput" placeholder="Buscar por ID o nombre..."
                        class="w-full px-4 py-3 pl-10 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Filtros -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <div class="w-full sm:w-auto">
                    <select id="categoriaFilter" class="w-full sm:w-48 px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Todas las categorías</option>
                    </select>
                </div>
                <div class="w-full sm:w-auto">
                    <select id="estadoFisicoFilter" class="w-full sm:w-48 px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Todos los estados físicos</option>
                    </select>
                </div>
                <div class="w-full sm:w-auto">
                    <select id="marcaFilter" class="w-full sm:w-48 px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="">Todas las marcas</option>
                    </select>
                </div>
                <button id="clearFilters" class="w-full sm:w-auto px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200">
                    Limpiar filtros
                </button>
            </div>
        </div>

        @if (!empty($dispositivos))
            <div class="space-y-8 lg:space-y-12">
                <!-- Sección En inventario -->
                <div class="bg-slate-700 rounded-xl p-4 lg:p-6 shadow-xl border border-slate-600">
                    <h2 class="text-xl lg:text-2xl font-semibold mb-4 lg:mb-6 text-green-400 flex items-center gap-3">
                        <span class="text-xl lg:text-2xl">✅</span>
                        En inventario
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full bg-slate-600 rounded-lg overflow-hidden shadow-lg min-w-max">
                            <thead class="bg-slate-800">
                                <tr class="text-gray-200">
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">ID</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Estado</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Nombre</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Marca</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Modelo</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Descripción</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Estado Físico</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Categoría</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-500" id="inventarioTableBody">
                                @foreach ($dispositivos as $dispositivo)
                                    @if ($dispositivo['donacion']['estado'] == 'Recibida')
                                        <tr class="hover:bg-slate-500 transition-colors duration-200 device-row"
                                            data-id="{{ $dispositivo['id_dispositivo'] }}"
                                            data-nombre="{{ $dispositivo['nombre_dispositivo'] }}"
                                            data-categoria="{{ $dispositivo['categoria']['nombre_categoria'] }}"
                                            data-estado-fisico="{{ $dispositivo['estado_fisico'] }}"
                                            data-marca="{{ $dispositivo['marca'] }}">
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['id_dispositivo'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 whitespace-nowrap">
                                                <span
                                                    class="px-2 py-1 bg-green-500 text-green-900 rounded-full text-xs lg:text-sm font-medium">
                                                    {{ $dispositivo['donacion']['estado'] }}
                                                </span>
                                            </td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['nombre_dispositivo'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['marca'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['modelo'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 min-w-0 max-w-xs lg:max-w-sm">
                                                <div class="break-words text-sm lg:text-base">{{ $dispositivo['descripcion'] }}</div>
                                            </td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['estado_fisico'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['categoria']['nombre_categoria'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sección Pendientes -->
                <div class="bg-slate-700 rounded-xl p-4 lg:p-6 shadow-xl border border-slate-600">
                    <h2 class="text-xl lg:text-2xl font-semibold mb-4 lg:mb-6 text-yellow-400 flex items-center gap-3">
                        <span class="text-xl lg:text-2xl">📋</span>
                        Pendientes
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full bg-slate-600 rounded-lg overflow-hidden shadow-lg min-w-max">
                            <thead class="bg-slate-800">
                                <tr class="text-gray-200">
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">ID</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Estado</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Nombre</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Marca</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Modelo</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Descripción</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Estado Físico</th>
                                    <th class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">Categoría</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-500" id="pendientesTableBody">
                                @foreach ($dispositivos as $dispositivo)
                                    @if ($dispositivo['donacion']['estado'] == 'Pendiente')
                                        <tr class="hover:bg-slate-500 transition-colors duration-200 device-row"
                                            data-id="{{ $dispositivo['id_dispositivo'] }}"
                                            data-nombre="{{ $dispositivo['nombre_dispositivo'] }}"
                                            data-categoria="{{ $dispositivo['categoria']['nombre_categoria'] }}"
                                            data-estado-fisico="{{ $dispositivo['estado_fisico'] }}"
                                            data-marca="{{ $dispositivo['marca'] }}">
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['id_dispositivo'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 whitespace-nowrap">
                                                <span
                                                    class="px-2 py-1 bg-yellow-500 text-yellow-900 rounded-full text-xs lg:text-sm font-medium">
                                                    {{ $dispositivo['donacion']['estado'] }}
                                                </span>
                                            </td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['nombre_dispositivo'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['marca'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['modelo'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 min-w-0 max-w-xs lg:max-w-sm">
                                                <div class="break-words text-sm lg:text-base">{{ $dispositivo['descripcion'] }}</div>
                                            </td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['estado_fisico'] }}</td>
                                            <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                                {{ $dispositivo['categoria']['nombre_categoria'] }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12 lg:py-16 bg-slate-700 rounded-xl border border-slate-600">
                <div class="text-4xl lg:text-6xl mb-4">📁</div>
                <p class="text-lg lg:text-xl text-gray-300">No hay dispositivos registrados.</p>
            </div>
        @endif
    </main>

    @include('admin.layouts.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const categoriaFilter = document.getElementById('categoriaFilter');
            const estadoFisicoFilter = document.getElementById('estadoFisicoFilter');
            const marcaFilter = document.getElementById('marcaFilter');
            const clearFiltersBtn = document.getElementById('clearFilters');
            const deviceRows = document.querySelectorAll('.device-row');

            // Llenar los select con opciones únicas
            const categorias = new Set();
            const estadosFisicos = new Set();
            const marcas = new Set();

            deviceRows.forEach(row => {
                categorias.add(row.getAttribute('data-categoria'));
                estadosFisicos.add(row.getAttribute('data-estado-fisico'));
                marcas.add(row.getAttribute('data-marca'));
            });

            // Agregar opciones a los select
            Array.from(categorias).sort().forEach(categoria => {
                const option = document.createElement('option');
                option.value = categoria;
                option.textContent = categoria;
                categoriaFilter.appendChild(option);
            });

            Array.from(estadosFisicos).sort().forEach(estado => {
                const option = document.createElement('option');
                option.value = estado;
                option.textContent = estado;
                estadoFisicoFilter.appendChild(option);
            });

            Array.from(marcas).sort().forEach(marca => {
                const option = document.createElement('option');
                option.value = marca;
                option.textContent = marca;
                marcaFilter.appendChild(option);
            });

            // Función para aplicar filtros
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedCategoria = categoriaFilter.value;
                const selectedEstadoFisico = estadoFisicoFilter.value;
                const selectedMarca = marcaFilter.value;

                deviceRows.forEach(row => {
                    const deviceId = row.getAttribute('data-id').toLowerCase();
                    const deviceNombre = row.getAttribute('data-nombre').toLowerCase();
                    const deviceCategoria = row.getAttribute('data-categoria');
                    const deviceEstadoFisico = row.getAttribute('data-estado-fisico');
                    const deviceMarca = row.getAttribute('data-marca');

                    // Verificar búsqueda por texto (ID o nombre)
                    const matchesSearch = searchTerm === '' || 
                                        deviceId.includes(searchTerm) || 
                                        deviceNombre.includes(searchTerm);

                    // Verificar filtros
                    const matchesCategoria = selectedCategoria === '' || deviceCategoria === selectedCategoria;
                    const matchesEstadoFisico = selectedEstadoFisico === '' || deviceEstadoFisico === selectedEstadoFisico;
                    const matchesMarca = selectedMarca === '' || deviceMarca === selectedMarca;

                    // Mostrar u ocultar fila
                    if (matchesSearch && matchesCategoria && matchesEstadoFisico && matchesMarca) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Event listeners
            searchInput.addEventListener('input', applyFilters);
            categoriaFilter.addEventListener('change', applyFilters);
            estadoFisicoFilter.addEventListener('change', applyFilters);
            marcaFilter.addEventListener('change', applyFilters);

            // Limpiar filtros
            clearFiltersBtn.addEventListener('click', function() {
                searchInput.value = '';
                categoriaFilter.value = '';
                estadoFisicoFilter.value = '';
                marcaFilter.value = '';
                applyFilters();
            });
        });
    </script>

</body>

</html>