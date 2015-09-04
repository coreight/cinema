
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




});