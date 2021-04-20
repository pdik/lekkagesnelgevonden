<div class="content">
    <div class="col-md-12">

<div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{__('global.create_new', ['resource'=> __('global.items')])}}</h3>
        </div>
        <div class="block-content">
            <form wire:submit.prevent="submit()">
                <h2 class="content-heading pt-0">{{__('global.basic_info')}}</h2>
                <div class="row push">
                    <div class="col-lg-4">
                        <p class="text-muted">
                            {{ __('global.items.create.description') }}
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="form-group">
                            <label for="example-text-input">{{__('global.name')}}*</label>
                            <input type="text" class="form-control" name="name" wire:model="name" placeholder="{{__('global.product_name')}}">
                               @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="example-text-input">{{__('global.price')}} (Optional)</label>
                        <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-euro-sign"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control text-center" wire:model="price" name="price" placeholder="..">
                                <div class="input-group-append">
                                    <span class="input-group-text">,</span>
                                </div>
                              @error('price') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="example-textarea-input">{{ __('global.description')  }}*</label>
                            <textarea class="form-control"  name="description" wire:model="description" rows="4" placeholder="{{__('global.product_description')}}"></textarea>
                            @error('description') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        <div class="form-group">
                              <label for="example-textarea-input">{{__('global.product')}} {{ __('global.type')  }}*</label>
                                 <livewire:search-component
                                :key="'type'"
                               :name="'type'"
                               :event="'updateValues'"
                               :table="'types'"
                               :keyName="'id'"
                               :value="'name'"
                               :fields="['id','name']"
                               :selected="['key' => $type, 'value' => $type_name]"/>
                        </div>
                    </div>
                   <div class="col-lg-8">
                         <button type="submit" class="float-right btn btn-hero-lg btn-rounded btn-hero-success mb-5">
                        <i class="si si-rocket mr-1"></i> {{ $text['add'] }}
                    </button>
                   </div>
                </div>
            </form>
        </div>
</div>

    </div>
</div>
