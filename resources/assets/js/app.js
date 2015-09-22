
init.push(function () {

    /* Tableaux */

    $('#jq-datatables-example').dataTable();
    $('#jq-datatables-example_wrapper .table-caption').text('Liste complète');
    $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Recherche...');


    /* Checkbox avec enregistrement live (ajax) et confirmation */

    $('#visible :checkbox').on('click', function () {

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
    $('#radio-group').children().change(function () {
        $('#bo').toggleClass("hide");

    });

    /* Boutons des modal box lorsque plusieurs éléments sélectionnés */
    $('#tableau-submit').on('click', function () {

        $('#id :checkbox').each(function () {
            console.log($(this).attr('value'));
        });
    });

    /* Editeur WYSIWYG */
    $(document).ready(function () {
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
        orientation: $('body').hasClass('right-to-left') ? {x: 'right', y: 'auto'} : {x: 'auto', y: 'auto'}
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
    $("#synopsis").limiter(200, {label: '#synopsis-limit-label'});
    $("#register-description").limiter(160, {label: '#register-limit-label'});


    /* Sliders */

    $('#duree-slider').slider({
        range: "min",
        min: 0,
        max: 6,
        value: 1,
        slide: function (event, ui) {
            $("#duree").val(ui.value);
        }
    });

    $("#duree").val($("#duree-slider").slider("value"));

    $('#budget-slider').slider({
        range: "min",
        min: 0,
        max: 1000000000,
        value: 10,
        slide: function (event, ui) {
            $("#budget").val(ui.value);
        }
    });
    $("#budget").val($("#budget-slider").slider("value"));


    /* Charts */
    // Pie
    $('.pie-chart').easyPieChart({
        barColor: '#c0392b',
        lineWidth: 7,
        scaleColor: false
    });


    // Bar
    $(document).ready(function () {

        if ($('#chart').length) { // Si la page contient un graphique de ce type
            var tab = [];

            // Récupération des données depuis la vue
            $('.data-chart').each(function () {

                var city = $(this).attr('data-city');
                var nb = $(this).attr('data-nb');

                var obj = {city: city, value: nb};
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
        }

    });

    // Donut
    $(document).ready(function () {

        if ($('#donut').length) { // Si la page contient un graphique de ce type

            var tab = [];

            // Récupération des données depuis la vue
            $('.data-donut').each(function () {

                var tranche = $(this).attr('data-tranche');
                var value = $(this).attr('data-val');

                var obj = {label: tranche + " ans", value: value};
                tab.push(obj);

            });

            new Morris.Donut({

                // ID of the element in which to draw the chart.
                element: 'donut',

                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                data: tab,
                formatter: function (y, data) {
                    return y + '%'
                }

            });
        }
    });

    // Area
    $(document).ready(function () {

        if ($('#area').length) { // Si la page contient un graphique de ce type

            var tab = [];

            // Récupération des 4 réalisateurs
            var d1 = $("[data-num='d1']").attr('data-director');
            var d2 = $("[data-num='d2']").attr('data-director');
            var d3 = $("[data-num='d3']").attr('data-director');
            var d4 = $("[data-num='d4']").attr('data-director');

            // Récupération des données depuis la vue
            $('period').each(function () {

                var date = $(this).attr('data-date');
                var obj = {y: date, a: 0, b: 0, c: 0, d: 0};


                $(this).children('data').each(function () {

                    var director = $(this).attr('data-director');
                    var nbMovies = $(this).attr('data-nbMovies');

                    //console.log(date);
                    //console.log(director);
                    //console.log(nbMovies);


                    if (director == d1) {
                        obj.a = nbMovies;
                    } else if (director == d2) {
                        obj.b = nbMovies;

                    } else if (director == d3) {
                        obj.c = nbMovies;

                    } else if (director == d4) {
                        obj.d = nbMovies;

                    }
                });
                //var obj = { y: date , a: d1, b: d2, c:d3, d:d4 };
                tab.push(obj);
            });
            //console.log(tab);

            new Morris.Area({
                element: 'area',
                data: tab,
                xkey: 'y',
                ykeys: ['a', 'b', 'c', 'd'],
                labels: [d1, d2, d3, d4]
            });
        }

    });

    // Graphiques avancés avec Highcharts

    $(document).ready(function () {


        // Récupération du nb total de commentaires
        var nbTotalComments = $('comments').attr('nbtotal');

        var cineArray = [];
        var nbArray = [];
        var array = [];


        // Récupération des données des cinémas depuis les éléments HTML5
        $('cine').each(function () {
            var cinema = $(this).attr('title');
            var nb = Math.round($(this).attr('nb') / nbTotalComments * 100);

            cineArray.push(cinema);
            nbArray.push({
                name: cinema,
                y: nb,
                drilldown: cinema
            });


            // Récupération des données des films pour chaque cinéma depuis les éléments HTML5
            var movieArray = [];
            var nbMovieArray = [];
            var movieData = [];
            $(this).children('movie').each(function () {
                var movie = $(this).attr('title');
                var nbMovie = Math.round($(this).attr('nb') / nbTotalComments * 100);

                //movieArray.push(movie);
                //nbMovieArray.push(nbMovie);
                movieData.push([movie, nbMovie]);
            });
            //console.log(movieArray);
            //console.log(nbMovieArray);

            // Stockage des films de chaque cinéma dans un grand tableau récapitulatif
            array.push({
                name: cinema,
                id: cinema,
                data: movieData
            })

        });
        console.log(nbArray);
        console.log(array);


        // Création du graphique
        $('#highcharts').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: '% des commentaires pour tous les films'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.1f}%'
                    }
                }
            },
            series: [{
                name: '% des commentaires',
                colorByPoint: true,
                data: nbArray
            }],
            drilldown: {
                series: array
            }
        });
    });

    // Highcharts pie
    $(document).ready(function () {


        var nbMovies = $('nbmovies').attr('nb');

        // Récupération des données HTM
        array = [];

        $('movcat').each(function () {

            var category = $(this).attr('category');
            var nb = Math.round(parseInt($(this).attr('nb')) * 100 / nbMovies);
            array.push({
                name: category,
                y: nb
            })

        });
        console.log(array);

        // Création du graphique
        $('#highcharts-pie').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: "Brands",
                colorByPoint: true,
                data: array
            }]
        });

    });


    /* Liste de tâches */
    $('.widget-tasks .panel-body').pixelTasks().sortable({
        axis: "y",
        handle: ".task-sort-icon",
        stop: function (event, ui) {
            // IE doesn't register the blur when sorting
            // so trigger focusout handlers to remove .ui-state-focus
            ui.item.children(".task-sort-icon").triggerHandler("focusout");
        }
    });
    $('#clear-completed-tasks').click(function () {
        $('.widget-tasks .panel-body').pixelTasks('clearCompletedTasks');
    });


    // Test récupération des données en JSON plutôt que avec éléments HTML5
    //$.getJSON( $('#api').data('url'), function(data) {
    //
    //   var items = [];
    //    $.each(data, function(key, val){
    //       items.push(val.firstname);
    //    });
    //    console.log(items);
    //});


    // Graph répartition des films par catégorie, via JSON
    $.getJSON($('#pie3D').data('url'), function (data) {

        // récupération des données JSON
        var items = [];
        $.each(data, function (key, val) {
            items.push([val.title, parseInt(val.nb)]);
        });
        //console.log(items);

        // Construction du graphique Highcharts
        $('#pie3D').highcharts({
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.title}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: '',
                data: items
            }]
        });

    });



    // Graph répartition des films par catégorie, via JSON
    $.getJSON($('#stackedBar').data('url'), function (data) {

        console.log('json ready');

        // récupération des données JSON
        //$.each(data, function (key, val) {
            console.log(val);
        //});

        // A FINIR


        // Construction du graphique Highcharts
        $('#stackedBar').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Stacked column chart'
            },
            xAxis: {
                categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total fruit consumption'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                align: 'right',
                x: -30,
                verticalAlign: 'top',
                y: 25,
                floating: true,
                backgroundColor: (Highcharts.theme && Highcharts.theme.background2) || 'white',
                borderColor: '#CCC',
                borderWidth: 1,
                shadow: false
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            series: [{
                name: 'John',
                data: [5, 3, 4, 7, 2]
            }, {
                name: 'Jane',
                data: [2, 2, 3, 2, 1]
            }, {
                name: 'Joe',
                data: [3, 4, 4, 2, 5]
            }]
        });

    });

    // Graph répartition des sessions par mois, via JSON
    $.getJSON($('#bar3D').data('url'), function (data) {

        // récupération des données JSON
        var month = [];
        var nb = [];
        $.each(data, function (key, val) {
            month.push(val.mois);
            nb.push(parseInt(val.nb));
        });


        // Construction du graphique Highcharts
        $('#bar3D').highcharts({
            chart: {
                type: 'column',
                margin: 75,
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: month
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            series: [{
                name: 'Nombre de séances',
                data: nb
            }]
        });


    });

});















