@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Редагувати авто</h1>

        <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data"
              class="bg-white p-6 rounded-xl shadow-md space-y-4">
            @csrf
            @method('PUT')

            <x-input-field label="Марка" name="brand" :value="$car->brand" />
            <x-input-field label="Модель" name="model" :value="$car->model" />
            <x-input-field label="Рік" name="year" type="number" :value="$car->year" />
            <x-input-field label="VIN" name="vin" :value="$car->vin" />
            <x-textarea-field label="Опис" name="description" :value="$car->description" />

            <x-input-field label="Ціна покупки" name="purchase_price" type="number" :value="$car->purchase_price" />
            <x-input-field label="Дата покупки" name="purchase_date" type="date" :value="$car->purchase_date->format('Y-m-d')" />

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Статус</label>
                <select name="status" id="status" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    <option value="owned" {{ $car->status === 'owned' ? 'selected' : '' }}>У власності</option>
                    <option value="sold" {{ $car->status === 'sold' ? 'selected' : '' }}>Продана</option>
                </select>
            </div>

            <x-input-field label="Ціна продажу" name="sale_price" type="number" :value="$car->sale_price" />
            <x-input-field label="Дата продажу" name="sale_date" type="date" :value="$car->sale_date?->format('Y-m-d')" />

            <div>
                <label for="photos" class="block text-sm font-medium text-gray-700">Фото</label>
                <input type="file" name="photos[]" id="photos" multiple class="mt-1 block w-full" />
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Зберегти</button>
        </form>
    </div>
@endsection
