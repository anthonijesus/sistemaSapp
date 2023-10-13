@section('titulo', 'Inicio')
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-3xl mx-auto">
                        <h1 class="text-3xl font-bold text-gray-800 mb-6">Bienvenido al Sistema de Solicitudes SAPP</h1>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                            <!-- Categoría 1: Hardware -->
                            <a href="#hardware"
                                class="bg-gray-200 hover:bg-gray-300 p-6 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Soporte TI</h2>
                                <p class="text-gray-600">Soporte relacionado con hardware de computadoras y
                                    dispositivos e impresoras.</p>
                            </a>

                            <!-- Categoría 2: Software -->
                            <a href="#software"
                                class="bg-gray-200 hover:bg-gray-300 p-6 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Mantenimiento</h2>
                                <p class="text-gray-600">Asistencia con problemas relacionados con infraestructura.</p>
                            </a>

                            <!-- Categoría 3: Redes -->
                            <a href="#redes"
                                class="bg-gray-200 hover:bg-gray-300 p-6 rounded-lg shadow-md block transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Compras</h2>
                                <p class="text-gray-600">Departamento de Compras.</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
