
init.push(function () {

    /* Tableaux */

    $('#jq-datatables-example').dataTable();
    $('#jq-datatables-example_wrapper .table-caption').text('Liste complète');
    $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Recherche...');


    /* Checkbox avec enregistrement live (ajax) et confirmation */

    $('#visible :checkbox').on('click', function() {

        var id = $(this).parents('td').attr('data-id');

        if ($(this).is(':checked')) {
            var checked = false;
            var toggle = 1;
        } else {
            var checked = true;
            var toggle = 0;
        }

        // On annule l'action par défaut du bouton
        /*e.preventDefault();*/

        // On enregistre la valeur
        $.ajax({
            type: "GET",
            url: '/movies/' + id + '/visible/' + toggle + '/update',
            async: true,

            success: function () {
                $(this).prop("checked", checked);
                /* Message de confirmations flottants */
                $.growl.notice({title: "Information :", message: "La visibilité du film a bien été modifiée"});

            }
        });


    });

    /* Boutons désactivés */
    $('#radio-group').children().change(function() {
             $('#bo').toggleClass("hide");

    });

    /* Boutons des modal box lorsque plusieurs éléments sélectionnés */
    $('#tableau-submit').on('click', function() {

        $('#id :checkbox').each(function() {
           console.log($(this).attr('value'));
        });
    });

    /* Editeur WYSIWYG */
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 200
        });
    });

    /* Datepicker */

    $('.datepicker').datepicker({
        format: 'yyyy/mm/dd',
        todayBtn: 'linked'
    });

    /* jquery validator */
    /*
    $('#form-validate').validate({
        rules: {
            firstname: {
                required: true,
                minlength: 2
            }
        }
    });
    */

    /* upload de fichiers */
    $('#image').pixelFileInput(
        {placeholder: 'Sélectionnez un fichier'}
    );

    /* Switcher */
    $('.switcher').switcher({
        on_state_content: 'OUI',
        off_state_content: 'NON'
    });

    /* Multiselect */
    $(".multiple").select2({
        placeholder: "Selectionnez un ou plusieurs éléments"
    });

    /* Limite du nb de caractères */
    $("#synopsis").limiter(200, { label: '#synopsis-limit-label' });
    $("#register-description").limiter(160, { label: '#register-limit-label' });


    /* Sliders */

    $('#duree-slider').slider({
        range : "min",
        min: 0,
        max: 6,
        value: 1,
        slide: function( event, ui ) {
            $( "#duree" ).val( ui.value );
        }
    });

    $( "#duree" ).val( $( "#duree-slider" ).slider( "value" ) );

    $('#budget-slider').slider({
        range : "min",
        min: 0,
        max: 1000000000,
        value: 10,
        slide: function( event, ui ) {
            $( "#budget" ).val( ui.value );
        }
    });
    $( "#budget" ).val( $( "#budget-slider" ).slider( "value" ) );

});