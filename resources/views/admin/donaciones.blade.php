<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Donaciones - Admin</title>
</head>

<body class="bg-slate-800">
    @include('admin.layouts.nav')

    <!-- Modal de Confirmación -->
    <div id="confirmModal" class="hidden fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-900 bg-opacity-75"></div>

            <!-- Modal -->
            <div
                class="inline-block w-full max-w-md p-6 my-8 overflow-hidden text-left align-middle transition-all transform bg-slate-800 shadow-xl rounded-2xl border border-slate-600">
                <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-amber-100 rounded-full">
                    <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-center text-gray-100 mb-2">Confirmar Acción</h3>
                <p class="text-sm text-gray-300 text-center mb-6">¿Estás seguro de que deseas marcar esta donación como
                    recibida?</p>
                <div class="flex space-x-3">
                    <button id="cancelBtn"
                        class="flex-1 px-4 py-2 text-sm font-medium text-gray-300 bg-slate-700 hover:bg-slate-600 border border-slate-600 rounded-lg transition-colors duration-200">
                        Cancelar
                    </button>
                    <button id="confirmBtn"
                        class="flex-1 px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>
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

    <main class="mx-4 p-8 lg:mx-auto">
        <h1 class="text-4xl font-bold text-center mb-8 text-purple-400">Gestión de Donaciones</h1>

        <!-- Buscador -->
        <div class="mb-8 flex justify-center">
            <div class="relative w-full max-w-md">
                <input type="text" id="searchInput" placeholder="Buscar por ID de donación..."
                    class="w-full px-4 py-3 pl-10 bg-slate-700 border border-slate-600 rounded-lg text-gray-100 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                <svg class="absolute left-3 top-3.5 w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>

        @if (!empty($donaciones))
            <div class="space-y-12">
                <!-- Sección Pendientes -->
                <div class="bg-slate-700 rounded-xl p-6 shadow-xl border border-slate-600">
                    <h2 class="text-2xl font-semibold mb-6 text-yellow-400 flex items-center gap-3">
                        <span class="text-2xl">📋</span>
                        Pendientes
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full bg-slate-600 rounded-lg overflow-hidden shadow-lg min-w-max">
                            <thead class="bg-slate-800">
                                <tr class="text-gray-200">
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">ID</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Nombre</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Fecha</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Estado</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Cantidad Dispositivos
                                    </th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Dispositivos</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-500" id="pendientesTableBody">
                                @foreach ($donaciones as $donacion)
                                    @if ($donacion['estado'] == 'Pendiente')
                                        <tr class="hover:bg-slate-500 transition-colors duration-200 donation-row"
                                            data-id="{{ $donacion['id_donacion'] }}">
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['id_donacion'] }}</td>
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['usuario']['nombre'] }}
                                                {{ $donacion['usuario']['apellido'] }}</td>
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['fecha_donacion'] }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span
                                                    class="px-2 py-1 bg-yellow-500 text-yellow-900 rounded-full text-sm font-medium">
                                                    {{ $donacion['estado'] }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['cantidad_dispositivos'] }}</td>
                                            <td class="px-4 py-3 text-gray-100 min-w-0">
                                                <div class="space-y-3">
                                                    @foreach ($donacion['dispositivos'] as $index => $dispositivo)
                                                        <div
                                                            class="bg-slate-500 rounded-lg p-3 border border-slate-400">
                                                            <div
                                                                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 text-sm">
                                                                <div>
                                                                    <span
                                                                        class="font-medium text-blue-300">Dispositivo:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['nombre_dispositivo'] }}</span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="font-medium text-blue-300">Marca:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['marca'] }}</span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="font-medium text-blue-300">Modelo:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['modelo'] }}</span>
                                                                </div>
                                                                <div class="sm:col-span-2">
                                                                    <span
                                                                        class="font-medium text-blue-300">Descripción:</span>
                                                                    <span
                                                                        class="text-gray-100 block break-words">{{ $dispositivo['descripcion'] }}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="font-medium text-blue-300">Estado
                                                                        Físico:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['estado_fisico'] }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <form action="{{ route('admin.donaciones.put') }}" method="POST"
                                                    class="confirm-form">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id_donacion"
                                                        value="{{ $donacion['id_donacion'] }}">
                                                    <input type="hidden" name="correo_usuario"
                                                        value="{{ $donacion['usuario']['correo'] }}">
                                                    <button type="button"
                                                        class="confirm-button bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200 shadow-lg hover:shadow-xl text-sm">
                                                        Marcar como Recibido
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Sección Recibidas -->
                <div class="bg-slate-700 rounded-xl p-6 shadow-xl border border-slate-600">
                    <h2 class="text-2xl font-semibold mb-6 text-green-400 flex items-center gap-3">
                        <span class="text-2xl">✅</span>
                        Recibidas
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full bg-slate-600 rounded-lg overflow-hidden shadow-lg min-w-max">
                            <thead class="bg-slate-800">
                                <tr class="text-gray-200">
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">ID</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Nombre</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Fecha</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Estado</th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Cantidad Dispositivos
                                    </th>
                                    <th class="px-4 py-3 text-left font-medium whitespace-nowrap">Dispositivos</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-500" id="recibidasTableBody">
                                @foreach ($donaciones as $donacion)
                                    @if ($donacion['estado'] == 'Recibida')
                                        <tr class="hover:bg-slate-500 transition-colors duration-200 donation-row"
                                            data-id="{{ $donacion['id_donacion'] }}">
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['id_donacion'] }}</td>
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['usuario']['nombre'] }}
                                                {{ $donacion['usuario']['apellido'] }}</td>
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['fecha_donacion'] }}</td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <span
                                                    class="px-2 py-1 bg-green-500 text-green-900 rounded-full text-sm font-medium">
                                                    {{ $donacion['estado'] }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-gray-100 whitespace-nowrap">
                                                {{ $donacion['cantidad_dispositivos'] }}</td>
                                            <td class="px-4 py-3 text-gray-100 min-w-0">
                                                <div class="space-y-3">
                                                    @foreach ($donacion['dispositivos'] as $index => $dispositivo)
                                                        <div
                                                            class="bg-slate-500 rounded-lg p-3 border border-slate-400">
                                                            <div
                                                                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 text-sm">
                                                                <div>
                                                                    <span
                                                                        class="font-medium text-blue-300">Dispositivo:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['nombre_dispositivo'] }}</span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="font-medium text-blue-300">Marca:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['marca'] }}</span>
                                                                </div>
                                                                <div>
                                                                    <span
                                                                        class="font-medium text-blue-300">Modelo:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['modelo'] }}</span>
                                                                </div>
                                                                <div class="sm:col-span-2">
                                                                    <span
                                                                        class="font-medium text-blue-300">Descripción:</span>
                                                                    <span
                                                                        class="text-gray-100 block break-words">{{ $dispositivo['descripcion'] }}</span>
                                                                </div>
                                                                <div>
                                                                    <span class="font-medium text-blue-300">Estado
                                                                        Físico:</span>
                                                                    <span
                                                                        class="text-gray-100 block">{{ $dispositivo['estado_fisico'] }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-16 bg-slate-700 rounded-xl border border-slate-600">
                <div class="text-6xl mb-4">📁</div>
                <p class="text-xl text-gray-300">Aún no hay donaciones</p>
            </div>
        @endif
    </main>

    @include('admin.layouts.footer')
    
    <script>
        // Script para el buscador
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const donationRows = document.querySelectorAll('.donation-row');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();

                donationRows.forEach(row => {
                    const donationId = row.getAttribute('data-id').toLowerCase();

                    if (donationId.includes(searchTerm) || searchTerm === '') {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        });

        // Script para manejar el modal de confirmación
        let currentForm = null;

        // Obtener elementos del modal
        const modal = document.getElementById('confirmModal');
        const confirmBtn = document.getElementById('confirmBtn');
        const cancelBtn = document.getElementById('cancelBtn');

        // Agregar event listeners a todos los botones de confirmación
        document.addEventListener('DOMContentLoaded', function() {
            const confirmButtons = document.querySelectorAll('.confirm-button');

            confirmButtons.forEach(button => {
                button.addEventListener('click', function() {
                    currentForm = this.closest('form');
                    modal.classList.remove('hidden');
                });
            });
        });

        // Cancelar
        cancelBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
            currentForm = null;
        });

        // Confirmar
        confirmBtn.addEventListener('click', function() {
            if (currentForm) {
                currentForm.submit();
            }
            modal.classList.add('hidden');
        });

        // Cerrar modal al hacer clic fuera
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
                currentForm = null;
            }
        });
    </script>

</body>

</html>
