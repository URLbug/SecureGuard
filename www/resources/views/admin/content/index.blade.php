@extends('app.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <!-- Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                @foreach($contents->items()[0]->getFillable() as $fillable)
                    <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">{{ $fillable }}</th>
                @endforeach
                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500">Редактировать</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($contents->items() as $content)
                <tr>
                    @foreach($content->toArray() as $fillable => $column)
                        <td class="px-6 py-4 text-sm text-gray-800">
                            @switch($fillable)
                                @case('description')
                                    {{ Str::limit($column, 200) }}
                                    @break

                                @case('active')
                                    {{ $column ? 'Да' : 'Нет' }}
                                    @break

                                @case('user')
                                    [{{ $column['id'] }}] {{ $column['username'] }}
                                    @break

                                @default
                                    @if(!strpos($fillable, 'Id'))
                                        {{ $column }}
                                    @endif
                            @endswitch
                        </td>
                    @endforeach
                    <td class="px-6 py-4">
                        <button class="bg-blue-700 hover:bg-blue-800 text-white px-3 py-1.5 rounded-md text-sm">
                            Редактировать
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <x-pagination isAdmin="{{ true }}" route="{{ 'admin-service' }}" perPage="{{ $contents->perPage() }}" lastPage="{{ $contents->lastPage() }}" currentPage="{{ $contents->currentPage() }}"/>
@endsection
