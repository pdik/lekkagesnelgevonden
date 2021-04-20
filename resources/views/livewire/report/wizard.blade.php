<div>
    <div class="js-wizard-simple block block block-rounded">
                <ul class="nav nav-tabs nav-tabs-alt nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active"  href="#step1" data-toggle="tab" >1. {{__('global.basic_info')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#step2" data-toggle="tab">2.  {{__('global.used_items')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href="#step3" data-toggle="tab" >3. {{ __('global.explaination') }}</a>
                    </li>
                </ul>
                <form action="{{ route('rapport.store') }}" class="" method="POST">
                    @csrf
                    <div class="block-content block-content-full tab-content" style="min-height: 290px;">

                        <div class="tab-pane active" id="step1" role="tabpanel">
                            <div class="form-group">
                                <label>{{__('global.select_one')}} {{__('global.customer')}}</label>
                                <select wire:model="customer_id" name="customer_id" class="js-select2" style="width: 100%">
                                    <option disabled>{{ __('global.select_one') }} {{__('global.customer')}}</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->first_name }} {{ $customer->last_name }}</option>
                                    @endforeach
                                </select>
                                  @error('customer_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="js-ckeditor">{{__('global.report.reason')}}</label><br>
                                <textarea wire:model="data" name="data" class="js-ckeditor5-classic">{{ old('reason',__('global.description')) }}</textarea>
                                @error('data') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="tab-pane " id="step2" role="tabpanel">
                            <livewire:chooser/>
                             @error('items') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="tab-pane " id="step3" role="tabpanel">
                            <livewire:report.explanation :items="$selected"/>
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
                                    <i class="fa fa-check mr-1"></i> {{__('global.build')}} {{__('global.report')}}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
</div>
