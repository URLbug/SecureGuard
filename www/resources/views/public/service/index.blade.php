@extends('app/public')

@section('content')
    <section class="py-12">
        <div class="container mx-auto px-4">
            <!-- Заголовок раздела -->
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Наши охранные услуги</h2>

            <!-- Сетка услуг -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($services->items() as $service)
                    <div class="bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                        <div class="relative aspect-square bg-gray-200">
                            <a href="{{ route('service', ['id' => $service->id]) }}">
                                <img src="{{ $service->filepath }}" alt="{{ $service->title }}"
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50"></div>
                            </a>
                        </div>
                        <div class="p-6">
                            <a href="{{ route('service', ['id' => $service->id]) }}">
                                <h3 class="text-xl font-bold text-gray-400 mb-2 hover:text-amber-500">{{ $service->title }}</h3>
                            </a>
                            <p class="text-gray-200 mb-4">{{ substr($service->description, 0, 200) }}</p>
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-amber-500 font-bold text-lg">от {{ $service->price }} ₽</span>
                            </div>
                            <button class="w-full bg-amber-500 hover:bg-amber-600 text-white px-8 py-2 rounded-lg
                transition-all duration-300 font-semibold flex items-center justify-center gap-2 service-btn"
                                    data-service-type="{{ $service->title }}">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                                Оставить заявку
                            </button>
                        </div>
                    </div>
                @endforeach

                <!-- Остальные карточки услуг (повторить структуру) -->
            </div>

            <!-- Пагинация -->
            <x-pagination route="{{ 'service' }}" perPage="{{ $services->perPage() }}" lastPage="{{ $services->lastPage() }}" currentPage="{{ $services->currentPage() }}"/>
        </div>

        @component('components.service-form')
        @endcomponent
    </section>
@endsection
