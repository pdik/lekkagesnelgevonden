<div>
    <div class="card p-4 mt-10">
        <form wire:submit.prevent="submit">

            <div class="mt-5 flex flex-row flex-wrap items-center gap-4">
                <label for="claim" class="block text-sm font-medium text-gray-700 w-1/5">Name *</label>
                <div class="flex-grow">
                    @error('name') <span class="text-red-500">{{ $message }}</span><br> @enderror
                    <input wire:model="name" type="text" name="name" class="border border-gray-500 rounded p-1 flex-grow w-full">
                </div>
            </div>



            <div class="flex flex-wrap gap-8 mt-10">
            @foreach($permissions as $key => $group)
                <div>
                    <h2 class="text-xl font-bold px-2">{{ __('permissions.'.$key)}}</h2>
                    <ul>
                        @foreach($group as $key => $item)
                            @if(gettype($item) == "array")
                                <li class="mt-5">
                                    <h3 class="text-l font-bold px-2">{{ __('permissions.'.$key)}}</h3>
                                </li>
                                @foreach($item as $subitem)
                                    <li class="grid grid-cols-6 gap-4 mt-2 {{($loop->last)? 'mb-10' : ''}}">
                                    <div>
                                        <input name="roles" type="checkbox"
                                               wire:model="rolePermissions" value="{{$subitem}}"
                                               class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                    </div>
                                    <div class="col-span-5">
                                    {{__('permissions.'.$subitem)}}
                                    </div>
                                    </li>
                                @endforeach
                            @else
                                <li class="grid grid-cols-6 gap-4 mt-2">
                                <div>
                                    <input name="rolePermissions" type="checkbox"
                                           wire:model="rolePermissions" value="{{$item}}"
                                           class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                </div>
                                <div class="col-span-5">
                                    {{__('permissions.'.$item)}}
                                </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endforeach
            </div><br>
            <button type="button" class="mr-3 text-sm bg-green-500 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" wire:click="selectAll">Select all permissions</button>
            <button type="button" class="mr-3 text-sm bg-gray-500 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" wire:click="unselectAll">Unselect all permissions</button>
            <button type="submit" class="mr-3 text-sm bg-green-500 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline float-right">Save</button>
        </form>
    </div>
</div>
