@extends('app.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Активность</label>
                    <select class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        <option>Активен</option>
                        <option>Деактивен</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Название</label>
                    <input type="text"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Цена в рублях</label>
                    <input type="text"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-sm font-semibold text-gray-800 mb-4">Изображение</h3>
                    <img id="previewImage" alt="Preview Image" class="hidden"/>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex items-center justify-center">
                        <input type="file" class="hidden" id="uploadFile">
                        <button class="text-blue-700 text-sm" id="uploadBtn">
                            <i class="fas fa-upload mr-2"></i>Загрузить изображение
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Описание</label>
                    <textarea rows="8"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
            </div>
        </div>
        <div class="flex justify-between items-center mt-10">
            <div class="flex gap-3">
                <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm">
                    Отменить
                </button>
                <button class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm">
                    Сохранить изменения
                </button>
            </div>
        </div>
    </div>
@endsection
