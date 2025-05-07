@extends('app/public')

@section('content')
    <section class="text-white">
        <!-- Основной контент -->
        <div class="container mx-auto px-4 py-8">
            <div class="relative aspect-video bg-gray-800 rounded-xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1584433144859-1fc3ab64a957?ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80"
                     alt="Физическая охрана"
                     class="">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60"></div>
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
    </section>
@endsection
