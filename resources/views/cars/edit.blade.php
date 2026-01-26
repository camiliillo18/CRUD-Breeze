<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar ') }} {{ $car->brand }} {{ $car->model }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('cars.update', $car->id) }}" method="POST">
                    @csrf
                    @method('PATCH') <div class="grid grid-cols-1 gap-6">
                        <div>
                            <label class="block font-medium text-sm text-white">{{ __('Marca') }}</label>
                            <input type="text" name="brand" value="{{ old('brand', $car->brand) }}" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm w-full" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-white">{{ __('Modelo') }}</label>
                            <input type="text" name="model" value="{{ old('model', $car->model) }}" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm w-full" required>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-sm text-white">{{ __('Año') }}</label>
                                <input type="number" name="year" value="{{ old('year', $car->year) }}" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm w-full" required>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-white">{{ __('Precio (€)') }}</label>
                                <input type="number" step="0.01" name="price" value="{{ old('price', $car->price) }}" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm w-full" required>
                            </div>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-white">{{ __('Fecha de Entrada') }}</label>
                            <input type="date" name="arrival_date" value="{{ old('arrival_date', $car->arrival_date) }}" class="border-gray-300 focus:border-indigo-500 rounded-md shadow-sm w-full" required>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" name="is_sold" id="is_sold" value="1" {{ old('is_sold', $car->is_sold) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <label for="is_sold" class="ml-2 text-sm text-white">{{ __('Marcar como vendido') }}</label>
                        </div>

                        <div class="flex items-center justify-end mt-4 gap-2">
                            <a href="{{ route('cars.index') }}" class="bg-red-500 border-2 border-red-800 p-2 text-white rounded-md transition hover:scale-110 duration-300">{{ __('Cancelar') }}</a>
                            <button type="submit" class="bg-indigo-600 border-2 border-indigo-900 text-white px-4 py-2 rounded-md transition hover:scale-105 duration-300">
                                {{ __('Actualizar Coche') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>