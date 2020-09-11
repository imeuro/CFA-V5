<?php
function CFA_GutenBlock() {
    wp_enqueue_script( 'CFA_GutenBlock-script',
        plugins_url( 'CFA_GutenBlock.js', __FILE__ ),
        array( 'wp-blocks' ), 
		filemtime( plugin_dir_path( __FILE__ ) . 'CFA_GutenBlock.js' ),		
		true
    );
}
add_action( 'enqueue_block_editor_assets', 'CFA_GutenBlock' );

function cfa_gallery_render( $attributes, $content ) {
	//$code = print_r($attributes['ids']);
	$code .= '<div class="swiper-container CFAslider"><ul class="swiper-wrapper gutenberg-swiper-block">';
	foreach ($attributes['ids'] as $imgID) {
		//$code .=print_r($imgID);
		$imgAttr = wp_get_attachment_image_src($imgID,"medium", false);
		$code .= '<li class="swiper-slide gallery-item">';
		$code .= '<img data-src="'.$imgAttr[0].'" class="swiper-lazy" />';
		$code .= '<small>'.wp_get_attachment_caption($imgID).'</small>';
		$code .= '</li>';
	}
	$code .= '<span class="swiper-lazy-preloader"></span>';
	$code .= '</ul>';
	$code .= '<div class="swiper-pagination"></div>';
	$code .= '<div class="prevContainer"></div>';
	$code .= '<div class="nextContainer"></div>';
	$code .= '</div>';

	return $code;
}
function cfa_register_gallery() {
	register_block_type( 'core/gallery', array(
		'render_callback' => 'cfa_gallery_render',
	) );
}
// add_action( 'init', 'cfa_register_gallery' );






function loadfullwidthBlock() {
  wp_enqueue_script(
    'full-width-block',
    plugin_dir_url(__FILE__) . 'full-width-block.js',
    array('wp-blocks','wp-editor'),
    true
  );
}
   
add_action('enqueue_block_editor_assets', 'loadfullwidthBlock');





?>