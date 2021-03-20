<div>
     @foreach ($contacts as $index => $contact)
                        <tr>
                            <td>
                                       <div class="form-group">
                                            <select class="form-control " name="contacts[{{$index}}][contact_id]" style="width:100%;"   wire:model="contacts.{{$index}}.contact_id">
                                                    <option  value="">Choose type</option>
                                                @foreach ($allContacts as $option)
                                            <option value="{{ $option->id }}">  {{ $option->title }}</option>
                                                @endforeach

                                            </select><span class="material-input"></span>
                                       </div>
                            </td>
                            <td>
                                <input type="text"
                                       name="contacts[{{$index}}][data]"
                                       class="form-control"
                                       wire:model="contacts.{{$index}}.data" />
                                <span class="material-input"></span>
                            </td>
                             <td><button type="button" class="btn btn-danger"  wire:click.prevent="removeProduct({{$index}})"><i class="fa fa-archive"></i></button></td>

                        </tr>
                    @endforeach

</div>



{{--    @foreach (old('contact', $customer->contact->count() ? $customer->contact : ['']) as $contact)--}}
{{--                                        @php--}}
{{--                                        //dd($contact)--}}
{{--                                        @endphp--}}
{{--                                      <tr id="row_{{ $loop->index }}">--}}
{{--                                    <td>--}}
{{--                                        <div class="form-group">--}}
{{--                                            <select class="form-control " data-row-id="row_{{ $loop->index }}" id="contact_type_{{ $loop->index }}" name="contact_type[]" style="width:100%;">--}}
{{--                                                @foreach ($contacts as $options)--}}
{{--                                            <option value="{{ $options->id }}"--}}
{{--                                                @if (old('contact_type.' . $loop->parent->index, optional($contact)->pivot_contact_option_id) == $options->id) selected @endif--}}
{{--                                                >{{ $options->title }}</option>--}}
{{--                                                @endforeach--}}

{{--                                            </select><span class="material-input"></span></div>--}}
{{--                                    </td>--}}
{{--                                    <td>--}}
{{--                                        @php--}}
{{--                                        dd($contact->pivot_data)--}}
{{--                                        @endphp--}}
{{--                                        <div class="form-group is-empty">--}}
{{--                                            <input type="text" name="contact_value[]" id="contact_value_{{ $loop->index }}" class="form-control" value="{{$contact->pivot_data}}" autocomplete="off">--}}
{{--                                            <span class="material-input"></span>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}


{{--                                    <td><button type="button" class="btn btn-danger" onclick="removeRow('customer_detials','{{ $loop->index }}')"><i class="fa fa-archive"></i></button></td>--}}
{{--                                </tr>--}}
{{--                                @endforeach--}}
