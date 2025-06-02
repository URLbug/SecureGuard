<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js',])
</head>
<body class="bg-gray-50">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200">
        <div class="p-6 border-b border-gray-100">
            <a href="{{ route('admin-home') }}" class="text-2xl font-semibold text-blue-700">SecureGuard</a>
        </div>

        <nav class="p-4">
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('admin-home') }}" class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                        <i class="fas fa-home w-5 mr-3 text-gray-400"></i>
                        Главная
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-service') }}" class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                        <i class="fa-solid fa-bell-concierge w-5 mr-3 text-gray-400"></i>
                        Услуги
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-news') }}" class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                        <i class="fa-solid fa-newspaper w-5 mr-3 text-gray-400"></i>
                        Новости
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin-form') }}" class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                        <i class="fa-solid fa-comment w-5 mr-3 text-gray-400"></i>
                        Формы обратной связи
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="flex items-center p-3 text-gray-700 hover:bg-blue-50 hover:text-blue-700 rounded-lg">
                        <i class="fa-solid fa-right-to-bracket w-5 mr-3 text-gray-400"></i>
                        Публичная часть
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <main class="ml-64 p-8">
        <!-- Top Bar -->
        @if(\Illuminate\Support\Facades\Auth::check() && (isset($exception) && $exception->getStatusCode() < 400))
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-semibold text-gray-800">@yield('title')</h1>
                <a href="{{ route('logout') }}" class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm">
                    Выйти
                </a>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
