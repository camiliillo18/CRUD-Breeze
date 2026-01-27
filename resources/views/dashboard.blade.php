<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel de Gestión de Vehículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gradient-to-r from-indigo-600 to-blue-500 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-8 text-white">
                    <h1 class="text-3xl font-bold mb-2">¡Bienvenido/a, {{ Auth::user()->name }}!</h1>
                    <p class="text-indigo-100 text-lg max-w-2xl">
                        Estás en el simulador de compra-venta de coches. Este proyecto ha sido diseñado para demostrar el control total sobre el flujo de datos (CRUD).
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border-l-4 border-green-400">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2 uppercase text-xs tracking-wider">El Concepto</h3>
                    <p class="text-gray-600 dark:text-gray-400 text-sm">
                        Una plataforma abierta donde la gestión es colaborativa. Simulamos un inventario real donde cada acción impacta en la base de datos en tiempo real.
                    </p>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border-l-4 border-blue-400">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2 uppercase text-xs tracking-wider">Flujo de Aplicación</h3>
                    <ul class="text-gray-600 dark:text-gray-400 text-sm space-y-1">
                        <li><strong>Create:</strong> Añadir nuevos vehículos al stock.</li>
                        <li><strong>Read:</strong> Visualización detallada de la flota.</li>
                        <li><strong>Update:</strong> Edición de precios y estados.</li>
                        <li><strong>Delete:</strong> Limpieza y gestión de ventas.</li>
                    </ul>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm border-l-4 border-purple-400">
                    <h3 class="font-bold text-gray-800 dark:text-white mb-2 uppercase text-xs tracking-wider">¿Qué quieres hacer?</h3>
                    <div class="flex flex-col gap-2 mt-3">
                        <a href="{{ route('cars.index') }}" class="text-center bg-gray-100 text-white dark:bg-gray-600 hover:bg-gray-700 transition py-2 rounded-md text-sm font-semibold">
                            Ver Inventario
                        </a>
                        <a href="{{ route('cars.create') }}" class="text-center bg-indigo-600 text-white hover:bg-indigo-700 transition py-2 rounded-md text-sm font-semibold">
                            Añadir Nuevo Coche
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-500 dark:text-gray-400 text-sm italic">
                    Nota: Aunque en una app real los usuarios solo editarían sus propios coches, en esta demostración el acceso es libre para facilitar la revisión de las funcionalidades de edición y borrado.
                </div>
            </div>

        </div>
    </div>
</x-app-layout>