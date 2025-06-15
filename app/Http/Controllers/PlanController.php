<?php


namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Car $car)
    {
        return view('plans.index', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $request->validate(['task' => 'required|string|max:255']);
        $car->plans()->create(['task' => $request->task]);
        return back();
    }

    public function toggle(Car $car, Plan $plan)
    {
        $plan->update(['is_done' => !$plan->is_done]);
        return back();
    }
}
