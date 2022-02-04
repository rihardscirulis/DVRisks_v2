<script type="text/javascript">
    //add new risk cause row
    $("#addAuthorityCabinetRow").click(function () {
        var html = '';
        html += '<div class="position-relative">';
        html += '<div id="inputAuthorityCabinetRow">';
        html += '<div class="input-group">';
        html += '<input type="text" name="workplaces[]" class="form-control" placeholder="--- Ievadiet jaunu iestādes darba vietu ---" autocomplete="off">';
        html += '<div class="input-group-append">';
        html += '<button id="removeAuthorityCabinetRow" type="button" class="btn btn-danger">Noņemt</button>';
        html += '</div>';
        html += '<div class="invalid-tooltip">';
        html += 'Lūdzu, ievadiet iestādes darba vietu!';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#newAuthorityCabinetRow').append(html);

    });

    // remove risk cause row
    $(document).on('click', '#removeAuthorityCabinetRow', function () {
            $(this).closest('#inputAuthorityCabinetRow').remove();
        
    });
    ////////////////////////


</script>
