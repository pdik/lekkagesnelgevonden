<div>

    <div class="card p-4 mt-10">
        <form wire:submit.prevent="submit">

            <div class="mt-5 flex flex-row flex-wrap items-center gap-4">
                <label for="claim" class="block text-sm font-medium text-gray-700 w-1/5">Name *</label>
                <div class="flex-grow">
                    @error('name') <span class="text-red-500">{{ $message }}</span><br> @enderror
                    <input wire:model="name" type="text" name="name"
                           class="border border-gray-500 rounded p-1 flex-grow w-full">

                </div>
            </div>

            <div class="mt-5 flex flex-row flex-wrap items-center gap-4">
                <label for="claim" class="block text-sm font-medium text-gray-700 w-1/5">Email *</label>
                <div class="flex-grow">
                    @error('email') <span class="text-red-500">{{ $message }}</span><br> @enderror
                    <input wire:model="email" type="text" name="email"
                           class="border border-gray-500 rounded p-1 flex-grow w-full">
                </div>
            </div>

{{--            <div class="mt-5 flex flex-row flex-wrap items-center gap-4">--}}
{{--                <div class="text-sm font-medium text-gray-700 w-1/5">Partner</div>--}}
{{--                <div class="flex-grow">--}}
{{--                    @error('partner') <span class="text-red-500">{{ $message }}</span> @enderror--}}
{{--                    @if($user->partner)--}}
{{--                        @livewire('search-component', ['name' => 'partner', 'event' => 'updateValues', 'table' => 'partners', 'keyName' =>  'id', 'value' =>  'name', 'fields' => ['code', 'name'], "selected" => ['value' => $user->partner->name,'key' => $user->partner->id]])--}}
{{--                    @else--}}
{{--                        @livewire('search-component', ['name' => 'partner', 'event' => 'updateValues', 'table' => 'partners', 'keyName' =>  'id', 'value' =>  'name', 'fields' => ['code', 'name']])--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}

            <fieldset class="mt-5 flex flex-row flex-wrap items-center gap-4">
                <label for="title" class="block text-sm font-medium text-gray-700 w-1/5">Role</label>
                <div class="flex flex-row flex-wrap">
                    @livewire('search-component', ['name' => 'role', 'event' => 'updateValues', 'table' => 'roles', 'keyName' =>  'name', 'value' =>  'name', 'fields' => [], 'selected' => ['key' => $role, 'value' => $role]])
                </div>
            </fieldset>

            @if(!$role)
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
                                                           wire:model="userPermissions" value="{{$subitem}}"
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
                                                       wire:model="userPermissions" value="{{$item}}"
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
                </div>
                <button type="button" class="btn" wire:click="selectAll">Select all permissions</button>
                <button type="button" class="btn" wire:click="unselectAll">Unselect all permissions</button>
            @endif

{{--            @if(in_array('internal', $roles) && !in_array('admin', $roles))--}}
{{--                <fieldset class="mt-5 flex flex-row flex-wrap items-center gap-4">--}}
{{--                    <label for="title" class="block text-sm font-medium text-gray-700 w-1/5">Internal Permissions</label>--}}
{{--                    <div class="flex flex-row flex-wrap">--}}
{{--                        @foreach($systemInternalPermissions as $permission)--}}
{{--                            <div class="flex items-center mx-2">--}}
{{--                                <input id="{{$permission->name}}" name="roles" type="checkbox"--}}
{{--                                       wire:model="permissions" value="{{$permission->name}}"--}}
{{--                                       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">--}}
{{--                                <label for="{{$permission->name}}" class="ml-3 block text-sm font-medium text-gray-700">--}}
{{--                                    {{ __('permissions.'. $permission->name) }}--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </fieldset>--}}
{{--            @endif--}}

            <button type="submit" class="btn float-right mt-5">Save user</button>
        </form>
    </div>
</div>
