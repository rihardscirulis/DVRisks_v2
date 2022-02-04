function get_authority(val) {
    $.ajax({
        type: 'post',
        url: 'php/fetch_data.php',
        data: {
            authority:val,
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html1 = "";
            for (var i = 0; i < obj.personnels.length; i++) {
                html1 = html1 + '<option value="'+obj.personnels[i].id+'">'+obj.personnels[i].name +' '+ obj.personnels[i].surname+'</option>';
            }
            var html2 = "";
            $('#selectMember-formbuilder-12').html(html1);
            for (var i = 0; i < obj.environments.length; i++) {
                html2 = html2 + '<option value="'+obj.environments[i].environment_id+'">'+obj.environments[i].environment_name+'</option>';
            }
            $('#selectEnvironment-formbuilder-12').html(html2);
        }
    });
}

function get_factor(val) {
    $.ajax({
        type: 'post',
        url: 'php/get_factors.php',
        data: {
            factor_group:val,
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html1 = '<option selected hidden value="" >--- Izvēlieties faktoru ---</option>';
            $('#select_factor-formbuilder-12').html(html1);
            for (var i = 0; i < obj.factors.length; i++) {
                html1 = html1 + '<option value="'+obj.factors[i].id+'">'+obj.factors[i].name+'</option>';
            }
            $('#select_factor-formbuilder-12').html(html1);
        }
    });
}   

function get_risk_cause(val) {
    $.ajax({
        type: 'post',
        url: 'php/get_risk_causes.php',
        data: {
            factor_id:val,
        },
        success: function (response) {
            var obj = JSON.parse(response);
            var html1 = '<option selected hidden value="" >--- Izvēlieties, kas rada risku ---</option>';
            $('#select_risk_cause-formbuilder-12').html(html1);
            for (var i = 0; i < obj.risk_causes.length; i++) {
                html1 = html1 + '<option value="'+obj.risk_causes[i].id+'">'+obj.risk_causes[i].name+'</option>';
            }
            $('#select_risk_cause-formbuilder-12').html(html1);
        }
    });
}   
