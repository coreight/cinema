init.push(function () {

    /* Tableaux */
    $('#jq-datatables-example').dataTable();
    $('#jq-datatables-example_wrapper .table-caption').text('Liste complète');
    $('#jq-datatables-example_wrapper .dataTables_filter input').attr('placeholder', 'Recherche...');

    /* Message de confirmations flottants */
    $('#jq-growl-success').click(function () {
        $.growl.success({ message: "Le film a bien été supprimé" });
    });


    /* Styled checkboxes and radios */
    init.push(function () {
        $('#styled-ch-btn').on('click', function () {
            var $c = $(this).parent().find('input[type="checkbox"]');
            $c.each(function () {
                var $p  = $(this).parent(),
                    $el = $(this).detach().addClass('px'),
                    t   = $p.text().trim();

                $p.html('');
                $p.append($el);
                $p.append($('<span class="lbl">' + t + '</span>'));
            });
            $(this).remove();
        });

        $('#styled-r-btn').on('click', function () {
            var $r = $(this).parent().find('input[type="radio"]');
            $r.each(function () {
                var $p  = $(this).parent(),
                    $el = $(this).detach().addClass('px'),
                    t   = $p.text().trim();

                $p.html('');
                $p.append($el);
                $p.append($('<span class="lbl">' + t + '</span>'));
            });
            $(this).remove();
        });
    });

});