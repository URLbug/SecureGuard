@extends('app/public')

@section('content')
    <section class="text-white">
        <!-- Основной контент -->
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Изображение услуги -->
                <div class="relative aspect-video bg-gray-800 rounded-xl overflow-hidden">
                    <img src="{{ $service->filepath }}"
                         alt="{{ $service->title }}"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60"></div>
                </div>

                <!-- Описание услуги -->
                <div class="space-y-6">
                    <h1 class="text-4xl font-bold">{{ $service->title }}</h1>

                    <!-- Цена -->
                    <div class="text-2xl font-bold text-amber-500">
                        от {{ $service->price }} ₽
                    </div>

                    <!-- Кнопка заказа -->
                    <button class="mt-6 bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-lg
                transition-all duration-300 font-semibold flex items-center gap-2 service-btn"
                            data-service-type="{{ $service->title }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                        </svg>
                        Оставить заявку
                    </button>
                </div>
            </div>

            <!-- Дополнительная информация -->
            <div class="mt-12 rounded-xl p-8">
                <h2 class="text-2xl font-bold mb-4">Подробное описание</h2>
                <div class="prose text-gray-300">
                    {{ $service->description }}
                </div>
            </div>
        </div>

        @component('components.service-form', ['serviceType' => $service->title])
        @endcomponent
    </section>
@endsection
