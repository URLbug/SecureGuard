@extends('app/public')

@section('content')
    <section class="text-white">
        <!-- Основной контент -->
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Изображение услуги -->
                <div class="relative aspect-video bg-gray-800 rounded-xl overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1584433144859-1fc3ab64a957?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                         alt="Физическая охрана"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60"></div>
                </div>

                <!-- Описание услуги -->
                <div class="space-y-6">
                    <h1 class="text-4xl font-bold">Физическая охрана объектов</h1>

                    <!-- Цена -->
                    <div class="text-2xl font-bold text-amber-500">
                        от 15 000 ₽/мес
                    </div>

                    <!-- Кнопка заказа -->
                    <button class="mt-6 bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-lg
                transition-all duration-300 font-semibold flex items-center gap-2 service-btn"
                            data-service="Физическая охрана">
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
                    <p>Наша служба физической охраны обеспечивает комплексную защиту объектов любой сложности.
                        В услугу входит:</p>
                    <ul>
                        <li>Установка стационарных постов охраны</li>
                        <li>Патрулирование территории</li>
                        <li>Контроль системы видеонаблюдения</li>
                        <li>Обеспечение пропускного режима</li>
                        <li>Экстренное реагирование на ЧП</li>
                    </ul>
                    <p>Все сотрудники имеют специальную подготовку и регулярно проходят проверку квалификации.</p>
                </div>
            </div>
        </div>

        @component('components.service-form')
        @endcomponent
    </section>
@endsection
