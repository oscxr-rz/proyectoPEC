<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 2% auto;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 10px;
        }

        .close:hover {
            color: black;
        }

        .imagen-item,
        .enlace-item {
            border: 1px solid #ddd;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .imagen-preview {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            margin-right: 10px;
        }

        .btn-eliminar {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 10px;
        }

        .btn-eliminar:hover {
            background-color: #c82333;
        }

        .btn-agregar {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 3px;
            cursor: pointer;
            margin: 10px 0;
        }

        .btn-agregar:hover {
            background-color: #218838;
        }

        .btn-actualizar {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-actualizar:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group textarea {
            height: 80px;
            resize: vertical;
        }
    </style>
</head>

<body>
    <h1>Gestion de proyectos</h1>
    @if (session('mensaje'))
        <p>{{ session('mensaje') }}</p>
    @endif
    @if (!empty($proyectos))
        @foreach ($proyectos as $proyecto)
            <div>
                <div>
                    <div>
                        <span>
                            Grupo: {{ $proyecto['grupo'] }}
                        </span>
                        <span>
                            {{ $proyecto['especialidad'] }}
                        </span>
                    </div>

                    <h3>{{ $proyecto['titulo'] }}</h3>

                    <div>
                        <p><span>UAC:</span> {{ $proyecto['UAC'] }}</p>
                        <p><span>Progresión:</span> {{ $proyecto['progresion'] }}</p>
                        <p><span>Fecha:</span> {{ $proyecto['fecha_realizacion'] }}</p>
                    </div>

                    <p>{{ $proyecto['descripcion'] }}</p>
                </div>

                @if (!empty($proyecto['imagenes']))
                    <div>
                        <h4>Galería del Proyecto</h4>
                        <div>
                            @foreach ($proyecto['imagenes'] as $index => $imagen)
                                <div
                                    onclick="openModal([@foreach ($proyecto['imagenes'] as $img)'{{ $img['imagen'] }}'@if (!$loop->last),@endif @endforeach], {{ $index }})">
                                    <img src="{{ asset('storage/' . $imagen['imagen']) }}" alt="Imagen del proyecto">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if (!empty($proyecto['enlaces']))
                    <div>
                        @foreach ($proyecto['enlaces'] as $enlace)
                            <a href="{{ $enlace['enlace'] }}" target="_blank">
                                <span>{{ $enlace['titulo_enlace'] }}</span>
                            </a>
                        @endforeach
                    </div>
                @endif

                <!-- Botones de acción -->
                <button type="button" class="btn-actualizar"
                    onclick="abrirModalEdicion('{{ $proyecto['id_galeria'] }}')">
                    Actualizar Datos
                </button>

                <form action="{{ route('admin.proyectos.delete') }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id_galeria" value="{{ $proyecto['id_galeria'] }}">
                    <button type="submit" class="btn-eliminar"
                        onclick="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">
                        Eliminar Proyecto
                    </button>
                </form>

                <!-- Modal de edición -->
                <div id="modal-{{ $proyecto['id_galeria'] }}" class="modal">
                    <div class="modal-content">
                        <span class="close" onclick="cerrarModal('{{ $proyecto['id_galeria'] }}')">&times;</span>
                        <h3>Editar Proyecto</h3>

                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id_galeria" value="{{ $proyecto['id_galeria'] }}">

                            <div class="form-group">
                                <label for="nombre_docente_{{ $proyecto['id_galeria'] }}">Nombre del docente:</label>
                                <input type="text" name="nombre_docente"
                                    id="nombre_docente_{{ $proyecto['id_galeria'] }}"
                                    value="{{ $proyecto['nombre_docente'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="UAC_{{ $proyecto['id_galeria'] }}">UAC:</label>
                                <input type="text" name="UAC" id="UAC_{{ $proyecto['id_galeria'] }}"
                                    value="{{ $proyecto['UAC'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="semestre">Semestre:</label>
                                <select name="semestre"
                                    class="w-full px-4 py-3 bg-slate-600/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="grupo">Grupo:</label>
                                <select name="grupo"
                                    class="w-full px-4 py-3 bg-slate-600/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="especialidad">Especialidad:</label>
                                <select name="especialidad"
                                    class="w-full px-4 py-3 bg-slate-600/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                                    <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                                    <option value="Contabilidad">Contabilidad</option>
                                    <option value="Programación">Programación</option>
                                    <option value="Construcción">Construcción</option>
                                    <option value="Logística">Logística</option>
                                    <option value="Ofimática">Ofimática</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="progresion_{{ $proyecto['id_galeria'] }}">Progresion:</label>
                                <input type="text" name="progresion" id="progresion_{{ $proyecto['id_galeria'] }}"
                                    value="{{ $proyecto['progresion'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="titulo_{{ $proyecto['id_galeria'] }}">Titulo:</label>
                                <input type="text" name="titulo" id="titulo_{{ $proyecto['id_galeria'] }}"
                                    value="{{ $proyecto['titulo'] ?? '' }}">
                            </div>

                            <div class="form-group">
                                <label for="descripcion_{{ $proyecto['id_galeria'] }}">Descripcion:</label>
                                <textarea name="descripcion" id="descripcion_{{ $proyecto['id_galeria'] }}">{{ $proyecto['descripcion'] ?? '' }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="fecha_realizacion_{{ $proyecto['id_galeria'] }}">Fecha de
                                    realizacion:</label>
                                <input type="date" name="fecha_realizacion"
                                    id="fecha_realizacion_{{ $proyecto['id_galeria'] }}"
                                    value="{{ $proyecto['fecha_realizacion'] ?? '' }}">
                            </div>

                            <!-- Sección de imágenes existentes -->
                            <h4>Imágenes:</h4>
                            <div id="imagenes-existentes-{{ $proyecto['id_galeria'] }}">
                                @if (!empty($proyecto['imagenes']))
                                    @foreach ($proyecto['imagenes'] as $imagen)
                                        <div class="imagen-item"
                                            id="imagen-existente-{{ $imagen['id_galeria_imagen'] ?? $loop->index }}">
                                            <img src="{{ asset('storage/' . $imagen['imagen']) }}" alt="Imagen"
                                                class="imagen-preview">
                                            <input type="hidden"
                                                name="imagenes_existentes[{{ $loop->index }}][id_galeria_imagen]"
                                                value="{{ $imagen['id_galeria_imagen'] ?? '' }}">
                                            <input type="text"
                                                name="imagenes_existentes[{{ $loop->index }}][imagen]"
                                                value="{{ $imagen['imagen'] }}" placeholder="URL de imagen"
                                                style="width: 60%;">
                                            <input type="file"
                                                name="imagenes_existentes[{{ $loop->index }}][archivo]"
                                                accept="image/*" style="width: 30%;">
                                            <button type="button" class="btn-eliminar"
                                                onclick="marcarImagenParaEliminar('{{ $imagen['id_galeria_imagen'] ?? $loop->index }}', '{{ $proyecto['id_galeria'] }}')">
                                                Eliminar
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
                            <button type="button" class="btn-agregar"
                                onclick="agregarNuevaImagen('{{ $proyecto['id_galeria'] }}')">
                                Agregar Nueva Imagen
                            </button>

                            <!-- Sección de enlaces existentes -->
                            <h4>Enlaces:</h4>
                            <div id="enlaces-existentes-{{ $proyecto['id_galeria'] }}">
                                @if (!empty($proyecto['enlaces']))
                                    @foreach ($proyecto['enlaces'] as $enlace)
                                        <div class="enlace-item"
                                            id="enlace-existente-{{ $enlace['id_galeria_enlace'] ?? $loop->index }}">
                                            <input type="hidden"
                                                name="enlaces_existentes[{{ $loop->index }}][id_galeria_enlace]"
                                                value="{{ $enlace['id_galeria_enlace'] ?? '' }}">
                                            <input type="text"
                                                name="enlaces_existentes[{{ $loop->index }}][titulo_enlace]"
                                                value="{{ $enlace['titulo_enlace'] }}"
                                                placeholder="Título del enlace" style="width: 45%;">
                                            <input type="url"
                                                name="enlaces_existentes[{{ $loop->index }}][enlace]"
                                                value="{{ $enlace['enlace'] }}" placeholder="URL del enlace"
                                                style="width: 45%;">
                                            <button type="button" class="btn-eliminar"
                                                onclick="marcarEnlaceParaEliminar('{{ $enlace['id_galeria_enlace'] ?? $loop->index }}', '{{ $proyecto['id_galeria'] }}')">
                                                Eliminar
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
                            <button type="button" class="btn-agregar"
                                onclick="agregarNuevoEnlace('{{ $proyecto['id_galeria'] }}')">
                                Agregar Nuevo Enlace
                            </button>

                            <div class="form-group" style="margin-top: 20px;">
                                <button type="submit" class="btn-actualizar">Guardar Cambios</button>
                                <button type="button" onclick="cerrarModal('{{ $proyecto['id_galeria'] }}')"
                                    style="margin-left: 10px;">Cancelar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <hr>
            </div>
        @endforeach
    @else
        <p>Aún no hay proyectos agregados</p>
    @endif

    <h3>Agregar nuevo proyecto</h3>
    <form action="{{ route('admin.proyectos.post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre_docente">Nombre del docente:</label>
            <input type="text" name="nombre_docente" id="nombre_docente">
        </div>

        <div class="form-group">
            <label for="UAC">UAC:</label>
            <input type="text" name="UAC" id="UAC">
        </div>

        <div class="form-group">
            <label for="semestre">Semestre:</label>
            <select name="semestre"
                class="w-full px-4 py-3 bg-slate-600/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
        </div>

        <div class="form-group">
            <label for="grupo">Grupo:</label>
            <select name="grupo"
                class="w-full px-4 py-3 bg-slate-600/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
                <option value="G">G</option>
            </select>
        </div>

        <div class="form-group">
            <label for="especialidad">Especialidad:</label>
            <select name="especialidad"
                class="w-full px-4 py-3 bg-slate-600/50 border border-gray-500/50 rounded-xl text-gray-200 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all duration-300">
                <option value="Alimentos y Bebidas">Alimentos y Bebidas</option>
                <option value="Contabilidad">Contabilidad</option>
                <option value="Programación">Programación</option>
                <option value="Construcción">Construcción</option>
                <option value="Logística">Logística</option>
                <option value="Ofimática">Ofimática</option>
            </select>
        </div>

        <div class="form-group">
            <label for="progresion">Progresion:</label>
            <input type="text" name="progresion" id="progresion">
        </div>

        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion"></textarea>
        </div>

        <div class="form-group">
            <label for="fecha_realizacion">Fecha de realizacion:</label>
            <input type="date" name="fecha_realizacion" id="fecha_realizacion">
        </div>

        <!-- Sección de imágenes -->
        <h4>Imágenes:</h4>
        <div id="imagenes-container"></div>
        <button type="button" class="btn-agregar" onclick="agregarCampoImagen()">Agregar imagen</button>

        <!-- Sección de enlaces -->
        <h4>Enlaces:</h4>
        <div id="enlaces-container"></div>
        <button type="button" class="btn-agregar" onclick="agregarCampoEnlace()">Agregar enlace</button>

        <div class="form-group">
            <button type="submit" class="btn-actualizar">Agregar Proyecto</button>
        </div>
    </form>

    <script>
        let contadorImagenes = 0;
        let contadorEnlaces = 0;
        let contadoresNuevasImagenes = {};
        let contadoresNuevosEnlaces = {};
        let imagenesParaEliminar = {};
        let enlacesParaEliminar = {};

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
            div.className = 'imagen-item';

            div.innerHTML = `
                <input type="file" name="imagenes[${contadorImagenes}][archivo]" accept="image/*" style="width: 40%;">
                <button type="button" class="btn-eliminar" onclick="eliminarCampoImagen(this)">Eliminar</button>
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
            div.className = 'enlace-item';

            div.innerHTML = `
                <input type="text" name="enlaces[${contadorEnlaces}][titulo_enlace]" placeholder="Título del enlace" style="width: 45%;">
                <input type="url" name="enlaces[${contadorEnlaces}][enlace]" placeholder="URL del enlace" style="width: 45%;">
                <button type="button" class="btn-eliminar" onclick="eliminarCampoEnlace(this)">Eliminar</button>
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
            div.className = 'imagen-item';
            const contador = contadoresNuevasImagenes[idGaleria];

            div.innerHTML = `
                <input type="text" name="imagenes[${contador}][imagen]" placeholder="URL de imagen" style="width: 45%;">
                <input type="file" name="imagenes[${contador}][archivo]" accept="image/*" style="width: 40%;">
                <button type="button" class="btn-eliminar" onclick="eliminarNuevaImagen(this)">Eliminar</button>
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
            div.className = 'enlace-item';
            const contador = contadoresNuevosEnlaces[idGaleria];

            div.innerHTML = `
                <input type="text" name="enlaces[${contador}][titulo_enlace]" placeholder="Título del enlace" style="width: 45%;">
                <input type="url" name="enlaces[${contador}][enlace]" placeholder="URL del enlace" style="width: 45%;">
                <button type="button" class="btn-eliminar" onclick="eliminarNuevoEnlace(this)">Eliminar</button>
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
