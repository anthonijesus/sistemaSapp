@section('titulo', 'Usuarios')

<x-app-layout>
    <div class="py-12">
        <h1 class="text-center text-xl text-dark-500"><i class="fa-solid fa-user"></i> Lista de Usuarios</h1>
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

                <!-- Mensaje de Éxito -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <table class=" mx-auto min-w-full border rounded-lg overflow-hidden mt-2">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="w-1/12 px-4 py-2">ID</th>
                            <th class="w-2/12 px-4 py-2">Nombre</th>
                            <th class="w-2/12 px-4 py-2">Teléfono</th>
                            <th class="w-3/12 px-4 py-2">Email</th>
                            <th class="w-2/12 px-4 py-2">Rol</th>
                            <th class="w-2/12 px-4 py-2">Creado</th>
                            <th class="w-2/12 px-4 py-2">Edición</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody class="bg-white">

                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->telefono }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->rol }}</td>
                                <td class="border px-4 py-2">{{ $user->created_at }}</td>
                                <td class="border px-4 py-2">
                                    <a id="mostrarModal" data-name="{{ $user->name }}" data-id="{{ $user->id }}"
                                        href="#"><i class="fa-solid fa-trash mx-2"></i></a>
                                    <a id="editarModal" data-ids="{{ $user->id }}"
                                        data-names="{{ $user->name }}" data-email="{{ $user->email }}"
                                        data-tel="{{ $user->telefono }}" data-rol="{{ $user->rol }}"
                                        href="#"><i class="fa-solid fa-pen"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
                <br>
                {{ $users->links() }} {{-- PAGINADOR --}}
            </div>
        </div>
    </div>

    <!-- Modal Editar Usuario -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <h1 class="text-center text-xl text-dark-500"><i class="fa-solid fa-user"></i> Editar Usuarios</h1>
                <!-- Contenido del modal -->
                <form method="post" id="editUser" action="{{ route('profile.editar', 1) }}"
                    data-action="{{ route('profile.editar', 1) }}" class="mt-2 space-y-6">
                    @csrf
                    @method('post')

                    <div>
                        <x-input-label for="name" :value="__('Nombre')" />
                        <x-text-input id="names" name="name" type="text" class="mt-1 block w-full"
                             required autofocus autocomplete="name" />
                        
                    </div>
                    <div>
                        <x-input-label for="rol" :value="__('Rol')" />
                        <x-text-input id="rol" name="rol" type="text" class="mt-1 block w-full"
                             required autofocus autocomplete="rol" />
                        
                    </div>
                    <div>
                        <x-input-label for="telefono" :value="__('Telefono')" />
                        <x-text-input id="tel" name="telefono" type="text" class="mt-1 block w-full"
                             required autofocus autocomplete="telefono" />
                        
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Correo')" />
                        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                             />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Actualizar') }}</x-primary-button>
                    </div>
                </form>
                <!-- Botón de cierre -->
                <div class="modal-footer mt-2 flex justify-between">
                    <button id="cerrarModal" class="modal-close bg-red-600 text-white font-bold py-2 px-4 rounded">
                        Cerrar
                    </button>
                </div>                
            </div>
        </div>
    </div>
    <!-- FIN Modal Editar Usuario -->

    <!-- Modal Eliminar Usuario -->
    <div id="miModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <!-- Contenido del modal -->
            <div class="modal-content py-4 text-left px-6">
                <!-- Contenido del modal -->
                <form id="deleteUser" method="POST" action="{{ route('profile.borrar', 1) }}"
                    data-action="{{ route('profile.borrar', 1) }}">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mt-3">
                            {{ __('Seguro que quiere eliminar este Usuario?') }}
                            <input name="name" id="name" type="text"
                                style="border: none; color: rgb(202, 10, 42);" readonly>
                        </h2>

                        <h2 class="text-lg font-medium text-red-900 dark:text-gray-100 mt-3">
                            {{ __('ATENCIÓN!!') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400 mt-1">
                            {{ __('Una vez que se elimine esta cuenta, todos los recursos y datos se eliminarán permanentemente.') }}
                        </p>
                    </div>
                    <!-- Botón de eliminar -->
                    <div class="flex items-center gap-4 mt-2">
                        <x-primary-button>{{ __('Eliminar') }}</x-primary-button>
                    </div>
                </form>
                <!-- Botón de cierre -->
                <div class="modal-footer mt-2 flex justify-between">
                    <button id="cerrarModal" class="modal-close bg-red-600 text-white font-bold py-2 px-4 rounded">
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN Modal Eliminar Usuario -->

    <!-- scripts ELIMINAR-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const mostrarModalBtns = document.querySelectorAll("[id^='mostrarModal']");
            const cerrarModalBtns = document.querySelectorAll(".modal-close");
            const miModal = document.getElementById("miModal");

            mostrarModalBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    miModal.classList.remove("hidden");
                });
            });

            cerrarModalBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    miModal.classList.add("hidden");
                });
            });
        });

        $(document).on("click", "#mostrarModal", function() {
            var id = $(this).data('id'); // acá obtenemos el id al hacer clic en el boton
            var name = $(this).data('name'); // acá obtenemos el name al hacer clic en el boton, etc, etc


            $("#id").val(id);
            $("#name").val(name);


            urlFull = $('#deleteUser').attr('data-action').slice(0, -
            1); //esta linea accede a los atributos del formulario
            // y borra o limpia el nro 1 que estamos pasando en el "route" del action en el formulario (action="{{ route('profile.borrar', 1) }}"),
            // con ello nos queda la url limpia sin el nro 1 para poder concatenar el id que estamos optiendo al hacer clic en el boton de borrado.
            // Ademas le estamos indicando que borre o limpie el data-action y no el action que está en el formulario

            urlFull +=
            id; // acá estamos concatenando la URL con el id que obtuvimos al hacer clic en el boton de borrado

            $('#deleteUser').attr('action', urlFull); // acá obtenemos ya la nueva ruta o url con el id
            //console.log(urlFull);
        })
    </script>

    <!-- scripts EDITAR-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const mostrarModalBtns = document.querySelectorAll("[id^='editarModal']");
            const cerrarModalBtns = document.querySelectorAll(".modal-close");
            const miModal = document.getElementById("editModal");

            mostrarModalBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    miModal.classList.remove("hidden");
                });
            });

            cerrarModalBtns.forEach((btn) => {
                btn.addEventListener("click", () => {
                    miModal.classList.add("hidden");
                });
            });
        });

        $(document).on("click", "#editarModal", function() {
            var ids = $(this).data('ids'); // acá obtenemos el id al hacer clic en el boton
            var names = $(this).data('names'); // acá obtenemos el name al hacer clic en el boton, etc, etc
            var rol = $(this).data('rol');
            var tel = $(this).data('tel');
            var email = $(this).data('email');

            $("#ids").val(ids);
            $("#names").val(names);
            $("#rol").val(rol);
            $("#tel").val(tel);
            $("#email").val(email);

            urlFull = $('#editUser').attr('data-action').slice(0, -
            1); //esta linea accede a los atributos del formulario
            // y borra o limpia el nro 1 que estamos pasando en el "route" del action en el formulario (action="{{ route('profile.borrar', 1) }}"),
            // con ello nos queda la url limpia sin el nro 1 para poder concatenar el id que estamos optiendo al hacer clic en el boton de borrado.
            // Ademas le estamos indicando que borre o limpie el data-action y no el action que está en el formulario

            urlFull +=
            ids; // acá estamos concatenando la URL con el id que obtuvimos al hacer clic en el boton de borrado

            $('#editUser').attr('action', urlFull); // acá obtenemos ya la nueva ruta o url con el id
            //console.log(urlFull);

        })
    </script>

</x-app-layout>
