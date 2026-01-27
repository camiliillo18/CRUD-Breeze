<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Inventario de Vehículos') }}
            </h2>
            <a href="{{ route('cars.create') }}" class="w-full sm:w-auto text-center bg-indigo-600 px-4 py-2 rounded-md text-white font-bold transition hover:bg-indigo-700 duration-300 shadow-md">
                + {{ __('Añadir Coche') }}
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-gray-700">
                <div class="p-6">
                    
                    <div class="grid grid-cols-1 gap-4 md:hidden">
                        @forelse($cars as $car)
                            <div class="bg-gray-50/50 dark:bg-gray-900/40 p-5 rounded-xl border border-gray-100 dark:border-gray-700 shadow-sm">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-xl text-gray-900 dark:text-white tracking-tight">
                                            <span class="font-black">{{ $car->brand }}</span> 
                                            <span class="font-light text-gray-400 dark:text-gray-500">{{ $car->model }}</span>
                                        </h3>
                                        <p class="font-mono text-2xl mt-1 text-gray-900 dark:text-white">
                                            {{ number_format($car->price, 2) }}€
                                        </p>
                                    </div>
                                    <div class="size-3 rounded-full {{ $car->is_sold ? 'bg-red-500' : 'bg-[#89F336]' }} shadow-[0_0_8px_rgba(137,243,54,0.4)]"></div>
                                </div>
                                <div class="flex gap-3">
                                    <a href="{{ route('cars.edit', $car->id) }}" class="flex-1 text-center py-2 border border-gray-200 dark:border-gray-600 rounded-lg text-xs font-bold uppercase dark:text-gray-300 transition hover:bg-white dark:hover:bg-gray-800">
                                        {{ __('Editar') }}
                                    </a>
                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="flex-1">
                                        @csrf @method('DELETE')
                                        <button class="w-full bg-red-50 dark:bg-red-900/10 text-red-600 py-2 rounded-lg text-xs font-bold uppercase transition hover:bg-red-100 dark:hover:bg-red-900/30" type="submit" onclick="return confirm('¿Borrar registro?')">
                                            {{ __('Borrar') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-center py-8 text-gray-500 font-light italic">{{ __('Tu inventario está esperando su primer coche...') }}</p>
                        @endforelse
                    </div>

                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-gray-400 text-[10px] uppercase tracking-[0.25em] border-b border-gray-100 dark:border-gray-700">
                                    <th class="px-6 py-5 font-semibold">{{ __('Vehículo') }}</th>
                                    <th class="px-6 py-5 font-semibold text-center">{{ __('Precio') }}</th>
                                    <th class="px-6 py-5 font-semibold text-center">{{ __('Estado') }}</th>
                                    <th class="px-6 py-5 font-semibold text-right">{{ __('Gestión') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50 dark:divide-gray-700/50">
                                @foreach($cars as $car)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20 transition-all duration-200">
                                    <td class="px-6 py-6">
                                        <div class="text-lg text-gray-900 dark:text-white">
                                            <span class="font-bold">{{ $car->brand }}</span> 
                                            <span class="font-extralight text-gray-400 dark:text-gray-500 ml-1">{{ $car->model }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-6 text-center font-mono text-base dark:text-gray-300">
                                        {{ number_format($car->price, 2) }}€
                                    </td>
                                    <td class="px-6 py-6 text-center">
                                        @if($car->is_sold)
                                            <span class="inline-block size-2 rounded-full bg-red-500 mr-2"></span>
                                            <span class="text-[10px] font-black text-red-500 uppercase tracking-tighter">{{ __('Vendido') }}</span>
                                        @else
                                            <span class="inline-block size-2 rounded-full bg-[#89F336] mr-2 shadow-[0_0_5px_#89F336]"></span>
                                            <span class="text-[10px] font-black text-[#89F336] dark:text-[#89F336] uppercase tracking-tighter">{{ __('En Stock') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-6 text-right">
                                        <div class="flex justify-end gap-5">
                                            <a href="{{ route('cars.edit', $car->id) }}" class="text-gray-300 dark:text-gray-600 hover:text-indigo-600 transition-colors">
                                                <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                            </a>
                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button class="text-gray-300 dark:text-gray-600 hover:text-red-500 transition-colors cursor-pointer" type="submit" onclick="return confirm('¿Confirmas la eliminación?')">
                                                    <svg class="size-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>