@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ isset($user) ? $user->name : Auth::user()->name }}: Користувач</h1>
        <div class="mb-4">
            <a href="{{ route('cars.index') }}" class="text-blue-500 mr-4">Мої авто</a>
            @foreach (\App\Models\User::where('id', '!=', Auth::id())->get() as $otherUser)
                <a href="{{ route('cars.user', $otherUser) }}" class="text-blue-500 mr-4">{{ $otherUser->name }}</a>
            @endforeach
        </div>
        <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Додати авто</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($cars as $car)
                <div class="group bg-white p-6 rounded-xl shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300 relative">
                    <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</h2>
                    <p class="text-sm text-gray-500 mb-2">👤 {{ $car->user->name }}</p>
                    <p class="text-gray-600">{{ $car->description }}</p>
                    <p class="text-gray-600">📌 Статус: <strong>{{ $car->status === 'owned' ? 'У власності' : 'Продана' }}</strong></p>
                    <p class="text-gray-600">💰 Куплена за: {{ $car->purchase_price }} грн</p>
                    @if ($car->sale_price)
                        <p class="text-gray-600">💸 Продана за: {{ $car->sale_price }} грн</p>
                    @endif

                    @if ($car->photos->count())
                        <div class="mt-2 flex space-x-2 overflow-x-auto">
                            @foreach ($car->photos as $photo)
                                <img src="{{ Storage::url($photo->path) }}" alt="Car photo"
                                     class="h-24 w-24 object-cover rounded border border-gray-200">
                            @endforeach
                        </div>
                    @endif

                    @if ($car->expenses->count())
                        <div class="mt-2">
                            <p class="text-gray-600 font-semibold">💵 Витрати:</p>
                            <ul class="list-disc pl-5 text-sm">
                                @foreach ($car->expenses as $expense)
                                    <li>{{ $expense->description }}: {{ $expense->amount }} грн ({{ $expense->date->format('d.m.Y') }})</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-4 flex justify-between items-center">
                        <div class="flex gap-4">
                            <a href="{{ route('expenses.create', $car) }}" class="text-blue-600 hover:underline">➕ Витрата</a>
                            <a href="{{ route('cars.edit', $car) }}" class="text-yellow-600 hover:underline">✏️ Редагувати</a>
                        </div>
                        <a href="{{ route('cars.plans', $car) }}" class="text-green-600 hover:underline">📋 Плани</a>

                    </div>
                </div>

            @endforeach
        </div>
    </div>
@endsection
