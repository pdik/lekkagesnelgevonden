@extends('layouts.backend')

@section('js_after')

@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Klant Bewerken</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pdik</li>
                        <li class="breadcrumb-item">Klanten</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $customer->first_name }} {{ $customer->last_name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-image" style="background-image: url({{asset('media/photos/photo17@2x.jpg')}});">
        <div class="bg-black-75">
            <div class="content content-full">
                <div class="py-5 text-center">

                    <h1 class="font-w700 my-2 text-white">Bewerk klant</h1>
                    <h2 class="h4 font-w700 text-white-75">
                        {{ $customer->first_name }} {{ $customer->last_name }}
                    </h2>
                    <a class="btn btn-hero-dark" href="{{ route('klanten.index') }}">
                        <i class="fa fa-fw fa-arrow-left"></i> Terug naar overzicht
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content content-full content-boxed">
        <div class="block block-rounded">
            <div class="block-content">
                <form  method="POST" enctype="multipart/form-data"  action="{{route('klanten.update',['klanten'=> $customer->id])}}">
                    @csrf
                    @method('PUT')
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted mr-1"></i> Klant gegevens
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                               De basis gegevens van je klant in een overzicht.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="dm-profile-edit-username">Voornaam</label>
                                <input type="text" class="form-control" id="dm-profile-edit-username" name="first_name" placeholder="Enter the customer name.." value="{{$customer->first_name}}">
                            </div>
                            <div class="form-group">
                                <label for="dm-profile-edit-name">Achternaam</label>
                                <input type="text" class="form-control" id="dm-profile-edit-name" name="last_name" placeholder="Enter your name.." value="{{$customer->last_name}}">
                            </div>
                            <div class="form-group">
                                <label for="dm-profile-edit-email">Bedrijf (Optioneel)</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Has the customer a company? enter it" value="{{$customer->company_name}}">
                            </div>

                        </div>
                    </div>
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-house-user text-muted mr-1"></i> Adres gegevens
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                De adres gegevens worden gebruikt voorop, Rapporten, Offerte,s en Facturen
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="dm-profile-edit-password">Adres</label>
                                <input type="text" class="form-control" id="dm-profile-edit-password" name="adres" value="{{$customer->adres}}">
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="dm-profile-edit-password-new">Plaatsnaam</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-password-new" name="placename" value="{{$customer->placename}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="dm-profile-edit-password-new-confirm">Postcode</label>
                                    <input type="text" class="form-control" id="dm-profile-edit-password-new-confirm" name="postalcode" value="{{$customer->postalcode}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="content-heading pt-0">
                        <i class="far fa-address-book text-muted mr-1"></i> {{__('global.detials')}}
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Een overzicht van contact mogelijkheden,
                                Deze worden gebruikt voor het versturen van Offerte´s Rapporten en facturen
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-7">
                        <livewire:customer.editdetials :id="$customer->id"></livewire:customer.editdetials>
                        </div>
                    </div>

                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary">
                                    <i class="fa fa-check-circle mr-1"></i> {{ __('global.update') }} {{__('global.customer')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
