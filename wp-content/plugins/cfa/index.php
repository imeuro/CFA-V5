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
include('inc/blocks-functions.php');

function get_langswitcherDOM() {

	$ldom = '';
	global $post;

	if ( is_home() || is_front_page() || is_page('it') ) {
		$ldom .= '<a href="'.home_url('/').'" data-lang="EN">EN</a>';
		$ldom .= '<a href="'.home_url('/it/').'" data-lang="IT">IT</a>';
	} elseif ( is_single() || is_page() ) {
		$translationID = get_field('translation',$post->ID)[0];
		$translationURL = get_permalink($translationID);
		// var_dump($translationURL);
		// var_dump($post);

		if ( 'cfa_translations' == get_post_type() || $post->post_parent == '95535' ) :
			if ($translationID == null) { $translationURL = home_url('/'); } // No translation -> link to home ENG
			$ldom .= '<a href="'.$translationURL.'" data-lang="EN">EN</a>';
			$ldom .= '<span data-lang="IT">IT</span>';
		else : 
			if ($translationID == null) { $translationURL = home_url('/it/'); } // No translation ->link to home ITA
			$ldom .= '<span data-lang="EN">EN</span>';
			$ldom .= '<a href="'.$translationURL.'" data-lang="IT">IT</a>';
		endif;
	}
	return $ldom;
}


function exclude_category( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'category__not_in', 2381 ); // Exhibitions
	}
}
add_action( 'pre_get_posts', 'exclude_category' );
?>