<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Proyectos - Admin</title>
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
            padding: 30px;
            border-radius: 16px;
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            border: 1px solid rgba(148, 163, 184, 0.2);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);
        }

        .close {
            color: #94a3b8;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 15px;
            transition: color 0.3s ease;
        }

        .close:hover {
            color: #f8fafc;
        }

        .imagen-item,
        .enlace-item {
            background: rgba(51, 65, 85, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            padding: 15px;
            margin: 10px 0;
            border-radius: 12px;
            backdrop-filter: blur(8px);
        }

        .imagen-preview {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            margin-right: 15px;
            border-radius: 8px;
            border: 2px solid rgba(148, 163, 184, 0.3);
        }

        .project-card {
            background: linear-gradient(135deg, rgba(51, 65, 85, 0.8) 0%, rgba(71, 85, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.3);
            border-color: rgba(56, 189, 248, 0.4);
        }

        .gallery-image {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .gallery-image:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.4);
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
    </style>
</head>

<body class="text-gray-100">
    @include('admin.layouts.nav')
    <div class="min-h-screen p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-5xl font-bold gradient-text mb-4">Gestión de Proyectos</h1>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full"></div>
            </div>

            @if (session('mensaje'))
                <div
                    class="bg-green-500/20 border border-green-500/50 text-green-300 px-6 py-4 rounded-xl mb-8 backdrop-filter backdrop-blur-sm">
                    <p class="font-medium">{{ session('mensaje') }}</p>
                </div>
            @endif

            @if (!empty($proyectos))
                <!-- Projects Grid -->
                <div class="grid gap-8 mb-12">
                    @foreach ($proyectos as $proyecto)
                        <div class="project-card p-8 rounded-2xl">
                            <!-- Project Header -->
                            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                                <div class="flex items-center space-x-4 mb-4 lg:mb-0">
                                    <div
                                        class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                                        Grupo: {{ $proyecto['grupo'] }}
                                    </div>
                                    <div
                                        class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                                        {{ $proyecto['especialidad'] }}
                                    </div>
                                </div>
                            </div>

                            <h3 class="text-3xl font-bold text-white mb-6">{{ $proyecto['titulo'] }}</h3>

                            <!-- Project Details -->
                            <div class="grid md:grid-cols-3 gap-6 mb-6">
                                <div class="bg-slate-800/50 p-4 rounded-xl border border-gray-600/30">
                                    <p class="text-gray-400 text-sm font-medium mb-1">UAC</p>
                                    <p class="text-white font-semibold">{{ $proyecto['UAC'] }}</p>
                                </div>
                                <div class="bg-slate-800/50 p-4 rounded-xl border border-gray-600/30">
                                    <p class="text-gray-400 text-sm font-medium mb-1">Progresión</p>
                                    <p class="text-white font-semibold">{{ $proyecto['progresion'] }}</p>
                                </div>
                                <div class="bg-slate-800/50 p-4 rounded-xl border border-gray-600/30">
                                    <p class="text-gray-400 text-sm font-medium mb-1">Fecha</p>
                                    <p class="text-white font-semibold">{{ $proyecto['fecha_realizacion'] }}</p>
                                </div>
                            </div>

                            <p class="text-gray-300 leading-relaxed mb-8">{{ $proyecto['descripcion'] }}</p>

                            @if (!empty($proyecto['imagenes']))
                                <div class="mb-8">
                                    <h4 class="text-xl font-bold text-white mb-4 flex items-center">
                                        <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                                        Galería del Proyecto
                                    </h4>
                                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                                        @foreach ($proyecto['imagenes'] as $index => $imagen)
                                            <div class="gallery-image rounded-xl overflow-hidden border-2 border-gray-600/30 hover:border-blue-500/50"
                                                onclick="openModal([@foreach ($proyecto['imagenes'] as $img)'{{ $img['imagen'] }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                                <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                    alt="Imagen del proyecto" class="w-full h-24 object-cover">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            @if (!empty($proyecto['enlaces']))
                                <div class="mb-8">
                                    <h4 class="text-xl font-bold text-white mb-4 flex items-center">
                                        <span class="w-2 h-2 bg-purple-500 rounded-full mr-3"></span>
                                        Enlaces
                                    </h4>
                                    <div class="flex flex-wrap gap-3">
                                        @foreach ($proyecto['enlaces'] as $enlace)
                                            <a href="{{ $enlace['enlace'] }}" target="_blank"
                                                class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-purple-600 transition-all duration-300 transform hover:scale-105 shadow-lg">
                                                {{ $enlace['titulo_enlace'] }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="flex flex-wrap gap-4 pt-6 border-t border-gray-600/30">
                                <button type="button"
                                    class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg"
                                    onclick="abrirModalEdicion('{{ $proyecto['id_galeria'] }}')">
                                    ✏️ Actualizar Datos
                                </button>

                                <form action="{{ route('admin.proyectos.delete') }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id_galeria" value="{{ $proyecto['id_galeria'] }}">
                                    <button type="submit"
                                        class="bg-gradient-to-r from-red-500 to-red-600 text-white px-8 py-3 rounded-xl font-medium hover:from-red-600 hover:to-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg"
                                        onclick="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">
                                        🗑️ Eliminar Proyecto
                                    </button>
                                </form>
                            </div>

                            <!-- Modal de edición -->
                            <div id="modal-{{ $proyecto['id_galeria'] }}" class="modal"
                                style="display: none; position: fixed; z-index: 9999; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0,0,0,0.8);">
                                <div class="modal-content"
                                    style="background-color: #1e293b; margin: 2% auto; padding: 20px; border-radius: 12px; width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto; position: relative; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8);">
                                    <span class="close" onclick="cerrarModal('{{ $proyecto['id_galeria'] }}')"
                                        style="color: #aaa; float: right; font-size: 28px; font-weight: bold; cursor: pointer; position: absolute; right: 15px; top: 15px; z-index: 10000;">&times;</span>
                                    <h3 class="text-2xl font-bold text-white mb-8">Editar Proyecto</h3>

                                    <form action="" method="POST" enctype="multipart/form-data" class="space-y-6">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="id_galeria" value="{{ $proyecto['id_galeria'] }}">

                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="nombre_docente_{{ $proyecto['id_galeria'] }}"
                                                    class="block text-sm font-medium text-gray-300 mb-2">Nombre del
                                                    docente:</label>
                                                <input type="text" name="nombre_docente"
                                                    id="nombre_docente_{{ $proyecto['id_galeria'] }}"
                                                    value="{{ $proyecto['nombre_docente'] ?? '' }}"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            </div>

                                            <div>
                                                <label for="UAC_{{ $proyecto['id_galeria'] }}"
                                                    class="block text-sm font-medium text-gray-300 mb-2">UAC:</label>
                                                <input type="text" name="UAC"
                                                    id="UAC_{{ $proyecto['id_galeria'] }}"
                                                    value="{{ $proyecto['UAC'] ?? '' }}"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-3 gap-6">
                                            <div>
                                                <label for="semestre"
                                                    class="block text-sm font-medium text-gray-300 mb-2">Semestre:</label>
                                                <select name="semestre"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="grupo"
                                                    class="block text-sm font-medium text-gray-300 mb-2">Grupo:</label>
                                                <select name="grupo"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
                                                    <option value="G">G</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="especialidad"
                                                    class="block text-sm font-medium text-gray-300 mb-2">Especialidad:</label>
                                                <select name="especialidad"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                                    <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                                                    <option value="Contabilidad">Contabilidad</option>
                                                    <option value="Programación">Programación</option>
                                                    <option value="Construcción">Construcción</option>
                                                    <option value="Logística">Logística</option>
                                                    <option value="Ofimática">Ofimática</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="progresion_{{ $proyecto['id_galeria'] }}"
                                                    class="block text-sm font-medium text-gray-300 mb-2">Progresión:</label>
                                                <input type="text" name="progresion"
                                                    id="progresion_{{ $proyecto['id_galeria'] }}"
                                                    value="{{ $proyecto['progresion'] ?? '' }}"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            </div>

                                            <div>
                                                <label for="fecha_realizacion_{{ $proyecto['id_galeria'] }}"
                                                    class="block text-sm font-medium text-gray-300 mb-2">Fecha de
                                                    realización:</label>
                                                <input type="date" name="fecha_realizacion"
                                                    id="fecha_realizacion_{{ $proyecto['id_galeria'] }}"
                                                    value="{{ $proyecto['fecha_realizacion'] ?? '' }}"
                                                    class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                            </div>
                                        </div>

                                        <div>
                                            <label for="titulo_{{ $proyecto['id_galeria'] }}"
                                                class="block text-sm font-medium text-gray-300 mb-2">Título:</label>
                                            <input type="text" name="titulo"
                                                id="titulo_{{ $proyecto['id_galeria'] }}"
                                                value="{{ $proyecto['titulo'] ?? '' }}"
                                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300">
                                        </div>

                                        <div>
                                            <label for="descripcion_{{ $proyecto['id_galeria'] }}"
                                                class="block text-sm font-medium text-gray-300 mb-2">Descripción:</label>
                                            <textarea name="descripcion" id="descripcion_{{ $proyecto['id_galeria'] }}"
                                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-300 h-24 resize-vertical">{{ $proyecto['descripcion'] ?? '' }}</textarea>
                                        </div>

                                        <!-- Sección de imágenes existentes -->
                                        <div class="bg-slate-800/30 p-6 rounded-xl border border-gray-600/30">
                                            <h4 class="text-lg font-bold text-white mb-4 flex items-center">
                                                🖼️ Imágenes
                                            </h4>
                                            <div id="imagenes-existentes-{{ $proyecto['id_galeria'] }}">
                                                @if (!empty($proyecto['imagenes']))
                                                    @foreach ($proyecto['imagenes'] as $imagen)
                                                        <div class="imagen-item flex items-center space-x-4"
                                                            id="imagen-existente-{{ $imagen['id_galeria_imagen'] ?? $loop->index }}">
                                                            <img src="{{ asset('storage/' . $imagen['imagen']) }}"
                                                                alt="Imagen" class="imagen-preview">
                                                            <input type="hidden"
                                                                name="imagenes_existentes[{{ $loop->index }}][id_galeria_imagen]"
                                                                value="{{ $imagen['id_galeria_imagen'] ?? '' }}">
                                                            <input type="text"
                                                                name="imagenes_existentes[{{ $loop->index }}][imagen]"
                                                                value="{{ $imagen['imagen'] }}"
                                                                placeholder="URL de imagen"
                                                                class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                            <input type="file"
                                                                name="imagenes_existentes[{{ $loop->index }}][archivo]"
                                                                accept="image/*"
                                                                class="px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                            <button type="button"
                                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
                                                                onclick="marcarImagenParaEliminar('{{ $imagen['id_galeria_imagen'] ?? $loop->index }}', '{{ $proyecto['id_galeria'] }}')">
                                                                🗑️
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Campo oculto para imágenes a eliminar -->
                                            <input type="hidden" name="eliminar_imagenes"
                                                id="eliminar-imagenes-{{ $proyecto['id_galeria'] }}" value="">

                                            <!-- Nuevas imágenes -->
                                            <div id="nuevas-imagenes-{{ $proyecto['id_galeria'] }}"></div>
                                            <button type="button"
                                                class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 mt-4"
                                                onclick="agregarNuevaImagen('{{ $proyecto['id_galeria'] }}')">
                                                ➕ Agregar Nueva Imagen
                                            </button>
                                        </div>

                                        <!-- Sección de enlaces existentes -->
                                        <div class="bg-slate-800/30 p-6 rounded-xl border border-gray-600/30">
                                            <h4 class="text-lg font-bold text-white mb-4 flex items-center">
                                                🔗 Enlaces
                                            </h4>
                                            <div id="enlaces-existentes-{{ $proyecto['id_galeria'] }}">
                                                @if (!empty($proyecto['enlaces']))
                                                    @foreach ($proyecto['enlaces'] as $enlace)
                                                        <div class="enlace-item flex items-center space-x-4"
                                                            id="enlace-existente-{{ $enlace['id_galeria_enlace'] ?? $loop->index }}">
                                                            <input type="hidden"
                                                                name="enlaces_existentes[{{ $loop->index }}][id_galeria_enlace]"
                                                                value="{{ $enlace['id_galeria_enlace'] ?? '' }}">
                                                            <input type="text"
                                                                name="enlaces_existentes[{{ $loop->index }}][titulo_enlace]"
                                                                value="{{ $enlace['titulo_enlace'] }}"
                                                                placeholder="Título del enlace"
                                                                class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                            <input type="url"
                                                                name="enlaces_existentes[{{ $loop->index }}][enlace]"
                                                                value="{{ $enlace['enlace'] }}"
                                                                placeholder="URL del enlace"
                                                                class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                            <button type="button"
                                                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
                                                                onclick="marcarEnlaceParaEliminar('{{ $enlace['id_galeria_enlace'] ?? $loop->index }}', '{{ $proyecto['id_galeria'] }}')">
                                                                🗑️
                                                            </button>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>

                                            <!-- Campo oculto para enlaces a eliminar -->
                                            <input type="hidden" name="eliminar_enlaces"
                                                id="eliminar-enlaces-{{ $proyecto['id_galeria'] }}" value="">

                                            <!-- Nuevos enlaces -->
                                            <div id="nuevos-enlaces-{{ $proyecto['id_galeria'] }}"></div>
                                            <button type="button"
                                                class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105 mt-4"
                                                onclick="agregarNuevoEnlace('{{ $proyecto['id_galeria'] }}')">
                                                ➕ Agregar Nuevo Enlace
                                            </button>
                                        </div>

                                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-600/30">
                                            <button type="button"
                                                onclick="cerrarModal('{{ $proyecto['id_galeria'] }}')"
                                                class="bg-gray-600 hover:bg-gray-700 text-white px-8 py-3 rounded-xl font-medium transition-all duration-300">
                                                Cancelar
                                            </button>
                                            <button type="submit"
                                                class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-8 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
                                                💾 Guardar Cambios
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-16">
                    <div class="text-6xl mb-4">📁</div>
                    <p class="text-xl text-gray-400">Aún no hay proyectos agregados</p>
                </div>
            @endif

            <!-- Add New Project Section -->
            <div class="section-card p-8 rounded-2xl">
                <div class="flex items-center mb-8">
                    <span class="text-3xl mr-4">📝</span>
                    <h3 class="text-2xl font-bold text-white">Agregar nuevo proyecto</h3>
                </div>

                <form action="{{ route('admin.proyectos.post') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="nombre_docente" class="block text-sm font-medium text-gray-300 mb-2">Nombre
                                del docente:</label>
                            <input type="text" name="nombre_docente" id="nombre_docente"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                        </div>

                        <div>
                            <label for="UAC" class="block text-sm font-medium text-gray-300 mb-2">UAC:</label>
                            <input type="text" name="UAC" id="UAC"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div>
                            <label for="semestre"
                                class="block text-sm font-medium text-gray-300 mb-2">Semestre:</label>
                            <select name="semestre"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>

                        <div>
                            <label for="grupo" class="block text-sm font-medium text-gray-300 mb-2">Grupo:</label>
                            <select name="grupo"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                            </select>
                        </div>

                        <div>
                            <label for="especialidad"
                                class="block text-sm font-medium text-gray-300 mb-2">Especialidad:</label>
                            <select name="especialidad"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                                <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                                <option value="Contabilidad">Contabilidad</option>
                                <option value="Programación">Programación</option>
                                <option value="Construcción">Construcción</option>
                                <option value="Logística">Logística</option>
                                <option value="Ofimática">Ofimática</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="progresion"
                                class="block text-sm font-medium text-gray-300 mb-2">Progresión:</label>
                            <input type="text" name="progresion" id="progresion"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                        </div>

                        <div>
                            <label for="fecha_realizacion" class="block text-sm font-medium text-gray-300 mb-2">Fecha
                                de realización:</label>
                            <input type="date" name="fecha_realizacion" id="fecha_realizacion"
                                class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                        </div>
                    </div>

                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-300 mb-2">Título:</label>
                        <input type="text" name="titulo" id="titulo"
                            class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                    </div>

                    <div>
                        <label for="descripcion"
                            class="block text-sm font-medium text-gray-300 mb-2">Descripción:</label>
                        <textarea name="descripcion" id="descripcion"
                            class="w-full px-4 py-3 bg-slate-700/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300 h-24 resize-vertical"></textarea>
                    </div>

                    <!-- Sección de imágenes -->
                    <div class="bg-slate-800/30 p-6 rounded-xl border border-gray-600/30">
                        <h4 class="text-lg font-bold text-white mb-4 flex items-center">
                            🖼️ Imágenes
                        </h4>
                        <div id="imagenes-container"></div>
                        <button type="button"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105"
                            onclick="agregarCampoImagen()">
                            ➕ Agregar imagen
                        </button>
                    </div>

                    <!-- Sección de enlaces -->
                    <div class="bg-slate-800/30 p-6 rounded-xl border border-gray-600/30">
                        <h4 class="text-lg font-bold text-white mb-4 flex items-center">
                            🔗 Enlaces
                        </h4>
                        <div id="enlaces-container"></div>
                        <button type="button"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-medium transition-all duration-300 transform hover:scale-105"
                            onclick="agregarCampoEnlace()">
                            ➕ Agregar enlace
                        </button>
                    </div>

                    <div class="flex justify-end pt-6 border-t border-gray-600/30">
                        <button type="submit"
                            class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-12 py-4 rounded-xl font-medium hover:from-teal-600 hover:to-teal-700 transition-all duration-300 transform hover:scale-105 shadow-lg">
                            🚀 Agregar Proyecto
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal para galería de imágenes -->
        <div id="imageModal" class="modal">
            <div class="modal-content" style="max-width: 1200px; padding: 40px;">
                <span class="close" onclick="closeModal()">&times;</span>
                <div id="modalImageContainer" class="text-center">
                    <img id="modalImage"
                        style="max-width: 100%; max-height: 70vh; object-fit: contain; border-radius: 12px; box-shadow: 0 20px 40px rgba(0,0,0,0.4);">
                    <div class="flex justify-center space-x-4 mt-6">
                        <button onclick="previousImage()"
                            class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                            ⬅️ Anterior
                        </button>
                        <button onclick="nextImage()"
                            class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-6 py-3 rounded-xl font-medium hover:from-blue-600 hover:to-blue-700 transition-all duration-300">
                            Siguiente ➡️
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.layouts.footer')

    <script>
        let contadorImagenes = 0;
        let contadorEnlaces = 0;
        let contadoresNuevasImagenes = {};
        let contadoresNuevosEnlaces = {};
        let imagenesParaEliminar = {};
        let enlacesParaEliminar = {};
        let currentImages = [];
        let currentImageIndex = 0;

        // Inicializar contadores para cada proyecto
        function inicializarContadores(idGaleria) {
            if (!contadoresNuevasImagenes[idGaleria]) {
                contadoresNuevasImagenes[idGaleria] = 0;
            }
            if (!contadoresNuevosEnlaces[idGaleria]) {
                contadoresNuevosEnlaces[idGaleria] = 0;
            }
            if (!imagenesParaEliminar[idGaleria]) {
                imagenesParaEliminar[idGaleria] = [];
            }
            if (!enlacesParaEliminar[idGaleria]) {
                enlacesParaEliminar[idGaleria] = [];
            }
        }

        // Funciones para el modal
        function abrirModalEdicion(idGaleria) {
            inicializarContadores(idGaleria);
            document.getElementById('modal-' + idGaleria).style.display = 'block';
        }

        function cerrarModal(idGaleria) {
            document.getElementById('modal-' + idGaleria).style.display = 'none';
        }

        // Funciones para galería de imágenes
        function openModal(images, index) {
            currentImages = images;
            currentImageIndex = index;
            document.getElementById('imageModal').style.display = 'block';
            showImage(currentImageIndex);
        }

        function closeModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        function showImage(index) {
            const modalImage = document.getElementById('modalImage');
            modalImage.src = '/storage/' + currentImages[index];
        }

        function previousImage() {
            currentImageIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
            showImage(currentImageIndex);
        }

        function nextImage() {
            currentImageIndex = (currentImageIndex + 1) % currentImages.length;
            showImage(currentImageIndex);
        }

        // Cerrar modal al hacer clic fuera de él
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }

        // Funciones para agregar campos en formulario nuevo
        function agregarCampoImagen() {
            const container = document.getElementById('imagenes-container');
            const div = document.createElement('div');
            div.className = 'imagen-item flex items-center space-x-4';

            div.innerHTML = `
                <input type="file" name="imagenes[${contadorImagenes}][archivo]" accept="image/*" 
                    class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500">
                <button type="button" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
                    onclick="eliminarCampoImagen(this)">
                    🗑️
                </button>
            `;

            container.appendChild(div);
            contadorImagenes++;
        }

        function eliminarCampoImagen(button) {
            button.parentElement.remove();
        }

        function agregarCampoEnlace() {
            const container = document.getElementById('enlaces-container');
            const div = document.createElement('div');
            div.className = 'enlace-item flex items-center space-x-4';

            div.innerHTML = `
                <input type="text" name="enlaces[${contadorEnlaces}][titulo_enlace]" placeholder="Título del enlace" 
                    class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500">
                <input type="url" name="enlaces[${contadorEnlaces}][enlace]" placeholder="URL del enlace" 
                    class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500">
                <button type="button" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
                    onclick="eliminarCampoEnlace(this)">
                    🗑️
                </button>
            `;

            container.appendChild(div);
            contadorEnlaces++;
        }

        function eliminarCampoEnlace(button) {
            button.parentElement.remove();
        }

        // Funciones para agregar nuevos campos en modales de edición
        function agregarNuevaImagen(idGaleria) {
            const container = document.getElementById('nuevas-imagenes-' + idGaleria);
            const div = document.createElement('div');
            div.className = 'imagen-item flex items-center space-x-4';
            const contador = contadoresNuevasImagenes[idGaleria];

            div.innerHTML = `
                <input type="text" name="imagenes[${contador}][imagen]" placeholder="URL de imagen" 
                    class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="file" name="imagenes[${contador}][archivo]" accept="image/*" 
                    class="px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
                    onclick="eliminarNuevaImagen(this)">
                    🗑️
                </button>
            `;

            container.appendChild(div);
            contadoresNuevasImagenes[idGaleria]++;
        }

        function eliminarNuevaImagen(button) {
            button.parentElement.remove();
        }

        function agregarNuevoEnlace(idGaleria) {
            const container = document.getElementById('nuevos-enlaces-' + idGaleria);
            const div = document.createElement('div');
            div.className = 'enlace-item flex items-center space-x-4';
            const contador = contadoresNuevosEnlaces[idGaleria];

            div.innerHTML = `
                <input type="text" name="enlaces[${contador}][titulo_enlace]" placeholder="Título del enlace" 
                    class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="url" name="enlaces[${contador}][enlace]" placeholder="URL del enlace" 
                    class="flex-1 px-3 py-2 bg-slate-700/50 border border-gray-500/50 rounded-lg text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" 
                    class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-300"
                    onclick="eliminarNuevoEnlace(this)">
                    🗑️
                </button>
            `;

            container.appendChild(div);
            contadoresNuevosEnlaces[idGaleria]++;
        }

        function eliminarNuevoEnlace(button) {
            button.parentElement.remove();
        }

        // Funciones para marcar elementos existentes para eliminar
        function marcarImagenParaEliminar(idImagen, idGaleria) {
            const elemento = document.getElementById('imagen-existente-' + idImagen);
            elemento.style.display = 'none';

            if (!imagenesParaEliminar[idGaleria].includes(idImagen)) {
                imagenesParaEliminar[idGaleria].push(idImagen);
            }

            document.getElementById('eliminar-imagenes-' + idGaleria).value = imagenesParaEliminar[idGaleria].join(',');
        }

        function marcarEnlaceParaEliminar(idEnlace, idGaleria) {
            const elemento = document.getElementById('enlace-existente-' + idEnlace);
            elemento.style.display = 'none';

            if (!enlacesParaEliminar[idGaleria].includes(idEnlace)) {
                enlacesParaEliminar[idGaleria].push(idEnlace);
            }

            document.getElementById('eliminar-enlaces-' + idGaleria).value = enlacesParaEliminar[idGaleria].join(',');
        }
    </script>
</body>

</html>
