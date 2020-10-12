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
		//$query->set( 'category__not_in', 2381 ); // cat. Online Exhibitions, ma non va bene...

		$current_meta = array($query->get('meta_query'));
		// aggiungiamo filtro per includere posts 
		// senza CF display_banner
		// oppure CF display_banner NON settato a 1
		$custom_meta = array(
			'relation' => 'OR',
			array(
				'key' => 'display_banner',
				'compare' => 'NOT EXISTS'
			),
			array(
				'key' => 'display_banner',
				'type' => 'BINARY',
				'value' => '1',
				'compare' => '!='
			)
		);
		$meta_query = $current_meta = $custom_meta;
		$query->set('meta_query', array($meta_query));	
	}
}
add_action( 'pre_get_posts', 'exclude_category' );


 
// Insert ads after second paragraph of single post content.
// https://wordpress.stackexchange.com/questions/74235/show-content-after-the-first-and-second-paragraph/74242
function the_injected_content($pnum, $pcont) {
	$paragraphAfter[$pnum] = $pcont; //display after the fifth paragraph

	$content = apply_filters( 'the_content', get_the_content() );
	$content = explode("</p>", $content);
	$count = count($content);
	for ($i = 0; $i < $count; $i++ ) {
	    if ( array_key_exists($i, $paragraphAfter) ) {
	        echo $paragraphAfter[$i];
	    }
	    echo $content[$i] . "</p>";
	}
}


// setta i valori di default per il gli ACF relativi algli sponsors
function set_default_acf_values() {
    $args = [
        'post_type'      => array('post','cfa_translations'),
        'posts_per_page' => -1,
    ];
    $posts = get_posts($args);
    foreach($posts as $post) {
        if (empty(get_field('post_sponsor_display', $post->ID))) {
             update_field('post_sponsor_display', 1, $post->ID);
        }
        if (empty(get_field('post_sponsor_position', $post->ID))) {
             update_field('post_sponsor_position', 'summary', $post->ID);
        }
        if (empty(get_field('post_sponsor_format', $post->ID))) {
             update_field('post_sponsor_format', 'full', $post->ID);
        }
    }
}
add_action('admin_init', 'set_default_acf_values');

?>