<div>
    <div class="col-md-8">
        <div class="js-tasks">
            <livewire:search.items-component
                :name="'search'"
                :function="'update'"
                :search="$search"
            />

            <h2 class="content-heading pb-0 mb-3 border-0 d-flex justify-content-between align-items-center">
                {{__('global.methods')}} <span class="js-task-badge badge badge-pill badge-primary animated fadeIn">{{ count($methods) }}</span>
            </h2>
            <div class="js-task-list">
                @foreach($methods as $method)
                    <div wire:key="item_{{$loop->index}}"class="js-task block block-rounded block-fx-pop block-fx-pop mb-2 animated fadeIn" data-task-id="{{ $method->id }}" data-task-completed="false">
                        <table class="table table-borderless table-vcenter mb-0">
                            <tbody>
                            <tr>
                                <td class="text-center pr-0" style="width: 38px;">
                                    <div class="js-task-status custom-control custom-checkbox custom-checkbox-rounded-circle custom-control-primary custom-control-lg">
                                        <input type="checkbox" class="custom-control-input" id="tasks-cb-id9" name="tasks-cb-id9">
                                        <label class="custom-control-label" for="tasks-cb-id9"></label>
                                    </div>
                                </td>
                                <td class="js-task-content font-w600 pl-0">
                                    {{ $method->name }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            <h2 class="content-heading pb-0 mb-3 border-0 d-flex justify-content-between align-items-center">
                {{__('global.selected')}} <span class="js-task-badge-starred badge badge-pill badge-primary animated fadeIn">1</span>
            </h2>
            <div class="js-task-list-completed">

            </div>
        </div>
    </div>
</div>
