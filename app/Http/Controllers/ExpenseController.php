<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function create(Car $car)
    {
        if ($car->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }
        return view('expenses.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        if ($car->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        Expense::create(array_merge($validated, ['car_id' => $car->id]));

        return redirect()->route('cars.index')->with('success', 'Расход добавлен!');
    }
}
