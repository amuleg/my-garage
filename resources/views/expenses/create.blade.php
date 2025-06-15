@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Додати витрату для  {{ $car->brand }} {{ $car->model }}</h1>

        <form action="{{ route('expenses.store', $car) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Опис</label>
                <textarea name="description" id="description" class="w-full border rounded p-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="amount" class="block text-gray-700">Сума (грн)</label>
                <input type="number" step="0.01" name="amount" id="amount" class="w-full border rounded p-2 @error('amount') border-red-500 @enderror" value="{{ old('amount') }}">
                @error('amount')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700">Дата</label>
                <input type="date" name="date" id="date" class="w-full border rounded p-2 @error('date') border-red-500 @enderror" value="{{ old('date') }}">
                @error('date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Зберегти</button>
        </form>
    </div>
@endsection
