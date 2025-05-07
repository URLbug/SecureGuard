@extends('app/public')

@section('content')
    <section class="py-12">
        <div class="container mx-auto px-4">
            <!-- Заголовок раздела -->
            <h2 class="text-3xl font-bold text-white mb-8 text-center">Новости</h2>

            <!-- Сетка услуг -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($news->items() as $newsItem)
                    <div class="bg-gray-700 rounded-lg shadow-lg overflow-hidden">
                        <div class="relative aspect-square bg-gray-200">
                            <a href="{{ route('news', ['id' => $newsItem->id]) }}">
                                <img src="{{ $newsItem->filepath }}" alt="{{ $newsItem->title }}"
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50"></div>
                            </a>
                        </div>
                        <div class="p-6">
                            <a href="{{ route('news', ['id' => $newsItem->id]) }}">
                                <h3 class="text-xl font-bold text-gray-400 mb-2 hover:text-amber-500">{{ $newsItem->title }}</h3>
                            </a>
                            <p class="text-gray-200 mb-4">{{ substr($newsItem->description, 0, 200) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Пагинация -->
            <x-pagination route="{{ 'news' }}" perPage="{{ $news->perPage() }}" lastPage="{{ $news->lastPage() }}" currentPage="{{ $news->currentPage() }}"/>
        </div>
    </section>
@endsection
