function addContactRow(Totable){
    var detials = [];
    var count_table_tbody_tr = $("#"+Totable+" tbody tr").length;
    var row_id = count_table_tbody_tr + 1;
    var html ='';
    $.ajax({
        type: "GET",
        url: "/api/v1/detials/contact",
        success: function(response) {
            if(response){
                var html = ' <tr id="row_' + row_id + '">' +
                    '<td><select class="form-control " data-row-id="row_1" id="contact_type_' + row_id + '" name="detial[]" style="width:100%;" >';
                html += '<option>Select Type</option>';

                $.each(response, function(index, item) {
                    console.log(item.title);
                    html += '<option value="' + item.id + '">' + item.title + '</option>';
                });
                html += '</select>' +
                    '</td>' +
                    '<td><input type="text" name="value[]" id="contact_value_' + row_id + '" class="form-control"  value="" autocomplete="off"></td>' +
                    '<td><button type="button" class="btn btn-danger"  onclick="removeRow(\''+Totable+'\',\''+row_id+'\')" ><i class="fa fa-archive"></i></button></td>' +
                    '</tr>';
                    if (count_table_tbody_tr >= 1) {
                    $("#"+Totable+" tbody tr:last").after(html);
                } else {
                    $("#"+Totable+" tbody").html(html);
                }
            }
        }
    });

}
function addDefaultRow(Totable){
    var count_table_tbody_tr = $("#"+Totable+" tbody tr").length;
    var row_id = count_table_tbody_tr + 1;
    var html = ' <tr id="row_' + row_id + '">' +
        '<td>'+
        '<input type="text" name="item[]" class="form-control"> '+
        '</td>' +
        '<td><input type="text" name="item_value[]" id="item_value_' + row_id + '" class="form-control"  value="" autocomplete="off"></td>' +
        '<td><button type="button" class="btn btn-danger"  onclick="removeRow(\''+Totable+'\',\''+row_id+'\')" ><i class="fa fa-archive"></i></button></td>' +
        '</tr>';
    if (count_table_tbody_tr >= 1) {
        $("#"+Totable+" tbody tr:last").after(html);
    } else {
        $("#"+Totable+" tbody").html(html);
    }
}

/*Remove Contact row */
function removeRow(table, tr_id) {
    console.log(table);

    $("#"+table+" tbody tr#row_" + tr_id).remove();
}
