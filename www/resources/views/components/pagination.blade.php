<div class="mt-8 flex justify-center">
    <nav class="flex space-x-2">
        @if($currentPage !== 1)
            <a href="{{ route($route) }}?page={{ $currentPage - 1 }}" class="px-3 py-1 text-gray-200 hover:text-amber-500 transition-colors">&laquo;</a>
        @endif

        @for($i=1; $i < $lastPage+1; $i++)
            @if($currentPage === $i)
                <a href="{{ route('service') }}?page={{ $i }}" class="px-3 py-1 bg-amber-500 text-white rounded">{{ $i }}</a>
                @continue
            @endif

            <a href="{{ route('service') }}?page={{ $i }}" class="px-3 py-1 text-gray-300 hover:text-amber-500 transition-colors">{{ $i }}</a>
        @endfor

        @if($currentPage !== $lastPage)
            <a href="{{ route($route) }}?page={{ $currentPage + 1}}" class="px-3 py-1 text-gray-200 hover:text-amber-500 transition-colors">&raquo;</a>
        @endif
    </nav>
</div>
