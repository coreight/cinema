$(document).ready(function() {
    $('#actors-table .btn-delete ').click(function (e) {

        // Annulation de l'action par défaut du bouton
        e.preventDefault();

        console.log('Click ok');

        var elt = $(this);

        $.ajax({url: elt.attr('href')}).done(function () {
            $('.modal').modal('hide');
            elt.parents('tr').fadeOut('slow');
        });

    });

    /* A VOIR, ne fonctionne pas */
    $('#movies-table .btn-delete ').click(function (e) {

        console.log('deleting');
        // Annulation de l'action par défaut du bouton
        e.preventDefault();

        var elt = $(this);

        $.ajax({url: elt.attr('href')}).done(function () {
            $('.modal').modal('hide');
            elt.parents('tr').fadeOut('slow');
        });

    });

    // Commentaires : affichage automatique
    $('#leave-comment-form').submit(function (e) {

        e.preventDefault();
        console.log('Submit ok');

        var elt = $(this);

        $.ajax({
            url: elt.attr('action'),
            method: "POST",
            data: elt.serialize()

        }).done(function (data) {
            // RESTE A VOIR : comment styler. Simplement rechargement du panel ?
            var html = '<li>' + elt.find('textarea').val() + '</li>';
            // On fait apparaitre le commentaire
            $('.comments-list').append(html);
            // On vide le contenu du champ
            elt.find('textarea').val("");
        });

    });


    /* Dashboard : rafraîchissement temps réel des prochaines séances */
    $('.modalAddSession').submit(function (e) {

        e.preventDefault();

        var elt = $(this);

        $.ajax({
            //url: elt.attr('action'),
            url: '/admin/sessions',
            method: "POST",
            data: elt.serialize()

        }).done(function (data) {
            // A VOIR
            console.log('session ok');
            //$('#dashboard-support-tickets').html(data);
        });

     });


        /* A FINIR */
    $('#actionList').change(function () {

        var selection = $(this).val();

        if (selection == "visible") {
            $('#checkboxId :checked').each(function (index) {

                var elt = $(this);

                $.ajax({
                    url: elt.attr('data-url')
                }).done(function () {
                    elt.parents('tr').fadeOut('slow');
                });
            });

        }
    });

    /* Ajout rapide de films */
    $('#quickAddMovie').submit(function (e) {
        e.preventDefault();
        console.log('submit ok');
        var elt = $(this);

        $.ajax({
            url: elt.attr('action'),
            method: "POST", // Methode d'envoi de ma requete
            data: elt.serialize()
        // data: envoyer des données
        }).done(function () {
            elt.parents('.col-md-6').fadeOut('slow');
            $.growl.notice({ message: "Film ajouté", duration: 5000});
        });

    });



    /* Refresh de blocks */
    $(".refresh").click(function() {

        $.ajax({
            // Récupération de la route utile au contrôleur
           url: $('.refreshing').attr('data-url')

        }).done(function(data) {

            // Rafraichissement du bloc avec les nouvelles données
            $('.refreshing').hide().html(data).fadeIn('slow');

        });
    });
























});
