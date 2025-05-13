@extends('app.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="p-6">
        <form method="POST" action="{{ route($route, ['id' => $content->id]) }}">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Активность</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            @if($content->active)
                                <option>Активен</option>
                                <option>Деактивен</option>
                            @else
                                <option>Деактивен</option>
                                <option>Активен</option>
                            @endif
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Название</label>
                        <input type="text"
                               value="{{ $content->title ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Цена в рублях</label>
                        <input type="text"
                               value="{{ $content->price ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-semibold text-gray-800 mb-4">Изображение</h3>
                        <img id="previewImage" alt="Preview Image" class="{{ $content->filepath ? '' : 'hidden'}}" src="{{ $content->filepath ?? '' }}"/>
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
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $content->description ?? '' }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center mt-10">
                <div class="flex gap-3">
                    <a href="{{ route($route) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm">
                        Отменить
                    </a>
                    <input
                        value="Сохранить изменения"
                        type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg text-sm">
                </div>
            </div>
        </form>
    </div>
@endsection
