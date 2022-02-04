//add new risk cause row
var i = 0;
$("#addAuthorityCabinetRow").click(function () {
    var html = '';
    html += '<div data-for="darbaVieta" class="col-lg-12 col-md-12 col-sm-12 form-group" id="authorityCabinetName"  style="width: 100%; padding-left: 5px; padding-right: 5px; margin-bottom: 0px;">';
    html += '<div class="form-row">';
    html += '<div class="form-group col-md-11">';
    html += '<input type="text" name="workplaces[]" placeholder="- Ievadiet jaunu iestādes darba vietu" data-form-field="darbaVieta" class="form-control display-7" required="required" value="" id="darbaVieta-formbuilder-b">';
    html += '</div>';
    html += '<div class="form-group col-md-1">';
    html += '<div class="btn-group-append">';
    html += '<div class="btn-group btn-group-toggle" data-toggle="buttons">';
    html += '<button id="removeAuthorityCabinetRow" type="button" class="btn btn-success display-7">';
    html += '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">';
    html += '<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>';
    html += '</svg>';
    html += '</button>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';
    html += '</div>';

    $('#newAuthorityCabinetRow').append(html);

    ++i;
    console.log(i);
});

// remove risk cause row
$(document).on('click', '#removeAuthorityCabinetRow', function () {    
    if(i>=1) {
        $(this).closest('#authorityCabinetName').remove();
        --i;
    }
    console.log(i);
});
////////////////////////

