<?php
    if ( ! function_exists('timeline_post_type') ) {
        // Register Custom Post Type
        function timeline_post_type() {
            $labels = array(
                'name'                  => _x( 'Entries', 'Post Type General Name', 'timeline_post_type' ),
                'singular_name'         => _x( 'Entry', 'Post Type Singular Name', 'timeline_post_type' ),
                'menu_name'             => __( 'Entries', 'timeline_post_type' ),
                'name_admin_bar'        => __( 'Entry', 'timeline_post_type' ),
                'archives'              => __( 'Entry Archives', 'timeline_post_type' ),
                'attributes'            => __( 'Entry Attributes', 'timeline_post_type' ),
                'parent_item_colon'     => __( 'Parent Entry:', 'timeline_post_type' ),
                'all_items'             => __( 'All Entries', 'timeline_post_type' ),
                'add_new_item'          => __( 'Add New Entry', 'timeline_post_type' ),
                'add_new'               => __( 'Add New', 'timeline_post_type' ),
                'new_item'              => __( 'New Entry', 'timeline_post_type' ),
                'edit_item'             => __( 'Edit Entry', 'timeline_post_type' ),
                'update_item'           => __( 'Update Entry', 'timeline_post_type' ),
                'view_item'             => __( 'View Entry', 'timeline_post_type' ),
                'view_items'            => __( 'View Entries', 'timeline_post_type' ),
                'search_items'          => __( 'Search Entry', 'timeline_post_type' ),
                'not_found'             => __( 'Not found', 'timeline_post_type' ),
                'not_found_in_trash'    => __( 'Not found in Trash', 'timeline_post_type' ),
                'featured_image'        => __( 'Featured Image', 'timeline_post_type' ),
                'set_featured_image'    => __( 'Set featured image', 'timeline_post_type' ),
                'remove_featured_image' => __( 'Remove featured image', 'timeline_post_type' ),
                'use_featured_image'    => __( 'Use as featured image', 'timeline_post_type' ),
                'insert_into_item'      => __( 'Insert into entry', 'timeline_post_type' ),
                'uploaded_to_this_item' => __( 'Uploaded to this entry', 'timeline_post_type' ),
                'items_list'            => __( 'Entries list', 'timeline_post_type' ),
                'items_list_navigation' => __( 'Entries list navigation', 'timeline_post_type' ),
                'filter_items_list'     => __( 'Filter entries list', 'timeline_post_type' ),
            );
            $args = array(
                'label'                 => __( 'Entry', 'timeline_post_type' ),
                'description'           => __( 'Generate entries on a timeline.', 'timeline_post_type' ),
                'labels'                => $labels,
                'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields', 'post-formats', ),
                'taxonomies'            => array( 'decade' ),
                'hierarchical'          => false,
                'public'                => true,
                'show_ui'               => true,
                'show_in_menu'          => true,
                'menu_position'         => 5,
                'menu_icon'             => 'dashicons-backup',
                'show_in_admin_bar'     => true,
                'show_in_nav_menus'     => true,
                'can_export'            => true,
                'has_archive'           => false,		
                'exclude_from_search'   => true,
                'publicly_queryable'    => true,
                'capability_type'       => 'post',
                'show_in_rest'          => true,
            );
            register_post_type( 'timeline', $args );

        }
        add_action( 'init', 'timeline_post_type', 0 );
    }