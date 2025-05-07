@extends('app/public')

@section('content')
    <section class="text-white">
        <!-- Основной контент -->
        <div class="container mx-auto px-4 py-8">
            <div class="relative aspect-video bg-gray-800 rounded-xl overflow-hidden">
                <img src="{{ $news->filepath }}" alt="{{ $news->title }}">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60"></div>
            </div>

            <!-- Дополнительная информация -->
            <div class="mt-12 rounded-xl p-8">
                <h2 class="text-2xl font-bold mb-4">Подробное описание</h2>
                <div class="prose text-gray-300">
                    {{ $news->description }}
                </div>
            </div>
        </div>
    </section>
@endsection
