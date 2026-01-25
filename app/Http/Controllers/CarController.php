<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index() {
        $cars = Car::all();

        return view('cars.index', compact('cars'));
    }

    public function create() {
        return view('cars.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900',
            'price' => 'required|numeric|min:0',
            'arrival_date' => 'required|date'
        ]);

        $validated['is_sold'] = $request->has('is_sold');

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Coche añadido correctamente.');
    }

    public function edit(Car $car) {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car) {
        $validated = $request->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer|min:1900',
            'price' => 'required|numeric|min:0',
            'arrival_date' => 'required|date'
        ]);

        $validated['is_sold'] = $request->has('is_sold');

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Coche actualizado correctamente.');
    }

    public function destroy(Car $car) {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Coche eliminado correctamente.');
    }


}
