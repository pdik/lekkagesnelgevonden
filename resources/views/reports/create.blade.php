@extends('layouts.backend')

@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="{{ asset('js/plugins/dropzone/min/dropzone.min.css')}}">
@endsection
@section('js_after')
    <!-- Wizard JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js/') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('js/pages/be_forms_wizard.js') }}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.js') }}"></script>
    <script src="{{ asset('js/plugins/cropperjs/cropper.js') }}"></script>
    <script src="{{asset('js/plugins/dropzone/min/dropzone.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            jQuery(function(){
                Dashmix.helpers('select2');
                Dashmix.helpers('ckeditor');
            });
        });
    </script>
@endsection

@section('content')

    <div class="content">
        <div class="col-md-12">
            <div class="js-wizard-simple block block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">1. Kies een klant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2.  Methodes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">3. Eind oordeel</a>
                    </li>
                </ul>
                <form action="{{ route('rapport.store') }}" class="" method="POST">
                    @csrf
                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div class="form-group">
                                <label>Kies een klant</label>
                                <select class="js-select2" style="width: 100%">
                                    <option disabled>{{ __('global.select_one') }} {{__('global.customer')}}</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="js-ckeditor">Reden onderzoek</label><br>
                                <textarea id="js-ckeditor" rows="5" cols="100" name="reason">{{ old('reason',__('global.description')) }}</textarea>

                            </div>
                        </div>
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                            <livewire:chooser
                                :pagination="5" />
                        </div>
                        <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">

                        </div>
                    </div>
                    <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="btn btn-secondary disabled" data-wizard="prev">
                                    <i class="fa fa-angle-left mr-1"></i> Vorige
                                </button>
                            </div>
                            <div class="col-6 text-right">
                                <button type="button" class="btn btn-secondary" data-wizard="next">
                                    Volgende <i class="fa fa-angle-right ml-1"></i>
                                </button>
                                <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                    <i class="fa fa-check mr-1"></i> Toevoegen
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

