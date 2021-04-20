@extends('layouts.backend')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

@endsection
@section('js_after')
    <!-- Wizard JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js/') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('js/pages/be_forms_wizard.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/plugins/cropperjs/cropper.js') }}"></script>

    <script>
        $(document).ready(function() {
            jQuery(function(){
                Dashmix.helpers('select2');
                Dashmix.helpers('ckeditor5');
            });
        });
    </script>
@endsection

@section('content')

    <div class="content">
        <div class="col-md-12">
            <livewire:report.wizard/>
        </div>
    </div>
@endsection

