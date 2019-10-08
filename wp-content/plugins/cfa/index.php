<?php
/*
Plugin Name: CFA customizations
Plugin URI: http://imeuro.io/
Description: Custom functions&features on Conceptualfinearts.com
Version: 1.0
Author: Mauro Fioravanzi
Author URI: http://imeuro.io/
*/

if( ! defined( 'ABSPATH') ) { exit; }

include('inc/custom-post-types-fields-taxonomies.php');
include('inc/backend-functions.php');

function get_langswitcherDOM() {

	$ldom = '';

	if ( is_home() || is_front_page() ) {
		$ldom .= '<a href="'.get_site_url().'" data-lang="EN">EN</a>';
		$ldom .= '<a href="'.get_site_url('','/it/').'" data-lang="IT">IT</a>';
	} elseif ( is_single() ) {
		$trandlationID = get_field('translation',$post->ID)[0];
		//if ($trandlationID == null) { $trandlationID = 0; }
		var_dump($trandlationID);
		if ( 'cfa_translations' == get_post_type() ) :
			$ldom .= '<a href="'.get_the_permalink($trandlationID).'" data-lang="EN">EN</a>';
			$ldom .= '<span data-lang="IT">IT</span>';
		else : 
			$ldom .= '<span data-lang="EN">EN</span>';
			$ldom .= '<a href="'.get_the_permalink($trandlationID).'" data-lang="IT">IT</span>';
		endif;
	}
	return $ldom;
}
?>