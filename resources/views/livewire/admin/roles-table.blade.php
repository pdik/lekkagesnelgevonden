<div>

    @if (session()->has('message'))
    <div class="mt-10">
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
    </div>
    @endif

        @if (session()->has('error-message'))
            <div class="mt-10">
                <div x-data="{ open: true }">
                    <div class="bg-red-200 text-red-800 rounded-lg p-4" x-show="open">
                        {{ session('error-message') }}
                        <div class="float-right cursor-pointer" @click="open = false">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        @endif


    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="card p-4">

                <input class="border border-gray-500 rounded p-1 float-right ml-5" placeholder="Search" type="text"
                       wire:model="search">

                <a href="{{route('admin.roles.role')}}" class="float-right btn">Add role</a>

                <div class="overflow-auto w-full p-2">
                    <table  class="min-w-full table-auto">
                        <thead class="justify-between">
                        <tr class="bg-gray-800">
                            <th class="text-left px-4 py-2 cursor-pointer">
                                  <span class="text-gray-300">Name</span>
                            </th>
                            <th class="text-left px-4 py-2 cursor-pointer">
                                <span class="text-gray-300">Users</span>
                            </th>
                            <th class="text-left px-4 py-2 cursor-pointer">
                                <span class="text-gray-300">Permissions</span>
                            </th>
                            <th>  <span class="text-gray-300"></span></th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($roles as $role)
                                <tr>
                                    <td class="border px-4 py-2">
                                        {{$role->name}}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{$role->users->count()}}
                                    </td>
                                    <td class="border px-4 py-2">
                                        @if($role->name != 'admin')
                                            {{$role->permissions->count()}}
                                        @else
                                            -
                                        @endif
                                    </td>


                                    <td class="border px-4 py-2">
                                        @if($role->name != 'admin')
                                            <a class="mr-3 text-sm bg-blue-900 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" href="{{route('admin.roles.role', [$role->name])}}">Edit</a>
                                            <a class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline" wire:click="delete({{$role->id}})"
                                               onclick="return confirm('Are you sure?') || event.stopImmediatePropagation()">delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="border px-4 py-2">
                                        No results found
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $roles->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
