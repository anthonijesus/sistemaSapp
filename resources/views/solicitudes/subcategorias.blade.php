@section('titulo', 'Sub-Categorias')

<?php
if (Auth::user()->rol != 'administrador') {
    echo "<script>window.location.href = '../';</script>";
 }
?>


<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-3">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">

                <!-- Mensaje de Error LARAVEL -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Mensaje de Éxito -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Mensaje de Error -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h1 class="text-3xl font-bold text-gray-800 text-center">Sub-Categorias</h1>
                <table id="myTable" class=" mx-auto min-w-full border rounded-lg overflow-hidden mt-3">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="w-3/24 px-2 py-2 text-center">ID</th>
                            <th class="w-15/24 px-4 py-2 text-center">Categoria</th>
                            <th class="w-15/24 px-4 py-2 text-center">Nombre</th>
                            <th class="w-36 px-2 py-2 text-center">Edición</th>
                        </tr>                                                
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($subcategorias as $subcategoria)
                            <tr class="text-center">
                                <td class="border px-4 py-2">{{ $subcategoria->id }}</td>
                                <td class="border px-4 py-2">{{ $subcategoria->categoria->nombre }}</td>
                                <td class="border px-4 py-2">{{ $subcategoria->nombre }}</td>
                                <td class="border px-4 py-2">  
                                    <a id="mostrarModal" data-nomb="{{ $subcategoria->nombre }}"
                                        data-id="{{ $subcategoria->id }}" href="#" style="color: #EF4444;"><i class="fa-solid fa-trash mx-2"></i>
                                    </a>
                                    <a id="editarModal" data-ids="{{ $subcategoria->id }}"
                                        data-nombre="{{ $subcategoria->nombre }}" data-categoria="{{ $subcategoria->categoria_id }}"
                                        href="#"><i class="fa-solid fa-pen ml-3" style="color: #0D6EFD;"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                {{--  {{ $users->links() }}  PAGINADOR --}}
            </div>
        </div>
    </div>

    <!-- Modal Crear Sub-Categoria -->
<div id="crea-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <h1 class="text-center text-xl text-dark-500"><i class="fa-solid fa-user"></i> Crear Nueva Sub-Categoria</h1>
            <!-- Contenido del modal -->
            <form method="post" action="{{ route('subcategorias.crear') }}" class="mt-2 space-y-6">
                @csrf
                @method('post')

                <div>
                    <x-input-label for="nombre" :value="__('Nombre de Sub-Categoría')" />
                    <x-text-input name="nombre" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="nombre" />
                </div>
                <div>
                    <x-input-label for="categoria" :value="__('Categoria')" />
                    <select name="categoria_id"
                        class="mt-1 block w-full pl-3 pr-10 py-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md"
                        required autofocus autocomplete="categoria">
                        
                        @foreach ( $categorias->sortBy('nombre') as $categoria )
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>  
                        @endforeach
                        
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Crear') }}</x-primary-button>
                </div>
            </form>
            <div class="modal-footer mt-2 flex justify-between">
                <button id="cerrarModal" class="modal-close bg-red-600 text-white font-bold py-1 px-4 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- FIN Modal Crear Sub-Categoria -->

<!-- Modal editar Sub-Categoria -->
<div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <h1 class="text-center text-xl text-dark-500"><i class="fa-solid fa-user"></i> Editar Sub-Categoria</h1>
            <!-- Contenido del modal -->
            <form method="post" id="editUser" action="{{ route('subcategorias.editar', 1) }}"
                data-action="{{ route('subcategorias.editar', 1) }}" class="mt-2 space-y-6">
                @csrf
                @method('post')

                <div>
                    <x-input-label for="nombre" :value="__('Nombre')" />
                    <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" required autofocus autocomplete="nombre" />
                </div>
                <div>
                    <x-input-label for="categoria" :value="__('Categoria')" />
                    <select id="categoria" name="categoria_id"
                        class="notItemOne mt-1 block w-full pl-3 pr-10 py-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg rounded-md"
                        required autofocus autocomplete="categoria">
                        
                        @foreach ( $categorias->sortBy('nombre') as $categoria )
                            <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>  
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Actualizar') }}</x-primary-button>
                </div>
            </form>
            <div class="modal-footer mt-2 flex justify-between">
                <button id="cerrarModal" class="modal-close bg-red-600 text-white font-bold py-1 px-4 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- FIN Modal editar Sub-Categoria -->

<!-- Modal Eliminar Sub-Categoria -->
<div id="miModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <!-- Contenido del modal -->
        <div class="modal-content py-4 text-left px-6">
            <!-- Contenido del modal -->
            <form id="deleteUser" method="POST" action="{{ route('subcategorias.borrar', 1) }}"
                data-action="{{ route('subcategorias.borrar', 1) }}">
                @csrf
                @method('delete')

                <div class="modal-body">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-3">
                        {{ __('Seguro que quiere eliminar esta Sub-Categoría?') }}
                        <input name="nombre" id="nomb" type="text"
                            style="border: none; color: rgb(110, 23, 37); width:100%;" readonly>
                    </h2>

                    <h2 class="text-lg font-medium text-red-900 dark:text-gray-100 mt-3">
                        {{ __('ATENCIÓN!!') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mt-1">
                        {{ __('Una vez que se elimine, todos los recursos y datos se eliminarán permanentemente.') }}
                    </p>
                </div>
                <!-- Botón de eliminar -->
                <div class="flex items-center gap-4 mt-2">
                    <x-primary-button>{{ __('Eliminar') }}</x-primary-button>
                </div>
            </form>
            <!-- Botón de cierre -->
            <div class="modal-footer mt-2 flex justify-between">
                <button id="cerrarModal" class="modal-close bg-red-600 text-white font-bold py-1 px-4 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- FIN Modal Eliminar Sub-Categoria -->
</x-app-layout>
