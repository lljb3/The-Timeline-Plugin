<?php
	/*
        Plugin Name: SOS Timeline Plugin
        Plugin URI: http://stickoutsocial.com/
        Description: Declares a plugin that will create a custom post type displaying entries in a timeline.
        Version: 1.0
        Author: James Burrell
        Author URI: http://stickoutsocial.com/
        License: GPLv2
	*/
	
	// Start Plugin
    require_once('inc/install.php');

    // Custom Categories
    include_once('inc/taxonomies.php');

    // Custom Metaboxes
    include_once('inc/metaboxes.php');

    // Custom Scripts
    include_once('inc/scripts.php');

    // Custom Templates
    include_once('inc/templates.php');