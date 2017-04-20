<?php
    if ( ! function_exists( 'decade_taxonomy' ) ) {
        // Register Custom Taxonomy
        function decade_taxonomy() {
            $labels = array(
                'name'                       => _x( 'Decades', 'Taxonomy General Name', 'decade_taxonomy' ),
                'singular_name'              => _x( 'Decade', 'Taxonomy Singular Name', 'decade_taxonomy' ),
                'menu_name'                  => __( 'Decade', 'decade_taxonomy' ),
                'all_items'                  => __( 'All Decades', 'decade_taxonomy' ),
                'parent_item'                => __( 'Parent Decade', 'decade_taxonomy' ),
                'parent_item_colon'          => __( 'Parent Decade:', 'decade_taxonomy' ),
                'new_item_name'              => __( 'New Decade Name', 'decade_taxonomy' ),
                'add_new_item'               => __( 'Add New Decade', 'decade_taxonomy' ),
                'edit_item'                  => __( 'Edit Decade', 'decade_taxonomy' ),
                'update_item'                => __( 'Update Decade', 'decade_taxonomy' ),
                'view_item'                  => __( 'View Decade', 'decade_taxonomy' ),
                'separate_items_with_commas' => __( 'Separate items with commas', 'decade_taxonomy' ),
                'add_or_remove_items'        => __( 'Add or remove decades', 'decade_taxonomy' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'decade_taxonomy' ),
                'popular_items'              => __( 'Popular Decades', 'decade_taxonomy' ),
                'search_items'               => __( 'Search Decade', 'decade_taxonomy' ),
                'not_found'                  => __( 'Not Found', 'decade_taxonomy' ),
                'no_terms'                   => __( 'No decades', 'decade_taxonomy' ),
                'items_list'                 => __( 'Decade list', 'decade_taxonomy' ),
                'items_list_navigation'      => __( 'Decades list navigation', 'decade_taxonomy' ),
            );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
                'show_in_rest'               => true,
            );
            register_taxonomy( 'decade', array( 'timeline' ), $args );

        }
        add_action( 'init', 'decade_taxonomy', 0 );
    }