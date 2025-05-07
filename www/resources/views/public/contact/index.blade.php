@extends('app/public')

@section('content')
    <section class="text-white py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Контакты</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Контактная информация -->
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-amber-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Адрес</h3>
                            <p class="text-gray-200">г. Москва, ул. Охранная, 12<br>Бизнес-центр "Secure Tower", офис 405</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-amber-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Телефон</h3>
                            <p class="text-gray-200">
                                <a href="tel:+74951234567" class="hover:text-amber-500 transition-colors">+7 (495) 123-45-67</a>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-amber-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">E-mail</h3>
                            <p class="text-gray-200">
                                <a href="mailto:info@secureguard.ru" class="hover:text-amber-500 transition-colors">info@secureguard.ru</a>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="mt-1 text-amber-500">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Режим работы</h3>
                            <p class="text-gray-200">
                                Пн-Пт: 09:00 - 20:00<br>
                                Сб: 10:00 - 18:00<br>
                                Вс: выходной
                            </p>
                        </div>
                    </div>

                    <!-- Карта -->
                    <div class="mt-8 rounded-xl overflow-hidden">
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?um=constructor%3A1b5d6e0d8d2b4e4f4e4e4e4e4e4e4e4e4&amp;source=constructor"
                            width="100%"
                            height="400"
                            frameborder="0"
                            class="rounded-lg"
                            allowfullscreen="true">
                        </iframe>
                    </div>
                </div>

                <!-- Форма обратной связи -->
                <div class="bg-gray-800 rounded-xl p-6">
                    <h3 class="text-2xl font-bold mb-6">Обратная связь</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium mb-1">Имя *</label>
                            <input type="text" required
                                   class="w-full px-4 py-2 bg-gray-900 rounded-lg border border-gray-700
                            focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">E-mail</label>
                            <input type="email"
                                   class="w-full px-4 py-2 bg-gray-900 rounded-lg border border-gray-700
                            focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Телефон *</label>
                            <input type="tel" required
                                   class="w-full px-4 py-2 bg-gray-900 rounded-lg border border-gray-700
                            focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
                        </div>

                        <div>
                            <label class="block text-sm font-medium mb-1">Сообщение</label>
                            <textarea rows="4"
                                      class="w-full px-4 py-2 bg-gray-900 rounded-lg border border-gray-700
                            focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50"></textarea>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox" required
                                   class="w-4 h-4 accent-amber-500 bg-gray-900 border-gray-700 rounded">
                            <label class="ml-2 text-sm">
                                Согласен с <a href="#" class="text-amber-500 hover:underline">политикой конфиденциальности</a>
                            </label>
                        </div>

                        <button type="submit"
                                class="w-full bg-amber-500 hover:bg-amber-600 text-white px-6 py-3 rounded-lg
                        transition-colors duration-300 font-semibold mt-4">
                            Отправить сообщение
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
