<x-app-layout>
    <div class="container">
        <h1>Inventario de Coches</h1>
        <a href="{{ route('cars.create') }}">Añadir Coche</a>
        <table>
            <tr>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ number_format($car->price, 2) }}€</td>
                <td>{{ $car->is_sold ? 'Vendido' : 'Disponible' }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car->id) }}">Editar</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit">Borrar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>