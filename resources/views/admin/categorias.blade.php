<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Categorías - Admin</title>
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
            de Categorías</h1>

        <!-- Botón para agregar nueva categoría -->
        <div class="mb-4 sm:mb-6 lg:mb-8 flex justify-center">
            <button onclick="openCreateModal()"
                class="px-4 sm:px-6 py-2 sm:py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base font-medium">
                ➕ Agregar Nueva Categoría
            </button>
        </div>

        <!-- Buscador -->
        <div class="mb-4 sm:mb-6 lg:mb-8 space-y-3 sm:space-y-4">
            <div class="flex justify-center">
                <div class="relative w-full max-w-xs sm:max-w-md">
                    <input type="text" id="searchInput" placeholder="Buscar por nombre de categoría..."
                        class="w-full px-3 sm:px-4 py-2 sm:py-3 pl-8 sm:pl-10 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent text-sm sm:text-base">
                    <svg class="absolute left-2 sm:left-3 top-2.5 sm:top-3.5 w-4 h-4 sm:w-5 sm:h-5 text-gray-400"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="flex justify-center">
                <button id="clearFilters"
                    class="px-3 sm:px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                    Limpiar búsqueda
                </button>
            </div>
        </div>

        @if (!empty($categorias))
            <div class="bg-slate-700 rounded-xl p-3 sm:p-4 lg:p-6 shadow-xl border border-slate-600">
                <h2
                    class="text-lg sm:text-xl lg:text-2xl font-semibold mb-3 sm:mb-4 lg:mb-6 text-green-400 flex items-center gap-2 sm:gap-3">
                    <span class="text-lg sm:text-xl lg:text-2xl">📁</span>
                    Lista de Categorías
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
                                    Nombre</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-left font-medium whitespace-nowrap text-sm lg:text-base">
                                    Descripción</th>
                                <th
                                    class="px-2 lg:px-4 py-3 text-center font-medium whitespace-nowrap text-sm lg:text-base">
                                    Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-500" id="categoriasTableBody">
                            @foreach ($categorias as $categoria)
                                <tr class="hover:bg-slate-500 transition-colors duration-200 categoria-row"
                                    data-id="{{ $categoria['id_categoria'] }}"
                                    data-nombre="{{ $categoria['nombre_categoria'] }}">
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $categoria['id_categoria'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 whitespace-nowrap text-sm lg:text-base">
                                        {{ $categoria['nombre_categoria'] }}
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-gray-100 min-w-0 max-w-xs lg:max-w-lg">
                                        <div class="break-words text-sm lg:text-base">
                                            {{ $categoria['descripcion_categoria'] }}
                                        </div>
                                    </td>
                                    <td class="px-2 lg:px-4 py-3 text-center">
                                        <button onclick="confirmDelete('{{ $categoria['id_categoria'] }}')"
                                            class="px-2 sm:px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-xs sm:text-sm transition-colors duration-200">
                                            🗑️ Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Vista móvil (tarjetas) -->
                <div class="md:hidden space-y-3" id="categoriasCardContainer">
                    @foreach ($categorias as $categoria)
                        <div class="bg-slate-600 rounded-lg p-4 border border-slate-500 categoria-row"
                            data-id="{{ $categoria['id_categoria'] }}"
                            data-nombre="{{ $categoria['nombre_categoria'] }}">

                            <!-- Header de la tarjeta -->
                            <div class="flex justify-between items-start mb-3">
                                <div>
                                    <h3 class="text-white font-semibold text-sm">ID: {{ $categoria['id_categoria'] }}
                                    </h3>
                                    <p class="text-purple-300 text-base font-medium">
                                        {{ $categoria['nombre_categoria'] }}</p>
                                </div>
                            </div>

                            <!-- Información principal -->
                            <div class="space-y-2 text-sm text-gray-300">
                                <div>
                                    <span class="text-gray-400">Descripción:</span>
                                    <p class="text-white break-words mt-1">{{ $categoria['descripcion_categoria'] }}</p>
                                </div>
                            </div>

                            <!-- Botón de acción -->
                            <div class="flex justify-center mt-4">
                                <button onclick="confirmDelete('{{ $categoria['id_categoria'] }}')"
                                    class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded text-sm transition-colors duration-200">
                                    🗑️ Eliminar
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="text-center py-8 sm:py-12 lg:py-16 bg-slate-700 rounded-xl border border-slate-600">
                <div class="text-3xl sm:text-4xl lg:text-6xl mb-3 sm:mb-4">📁</div>
                <p class="text-base sm:text-lg lg:text-xl text-gray-300">No hay categorías registradas.</p>
            </div>
        @endif
    </main>

    <!-- Modal para Crear Categoría -->
    <div id="createModal"
        class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-2 sm:p-4">
        <div
            class="bg-slate-700 rounded-xl p-4 sm:p-6 max-w-xs sm:max-w-md w-full max-h-[90vh] overflow-y-auto border border-slate-600">
            <div class="flex justify-between items-center mb-3 sm:mb-4">
                <h3 class="text-lg sm:text-xl font-semibold text-green-400">Nueva Categoría</h3>
                <button onclick="closeCreateModal()"
                    class="text-gray-400 hover:text-white text-xl sm:text-2xl">×</button>
            </div>

            <form id="createForm" method="POST" action="{{ route('admin.categorias.post') }}"
                class="space-y-3 sm:space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1 sm:mb-2">Nombre de la Categoría</label>
                    <input type="text" id="nombre_categoria" name="nombre_categoria" required
                        class="w-full px-3 py-2 bg-slate-600 border border-slate-500 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 text-sm sm:text-base"
                        placeholder="Ingresa el nombre de la categoría">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1 sm:mb-2">Descripción</label>
                    <textarea id="descripcion_categoria" name="descripcion_categoria" rows="4" required
                        class="w-full px-3 py-2 bg-slate-600 border border-slate-500 rounded-lg text-gray-100 focus:outline-none focus:ring-2 focus:ring-green-500 resize-none text-sm sm:text-base"
                        placeholder="Describe la categoría"></textarea>
                </div>

                <div class="flex gap-2 sm:gap-3 pt-3 sm:pt-4">
                    <button type="submit"
                        class="flex-1 px-3 sm:px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Crear Categoría
                    </button>
                    <button type="button" onclick="closeCreateModal()"
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
                <h3 class="text-lg sm:text-xl font-semibold text-red-400 mb-2">Confirmar Eliminación</h3>
                <p class="text-gray-300 mb-4 sm:mb-6 text-sm sm:text-base">¿Estás seguro de que deseas eliminar esta
                    categoría?</p>
                <p class="text-xs sm:text-sm text-gray-400 mb-4 sm:mb-6">Esta acción no se puede deshacer.</p>

                <div class="flex gap-2 sm:gap-3">
                    <button onclick="closeDeleteAlert()"
                        class="flex-1 px-3 sm:px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Cancelar
                    </button>
                    <button onclick="executeDelete()"
                        class="flex-1 px-3 sm:px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 text-sm sm:text-base">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario oculto para eliminar -->
    <form id="deleteForm" method="POST" action="{{ route('admin.categorias.delete') }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    @include('admin.layouts.footer')

    <script>
        let deleteId = null;

        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearFiltersBtn = document.getElementById('clearFilters');
            const categoriaRows = document.querySelectorAll('.categoria-row');

            // Verificar que existan elementos
            if (!searchInput || !clearFiltersBtn) {
                console.error('Algunos elementos de búsqueda no se encontraron');
                return;
            }

            // Función para aplicar filtros
            function applyFilters() {
                const searchTerm = searchInput.value.toLowerCase().trim();

                categoriaRows.forEach(row => {
                    const rowId = (row.getAttribute('data-id') || '').toLowerCase();
                    const rowNombre = (row.getAttribute('data-nombre') || '').toLowerCase();

                    // Verificar búsqueda por texto (ID o nombre de la categoría)
                    const matchesSearch = searchTerm === '' ||
                        rowId.includes(searchTerm) ||
                        rowNombre.includes(searchTerm);

                    // Mostrar u ocultar fila
                    if (matchesSearch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Event listeners
            searchInput.addEventListener('input', applyFilters);

            // Limpiar filtros
            clearFiltersBtn.addEventListener('click', function() {
                searchInput.value = '';
                applyFilters();
            });
        });

        // Funciones para el modal de creación
        function openCreateModal() {
            document.getElementById('createModal').classList.remove('hidden');
        }

        function closeCreateModal() {
            document.getElementById('createModal').classList.add('hidden');
            // Limpiar formulario
            document.getElementById('createForm').reset();
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
            let idInput = deleteForm.querySelector('input[name="id_categoria"]');
            if (!idInput) {
                idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id_categoria';
                deleteForm.appendChild(idInput);
            }
            idInput.value = deleteId;

            // Enviar el formulario
            deleteForm.submit();
        }

        // Cerrar modales al hacer clic fuera
        document.addEventListener('click', function(e) {
            const createModal = document.getElementById('createModal');
            const deleteAlert = document.getElementById('deleteAlert');

            if (createModal && e.target === createModal) {
                closeCreateModal();
            }

            if (deleteAlert && e.target === deleteAlert) {
                closeDeleteAlert();
            }
        });

        // Cerrar modales con Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeCreateModal();
                closeDeleteAlert();
            }
        });
    </script>

</body>

</html>