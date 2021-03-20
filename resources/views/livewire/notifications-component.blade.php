
<div class="dropdown d-inline-block">
    <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-fw fa-bell"></i>
        <span class="badge badge-secondary badge-pill">0</span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
        <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
            {{ __('global.notifications') }}
        </div>
        <ul class="nav-items my-2">
            @forelse ($notifications as $notification)
            <li>
                <a class="text-dark media py-2"  wire:click="markNotification('{{$notification->id}}')" href="{{$notification->data['link']}}">
                    <div class="mx-3">
                           <i class=" {{$notification->data['icon']}}"></i>
{{--                        <i class="fa fa-fw fa-check-circle text-success"></i>--}}
                    </div>
                    <div class="media-body font-size-sm pr-2">
                        <div class="font-w600">{{$notification->data['message']}}</div>
                        <div class="text-muted font-italic"></div>
                    </div>
                </a>
            </li>
                 @empty
               @endforelse
        </ul>
{{--        <div class="p-2 border-top">--}}
{{--            <a class="btn btn-light btn-block text-center" href="javascript:void(0)">--}}
{{--                <i class="fa fa-fw fa-eye mr-1"></i>   {{ __('global.view_all') }}--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="p-2 border-top">
            <a  wire:click="markAllNotifications" class="btn btn-light btn-block text-center" href="javascript:void(0)">
                <i class="fa fa-fw fa-eye mr-1"></i>   {{  __('global.mark_all_as_read')  }}
            </a>
        </div>
    </div>
</div>

