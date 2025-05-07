@extends('app/public')

@section('content')
    <section class="text-white py-20">
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
                        @foreach($services as $service)
                            <tr class="hover:bg-gray-800 transition-colors">
                                <td class="px-6 py-4 text-sm">{{ $service->title }}</td>
                                <td class="px-6 py-4 text-right text-amber-500 font-medium">от {{ $service->price }} ₽</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p class="text-gray-400 text-sm mt-4 text-center">
                *Указанные цены являются стартовыми. Точная стоимость рассчитывается индивидуально после осмотра объекта.
            </p>
        </div>
    </section>
@endsection
