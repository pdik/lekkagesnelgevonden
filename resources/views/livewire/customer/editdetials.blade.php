<div>
 <table class="table table-bordered" id="customer_detials">
        <thead>
        <tr>
            <th style="width:10%">Type</th>
            <th style="width:10%">Waarde</th>
            <th style="width:5%"><button wire:click.prevent="addRow" class="btn btn-success"><i class="fa fa-plus"></i></button></th>
        </tr>
        </thead>

        <tbody>
        @foreach($customerDetials as $index => $customerDetial)
            <tr id="row_{{$index}}">
            <td>
                <select class="form-control"  name="customerDetials[{{$index}}][type]"  wire:model="customerDetials.{{$index}}.type" data-row-id="row_1" id="contact_type_{{$index}}" name="contact_type[]" style="width:100%;">
                      @foreach($options as $option)
                         <option value="{{$option->id}}" {{ $customerDetials[$index]['type'] ===  $option->id ? ' selected="selected"' : '' }} >{{ $option->title }}</option>
                      @endforeach
                </select>
            </td>
            <td><input type="text" name="customerDetials[{{$index}}][data]"  wire:model.lazy="customerDetials.{{$index}}.data" class="form-control" value="" autocomplete="off"></td>
            <td><button class="btn btn-danger" wire:click.prevent="removeRow({{$index}})"><i class="fa fa-archive"></i></button></td>
        </tr>
        @endforeach
        </tbody>
 </table>
</div>
