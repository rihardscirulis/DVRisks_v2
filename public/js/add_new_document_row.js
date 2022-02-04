var index = 1;
$("#add_new_row").click(function () {
    index = index + 1;
    var html = "";
    /*html += '<div class="col-lg-12 col-md-12 col-sm-12">';
    html += '<p class="mbr-fonts-style display-7">'+index+' - Rinda</p>';
    html += '</div>';
    html += '<div data-for="selectRiskFactor" class="col-lg-12 col-md-12 col-sm-12 form-group">';
    html += '<div class="form-row">';
    html += '<div class="col">';
    html += '<label for="selectRiskFactor-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Faktora grupa:</label>';
    html += '<select onchange="get_factor(this.value);" name="factor_group_id[]" data-form-field="selectRiskFactor" class="form-control display-7" id="selectRiskFactor-formbuilder-12">';
    html += '<option value="" selected>--- Izvēlieties faktora grupu ---</option>';
    html += '@foreach ($all_factors as $factor_group)';
    html += '<option value="{{$factor_group->id}}" data-value="{{$factor_group->name}}">{{$factor_group->name}}</option>';
    html += '@endforeach';
    html += '</select>';
    html += '</div>';
    html += '<div class="col">';
    html += '<label for="selectRiskFactor-formbuilder-12" class="form-control-label mbr-fonts-style display-7">* Riska faktors:</label>';
    html += '<select onchange="get_risk_cause(this.value);" name="factor_id[]" data-form-field="select_factor" class="form-control display-7" id="select_factor-formbuilder-12">';
    html += '<option value="" selected>--- Izvēlieties faktoru ---</option>';
    html += '</select>';
    html += '</div>';
    html += '</div>';
    html += '</div>';*/
    html += '<select onchange="get_factor(this.value);" name="factor_group_id[]" data-form-field="selectRiskFactor" class="form-control display-7" id="selectRiskFactor-formbuilder-12">';
    html += '<option value="" selected>--- Izvēlieties faktora grupu ---</option>';
    html += '@foreach ($all_factors as $factor_group)';
    html += '<option value="{{$factor_group->id}}" data-value="{{$factor_group->name}}">{{$factor_group->name}}</option>';
    html += '@endforeach';
    html += '</select>';



    $('#create_new_row').append(html);

});

$(document).on('click', '#removeTableRow', function () {
    if(index>=0) {
        $(this).closest('#removeNewTableRow').remove();
    }
});
