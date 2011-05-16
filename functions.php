<?php

$themename = "CampusRadioJenaWPTemplate";
$shortname = "CampusRadioJena";

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 500;

$themecolors = array(
	'bg' => 'ffffff',
	'text' => '000000',
	'link' => '0060ff'
);

if ( function_exists('register_sidebar') )
{
	
	/*
	 * 
	 * Menu SideBars (im Page Header)
	 * 
	 * solle immer angezeigt werden
	 * 
	 */
	register_sidebar(
		array(
			'name' => 'pageheader_sidebar_information',
			'id' => 'sidebar-0',
			'description' => 'sidebar information',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	
	register_sidebar(
		array(
			'name' => 'pageheader_sidebar_interaktiv',
			'id' => 'sidebar-1',
			'description' => 'sidebar interaktiv',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	
	
	register_sidebar(
		array(
			'name' => 'pageheader_sidebar_sender',
			'id' => 'sidebar-2',
			'description' => 'sidebar sender',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	
	/*
	 * 
	 * SideBars, im Menu Bereich
	 * 
	 * es wird immer nur eins, in der linken seite angezeigt 
	 * 
	 */
	
	register_sidebar(
		array(
			'name' => 'sidebar_information',
			'id' => 'sidebar-3',
			'description' => 'sidebar information',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	
	register_sidebar(
		array(
			'name' => 'sidebar_interaktiv',
			'id' => 'sidebar-4',
			'description' => 'sidebar interaktiv',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	
	
	register_sidebar(
		array(
			'name' => 'sidebar_sender',
			'id' => 'sidebar-5',
			'description' => 'sidebar sender',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);
	register_sidebar(
		array(
			'name' => 'sidebar_sonstiges',
			'id' => 'sidebar-6',
			'description' => 'sidebar sonstiges',
			'before_title' => '',
			'after_title' => '',
			'before_widget' => '',
			'after_widget' => '',
		)
	);	
}



/**
 * Text: http://codex.wordpress.org/Function_Reference/wp_page_menu
 * 
 * Displays a list of WordPress Pages as links, and affords the opportunity 
 * to have Home added automatically to the list of Pages displayed.
 * 
 */
function crjtemplate_page_menu_args( $args ) {
	$args['show_home'] = false;
	return $args;
}
add_filter( 'wp_page_menu_args', 'crjtemplate_page_menu_args' );

?>