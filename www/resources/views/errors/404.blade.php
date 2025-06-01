@if(Request::is('admin/*'))
    @extends('app.admin')

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
@endif
