@extends('app/public')

@section('content')
    <div class="relative bg-gray-900">
        <div class="absolute inset-0 z-10 bg-black/50"></div>

        <div class="container mx-auto px-4 py-24 relative z-20">
            <div class="max-w-3xl text-center md:text-left">
                <h1 class="text-2xl md:text-5xl font-bold text-white mb-6">
                    Профессиональная охрана
                    <span class="text-amber-500">вашей безопасности</span>
                </h1>

                <p class="text-lg text-gray-300 mb-8">
                    Полный комплекс охранных услуг с гарантией качества.
                    Современные технологии и 24/7 мониторинг.
                </p>

                <div class="flex flex-col md:flex-row gap-4 justify-center md:justify-start">
                    <a href="#" class="bg-amber-500 hover:bg-amber-600 text-white px-8 py-3 rounded-lg
                transition-all duration-300 font-semibold">
                        Заказать услугу
                    </a>
                    <a href="#" class="border-2 border-amber-500 text-amber-500 hover:bg-amber-500/10
                px-8 py-3 rounded-lg transition-all duration-300">
                        Подробнее
                    </a>
                </div>
            </div>
        </div>

        <!-- Фоновое изображение -->
        <img src="{{ asset('images/guarden.jpg') }}"
             alt="Охранные системы"
             class="absolute inset-0 w-full h-full object-cover">
    </div>
    <div class="mt-10">
        <div class="text-white text-3xl font-bold text-center text-balance">
            <span>Почему стоит выбрать нас</span>
        </div>

        <div class="container mx-auto px-4 py-8 flex items-center justify-center">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-white text-center">
                <div class="flex items-center px-2 py-3">
                    <svg class="fill-amber-500 h-20 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                        <path d="M246.9 14.1C234 15.2 224 26 224 39c0 13.8 11.2 25 25 25l151 0c8.8 0 16-7.2 16-16l0-30.6C416
                        8 408 .7 398.7 1.4L246.9 14.1zM240 112c0 44.2 35.8 80 80 80s80-35.8 80-80c0-5.5-.6-10.8-1.6-16L241.6 96c-1 5.2-1.6 10.5-1.6 16zM72 224c-22.1
                        0-40 17.9-40 40s17.9 40 40 40l152 0 0 89.4L386.8 230.5c-13.3-4.3-27.3-6.5-41.6-6.5L240 224 72 224zm345.7 20.9L246.6 416 416
                        416l0-46.3 53.6 90.6c11.2 19 35.8 25.3 54.8 14.1s25.3-35.8 14.1-54.8L462.3 290.8c-11.2-18.9-26.6-34.5-44.6-45.9zM224 448l0
                        32c0 17.7 14.3 32 32 32l128 0c17.7 0 32-14.3 32-32l0-32-192 0z"/>
                    </svg>
                    <p>
                        Уже на рынке <span class="font-bold text-amber-500 text-2xl">15</span> лет
                    </p>
                </div>
                <div class="flex items-center px-2 py-3">
                    <svg class="fill-amber-500 h-20 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path d="M192 0c17.7 0 32 14.3 32 32l0 112-64 0 0-112c0-17.7 14.3-32
                        32-32zM64 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 80-64 0
                        0-80zm192 0c0-17.7 14.3-32 32-32s32 14.3 32 32l0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-96zm96
                        64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 64c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-64zm-96 88l0-.6c9.4 5.4 20.3 8.6
                        32 8.6c13.2 0 25.4-4 35.6-10.8c8.7 24.9 32.5 42.8 60.4 42.8c11.7 0 22.6-3.1 32-8.6l0 8.6c0 52.3-25.1 98.8-64 128l0 96c0 17.7-14.3 32-32 32l-160 0c-17.7
                        0-32-14.3-32-32l0-78.4c-17.3-7.9-33.2-18.8-46.9-32.5L69.5 357.5C45.5 333.5 32 300.9 32 267l0-27c0-35.3 28.7-64 64-64l88 0c22.1 0 40 17.9 40 40s-17.9
                        40-40 40l-56 0c-8.8 0-16 7.2-16 16s7.2 16 16 16l56 0c39.8 0 72-32.2 72-72z"/>
                    </svg>
                    <p>
                        Более <span class="font-bold text-amber-500 text-2xl">400</span> боевых выездов
                    </p>
                </div>
                <div class="flex items-center px-2 py-3">
                    <svg class="fill-amber-500 h-20 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M149.1 64.8L138.7 96 64 96C28.7 96 0 124.7 0 160L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0
                        64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-74.7 0L362.9 64.8C356.4
                        45.2 338.1 32 317.4 32L194.6 32c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z"/>
                    </svg>
                    <p>
                        <span class="font-bold text-amber-500 text-2xl">1000</span> установленных камер видеонаблюдения
                    </p>
                </div>
                <div class="flex items-center px-2 py-3">
                    <svg class="fill-amber-500 h-20 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M320 64c0-12.6-7.4-24-18.9-29.2s-25-3.1-34.4 5.3L131.8 160 64 160c-35.3 0-64
                        28.7-64 64l0 64c0 35.3 28.7 64 64 64l67.8 0L266.7 471.9c9.4 8.4 22.9 10.4 34.4 5.3S320
                        460.6 320 448l0-384z"/>
                    </svg>
                    <p>
                        <span class="font-bold text-amber-500 text-2xl">2200</span> установленных пожарных сигнализаций
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center justify-center border-2 border-spacing-3 border-gray-500 border-solid">
        <div>
            <span>123</span>
            123
        </div>
        <div class="md:ml-96">
            <img src="{{ asset('images/vooruzhennaya11.jpg') }}" class="rounded-lg" alt="Охрана">
        </div>
    </div>
@endsection
