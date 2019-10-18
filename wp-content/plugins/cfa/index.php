<?php
/*
Plugin Name: CFA customizations
Plugin URI: http://imeuro.io/
Description: Custom functions&features on Conceptualfinearts.com - mainly post translations related but who knows...
Version: 1.0
Author: Mauro Fioravanzi
Author URI: http://imeuro.io/
*/

if( ! defined( 'ABSPATH') ) { exit; }

include('inc/custom-post-types-fields-taxonomies.php');
include('inc/backend-functions.php');

function get_langswitcherDOM() {

	$ldom = '';

	if ( is_home() || is_front_page() || is_page('it') ) {
		$ldom .= '<a href="'.home_url('/').'" data-lang="EN">EN</a>';
		$ldom .= '<a href="'.home_url('/it/').'" data-lang="IT">IT</a>';
	} elseif ( is_single() ) {
		$translationID = get_field('translation',$post->ID)[0];
		$translationURL = get_the_permalink($translationID);
		//var_dump($translationID);

		if ( 'cfa_translations' == get_post_type() ) :
			if ($translationID == null) { $translationURL = home_url('/'); } // No translation -> link to home ENG
			$ldom .= '<a href="'.$translationURL.'" data-lang="EN">EN</a>';
			$ldom .= '<span data-lang="IT">IT</span>';
		else : 
			if ($translationID == null) { $translationURL = home_url('/it/'); } // No translation ->link to home ITA
			$ldom .= '<span data-lang="EN">EN</span>';
			$ldom .= '<a href="'.$translationURL.'" data-lang="IT">IT</span>';
		endif;
	}
	return $ldom;
}
?>