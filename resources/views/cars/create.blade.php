@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Добавить машину</h1>

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label for="brand" class="block text-gray-700">Марка</label>
                <input type="text" name="brand" id="brand" class="w-full border rounded p-2 @error('brand') border-red-500 @enderror" value="{{ old('brand') }}">
                @error('brand')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-700">Модель</label>
                <input type="text" name="model" id="model" class="w-full border rounded p-2 @error('model') border-red-500 @enderror" value="{{ old('model') }}">
                @error('model')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="year" class="block text-gray-700">Год</label>
                <input type="number" name="year" id="year" class="w-full border rounded p-2 @error('year') border-red-500 @enderror" value="{{ old('year') }}">
                @error('year')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="vin" class="block text-gray-700">VIN (опционально)</label>
                <input type="text" name="vin" id="vin" class="w-full border rounded p-2 @error('vin') border-red-500 @enderror" value="{{ old('vin') }}">
                @error('vin')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700">Описание</label>
                <textarea name="description" id="description" class="w-full border rounded p-2 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="purchase_price" class="block text-gray-700">Цена покупки (грн)</label>
                <input type="number" step="0.01" name="purchase_price" id="purchase_price" class="w-full border rounded p-2 @error('purchase_price') border-red-500 @enderror" value="{{ old('purchase_price') }}">
                @error('purchase_price')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="purchase_date" class="block text-gray-700">Дата покупки</label>
                <input type="date" name="purchase_date" id="purchase_date" class="w-full border rounded p-2 @error('purchase_date') border-red-500 @enderror" value="{{ old('purchase_date') }}">
                @error('purchase_date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700">Статус</label>
                <select name="status" id="status" class="w-full border rounded p-2 @error('status') border-red-500 @enderror">
                    <option value="owned" {{ old('status') === 'owned' ? 'selected' : '' }}>В собственности</option>
                    <option value="sold" {{ old('status') === 'sold' ? 'selected' : '' }}>Продана</option>
                </select>
                @error('status')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sale_price" class="block text-gray-700">Цена продажи (грн, опционально)</label>
                <input type="number" step="0.01" name="sale_price" id="sale_price" class="w-full border rounded p-2 @error('sale_price') border-red-500 @enderror" value="{{ old('sale_price') }}">
                @error('sale_price')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="sale_date" class="block text-gray-700">Дата продажи (опционально)</label>
                <input type="date" name="sale_date" id="sale_date" class="w-full border rounded p-2 @error('sale_date') border-red-500 @enderror" value="{{ old('sale_date') }}">
                @error('sale_date')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="photos" class="block text-gray-700">Фотографии (опционально)</label>
                <input type="file" name="photos[]" id="photos" multiple class="w-full border rounded p-2 @error('photos') border-red-500 @enderror">
                @error('photos')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Сохранить</button>
        </form>
    </div>
@endsection
