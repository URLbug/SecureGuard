@extends('app/public')

@section('content')
    <div>
        <!-- Герой секция -->
        <section class="bg-gradient-to-r from-primary to-secondary text-white py-16 rounded-b-3xl">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">SecureGuard</h1>
                <p class="text-xl mb-6">Дипломный проект на тему</p>
                <p class="text-xl mb-6">Разработка веб-приложения для предоставления услуг отслеживания охранной системы предприятия</p>
            </div>
        </section>

        <!-- Основное содержимое -->
        <div class="container text-white mx-auto px-4 py-12">
            <!-- О проекте -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold mb-8 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-16 after:h-1 after:bg-primary">О проекте</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <p class="text-lg mb-4">SecureGuard - это сайт для отправки заявок на различные услуги по безопасности предприятия, ознакомление с услугами и краткое описание самой компании.</p>
                    </div>
                    <div>
                        <p class="mb-4">Проект разработан Тимуром Давыдовым для демонстрации навыков в области разработки веб-приложений</p>
                    </div>
                </div>
            </section>

            <!-- Ключевые возможности -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold mb-8 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-16 after:h-1 after:bg-primary">Ключевые возможности</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="p-6 rounded-xl transition-transform duration-300 hover:-translate-y-2">
                        <div class="text-primary text-3xl mb-4">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Отправка и получение заявок</h3>
                        <p class="text-gray-600">.</p>
                    </div>
                    <div class="p-6 rounded-xl transition-transform duration-300 hover:-translate-y-2">
                        <div class="text-primary text-3xl mb-4">
                            <i class="fas fa-fingerprint"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Многофакторная аутентификация</h3>
                        <p class="text-gray-600">Безопасный доступ с использованием нескольких факторов проверки подлинности.</p>
                    </div>
                    <div class="p-6 rounded-xl transition-transform duration-300 hover:-translate-y-2">
                        <div class="text-primary text-3xl mb-4">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Мониторинг активности</h3>
                        <p class="text-gray-600">Отслеживание и анализ действий пользователей с системой оповещений.</p>
                    </div>
                    <div class="p-6 rounded-xl transition-transform duration-300 hover:-translate-y-2">
                        <div class="text-primary text-3xl mb-4">
                            <i class="fas fa-user-lock"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Управление доступом</h3>
                        <p class="text-gray-600">Гранулярный контроль разрешений и прав доступа для пользователей.</p>
                    </div>
                </div>
            </section>

            <!-- Техническая информация -->
            <section class="mb-16">
                <h2 class="text-3xl font-bold mb-8 relative pb-2 after:content-[''] after:absolute after:left-0 after:bottom-0 after:w-16 after:h-1 after:bg-primary">Техническая информация</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <p class="mb-4">Сайт SecureGuard построено с использованием современных практик и технологий, ориентированных на демонстрацию создания полноценного проекта на основе паттерна MVC</p>
                        <p class="mb-4">Важно отметить, что SecureGuard — это демонстрационный проект, созданный исключительно для портфолио, и не предназначен для промышленного использования или защиты реальных конфиденциальных данных.</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-4">Используемые технологии:</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">Laravel</span>
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">Docker</span>
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">MySQL</span>
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">Redis</span>
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">Nginx</span>
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">PHP 8.3</span>
                            <span class="bg-gray-100 text-gray-800 px-4 py-2 rounded-full">Tailwind CSS</span>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
