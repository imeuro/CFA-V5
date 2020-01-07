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




function foo_image_render( $attributes, $content ) {
	/**
	 * Here you find an array with the ids of all 
	 * the images that are in your image.
	 * 
	 * for example: 
	 * $attributes = [
	 *     "ids" => [ 12, 34, 56, 78 ]
	 * ]
	 *
	 * Now have fun querying them,
	 * arrangin them and returning your constructed markup!
	*/
	// print_r($content);
	// print_r($attributes);
	$code = '<figure class="wp-block-image '.$attributes['className'].'">';
	$code .= wp_get_attachment_image($attributes['id'],$attributes['sizeSlug'], false, array( "loading" => "lazy", "class" => "img-responsive" ));
	$code .= '</figure>';

	return $code;
}
function foo_register_image() {
	register_block_type( 'core/image', array(
		'render_callback' => 'foo_image_render',
	) );
}
add_action( 'init', 'foo_register_image' );
?>