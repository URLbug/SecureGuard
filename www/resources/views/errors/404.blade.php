@extends(Request::is('admin/*') ? 'app.admin' : 'app.public')

@if(Request::is('admin/*'))
    @section('content')
        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-xl shadow-sm overflow-hidden w-full max-w-md">
            <div class="p-8 text-center">
                <!-- Иконка ошибки -->
                <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-red-100">
                    <svg class="h-10 w-10 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>

                <!-- Заголовок и текст -->
                <h2 class="mt-6 text-2xl font-bold text-gray-900">
                    Ошибка 404
                </h2>
                <p class="mt-2 text-gray-600">
                    Страница, которую вы ищете, не найдена
                </p>

                <!-- Дополнительная информация -->
                <div class="mt-4 bg-gray-50 rounded-lg p-4 text-left">
                    <p class="text-sm text-gray-500">
                        Возможные причины:
                    </p>
                    <ul class="mt-2 text-sm text-gray-500 list-disc pl-5 space-y-1">
                        <li>Страница была перемещена или удалена</li>
                        <li>В адресе есть опечатка</li>
                        <li>Страница временно недоступна</li>
                    </ul>
                </div>

                <!-- Кнопка возврата -->
                <div class="mt-8">
                    <a href="{{ url()->previous() }}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Вернуться назад
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection
@else
    @section('content')
        <div class="max-w-3xl mx-auto text-center">
        <!-- Анимация иконки -->
        <div class="mb-8 animate-bounce">
            <svg class="w-24 h-24 mx-auto text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h1 class="text-9xl font-bold text-amber-500 mb-4">404</h1>
        <h2 class="text-4xl font-bold text-white mb-6">Страница не найдена</h2>

        <p class="text-xl text-gray-300 mb-8">
            Возможно, она была перемещена или удалена.
            <br>Проверьте адрес или воспользуйтесь поиском.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('home') }}" class="bg-amber-500 hover:bg-amber-600 text-gray-900 font-bold py-3 px-6 rounded-lg transition duration-300">
                На главную
            </a>
        </div>

        <!-- Дополнительные ссылки -->
        <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('service') }}" class="p-4 bg-gray-700 hover:bg-gray-800 rounded-lg transition">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 text-amber-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                    <span>Услуги</span>
                </div>
            </a>
            <a href="{{ route('service-price') }}" class="p-4 bg-gray-700 hover:bg-gray-800 rounded-lg transition">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 text-amber-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Цены</span>
                </div>
            </a>
            <a href="{{ route('news') }}" class="p-4 bg-gray-700 hover:bg-gray-800 rounded-lg transition">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 text-amber-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <span>Новости</span>
                </div>
            </a>
            <a href="{{ route('contact') }}" class="p-4 bg-gray-700 hover:bg-gray-800 rounded-lg transition">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 text-amber-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span>Контакты</span>
                </div>
            </a>
        </div>
    </div>
    @endsection
@endif
