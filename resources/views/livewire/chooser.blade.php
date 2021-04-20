<div>
    <div class="col-md-8">
        <div class="js-item">
        <input class="form-control form-control-lg font-size-base border-2x"
          type="text"
          wire:key="search"
          wire:model="search"
          wire:keydown="searching"
          placeholder="{{ __('global.searching') }}">

            <h2 class="content-heading pb-0 mb-3 border-0 d-flex justify-content-between align-items-center">
                {{__('global.methods')}} <span class="js-item-badge badge badge-pill badge-primary animated fadeIn"> {{ count($allItems) - count($selected) }} </span>
            </h2>
            <div class="js-item-list">
                @foreach($allItems as $item)
                    <div wire:key="item_{{$loop->index}}"class="js-item block block-rounded block-fx-pop block-fx-pop mb-2 animated fadeIn">
                        <table class="table table-borderless table-vcenter mb-0">
                            <tbody>
                            <tr>
                                <td  wire:click.prevent="select({{$item['id']}})" class="text-center pr-0" style="width: 38px;">
                                    <div class="hover:bg-blue-400 js-item-status custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-primary custom-control-lg">
                                        <input type="checkbox" class="custom-control-input" >
                                        <label class="custom-control-label" for="item-cb-id9"></label>
                                    </div>
                                </td>
                                <td class="js-item-content font-w600 pl-0">
                                    {{ $item['name'] }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            <h2 class="content-heading pb-0 mb-3 border-0 d-flex justify-content-between align-items-center">
                {{__('global.selected')}} <span class="js-item-badge-starred badge badge-pill badge-primary animated fadeIn">{{ count($selected) }}</span>
            </h2>
            <input type="hidden" name="selected" wire:model="selected">
            <div class="js-item-list-selected">
                @forelse($selected as $select)
                       <div wire:key="selected{{$loop->index}}"class="js-item block block-rounded block-fx-pop block-fx-pop mb-2 animated fadeIn">
                        <table class="table table-borderless table-vcenter mb-0">
                            <tbody>
                            <tr>
                                <td wire:click.prevent="unselect({{$select['id']}})" class="text-center pr-0" style="width: 38px;">
                                    <div class="hover:bg-blue-400 js-item-status custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-primary custom-control-lg">
                                        <input type="checkbox" class="custom-control-input" checked >
                                        <label class="custom-control-label" for="item-cb-id9"></label>
                                    </div>
                                </td>
                                <td class="js-item-content font-w600 pl-0">
                                    {{ $select['name'] }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
</div>
