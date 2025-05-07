@extends('app/public')

@section('content')
    <section class="text-white py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-8 text-center">Цены на охранные услуги</h2>

            <div class="overflow-x-auto rounded-lg border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-semibold text-amber-500 uppercase">Тип услуги</th>
                        <th class="px-6 py-4 text-right text-sm font-semibold text-amber-500 uppercase">Стоимость</th>
                    </tr>
                    </thead>
                    <tbody class="bg-gray-900 divide-y divide-gray-700">
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Физическая охрана объекта</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 15 000 ₽/мес</td>
                    </tr>
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Пультовая охрана</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 3 500 ₽/мес</td>
                    </tr>
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Монтаж видеонаблюдения</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 25 000 ₽</td>
                    </tr>
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Личная охрана</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 8 000 ₽/сутки</td>
                    </tr>
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Охрана мероприятия</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 15 000 ₽/день</td>
                    </tr>
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Установка тревожной кнопки</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 7 000 ₽</td>
                    </tr>
                    <tr class="hover:bg-gray-800 transition-colors">
                        <td class="px-6 py-4 text-sm">Консультация безопасности</td>
                        <td class="px-6 py-4 text-right text-amber-500 font-medium">от 5 000 ₽</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-gray-400 text-sm mt-4 text-center">
                *Указанные цены являются стартовыми. Точная стоимость рассчитывается индивидуально после осмотра объекта.
            </p>
        </div>
    </section>
@endsection
