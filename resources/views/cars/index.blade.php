<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventario de Coches') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('cars.create') }}" class="bg-indigo-600 border-2 border-indigo-900 p-2 rounded-md inline-block transition hover:scale-110 duration-300">{{ __('Añadir Coche') }}</a>
                    <table class="border border-collapse my-3">
                        <tr>
                            <th class="p-2">{{ __('Marca') }}</th>
                            <th class="p-2">{{ __('Modelo') }}</th>
                            <th class="p-2">{{ __('Precio') }}</th>
                            <th class="p-2">{{ __('Estado') }}</th>
                            <th class="p-2">{{ __('Acciones') }}</th>
                        </tr>
                        @foreach($cars as $car)
                        <tr>
                            <td class="p-2">{{ $car->brand }}</td>
                            <td class="p-2">{{ $car->model }}</td>
                            <td class="p-2">{{ number_format($car->price, 2) }}€</td>
                            <td class="p-2">{{ $car->is_sold ? __('Vendido') : __('Disponible') }}</td>
                            <td class="p-2">
                                <a href="{{ route('cars.edit', $car->id) }}" class="bg-yellow-600 border-2 border-yellow-800 p-2 rounded-md inline-block transition hover:scale-110 duration-300">{{ __('Editar') }}</a>
                                <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-500 border-2 border-red-800 p-2 rounded-md transition hover:scale-110 duration-300" type="submit">{{ __('Borrar') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>