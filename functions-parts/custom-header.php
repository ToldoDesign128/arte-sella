<?php 
class My_Walker_Nav_Menu extends Walker_Nav_Menu {

    // Avvia l'output di un singolo elemento del menu
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        // Verifica il livello di profondità della voce di menu
        if ($depth == 0) {
            // Se la voce di primo livello ha delle voci figlie, non mostrare il link
            if (in_array('menu-item-has-children', $item->classes)) {
                $output .= '<li class="menu-item-level-1 has-sub-menu">';
                $output .= '<span class="menu-item-title">' . esc_html($item->title) . '<span class="menu-items-icon"><svg fill="#000000" height="30px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 330 330" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path id="XMLID_222_" d="M250.606,154.389l-150-149.996c-5.857-5.858-15.355-5.858-21.213,0.001 c-5.857,5.858-5.857,15.355,0.001,21.213l139.393,139.39L79.393,304.394c-5.857,5.858-5.857,15.355,0.001,21.213 C82.322,328.536,86.161,330,90,330s7.678-1.464,10.607-4.394l149.999-150.004c2.814-2.813,4.394-6.628,4.394-10.606 C255,161.018,253.42,157.202,250.606,154.389z"></path> </g></svg></span></span>';
            } else {
                $output .= '<li class="menu-item-level-1">';
                $output .= '<a href="' . esc_attr($item->url) . '">' . esc_html($item->title) . '</a>';
            }
        } elseif ($depth == 1) {
            // Output per il secondo livello (sottovoce)
            $output .= '<li class="menu-item-level-2">';
            $output .= '<a href="' . esc_attr($item->url) . '">' . esc_html($item->title) . '</a>';
        }
    }

    // Chiude l'output di un singolo elemento del menu
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= '</li>';
    }
};

