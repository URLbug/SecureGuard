@extends('app.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    @if($route != 'admin-form')
        <div class="mb-5">
            <a href="{{ route('admin-make', ['back' => $route]) }}" class="rounded-md inline-block bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 text-sm transition-colors">
                <span class="hidden sm:inline">Создать элемент</span>
            </a>
        </div>
    @endif

    @if($contents->count() == 0)
        <?php return?>
    @else
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        @foreach(array_keys($contents->items()[0]->toArray()) as $fillable)
                            @if(strpos($fillable, 'Id') !== false)
                                @continue
                            @endif
                            <th class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider whitespace-nowrap">
                                {{ $fillable }}
                            </th>
                        @endforeach
                        <th class="px-3 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach($contents->items() as $content)
                        <tr class="hover:bg-gray-50" data-element="{{ route($route, ['id' => $content->id]) }}">
                            @foreach($content->toArray() as $fillable => $column)
                                @if(strpos($fillable, 'Id') !== false)
                                    @continue
                                @endif
                                <td class="px-3 py-3 text-sm text-gray-800 align-top">
                                    <div class="max-w-[200px] lg:max-w-xs xl:max-w-md 2xl:max-w-lg break-words">
                                        @switch($fillable)
                                            @case('description')
                                                <span title="{{ $column }}">
                                                {{ Str::limit($column, 100) }}
                                            </span>
                                                @break

                                            @case('active')
                                                <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $column ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $column ? 'Да' : 'Нет' }}
                                            </span>
                                                @break

                                            @case('user')
                                                [{{ $column['id'] ?? '' }}] {{ $column['username'] ?? '' }}
                                                @break

                                            @default
                                                @if(is_array($column) || is_object($column))
                                                    <details>
                                                        <summary class="cursor-pointer text-blue-600 hover:underline">Данные по обратной связи</summary>
                                                        <pre class="text-xs text-gray-600 whitespace-pre-wrap break-all">
                                                            {{ json_encode($column, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}
                                                        </pre>
                                                    </details>
                                                    @break
                                                @endif

                                                @if(!strpos($fillable, 'Id'))
                                                    {{ $column }}
                                                @endif
                                        @endswitch
                                    </div>
                                </td>
                            @endforeach
                            <td class="px-3 py-3 text-sm text-right whitespace-nowrap">
                                @if($route != 'admin-form')
                                    <a href="{{ route($route, ['id' => $content->id]) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md text-sm transition-colors">
                                        <span class="hidden sm:inline">Редактировать</span>
                                    </a>
                                @endif
                                <a data-href="{{ route($route, ['id' => $content->id]) }}" class="delete-btn inline-block bg-red-600 hover:bg-red-700 text-white px-3 py-1.5 rounded-md text-sm transition-colors">
                                    <span class="hidden sm:inline">Удалить элемент</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <x-pagination
        isAdmin="{{ true }}"
        route="{{ $route }}"
        perPage="{{ $contents->perPage() }}"
        lastPage="{{ $contents->lastPage() }}"
        currentPage="{{ $contents->currentPage() }}"
    />
@endsection
