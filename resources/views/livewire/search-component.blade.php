<div>
    <div x-data="{ open: false }" class="relative">
        <div x-on:click="open = true" class="border rounded p-1 flex bg-white" style="width: 200px;">
            <div class="flex-col">
                @if(empty($selectedName))
                    Nothing selected
                @else
                    {{$selectedName}}
                @endif
            </div>
            <div class="flex-col p-1 float-right">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </div>

        <div x-show="open" @click.away="open = false" class="absolute bg-white rounded shadow z-20 "
             style="width: 400px; display: none;">
            @if(count($fields)>0)
                <div class="search bg-gray-50 text-gray-400 p-2 flex " style="width: 400px;">
                    <div class="flex-col p-1">
                        <svg class="w-4 h-4 text-gray-400 inline-block" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input wire:model.debounce.100ms="search" type="search" placeholder="Search"
                           class="inline-block bg-transparent focus-within:outline-none flex-col w-full">
                </div>
            @endif

            @if(count($results)>0)
                <div class="flex flex-col w-full">
                    <div x-on:click="open = false" wire:click="updateSelected('', '')"
                         class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100">
                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                            <div class="w-full items-center flex">
                                <div class="mx-2 -mt-1  ">
                                    Reset filter
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($results as $result)
                        @if($result->$value != "")
                            <div x-on:click="open = false" wire:click="updateSelected('{{$result->$keyName}}', '{{$result->$value}}')"
                                 class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100">
                                <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                    <div class="w-full items-center flex">
                                        <div class="mx-2 -mt-1  ">
                                            {{$result->$value}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <div class="flex flex-col w-full">
                    <div x-on:click="open = false" wire:click="updateSelected('', '')"
                         class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-gray-100">
                        <div class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                            <div class="w-full items-center flex">
                                <div class="mx-2 -mt-1  ">
                                    Reset filter
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4">Found nothing...</div>
                </div>
            @endif
        </div>
    </div>
</div>
