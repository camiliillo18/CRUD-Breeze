<x-app-layout>
    <h1>Nuevo Coche</h1>
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <label for="brand">Marca: </label>
        <input type="text" name="brand" placeholder="Marca" required>

        <label for="model">Modelo: </label>
        <input type="text" name="model" placeholder="Modelo" required>

        <label for="year">Año: </label>
        <input type="number" name="year" placeholder="Año" required>

        <label for="price">Precio: </label>
        <input type="number" step="0.01" name="price" placeholder="Precio" required>

        <label for="arrival_date">Fecha de llegada: </label>
        <input type="date" name="arrival_date" required>

        <label><input type="checkbox" name="is_sold"> ¿Vendido?</label>
        <button type="submit">Guardar</button>
    </form>
</x-app-layout>