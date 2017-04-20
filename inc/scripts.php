<?php
	if ( get_post_type() == 'timeline' && is_single() || get_post_type() == 'timeline' && is_archive() ) {
        // Template Script Loader
        function timeline_template_script_loader() {
            $script_path = plugin_dir_url( __FILE__ ).'../lib/';
            wp_enqueue_script( 'plugin-js', $script_path . 'js/timeline-template.js', array( 'jquery' ), '1.0.0', true );
            wp_enqueue_script( 'modernizr-js', $script_path . 'js/modernizr.js', array( 'jquery' ), '2.7.1', true );
        }
        add_action('wp_enqueue_scripts', 'timeline_template_script_loader');
    }

	if ( 'edit.php' === $hook && isset( $_GET['post_type'] ) && 'timeline' === $_GET['post_type'] ) {
        // Admin Pages Script Loader
        function timeline_admin_script_loader() {
            $script_path = plugin_dir_url( __FILE__ ).'../lib/';
            wp_enqueue_script( 'plugin-js', $script_path . 'js/timeline-admin.js', array( 'jquery' ), '1.0.0', true );
        }
        add_action('wp_enqueue_scripts', 'timeline_admin_script_loader');
    }