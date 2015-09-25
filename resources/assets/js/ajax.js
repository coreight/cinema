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


    // Ajout en favoris
    $(".fav").click(function(e){
        //console.log('switch');

        // On stocke l'élément courant pour pouvoir le réutiliser ensuite
        var elt = $(this);

        if ($(this).is(':checked')) {
            //console.log('checked');

            $.ajax({

                url: elt.data('url'),
                method: "POST",
                data: {id: elt.data('id'), action: "add", _token: elt.data('token')}

            }).done(function(data){

                console.log(elt.data('id')+" en favoris");
                var count = parseInt($('#favCounter').text());
                count++;
                $('#favCounter').text(count);

            });

        } else {
            console.log('not checked');

            $.ajax({

                url: elt.data('url'),
                method: "POST",
                data: {id: elt.data('id'), action: "remove", _token: elt.data('token')}

            }).done(function(data){

                console.log(elt.data('id')+" plus en favoris");
                var count = parseInt($('#favCounter').text());
                count--;
                $('#favCounter').text(count);

            });
        }

        // Mise à jour de la boite de notification en navbar
        $.ajax({
            // Récupération de la route utile au contrôleur
            url: $('#main-navbar-messages').attr('data-url'),

        }).done(function(data) {

            // Rafraichissement du bloc avec les nouvelles données
            $('#main-navbar-messages').hide().html(data).fadeIn('fast');

            //var count = parseInt($('#favCounter').attr('data-count'));
            //count = count +1;
            //
            //$('#favCounter').text(count);
            //



        });


    });

    // Système de likes
    $(".like").click(function(e) {

        // On stocke l'élément courant pour pouvoir le réutiliser ensuite
        var elt = $(this);

        $.ajax({

            url: elt.data('url'),
            method: "POST",
            data: {id: elt.data('id'), action: elt.data('action'), _token: elt.data('token')}

        }).done(function(data){

            console.log(elt.data('id')+" liké");
            var count = parseInt(elt.next().text());
            count++;
            elt.next().text(count);

        });




    });





    /* Modification du  texte des commentaire directement dans le HTML */
    $('.bs-x-editable-comment').editable({
        title: 'Modifier le commentaire',
        url: $(this).data('url'),
        params: function(params) {
            //originally params contain pk, name and value
            params._token = $(this).data('token');
            return params;
        },
        success: function(data,config) {
            console.log('editable ok');
        }

    });























});
