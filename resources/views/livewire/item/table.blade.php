<div>
    <div>
        @if (session()->has('message'))
            <div x-data="{ open: true }">
                <div class="bg-green-200 text-green-800 rounded-lg p-4" x-show="open">
                    {{ session('message') }}
                    <div class="float-right cursor-pointer" @click="open = false">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="card p-4">

                <div class="ml-2 inline-block">

                    <div class="inline-block">
                        <a href="{{ route('items.item') }}" class="text-sm bg-green-500 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"> {{ __('global.create_new', ['resource' => 'Level']) }}</a>
                    </div>
                </div>

                <input class="border border-gray-500 rounded p-1 float-right" placeholder="Search" type="text"
                       wire:model="search">

                <div class="overflow-auto w-full p-2">
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="bg-gray-800">
                            <x-table-head-sort :title="'id'" :column="'id'" :current-sort-column="$sortField" :sort-type="$sortType" />
                            <x-table-head-sort :title="__('global.name')" :column="'name'" :current-sort-column="$sortField" :sort-type="$sortType"/>
                            <x-table-head-sort :title="__('global.type')" :column="'type'" :current-sort-column="$sortField" :sort-type="$sortType"/>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td class="border px-4 py-2" style="width: 50px">
                                    {{$item->id}}
                                </td>
                                <td class="border px-4 py-2">
                                    {{$item->name}}
                                </td>
                                   <td class="border px-4 py-2">
                                    {{$item->type->name}}
                                </td>
                                <td class="border px-4 py-2">
                                    <a class="mr-3 text-sm bg-blue-500 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{route('items.item', [$item->id])}}">{{ __('global.view') }}</a>
                                    @can('item.delete')
                                    <a class="text-sm bg-red-500 hover:bg-blue-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline cursor-pointer" wire:click="delete({{$item->id}})" onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()">{{ __('global.delete') }}</a>
                                    @endcan
                                </td>
                            </tr>
                       @empty
                            <tr>
                               <td>
                                   <h2 class="error">{{__('global.no_results_found')}}</h2>
                               </td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $items->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
