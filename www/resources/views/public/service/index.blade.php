@extends('app/public')

@section('content')
    <section class="py-12">
        <div class="container mx-auto px-4">
            <!-- Заголовок раздела -->
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Наши охранные услуги</h2>

            <!-- Сетка услуг -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Карточка услуги 1 -->
                <div class="bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="relative aspect-square bg-gray-200">
                        <img src="https://via.placeholder.com/400x300" alt="Физическая охрана"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50"></div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Физическая охрана</h3>
                        <p class="text-gray-200 mb-4">Круглосуточная охрана объектов любой сложности</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-amber-500 font-bold text-lg">от 15 000 ₽/мес</span>
                        </div>
                        <button class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 rounded-lg
                    transition-all duration-300 service-btn">
                            Заказать
                        </button>
                    </div>
                </div>

                <!-- Карточка услуги 2 (без изображения) -->
                <div class="bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-white mb-2">Пультовая охрана</h3>
                        <p class="text-gray-200 mb-4">Мониторинг 24/7 с мгновенным реагированием</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-amber-500 font-bold text-lg">от 3 500 ₽/мес</span>
                        </div>
                        <button class="w-full bg-amber-500 hover:bg-amber-600 text-white py-2 rounded-lg
                    transition-all duration-300">
                            Заказать
                        </button>
                    </div>
                </div>

                <!-- Остальные карточки услуг (повторить структуру) -->
            </div>

            <!-- Пагинация -->
            <div class="mt-8 flex justify-center">
                <nav class="flex space-x-2">
                    <a href="#" class="px-3 py-1 text-gray-200 hover:text-amber-500 transition-colors">&laquo;</a>
                    <a href="#" class="px-3 py-1 bg-amber-500 text-white rounded">1</a>
                    <a href="#" class="px-3 py-1 text-gray-300 hover:text-amber-500 transition-colors">2</a>
                    <a href="#" class="px-3 py-1 text-gray-300 hover:text-amber-500 transition-colors">3</a>
                    <span class="px-3 py-1 text-gray-400">...</span>
                    <a href="#" class="px-3 py-1 text-gray-300 hover:text-amber-500 transition-colors">10</a>
                    <a href="#" class="px-3 py-1 text-gray-200 hover:text-amber-500 transition-colors">&raquo;</a>
                </nav>
            </div>
        </div>

        @component('components.service-form')
        @endcomponent
    </section>
@endsection
