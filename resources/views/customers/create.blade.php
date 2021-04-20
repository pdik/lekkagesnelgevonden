@extends('layouts.backend')

@section('js_after')
    <!-- Wizard JS Plugins -->
    <script src="{{ asset('js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js/') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
    <script src="{{ asset('js/pages/be_forms_wizard.js') }}"></script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Nieuwe klant</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pdik</li>
                        <li class="breadcrumb-item">Klanten</li>
                        <li class="breadcrumb-item active" aria-current="page">Nieuw</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="content">
        <div class="col-md-12">
            <div class="js-wizard-simple block block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-simple2-step1" data-toggle="tab">1. Persoons gegevens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step2" data-toggle="tab">2. Adres gegevens</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-simple2-step3" data-toggle="tab">3. Contact gegevens</a>
                    </li>
                </ul>
                <form action="{{ route('customers.store') }}" method="POST">
                    @csrf
                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">
                        <div class="tab-pane active" id="wizard-simple2-step1" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-simple2-firstname">Voornaam</label>
                                <input class="form-control form-control-alt" type="text" id="wizard-simple2-firstname" name="first_name">
                            </div>
                            <div class="form-group">
                                <label for="wizard-simple2-lastname">Achternaam</label>
                                <input class="form-control form-control-alt" type="text" id="wizard-simple2-lastname" name="last_name">
                            </div>
                        </div>
                        <div class="tab-pane" id="wizard-simple2-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="wizard-simple2-firstname">Adres</label>
                                <input class="form-control form-control-alt" type="text" id="wizard-simple2-adres" name="adres">
                            </div>
                            <div class="form-group">
                                <label for="wizard-simple2-lastname">Plaatsnaam</label>
                                <input class="form-control form-control-alt" type="text" id="wizard-simple2-placename" name="placename">
                            </div>
                            <div class="form-group">
                                <label for="wizard-simple2-lastname">Postcode</label>
                                <input class="form-control form-control-alt" type="text" id="wizard-simple2-postalcode" name="postalcode">
                            </div>
                        </div>
                        <div class="tab-pane" id="wizard-simple2-step3" role="tabpanel">
                             <livewire:customer.detials></livewire:customer.detials>
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
