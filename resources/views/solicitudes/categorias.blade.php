@section('titulo', 'Categorias')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-3xl mx-auto">
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
                        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Categorías de Solicitudes</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            
                           @foreach ($categorias as $categoria )
                                <a href="#hardware"
                                    class="bg-gray-200 hover:bg-gray-300 p-6 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{$categoria->nombre}}</h2>
                                    <p class="text-gray-600">{{$categoria->descripcion}}</p>
                                </a>
                           @endforeach
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Crear Categoria -->
<div id="crea-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <h1 class="text-center text-xl text-dark-500"><i class="fa-solid fa-user"></i> Crear Nueva Categoria</h1>
            <!-- Contenido del modal -->
            <form method="post" action="{{ route('categorias.crear') }}" class="mt-2 space-y-6">
                @csrf
                @method('post')

                <div>
                    <x-input-label for="nombre" :value="__('Nombre de Categoría')" />
                    <x-text-input name="nombre" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="nombre" />
                </div>
                <div>
                    <x-input-label for="descripcion" :value="__('Descripcion')" />
                    <x-text-input name="descripcion" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="descripcion" />
                </div>
                <div>
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Crear') }}</x-primary-button>
                </div>
            </form>
            <div class="modal-footer mt-2 flex justify-between">
                <button id="cerrarModal" class="modal-close bg-red-600 text-white font-bold py-2 px-4 rounded">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- FIN Modal Crear Categoria -->
</x-app-layout>
