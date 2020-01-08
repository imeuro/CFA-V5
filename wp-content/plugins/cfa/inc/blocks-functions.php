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




function cfa_image_render( $attributes, $content ) {
	$code = '<figure class="wp-block-image '.$attributes['className'].'">';
	$code .= wp_get_attachment_image($attributes['id'],$attributes['sizeSlug'], false, array( "loading" => "lazy", "class" => "img-responsive" ));
	$code .= '</figure>';

	return $code;
}
function cfa_register_image() {
	register_block_type( 'core/image', array(
		'render_callback' => 'cfa_image_render',
	) );
}
add_action( 'init', 'cfa_register_image' );
?>