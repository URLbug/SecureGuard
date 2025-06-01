@extends('app.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="p-6">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="p-4 mb-3 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    <span class="font-medium">{{ $error }}</span>
                </div>
            @endforeach
        @endif
        <form method="POST" action="{{ route($route, $route !== 'admin-make' ? ['id' => $content->id, 'back' => $route_back] : ['back' => $route_back]) }}" enctype="multipart/form-data">
            @csrf
            @method($method)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Активность</label>
                        <select class="w-full px-4 py-2 border border-gray-300 rounded-lg" name="active">
                            @if($content->active ?? false)
                                <option value="1">Активен</option>
                                <option value="0">Деактивен</option>
                            @else
                                <option value="0">Деактивен</option>
                                <option value="1">Активен</option>
                            @endif
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Название</label>
                        <input type="text"
                               name="title"
                               value="{{ $content->title ?? '' }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    @if($route === 'admin-service' || $route_back === 'admin-service')
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Цена в рублях</label>
                            <input type="text"
                                   name="price"
                                   value="{{ $content->price ?? '' }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    @endif

                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h3 class="text-sm font-semibold text-gray-800 mb-4">Изображение</h3>

                        <!-- Превью изображения -->
                        <div id="imagePreview" class="{{ $content->filepath ? : 'hidden' }} mb-4">
                            <img id="previewImage"
                                 src="{{ $content->filepath ?? '' }}"
                                 alt="Preview Image"
                                 class="max-w-full h-48 object-contain border rounded-lg">

                            <button type="button" id="removeImage"
                                    class="mt-2 text-red-600 hover:text-red-800 text-sm flex items-center">
                                <i class="fas fa-trash mr-1"></i> Удалить изображение
                            </button>
                        </div>

                        <!-- Контейнер для загрузки -->
                        <div class="border-2 border-dashed border-gray-300 rounded-lg h-32 flex items-center justify-center relative overflow-hidden"
                             id="uploadContainer">
                            <input type="file"
                                   id="uploadFile"
                                   name="uploadFile"
                                   accept="image/*"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            <input type="hidden"
                                   id="filepath"
                                   name="filepath"
                                   value="{{ $content->filepath ?? '' }}"
                                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">

                            <div class="text-center p-4">
                                <i class="fas fa-upload text-blue-600 text-xl mb-2"></i>
                                <p class="text-blue-700 text-sm font-medium">Загрузить изображение</p>
                                <p class="text-gray-500 text-xs mt-1">Перетащите или кликните для выбора</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Описание</label>
                        <textarea rows="8"
                                  name="description"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $content->description ?? '' }}
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="flex justify-between items-center mt-10">
                <div class="flex gap-3">
                    <a href="{{ route($route_back) }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm">
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
