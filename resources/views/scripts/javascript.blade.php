<script type="text/javascript">
    //Pievieno jaunu faktoras rindu
    var i = 1;
    // add row
    $("#addRow").click(function () {
        var html = '';
        html += '<div class="position-relative">';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group">';
        html += '<input type="text" name="newFactorTitle['+i+']" id="newFactorTitle['+i+']" class="form-control m-input" placeholder="--- Ievadiet darba riska faktoru ---" autocomplete="off" required>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger">Noņemt</button>';
        html += '</div>';
        html += '<div class="invalid-tooltip">';
        html += 'Lūdzu, aizpildi darba riska faktora lauku!';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#newRow').append(html);

        ++i;
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        if(i>1) {
            $(this).closest('#inputFormRow').remove();
            --i;
        }
    });

    //Pievieno jaunu tabulas rindu anketai
    var index = 1;
    var rowIndex = 2;
    $("#addNewTableRow").click(function () {
        var html = '';
        html += '<tbody id="removeNewTableRow">';
        html += '<tr>';
        html += '<th scope="row">'+rowIndex+'.</th>';
        html += '<th>';
        html += '<select class="form-control form-control-sm" name="riskFactorSelectMenu['+index+']" id="riskFactorSelectMenu['+index+']" required>';
        html += '<option selected disabled hidden value="" >-- Riska faktors --</option>';
        html += '@foreach ($factorGroupList as $factorGroup)';
        html += '<optgroup label="{{$factorGroup->factorGroupTitle}}">';
        html += '@foreach ($factorList as $factor)';
        html += '@if ($factorGroup->factorGroupID == $factor->factorGroup_ID)';
        html += '<option value="{{$factorGroup->factorGroupID}}-{{$factor->factorID}}">{{$factorGroup->factorGroupTitle}} - {{$factor->factorTitle}}</option>';
        html += '@endif';
        html += '@endforeach';
        html += '</optgroup>';
        html += '@endforeach';
        html += '</select>';
        html += '</th>';
        html += '<th>';
        html += '<textarea class="form-control form-control-sm" name="riskConditionTextArea['+index+']" id="riskConditionTextArea['+index+']" cols="0" rows="0" required></textarea>';
        html += '</th>';
        html += '<th>';
        html += '<select class="form-control form-control-sm" name="riskLevelSelectMenu['+index+']" id="riskLevelSelectMenu['+index+']" required>';
        html += '<option selected disabled hidden value="" >-- Riska līmenis --</option>';
        html += '@foreach ($riskLevel as $level)';
        html += '<option value="{{$level->riskLevelTitle}}">{{$level->riskLevelTitle}}</option>';
        html += '@endforeach';
        html += '</select>';
        html += '</th>';
        html += '<th>';
        html += '<textarea class="form-control form-control-sm" name="riskEventTextArea['+index+']" id="riskEventTextArea['+index+']" cols="0" rows="0" required></textarea>';
        html += '</th>';
        html += '<th>';
        html += '<button type="button" class="btn btn-outline-danger" id="removeTableRow">-</button>';
        html += '</th>';
        html += '</tr>';
        html += '</tbody'

        $('#createDocumentTable').append(html);

        index = index + 1;
        rowIndex = rowIndex + 1;
    });

    $(document).on('click', '#removeTableRow', function () {
        if(index>1) {
            $(this).closest('#removeNewTableRow').remove();
            index = index - 1;
            rowIndex = rowIndex - 1;
        }
    });

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
