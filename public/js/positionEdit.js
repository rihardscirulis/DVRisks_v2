//add new position row
var i = 0;
$("#addPositionRow").click(function () {
    var html = '';
    html += '<div class="form-row" id="testRemove">';
    html += '<div class="form-group col-md-11" style="margin-bottom: 0px;">';
    html += '<input type="text" name="position[]" placeholder="-- Ievadiet amatu --" data-form-field="amats" class="form-control display-7" required="required" value="" id="amats-formbuilder-p"><br>';
    html += '</div>';
    html += '<div class="form-group col-md-1">';
    html += '<div class="btn-group-append">';
    html += '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
    html += '<button id="removePositionRow" type="button" class="btn btn-success display-7">';
    html += '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">';
    html += '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>';
    html += '</svg';
    html += '</button';
    html += '</div';
    html += '</div';
    html += '</div>';
    html += '</div>';

    $('#newPositionRow').append(html);

    ++i;
    console.log(i);
});

$(document).on('click', '#removePositionRow', function () {
    if(i>=1) {
        $(this).closest('#testRemove').remove();
        --i;
    } 
    console.log("Rindas skaits -> ".i);
});



