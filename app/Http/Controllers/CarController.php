<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('user_id', Auth::id())->get();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'vin' => 'nullable|string|max:17',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
            'status' => 'required|in:owned,sold',
            'sale_price' => 'nullable|numeric|min:0',
            'sale_date' => 'nullable|date',
        ]);

        Car::create(array_merge($validated, ['user_id' => Auth::id()]));

        return redirect()->route('cars.index')->with('success', 'Car Added!');
    }
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'vin' => 'nullable|string|max:17',
            'description' => 'nullable|string',
            'purchase_price' => 'required|numeric|min:0',
            'purchase_date' => 'required|date',
            'status' => 'required|in:owned,sold',
            'sale_price' => 'nullable|numeric|min:0',
            'sale_date' => 'nullable|date',
        ]);

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Машина обновлена!');
    }
    public function showUserCars(User $user)
    {
        $cars = Car::with(['photos', 'expenses', 'user'])->get();
        return view('cars.index', compact('cars'));
    }
}
