@section('titulo', 'Sub-Categoria')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-3xl mx-auto mb-4">

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

                        <div class="flex justify-between">
                            <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">{{ $categoriaNombre }}</h1>
                            <div id="crear-modal">
                                <x-danger-button>{{ __('Crear Solicitud') }}</x-danger-button>
                            </div>
                        </div>
                            
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-2">
                            <a href="{{route('tabla_soli', $categoriaID)}}"
                                class="bg-green-200 hover:bg-green-300 p-2 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <h2 class="text-center text-xl font-semibold text-gray-800 mb-4"> Ver Todas las Solicitudes</h2>
                            </a>
                           @foreach ($subcategorias as $subcategoria)
                                <a href="{{route('tabla_sol', $subcategoria->id)}}"
                                    class="bg-gray-200 hover:bg-gray-300 p-2 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <h2 class="text-center text-xl font-semibold text-gray-800 mb-4"> {{$subcategoria->nombre}}</h2>
                                </a>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Modal Crear Solicitud -->
<div id="crea-modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        <div class="modal-content py-4 text-left px-6">
            <h1 class="text-center text-xl text-dark-500"><i class="fa-solid fa-user"></i> Crear Nueva Solicitud</h1>
            <!-- Contenido del modal -->
            <form method="post" action="{{ route('solicitudes.crear') }}" class="mt-2 space-y-6">
                @csrf
                @method('post')

                <input type="hidden" name="base" value="{{session('datosIP')}}"/>
                @auth
                    <input type="hidden" name="usuario" value="{{ Auth::user()->name }}"/>
                @endauth
                <input type="hidden" name="categoria_id" value="{{ $categoriaID }}"/>

                <div>
                    <x-input-label :value="__('Tipo de Solicitud')" />
                    <select name="subcategoria_id"
                        class="block w-full pl-3 pr-10 py-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                        required autofocus autocomplete="medio_sol">
                        @foreach ($subcategorias->sortBy('nombre') as $subcategoria)
                            <option class="text-sm" value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <x-input-label for="detalle" :value="__('Detalle de Solicitud')" />
                    <textarea name="detalle_sol" class="mt-1 block w-full" required autofocus
                        autocomplete="detalle_sol"></textarea>
                </div>                
                <div>
                    <x-input-label for="medio_sol" :value="__('Medio de Solicitud')" />
                    <select name="medio_sol"
                        class="block w-full pl-3 pr-10 py-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                        required autofocus autocomplete="medio_sol">
                        <option class="text-sm">Teléfono</option>
                        <option class="text-sm">Email</option>
                        <option class="text-sm">Sistema SAPP</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="observacion" :value="__('Observacion')" />
                    <textarea name="observacion" class="mt-1 block w-full" autofocus
                        autocomplete="observacion"></textarea>
                </div>
                <div>
                    <x-input-label for="clasificacion" :value="__('Clasificacion')" />
                    <select name="clasificacion"
                        class="block w-full pl-3 pr-10 py-2 border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 rounded-md"
                        required autofocus autocomplete="clasificacion">
                        <option class="text-sm">Urgente</option>
                        <option class="text-sm">No Urgente</option>
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
<!-- FIN Modal Crear Solicitud -->