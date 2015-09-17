init.push(function () {

    if ($("#carte").length) { // On vérifie la présence d'un élément carte pour lancer le script

        console.log('Gmaps ready');

        var latlng = new google.maps.LatLng(45.757533, 4.899009);

        //objet contenant des propriétés avec des identificateurs prédéfinis dans Google Maps permettant
        //de définir des options d'affichage de notre carte

        var options = {
            center: latlng,
            zoom: 5,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        //constructeur de la carte qui prend en paramêtre le conteneur HTML
        //dans lequel la carte doit s'afficher et les options
        var carte = new google.maps.Map(document.getElementById("carte"), options);

        // création de marqueurs pour chaque cinéma
        $('.cine').each(function () {

            var position = $(this).attr('data-position');
            var title = $(this).attr('data-title');

            var geocoder = new google.maps.Geocoder();

            // Infobulle sur le marqueur
            var contentString = '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h1 id="firstHeading" class="firstHeading">' + title + '</h1>'+
                '<div id="bodyContent">'+
                '<p>' + position + '</p>'+
                '</div>'+
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            // Affichage des marqueurs
            geocoder.geocode({'address': position}, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    carte.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: carte,
                        position: results[0].geometry.location
                    });
                    // Apparition de l'infobulle au clic sur le marqueur
                    marker.addListener('click', function() {
                        infowindow.open(carte, marker);
                    });
                } else {
                    console.log("Geocode fail : " + status);
                }

            });


        });
    };
});


