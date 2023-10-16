@section('titulo', 'Solicitudes')
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
                        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Solicitudes</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            
                           @foreach ($subcategorias as $subcategoria)
                                <a href="#hardware"
                                    class="bg-gray-200 hover:bg-gray-300 p-6 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{$subcategoria->nombre}}</h2>
                                </a>
                           @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
