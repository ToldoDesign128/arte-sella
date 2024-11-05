// Menu
jQuery(document).ready(function () {
    jQuery("#hamburgerBtn").click(function () {
        jQuery(".header-panel").addClass("open-menu");
    });

    jQuery("#hamburgerBtnClose").click(function () {
        jQuery(".header-panel").removeClass("open-menu");
    });
});

// Accordion Menu
jQuery(document).ready(function($) {
    // Gestione del clic per le voci con sottomenu
    $('.has-sub-menu > .menu-item-title').on('click', function(e) {
        e.preventDefault(); // Evita che il link venga seguito

        var $subMenu = $(this).siblings('.sub-menu'); // Trova il sottomenu
        var $icon = $(this).find('.menu-items-icon'); // Trova l'icona all'interno dello span

        // Chiudi altri sottomenu aperti e rimuovi la classe 'icon-active' dalle altre icone
        $('.sub-menu').not($subMenu).removeClass('open-sub-menu');
        $('.menu-items-icon').not($icon).removeClass('icon-active');

        // Alterna l'apertura/chiusura del sottomenu
        $subMenu.toggleClass('open-sub-menu');

        // Alterna la classe 'icon-active' sull'icona
        $icon.toggleClass('icon-active');
    });
});