jQuery(document).ready(function($) {
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
                $('#results-container').html(response);
            }
        });
    });
});