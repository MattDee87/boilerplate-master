<?php 

    /*
    
        11/2024 Cameron Bruhns

        This snippet is responsible for allowing the rendering of a WP navigation 
        using a Walker Scheme.

        This provides proper control over the nesting of sub-navigations within easy 
        to style HTML structures.

        Unless you have some specific layout which requires customization, this script 
        is best left alone and will work with the script and style written as is.

    */

    // Custom Walker Nav Output
    class theme_Menu_Walker extends Walker_Nav_Menu {
        function start_lvl(&$output, $depth=0, $args=null) { 
            $output .= '<div class="subnav_more" tabindex="0" aria-label="Click to expand Sub-menu"></div>';
            $output .= '<div class="sub_nav" tabindex="0">';
        }
        function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
            if ($item->url) {
                if($depth == 0){
                    $output .= '<div data-depth="' . esc_attr( $depth ) . '" class="nav_item_holder ' . esc_attr( implode( ' ', $item->classes ) ) . '">';
                }
                $output .= '<a tabindex="0" href="' . esc_url( $item->url ) . '">';
                $output .= esc_html( $item->title );
                $output .= '</a>';
            }
        }
        function end_el(&$output, $item, $depth=0, $args=null) { 
            if($depth == 0){
                $output .= '</div>';
            }
        }
        function end_lvl(&$output, $depth=0, $args=null) { 
            $output .= '</div>';
        }
    }


?>