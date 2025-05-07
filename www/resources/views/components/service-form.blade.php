<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" id="modal">
    <div class="bg-gray-900 rounded-lg w-full max-w-md mx-4 p-6 relative text-white">
        <!-- Заголовок -->
        <div class="flex justify-between items-center mb-6">
            <h3 class="text-2xl font-bold">Заявка на услугу</h3>
        </div>

        <!-- Форма -->
        <form class="space-y-4">
            <!-- Скрытое поле услуги -->
            <input type="hidden" name="service" id="serviceField" value="">

            <!-- Имя -->
            <div>
                <label class="block text-sm font-medium mb-1">Имя *</label>
                <input type="text" required
                       class="w-full px-4 py-2 bg-gray-800 rounded-lg border border-gray-700
                    focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium mb-1">E-Mail</label>
                <input type="email"
                       class="w-full px-4 py-2 bg-gray-800 rounded-lg border border-gray-700
                    focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
            </div>

            <!-- Телефон -->
            <div>
                <label class="block text-sm font-medium mb-1">Телефон *</label>
                <input type="tel" id="phone" required
                       class="w-full px-4 py-2 bg-gray-800 rounded-lg border border-gray-700
                    focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50">
            </div>

            <!-- Сообщение -->
            <div>
                <label class="block text-sm font-medium mb-1">Сообщение</label>
                <textarea rows="3"
                          class="w-full px-4 py-2 bg-gray-800 rounded-lg border border-gray-700
                    focus:border-amber-500 focus:ring-2 focus:ring-amber-500/50"></textarea>
            </div>

            <!-- Чекбокс -->
            <div class="flex items-center">
                <input type="checkbox" required
                       class="w-4 h-4 accent-amber-500 bg-gray-800 border-gray-700 rounded">
                <label class="ml-2 text-sm">
                    Согласен с <a href="#" class="text-amber-500 hover:underline">политикой конфиденциальности</a>
                </label>
            </div>

            <!-- Кнопки -->
            <div class="flex gap-3 mt-6">
                <button type="submit"
                        class="flex-1 bg-amber-500 hover:bg-amber-600 text-white px-6 py-2 rounded-lg
                    transition-colors duration-300">
                    Отправить
                </button>
                <button type="button" id="closeBtnModal"
                        class="flex-1 border border-gray-700 hover:border-amber-500 text-white px-6 py-2 rounded-lg
                    transition-colors duration-300">
                    Отмена
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Успешная отправка -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" id="successModal">
    <div class="bg-gray-900 rounded-lg w-full max-w-md mx-4 p-6 relative text-white">
        <div class="text-center">
            <div class="mx-auto mb-4">
                <svg class="w-16 h-16 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-4">Заявка отправлена!</h3>
            <p class="text-gray-300 mb-6">Мы свяжемся с вами в ближайшее время</p>
            <button class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-2 rounded-lg
            transition-colors duration-300" id="closeSuccessModal">
                Хорошо
            </button>
        </div>
    </div>
</div>

<!-- Ошибка отправки -->
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden" id="errorModal">
    <div class="bg-gray-900 rounded-lg w-full max-w-md mx-4 p-6 relative text-white">
        <div class="text-center">
            <div class="mx-auto mb-4">
                <svg class="w-16 h-16 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
            <h3 class="text-2xl font-bold mb-4">Ошибка отправки!</h3>
            <p class="text-gray-300 mb-6">Пожалуйста, попробуйте еще раз или свяжитесь с нами по телефону</p>
            <button class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-2 rounded-lg
            transition-colors duration-300" id="closeErrorModal">
                Понятно
            </button>
        </div>
    </div>
</div>
