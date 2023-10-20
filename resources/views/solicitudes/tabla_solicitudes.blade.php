@section('titulo', 'Tabla Solicitudes')

<x-app-layout>
    <div class="py-0">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 space-y-6 mt-3">
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

                <h1 class="text-3xl font-bold text-gray-800 text-center">Lista de Solicitudes</h1>
            
                <table id="myTable" class="mx-auto min-w-full border rounded-lg overflow-hidden mt-3">
                    <thead class="bg-gray-100">
                        <tr class="text-sm">
                            <th class="text-center">ID</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Detalle Solicitud</th>
                            <th class="text-center">Base</th>
                            <th class="text-center">Medio de Solicitud</th>
                            <th class="text-center">Usuario</th>
                            <th class="text-center">Actualiza</th>
                            <th class="text-center">Estado de Solicitud</th>
                            <th class="text-center">Observación</th>
                            <th class="text-center">Clasificación</th>
                            <th class="text-center">Actualizado</th>
                            <th class="text-center">Edición</th>
                        </tr>                                                
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($subcategorias as $subcategoria )
                            <tr class="text-center text-xs">
                                <td class="border-t border-green-300">{{$subcategoria->id}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->created_at}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->detalle_sol}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->base}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->medio_sol}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->usuario}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->usuario_mod}}</td>

                                <td class="border-t border-green-300 text-danger">{{$subcategoria->estado}}</td>

                                <td class="border-t border-green-300">{{$subcategoria->observacion}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->clasificacion}}</td>
                                <td class="border-t border-green-300">{{$subcategoria->updated_at}}</td>
                                <td class="border-t border-green-300">  
                                    <a><i class="fa-solid fa-pen ml-3 text-lg" style="color: #0D6EFD;"></i></a>
                                    <a><i class="fa-solid fa-trash mx-2 text-lg" style="color: #EF4444;"></i></a>
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
</x-app-layout>

