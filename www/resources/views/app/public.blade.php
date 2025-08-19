<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SecureGuard - Охранные системы</title>

    @vite(['resources/css/app.css', 'resources/js/app.js',])
</head>
<body class="bg-gray-600">
    <!-- Шапка сайта -->
    <header class="bg-gray-900 text-white">
        <!-- Верхняя часть шапки -->
        <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4">
                <!-- Логотип -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold text-amber-500">Secure</span>
                    <span class="text-2xl font-bold">Guard</span>
                </a>
            </div>

            <div class="flex flex-col md:flex-row items-center gap-4">
                <!-- Контакты -->
                <div class="text-sm">
                    <p class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        г. Москва, ул. Охранная, 12
                    </p>
                    <p class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        +7 (495) 123-45-67
                    </p>
                    <p class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        info@secureguard.ru
                    </p>
                </div>
            </div>
        </div>

        <!-- Навигационное меню -->
        <nav class="bg-gray-800 py-4">
            <div class="container mx-auto px-4">
                <ul class="flex flex-col md:flex-row gap-6 justify-center">
                    <li><a href="{{ route('about') }}" class="hover:text-amber-500">О компании</a></li>
                    <li><a href="{{ route('service') }}" class="hover:text-amber-500">Охранные услуги</a></li>
                    <li><a href="{{ route('service-price') }}" class="hover:text-amber-500">Цены на услуги</a></li>
                    <li><a href="{{ route('news') }}" class="hover:text-amber-500">Новости</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-amber-500">Контакты</a></li>
                    <li><a href="{{ route('about-me') }}" class="hover:text-amber-500">Об проекте</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Основной контент -->
    <main class="container mx-auto px-4 py-8">
        <!-- Контент страницы -->
        @yield('content')
    </main>

    <!-- Подвал сайта -->
    <footer class="bg-gray-900 text-white md:absolute md:w-full">
        <!-- Верхняя часть подвала -->
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-amber-500 text-lg font-bold mb-4">О компании</h3>
                    <p class="text-sm">Обеспечиваем безопасность с 2010 года. Современные технологии и опытные сотрудники.</p>
                </div>
                <div>
                    <h3 class="text-amber-500 text-lg font-bold mb-4">Охранные услуги</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/service/2" class="hover:text-amber-500">Вооруженное сопровождение грузов</a></li>
                        <li><a href="/service/3" class="hover:text-amber-500">Круглосуточный патруль</a></li>
                        <li><a href="/service/4" class="hover:text-amber-500">Персональная защита</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-amber-500 text-lg font-bold mb-4">Цены на услуги</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('service-price') }}" class="hover:text-amber-500">Тарифы</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-amber-500 text-lg font-bold mb-4">Документы</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('privacy') }}" class="hover:text-amber-500">Политика конфиденциальности</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Нижний подвал -->
        <div class="bg-gray-800 py-4">
            <div class="container mx-auto px-4 text-sm text-center">
                <p>©Cooperate. Давыдов Тимур Бахтиерович, ИСП-О/СПОо/КЛ21, Создано в {{ date('Y') }}</p>
            </div>
        </div>
    </footer>
</body>
</html>
