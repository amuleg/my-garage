@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">{{ isset($user) ? $user->name : Auth::user()->name }}: Мои машины</h1>
        <div class="mb-4">
            <a href="{{ route('cars.index') }}" class="text-blue-500 mr-4">Мои машины</a>
            @foreach (\App\Models\User::where('id', '!=', Auth::id())->get() as $otherUser)
                <a href="{{ route('cars.user', $otherUser) }}" class="text-blue-500 mr-4">{{ $otherUser->name }}</a>
            @endforeach
        </div>
        <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Добавить машину</a>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($cars as $car)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</h2>
                    <p class="text-gray-600">{{ $car->description }}</p>
                    <p class="text-gray-600">Статус: {{ $car->status === 'owned' ? 'В собственности' : 'Продана' }}</p>
                    <p class="text-gray-600">Куплена за: {{ $car->purchase_price }} грн</p>
                    @if ($car->sale_price)
                        <p class="text-gray-600">Продана за: {{ $car->sale_price }} грн</p>
                    @endif
                    @if ($car->photos->count())
                        <div class="mt-2">
                            @foreach ($car->photos as $photo)
                                <img src="{{ Storage::url($photo->path) }}" alt="Car photo" class="w-32 h-32 object-cover inline-block mr-2">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
