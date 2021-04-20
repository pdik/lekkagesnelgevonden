<div>

    <div id="accordion" role="tablist" aria-multiselectable="true">
        @forelse($items as $item)
            <div wire:key="accordion_{{$item['id']}}" class="block block-rounded mb-1">
                <div class="block-header block-header-default" role="tab" id="accordion_{{$item['id']}}">
                    <a class="font-w600 collapsed" data-toggle="collapse" data-parent="#accordion" onclick="Dashmix.helpers('ckeditor5')" href="#accordion_q{{$item['id']}}" aria-expanded="false" aria-controls="accordion_q{{$item['id']}}">{{$item['name']}}</a>
                </div>
                <div id="accordion_q{{$item['id']}}" class="collapse" role="tabpanel" aria-labelledby="accordion_{{$item['id']}}" data-parent="#accordion" style="">
                    <div class="block-content">
                        <input type="hidden" name="item[{{$loop->index}}][id]" value="{{$item['id']}}">
                        <textarea name="item[{{$loop->index}}][data]" class="js-ckeditor5-classic">{{ old('reason.'.$item['id'],__('global.description')) }}</textarea>
                    </div>
                </div>
            </div>
        @empty
            <h1>{{ __('global.pleaseSelect') }}</h1>
        @endforelse
    </div>
</div>
<script>
    window.addEventListener('additem', event => {
        window.livewire.emit('itemAdded',event.detail);
        //Reload after every emit...
           Dashmix.helpers('ckeditor5');
    });

</script>
@push('js_after')
    <script>
        //First loading
            jQuery(function(){
                Dashmix.helpers('ckeditor5');
            });
    </script>
@endpush
