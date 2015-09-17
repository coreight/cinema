
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

    /* Timepicker */

    var options = {
        minuteStep: 15,
        showSeconds: false,
        showMeridian: false,
        showInputs: false,
        orientation: $('body').hasClass('right-to-left') ? { x: 'right', y: 'auto'} : { x: 'auto', y: 'auto'}
    }
    $('#timepicker').timepicker(options);


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


    /* Charts */
    // Pie
    $('.pie-chart').easyPieChart({
        barColor: '#c0392b',
        lineWidth: 7,
        scaleColor: false
    });


    // Bar
    $(document).ready(function() {

        var tab = [];

        // Récupération des données depuis la vue
        $('.data-chart').each(function () {

            var city = $(this).attr('data-city');
            var nb = $(this).attr('data-nb');

            var obj = { city: city , value: nb };
            tab.push(obj);

        });

        new Morris.Bar({

        // ID of the element in which to draw the chart.
        element: 'chart',

        // Chart data records -- each entry in this array corresponds to a point on
        // the chart.
        data: tab,
            // The name of the data record attribute that contains x-values.
            xkey: 'city',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['value'],
            gridTextSize: 9

        });


    });

    // Donut
    $(document).ready(function() {

        var tab = [];

        // Récupération des données depuis la vue
        $('.data-donut').each(function () {

            var tranche = $(this).attr('data-tranche');
            var value = $(this).attr('data-val');

            var obj = { label: tranche+" ans" , value: value };
            tab.push(obj);

        });

        new Morris.Donut({

            // ID of the element in which to draw the chart.
            element: 'donut',

            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: tab,
            formatter: function (y, data) { return y + '%' }

        });
    });

    // Area
    $(document).ready(function() {

        console.log('chart ready');

        var tab = [];

        // Récupération des données depuis la vue
        $('period').each(function () {

            var date = $(this).attr('data-date');

            $('data').each(function () {

                var director = $(this).attr('data-director');
                var nbMovies = $(this).attr('data-nbMovies');

                console.log(date);
                console.log(director);
                console.log(nbMovies);


                //var obj = { label: date , director: d1, b: d2, c:d3, d:d4};
                //tab.push(obj);

            });

        });

        new Morris.Area({
            element: 'area',
            data: [
                { y: '2006', a: 100, b: 90 },
                { y: '2007', a: 75,  b: 65 },
                { y: '2008', a: 50,  b: 40 },
                { y: '2009', a: 75,  b: 65 },
                { y: '2010', a: 50,  b: 40 },
                { y: '2011', a: 75,  b: 65 },
                { y: '2012', a: 100, b: 90 }
            ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Series A', 'Series B']
        });


    });




    /* Liste de tâches */
    $('.widget-tasks .panel-body').pixelTasks().sortable({
        axis: "y",
        handle: ".task-sort-icon",
        stop: function( event, ui ) {
            // IE doesn't register the blur when sorting
            // so trigger focusout handlers to remove .ui-state-focus
            ui.item.children( ".task-sort-icon" ).triggerHandler( "focusout" );
        }
    });
    $('#clear-completed-tasks').click(function () {
        $('.widget-tasks .panel-body').pixelTasks('clearCompletedTasks');
    });


});