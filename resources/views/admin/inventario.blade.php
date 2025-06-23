<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Inventario - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-800">
    @include('admin.layouts.nav')

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

    <main class="mx-2 sm:mx-4 p-2 sm:p-4 lg:p-8 lg:mx-auto max-w-full">
        <h1 class="text-xl sm:text-2xl lg:text-4xl font-bold text-center mb-4 sm:mb-6 lg:mb-8 text-purple-400">Gestión
            de Inventario</h1>

        <!-- Buscador y Filtros -->
        <div class="mb-4 sm:mb-6 lg:mb-8 space-y-3 sm:space-y-4">
            <!-- Buscador -->
            <div class="flex justify-center">
                <div class="relative w-full max-w-xs sm:max-w-md">
                    <input type="text" id="searchInput" placeholder="Buscar por ID o nombre del dispositivo..."
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-8 sm:pl-10 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm sm:text-base">
                    <svg class="absolute left-2 sm:left-3 top-2.5 sm:top-3.5 w-4 h-4 sm:w-5 sm:h-5 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Filtros -->
            <div class="flex flex-col sm:flex-row gap-2 sm:gap-4 justify-center items-center">
                <div class="w-full sm:w-auto">
                    <select id="disponibleFilter"
                        class="w-full sm:w-48 px-3 sm:px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm sm:text-base">
                        <option value="">Todos los estados</option>
                        <option value="Disponible">Disponible</option>
                        <option value="No disponible">No disponible</option>
                    </select>
                </div>
                <div class="w-full sm:w-auto">
                    <select id="marcaFilter"
                        class="w-full sm:w-48 px-3 sm:px-4 py-2 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm sm:text-base">
                        <option value="">Todas las marcas</option>
                    </select>
                </div>
                <button id="clearFilters"
                    class="w-full sm:w-auto px-3 sm:px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                    Limpiar filtros
                </button>
            </div>
        </div>

        @if (!empty($inventario))
            <div class="bg-slate-700 rounded-xl p-3 sm:p-4 lg:p-6 shadow-xl border border-slate-600">
                <h2
                    class="text-lg sm:text-xl lg:text-2xl font-semibold mb-3 sm:mb-4 lg:mb-6 text-green-400 flex items-center gap-2 sm:gap-3">
                    <span class="text-lg sm:text-xl lg:text-2xl">📦</span>
                    Inventario de Dispositivos
                </h2>

                <!-- Vista desktop/tablet -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="table-auto w-full bg-slate-600 rounded-lg overflow-hidden shadow-lg min-w-max">
                        <thead class="bg-slate-800">
                            <tr class="text-gray-200">
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    ID</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Fecha Ingreso</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Fecha Salida</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Estado</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Precio Estimado</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Observaciones</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Dispositivo</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Marca</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Modelo</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Estado Físico</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-500" id="inventarioTableBody">
                            @foreach ($inventario as $producto)
                                <tr class="hover:bg-slate-500 transition-colors duration-200 inventario-row"
                                    data-id="{{ $producto['id_inventario'] }}"
                                    data-dispositivo="{{ $producto['dispositivo']['nombre_dispositivo'] }}"
                                    data-marca="{{ $producto['dispositivo']['marca'] }}"
                                    data-disponible="{{ $producto['disponible'] ? 'Disponible' : 'No disponible' }}">
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['id_inventario'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['fecha_ingreso'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['fecha_salida'] ?? 'N/A' }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 py-1 rounded-full text-xs lg:text-sm font-medium {{ $producto['disponible'] ? 'bg-green-500 text-green-900' : 'bg-red-500 text-red-900' }}">
                                            {{ $producto['disponible'] ? 'Disponible' : 'No disponible' }}
                                        </span>
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        ${{ number_format($producto['precio_estimado'], 2) }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 min-w-0 max-w-xs lg:max-w-sm">
                                        <div class="break-words text-sm lg:text-base">
                                            {{ $producto['observaciones_inventario'] }}</div>
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['dispositivo']['nombre_dispositivo'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['dispositivo']['marca'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['dispositivo']['modelo'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $producto['dispositivo']['estado_fisico'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 whitespace-nowrap">
                                        <div class="flex gap-1 sm:gap-2">
                                            <button onclick="openEditModal({{ json_encode($producto) }})"
                                                class="px-2 sm:px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded text-xs sm:text-sm transition-colors duration-200">
                                                ✏️ Editar
                                            </button>
                                            @if ($producto['disponible'] == 1)
                                                <button onclick="confirmDelete('{{ $producto['id_inventario'] }}')"
                                                    class="px-2 sm:px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs sm:text-sm transition-colors duration-200">
                                                    ❌ No disponible
                                                </button>
                                            @else
                                                <button onclick="confirmDelete('{{ $producto['id_inventario'] }}')"
                                                    class="px-2 sm:px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded text-xs sm:text-sm transition-colors duration-200">
                                                    ✅ Disponible
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Vista móvil (tarjetas) -->
                <div class="md:hidden space-y-3" id="inventarioCardContainer">
                    @foreach ($inventario as $producto)
                        <div class="bg-slate-600 rounded-lg p-4 border border-slate-500 inventario-row"
                            data-id="{{ $producto['id_inventario'] }}"
                            data-dispositivo="{{ $producto['dispositivo']['nombre_dispositivo'] }}"
                            data-marca="{{ $producto['dispositivo']['marca'] }}"
                            data-disponible="{{ $producto['disponible'] ? 'Disponible' : 'No disponible' }}">

                            <!-- Header de la tarjeta -->
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-white font-semibold text-sm">ID: {{ $producto['id_inventario'] }}
                                    </h3>
                                    <p class="text-gray-300 text-sm">
                                        {{ $producto['dispositivo']['nombre_dispositivo'] }}</p>
                                </div>
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-medium {{ $producto['disponible'] ? 'bg-green-500 text-green-900' : 'bg-red-500 text-red-900' }}">
                                    {{ $producto['disponible'] ? 'Disponible' : 'No disponible' }}
                                </span>
                            </div>

                            <!-- Información principal -->
                            <div class="space-y-2 text-sm text-gray-300">
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <span class="text-gray-400">Marca:</span>
                                        <p class="text-white">{{ $producto['dispositivo']['marca'] }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-400">Modelo:</span>
                                        <p class="text-white">{{ $producto['dispositivo']['modelo'] }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <span class="text-gray-400">Precio:</span>
                                        <p class="text-white">${{ number_format($producto['precio_estimado'], 2) }}
                                        </p>
                                    </div>
                                    <div>
                                        <span class="text-gray-400">Estado Físico:</span>
                                        <p class="text-white">{{ $producto['dispositivo']['estado_fisico'] }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <span class="text-gray-400">F. Ingreso:</span>
                                        <p class="text-white">{{ $producto['fecha_ingreso'] }}</p>
                                    </div>
                                    <div>
                                        <span class="text-gray-400">F. Salida:</span>
                                        <p class="text-white">{{ $producto['fecha_salida'] ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                @if ($producto['observaciones_inventario'])
                                    <div>
                                        <span class="text-gray-400">Observaciones:</span>
                                        <p class="text-white break-words">{{ $producto['observaciones_inventario'] }}
                                        </p>
                                    </div>
                                @endif
                            </div>

                            <!-- Botones de acción -->
                            <div class="flex gap-2 mt-4">
                                <button onclick="openEditModal({{ json_encode($producto) }})"
                                    class="flex-1 px-3 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm transition-colors duration-200 text-center">
                                    ✏️ Editar
                                </button>
                                @if ($producto['disponible'] == 1)
                                    <button onclick="confirmDelete('{{ $producto['id_inventario'] }}')"
                                        class="px-2 sm:px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs sm:text-sm transition-colors duration-200">
                                        ❌ No disponible
                                    </button>
                                @else
                                    <button onclick="confirmDelete('{{ $producto['id_inventario'] }}')"
                                        class="px-2 sm:px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded text-xs sm:text-sm transition-colors duration-200">
                                        ✅ Disponible
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-8 sm:py-12 lg:py-16 bg-slate-700 rounded-xl border border-slate-600">
                <div class="text-3xl sm:text-4xl lg:text-6xl mb-3 sm:mb-4">📁</div>
                <p class="text-base sm:text-lg lg:text-xl text-gray-300">No hay dispositivos en el inventario.</p>
            </div>
        @endif
    </main>

    <!-- Modal para Editar -->
    <div id="editModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-2 sm:p-4">
        <div
            class="bg-slate-700 rounded-xl p-4 sm:p-6 max-w-xs sm:max-w-md w-full max-h-[90vh] overflow-y-auto border border-slate-600">
            <div class="flex justify-between items-center mb-3 sm:mb-4">
                <h3 class="text-lg sm:text-xl font-semibold text-purple-400">Editar Inventario</h3>
                <button onclick="closeEditModal()"
                    class="text-gray-400 hover:text-white text-xl sm:text-2xl">×</button>
            </div>

            <form id="editForm" method="POST" action="{{ route('admin.inventario.put') }}"
                class="space-y-3 sm:space-y-4">
                @csrf
                @method('PUT')

                <input type="hidden" id="edit_id_inventario" name="id_inventario">

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1 sm:mb-2">Fecha de Salida</label>
                    <input type="date" id="edit_fecha_salida" name="fecha_salida"
                        class="w-full px-3 py-2 bg-slate-600 border border-slate-500 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm sm:text-base">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1 sm:mb-2">Precio Estimado</label>
                    <input type="number" id="edit_precio_estimado" name="precio_estimado" step="0.01"
                        min="0"
                        class="w-full px-3 py-2 bg-slate-600 border border-slate-500 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 text-sm sm:text-base">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1 sm:mb-2">Observaciones</label>
                    <textarea id="edit_observaciones_inventario" name="observaciones_inventario" rows="3"
                        class="w-full px-3 py-2 bg-slate-600 border border-slate-500 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500 resize-none text-sm sm:text-base"></textarea>
                </div>

                <div class="flex gap-2 sm:gap-3 pt-3 sm:pt-4">
                    <button type="submit"
                        class="flex-1 px-3 sm:px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Actualizar
                    </button>
                    <button type="button" onclick="closeEditModal()"
                        class="flex-1 px-3 sm:px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Alerta Personalizada para Eliminar -->
    <div id="deleteAlert"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-2 sm:p-4">
        <div class="bg-slate-700 rounded-xl p-4 sm:p-6 max-w-xs sm:max-w-sm w-full border border-slate-600 shadow-2xl">
            <div class="text-center">
                <div class="text-3xl sm:text-4xl mb-3 sm:mb-4">⚠️</div>
                <h3 class="text-lg sm:text-xl font-semibold text-red-400 mb-2">Confirmar cambiar estado</h3>
                <p class="text-gray-300 mb-4 sm:mb-6 text-sm sm:text-base">¿Estás seguro de que deseas cambiar el
                    estado del dispositivo?</p>
                <p class="text-xs sm:text-sm text-gray-400 mb-4 sm:mb-6">Esta acción no se puede deshacer.</p>

                <div class="flex gap-2 sm:gap-3">
                    <button onclick="closeDeleteAlert()"
                        class="flex-1 px-3 sm:px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Cancelar
                    </button>
                    <button onclick="executeDelete()"
                        class="flex-1 px-3 sm:px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario oculto para eliminar -->
    <form id="deleteForm" method="POST" action="{{ route('admin.inventario.delete') }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    @include('admin.layouts.footer')

    <script>
        let deleteId = null;

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const disponibleFilter = document.getElementById('disponibleFilter');
            const marcaFilter = document.getElementById('marcaFilter');
            const clearFiltersBtn = document.getElementById('clearFilters');
            const inventarioRows = document.querySelectorAll('.inventario-row');

            // Verificar que existan elementos
            if (!searchInput || !disponibleFilter || !marcaFilter || !clearFiltersBtn) {
                console.error('Algunos elementos de filtros no se encontraron');
                return;
            }

            // Llenar el select de marcas con opciones únicas
            const marcas = new Set();
            inventarioRows.forEach(row => {
                const marca = row.getAttribute('data-marca');
                if (marca && marca.trim() !== '') {
                    marcas.add(marca);
                }
            });

            // Agregar opciones al select de marcas
            Array.from(marcas).sort().forEach(marca => {
                const option = document.createElement('option');
                option.value = marca;
                option.textContent = marca;
                marcaFilter.appendChild(option);
            });

            // Función para aplicar filtros
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const selectedDisponible = disponibleFilter.value;
                const selectedMarca = marcaFilter.value;

                inventarioRows.forEach(row => {
                    const rowId = (row.getAttribute('data-id') || '').toLowerCase();
                    const rowDispositivo = (row.getAttribute('data-dispositivo') || '').toLowerCase();
                    const rowDisponible = row.getAttribute('data-disponible') || '';
                    const rowMarca = row.getAttribute('data-marca') || '';

                    // Verificar búsqueda por texto (ID o nombre del dispositivo)
                    const matchesSearch = searchTerm === '' ||
                        rowId.includes(searchTerm) ||
                        rowDispositivo.includes(searchTerm);

                    // Verificar filtros
                    const matchesDisponible = selectedDisponible === '' || rowDisponible ===
                        selectedDisponible;
                    const matchesMarca = selectedMarca === '' || rowMarca === selectedMarca;

                    // Mostrar u ocultar fila
                    if (matchesSearch && matchesDisponible && matchesMarca) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Event listeners
            searchInput.addEventListener('input', applyFilters);
            disponibleFilter.addEventListener('change', applyFilters);
            marcaFilter.addEventListener('change', applyFilters);

            // Limpiar filtros
            clearFiltersBtn.addEventListener('click', function() {
                searchInput.value = '';
                disponibleFilter.value = '';
                marcaFilter.value = '';
                applyFilters();
            });
        });

        // Funciones para el modal de edición
        function openEditModal(producto) {
            if (!producto) {
                console.error('Producto no definido');
                return;
            }

            // Poblar campos del modal
            document.getElementById('edit_id_inventario').value = producto.id_inventario || '';
            document.getElementById('edit_fecha_salida').value = producto.fecha_salida || '';
            document.getElementById('edit_precio_estimado').value = producto.precio_estimado || '';
            document.getElementById('edit_observaciones_inventario').value = producto.observaciones_inventario || '';

            // Mostrar modal
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.add('hidden');
        }

        // Funciones para la alerta de eliminación
        function confirmDelete(id) {
            if (!id) {
                console.error('ID no definido para eliminar');
                return;
            }
            deleteId = id;
            document.getElementById('deleteAlert').classList.remove('hidden');
        }

        function closeDeleteAlert() {
            document.getElementById('deleteAlert').classList.add('hidden');
            deleteId = null;
        }

        function executeDelete() {
            if (!deleteId) {
                console.error('No hay ID para eliminar');
                return;
            }

            const deleteForm = document.getElementById('deleteForm');

            // Crear un input hidden para enviar el ID
            let idInput = deleteForm.querySelector('input[name="id_inventario"]');
            if (!idInput) {
                idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id_inventario';
                deleteForm.appendChild(idInput);
            }
            idInput.value = deleteId;

            // Enviar el formulario
            deleteForm.submit();
        }

        // Cerrar modales al hacer clic fuera
        document.addEventListener('click', function(e) {
            const editModal = document.getElementById('editModal');
            const deleteAlert = document.getElementById('deleteAlert');

            if (editModal && e.target === editModal) {
                closeEditModal();
            }

            if (deleteAlert && e.target === deleteAlert) {
                closeDeleteAlert();
            }
        });

        // Cerrar modales con Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeEditModal();
                closeDeleteAlert();
            }
        });
    </script>

</body>

</html>
