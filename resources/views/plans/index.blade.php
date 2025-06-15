@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Плани по {{ $car->brand }} {{ $car->model }}</h1>

        <form action="{{ route('cars.plans.store', $car) }}" method="POST" class="mb-4">
            @csrf
            <input type="text" name="task" placeholder="Нове завдання"
                   class="border p-2 rounded w-full mb-2">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Додати</button>
        </form>

        <ul class="space-y-2">
            @foreach ($car->plans as $plan)
                <li class="flex items-center justify-between bg-white p-3 rounded shadow">
                    <form action="{{ route('cars.plans.toggle', [$car, $plan]) }}" method="POST">
                        @csrf
                        <button class="flex items-center gap-2">
                            <input type="checkbox" {{ $plan->is_done ? 'checked' : '' }} readonly>
                            <span class="{{ $plan->is_done ? 'line-through text-gray-500' : '' }}">{{ $plan->task }}</span>
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
