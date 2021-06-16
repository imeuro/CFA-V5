<?php
/**
 * Error page displayed when no results are found
 */

?>

<?php get_header(); ?>
		
		<article id="post-type-404" <?php post_class('scroller'); ?>>
   			<div class="pinbin-copy single-pinbin-copy">
				<h1><?php _e( 'Page Not Found', 'pinbin') ?></h1>
				<p>Apologies, the article at the URL you requested is not available.</p>

				<p><?php _e( 'You might try the following:', 'pinbin') ?></p>
				<ul class="page404exits">
					<li><?php _e( 'Check spelling', 'pinbin') ?></li>
					<li><a href="<?php echo esc_url( home_url() ); ?>/"><?php _e( 'Return to  home page', 'pinbin') ?></a></li>
					<li><?php _e( 'Click ', 'pinbin') ?> <a href="javascript:history.back()"><?php _e( 'Return button', 'pinbin') ?></a></li>
				</ul>

			</div>
      </article>



<?php get_footer(); ?>
