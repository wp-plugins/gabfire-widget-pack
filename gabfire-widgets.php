<?php
/*
	Plugin Name: Gabfire Widget Pack
	Plugin URI: http://www.gabfirethemes.com
	Description: This plugin adds a bundle of the most commonly used widgets to your site.
	Author: Gabfire Themes
	Version: 1.4.7
	Author URI: http://www.gabfirethemes.com

    Copyright 2013 Gabfire Themes (email : info@gabfire.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
*/

/* Exit if accessed directly
 ***********************************************************************************/
	if ( !defined('ABSPATH')) exit;


/* Load options panel and define Constants
 ***********************************************************************************/
	define( 'GABFIRE_WIDGETS_VERSION', '1.4.7');
	define( 'GABFIRE_WIDGETS_DIR', dirname(__FILE__) );
	define( 'GABFIRE_WIDGETS_URL', plugins_url().'/gabfire-widget-pack' );

	require_once( GABFIRE_WIDGETS_DIR .  '/admin/options.php' );
	$gabfire_options = get_option('gab_options');


/* Setup Style and Textdomain
 ***********************************************************************************/
	function gabfire_widgets_setup() {
		
		wp_enqueue_style('gabfire-widget-css', GABFIRE_WIDGETS_URL .'/css/style.css');
		load_plugin_textdomain('gabfire-widget-pack', false, GABFIRE_WIDGETS_DIR . '/lang');
	}
	add_action('wp_head', 'gabfire_widgets_setup');	

	
/* Load style file for wp-admin/widgets.php
 ***********************************************************************************/
	function gabfire_widgetpage_style() {
		wp_enqueue_style('gabfire-customfields-style', GABFIRE_WIDGETS_URL .'/admin/widgetspage_style.css' );
	}
	add_action('admin_head-widgets.php', 'gabfire_widgetpage_style');


/* Setup Each Index
 ***********************************************************************************/

	$gabfire_default_option = array(
		'videos'			=> 0,
		'about_widget' 		=> 0,
		'contact_info' 		=> 0,
		'archive_widget' 	=> 0,
		'ajaxtabs' 			=> 0,
		'authorbadge' 		=> 0,
		'feedburner' 		=> 0,
		'flickrrss' 		=> 0,
		'relatedposts' 		=> 0,
		'search' 			=> 0,
		'share' 			=> 0,
		'social' 			=> 0,
		'text_widget' 		=> 0,
		'popular_random' 	=> 0,
		'recent_tweets' 	=> 0,
		'simple_ad' 		=> 0,
	);

	if (false === $gabfire_options) {
		$gabfire_options = $gabfire_default_option;
	}


/* Also make sure each index exists before comparing it
 ***********************************************************************************/
 
	if (isset($gabfire_options['videos']) && $gabfire_options['videos'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-videos.php');
	} 
	
	if (isset($gabfire_options['videos']) && $gabfire_options['about_widget'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-about.php');
	} 	
 
	if (isset($gabfire_options['contact_info']) && $gabfire_options['contact_info'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-address.php');
	}

	if (isset($gabfire_options['archive_widget']) && $gabfire_options['archive_widget'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-archive.php');
	}

	if (isset($gabfire_options['ajaxtabs']) && $gabfire_options['ajaxtabs'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-ajaxtabs.php');
	}

	if (isset($gabfire_options['authorbadge']) && $gabfire_options['authorbadge'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-authorbadge.php');
	}

	if (isset($gabfire_options['feedburner']) && $gabfire_options['feedburner'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-feedburner.php');
	}

	if (isset($gabfire_options['flickrrss']) && $gabfire_options['flickrrss'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-flickr.php');
	}
	
	if (isset($gabfire_options['relatedposts']) && $gabfire_options['relatedposts'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-relatedposts.php');
	}

	if (isset($gabfire_options['search']) && $gabfire_options['search'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-search.php');
	}

	if (isset($gabfire_options['share']) && $gabfire_options['share'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-shareitems.php');
	}

	if (isset($gabfire_options['social']) && $gabfire_options['social'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-social.php');
	}

	if (isset($gabfire_options['text_widget']) && $gabfire_options['text_widget'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-text.php');
	}

	if (isset($gabfire_options['popular_random']) && $gabfire_options['popular_random'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-pop-rand-rcnt.php');
	}

	if (isset($gabfire_options['recent_tweets']) && $gabfire_options['recent_tweets'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-recent-tweets.php');
	}
	
	if (isset($gabfire_options['simple_ad']) && $gabfire_options['simple_ad'] == 1) {
		require_once (GABFIRE_WIDGETS_DIR . '/widget-simple-ad.php');
	}