<th class="text-left px-4 py-2 cursor-pointer text-gray-300" wire:click="sortItem('{{$column}}')">
{{_($title)}}
    @if($column == $currentSortColumn)
        @if($sortType == 'asc')
            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 15l7-7 7 7"></path>
            </svg>
        @else
            <svg class="w-4 h-4 inline-block" fill="none" stroke="currentColor"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 9l-7 7-7-7"></path>
            </svg>

            @endif
    @endif
</th>
