jQuery(document).ready(function ($) {

    // Funzione per la ricerca AJAX
    $('#ajax-search-form').on('submit', function (event) {
        event.preventDefault(); // Impedisce il reindirizzamento

        var searchTerm = $('#search-input').val();

        $.ajax({
            url: ajaxurl, // Fornito automaticamente da WordPress
            type: 'GET',
            data: {
                action: 'ajax_search', // Nome dell'azione definita in functions.php
                s: searchTerm
            },
            success: function (response) {
                $('#results-container').html(response); // Inserisci i risultati della ricerca
            },
            error: function () {
                console.error('Errore durante la ricerca.');
            }
        });
    });

    // Funzione per filtrare i contenuti tramite tag
    jQuery(document).ready(function ($) {
        $('.tag-filter').on('click', function (e) {
            e.preventDefault();
            var tagId = $(this).data('tag-id');

            $.ajax({
                url: ajaxurl, // Assumi che ajaxurl sia definito da WordPress
                type: 'POST',
                data: {
                    action: 'filter_posts_by_tag',
                    tag_id: tagId
                },
                success: function (response) {
                    $('.filtered-content').html(response);
                }
            });
        });
    });

    // Filtro di reset
    jQuery(document).ready(function ($) {
        // Aggiungi un event listener per il clic sul link "Tutti"
        $('#reset-filters').on('click', function (e) {
            e.preventDefault();

            // Ottieni l'URL della pagina corrente senza i parametri di query (es. filtri)
            var url = window.location.href.split('?')[0];

            // Ricarica la pagina senza parametri, quindi resetta tutti i filtri
            window.location.href = url;
        });
    });

});
