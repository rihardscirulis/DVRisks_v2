<script type="text/javascript">
    //add new risk cause row
    var i = 1;
    $("#addRiskCauseRow").click(function () {
        var html = '';
        html += '<div class="position-relative">';
        html += '<div id="inputRiskCauseRow">';
        html += '<div class="input-group">';
        html += '<input type="text" name="newRiskCauseTitle['+i+']" id="newRiskCauseTitle['+i+']" class="form-control" placeholder="--- Ievadiet darba riska cēloni ---" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeRiskCauseRow" type="button" class="btn btn-danger">Noņemt</button>';
        html += '</div>';
        html += '<div class="invalid-tooltip">';
        html += 'Lūdzu, aizpildi darba riska cēloņa lauku!';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#newRiskCauseRow').append(html);

        ++i;
    });

    // remove risk cause row
    $(document).on('click', '#removeRiskCauseRow', function () {
        if(i>1) {
            $(this).closest('#inputRiskCauseRow').remove();
            --i;
        }
    });
    ////////////////////////

        // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()

</script>
