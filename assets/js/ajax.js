jQuery(document).ready(function($) {

    // Funzione per la ricerca AJAX
    $('#ajax-search-form').on('submit', function(event) {
        event.preventDefault(); // Impedisce il reindirizzamento

        var searchTerm = $('#search-input').val();

        $.ajax({
            url: ajaxurl, // Fornito automaticamente da WordPress
            type: 'GET',
            data: {
                action: 'ajax_search', // Nome dell'azione definita in functions.php
                s: searchTerm
            },
            success: function(response) {
                $('#results-container').html(response); // Inserisci i risultati della ricerca
            },
            error: function() {
                console.error('Errore durante la ricerca.');
            }
        });
    });

    // Funzione per filtrare i contenuti tramite tag
    $('.tag-filter').on('click', function(event) {
        event.preventDefault();

        var tagID = $(this).data('tag-id') || 0; // Valore predefinito 0 se non selezionato

        $.ajax({
            url: ajaxurl, // URL per gestire la richiesta AJAX
            type: 'POST',
            data: {
                action: 'filter_by_tag', // Azione definita nel backend PHP
                tag_id: tagID
            },
            success: function(response) {
                $('.filtered-content').html(response); // Aggiorna i contenuti filtrati
            },
            error: function() {
                console.error('Errore durante il filtraggio dei contenuti.');
            }
        });
    });
});
