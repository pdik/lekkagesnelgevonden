
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
             <div class="js-wizard-simple block block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="#step2" data-toggle="tab">2.  {{__('global.used_items')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="#step3" data-toggle="tab" >3. {{ __('global.explaination') }}</a>
                    </li>
                </ul>
                <form action="{{ route('rapport.item.store', ['id'=> $report]) }}" class="" method="POST">
                    @csrf
                    @method('post')
                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">

                        <div class="tab-pane " id="step2" role="tabpanel">
                            <input type="hidden" name="report_id" wire:model="report">
                            <livewire:chooser :report="$report" />
                             @error('items') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="tab-pane " id="step3" role="tabpanel">
                            <livewire:report.explanation/>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
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
                                    <i class="fa fa-check mr-1"></i> {{__('global.add')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
