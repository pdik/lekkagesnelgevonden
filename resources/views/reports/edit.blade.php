@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.css') }}">
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/sweetalert2/sweetalert2.min.css')}}">
@endsection
@section('js_after')
    <script src="{{ asset('/js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{ asset('js/plugins/select2/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            jQuery(function(){
                Dashmix.helpers('select2');
                Dashmix.helpers('flatpickr');
            });
        });
    </script>
@endsection

@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Rapport Bewerken</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Pdik</li>
                        <li class="breadcrumb-item">Rapporten</li>
                        <li class="breadcrumb-item">{{$report->customer->first_name}} {{$report->customer->last_name}}</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $report->id }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->
    <div class="bg-image" style="background-image: url({{asset('media/photos/photo2@2x.jpg')}});">
        <div class="bg-black-75">
            <div class="content content-full">
                <div class="py-5 text-center">

                    <h1 class="font-w700 my-2 text-white">Bewerk Rapport</h1>
                    <h2 class="h4 font-w700 text-white-75">Nmr {{ $report->id}},<br>
                        {{$report->customer->first_name}} {{$report->customer->last_name}}

                    </h2>
                    <a class="btn btn-hero-dark" href="{{ route('rapport.index') }}">
                        <i class="fa fa-fw fa-arrow-left"></i> Terug naar overzicht
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="content content-full content-boxed">
        <div class="block block-rounded">
               <form  method="POST"  action="{{route('rapport.update',['rapport'=>$report->id])}}">
                    @csrf
                    @method('put')
            <div class="block-content">
                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-file-invoice text-muted mr-1"></i> Rapport informatie
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                De basis informatie van het rapport
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label>{{__('global.selected')}} {{__('global.customer')}}</label>
                                <select  name="customer_id" class="js-select2" style="width: 100%">
                                    <option disabled>{{ __('global.select_one') }} {{__('global.customer')}}</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{ $report->customer_id ===  $customer->id ? ' selected="selected"' : '' }}>{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                                <a href="{{route('customers.edit',  $report->customer_id)}}" >{{__('global.view')}} {{__('global.selected')}} {{__('global.customer')}}</a>
                                @error('customer_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="dm-profile-edit-name">Datum uitvoering</label>
                                <input type="text" name="date" class="js-flatpickr form-control" value="{{ $report->created_at }}">
                                @error('date') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <a class="btn float-right btn-success" href="{{route('rapport.item.add', ['id'=> $report->id])}}">{{setting()->get('report_item_name') ? setting()->get('report_item_name') : 'item'}} {{__('global.add')}} </a>
                        </div>

                    </div>

                    </div>
                    @foreach($report->rows as $row)
                    <h2 class="content-heading pt-0">
                        <i class="far fa-check-square text-muted mr-1"></i>Beschrijving {{ $row->item->name }}
                        <button class="btn float-right btn-danger" type="button" onclick="removeItem('{{$row->id}}')">Verwijder {{setting()->get('report_item_name') ? setting()->get('report_item_name') : 'item'}}</button>
                    </h2>
                    <div class="row push">
                        <div class="col-lg-8 col-xl-8">
                        <input type="hidden" name="item[{{$loop->index}}][id]" value="{{$row->id}}">
                        <input type="hidden" name="item[{{$loop->index}}][item]" value="{{$row->item->id}}">
                        <livewire:image.chooser :key="'imagechooser_'.$loop->index" :index="$loop->index" :files="$row->images"/>
                        <textarea name="item[{{$loop->index}}][data]" class="js-ckeditor5-classic">{{ old('item.'.$loop->index.'data',$row->data) }}</textarea>

                        </div>
                    </div>
                    @endforeach
                  <div class="row push">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-alt-danger"  onclick="removeReport({{$report->id}})">
                                                    <i class="far fa-trash-alt mr-1"></i> {{ __('global.delete') }} {{__('global.report')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-alt-primary">
                                                    <i class="fa fa-check-circle mr-1"></i> {{ __('global.update') }} {{__('global.report')}}
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <button type="button" onclick="SendEmail({{$report->id}})" class="btn btn-alt-success">
                                                    <i class="fa fa-mail-bulk mr-1"></i> {{ __('global.send') }} {{__('global.report')}}
                                                </button>
                                            </div>

                                        </div>
                                    </div>
               </form>
        </div>
    </div>
@endsection
@push('js_after')
    <script>
        //First loading
            jQuery(function(){
                Dashmix.helpers('ckeditor5');
            });
    </script>
@endpush
