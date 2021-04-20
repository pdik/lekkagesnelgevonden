@section('js_after')
    <script src="{{asset('js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script>
        $(document).ready(function() {
            jQuery(function () {
                Dashmix.helpers('colorpicker');
            });
        });
</script>
    @endsection
@section('css_after')
<link rel="stylesheet" href="{{asset('js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}">

@endsection
<div class="form-group {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <div class="checkbox">
        <label>
             <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           @if( $placeholder = Arr::get($field, 'placeholder') )
           placeholder="{{ $placeholder }}"
           @endif
           value="{{ old($field['name'], \setting($field['name'])) }}"
           class="js-colorpicker form-control"
           @if( $styleAttr = Arr::get($field, 'style')) style="{{ $styleAttr }}" @endif
           id="{{ Arr::get($field, 'name') }}"/>
        </label>

        @if ($errors->has($field['name'])) <small class="help-block">{{ $errors->first($field['name']) }}</small> @endif
    </div>
</div>

