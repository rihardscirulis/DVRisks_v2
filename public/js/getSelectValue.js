$(document).ready(function () {
    function getValue(val) {
        $.ajax({
            type: 'post',
            url: 'php/fetch_data.php',
            data: {
                get_option:val 
            },
            success: function (response) {
                document.getElementById("selectMember-formbuilder-12").innerHTML=response; 
            }
        });
    }    
});
