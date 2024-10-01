<?php 

class My_Walker_Nav_Menu extends Walker_Nav_Menu {

// Avvia l'output di un singolo elemento del menu
function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    // Verifica il livello di profondità della voce di menu
    if ($depth == 0) {
        // Output per il primo livello (voce principale)
        $output .= '<li class="menu-item-level-1">';
    } elseif ($depth == 1) {
        // Output per il secondo livello (sottovoce)
        $output .= '<li class="menu-item-level-2">';
    }

    // Aggiunge il link e l'etichetta della voce di menu
    $output .= '<a href="' . esc_attr($item->url) . '">' . esc_html($item->title) . '</a>';
}

// Chiude l'output di un singolo elemento del menu
function end_el(&$output, $item, $depth = 0, $args = array()) {
    $output .= '</li>';
}

// Aggiungi eventuali altre personalizzazioni per `start_lvl` o `end_lvl` se necessario
}
