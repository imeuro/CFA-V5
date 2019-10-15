<?php /*
Template Name: home ITA
*/ ?>

<?php get_header(); ?>
<span id="trigger"></span>
<?php

$ITargs = array(
  'post_type'              => array( 'cfa_translations' ),
  'post_status'            => array( 'publish' ),
  'nopaging'               => false,
  'posts_per_page'         => '10',
  'paged' => get_query_var('paged') ? get_query_var('paged') : 1
);

// The Query
$ITquery = new WP_Query( $ITargs );

// The Loop
if ( $ITquery->have_posts() ) { ?>
  <div id="post-area"><!--class="scroller"-->

<?php
  $postnum=0;
  while ( $ITquery->have_posts() ) {
    $ITquery->the_post();
    $postnum++;
?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

         <?php
          $attachments = get_children(array('post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order'));
            if ($attachments || has_post_thumbnail()) {
                  if ( ! is_array($attachments) ) continue;
                  $count = count($attachments);
                  $first_attachment = array_shift($attachments);
                  ?>
              <div class="pinbin-image newitem">
                <a href="<?php the_permalink(); ?>" class="left">
                  <?php
                  // check if the post has a Post Thumbnail assigned to it.
                  if ( has_post_thumbnail() ) {
                    $imgsrc =  wp_get_attachment_image_src($first_attachment->ID, 'medium' );
                    $imgsrcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post->ID), 'medium' );
                    //$imgsizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post->ID), 'medium' );
                    echo '<img src="'.$imgsrc[0].'" srcset="'.$imgsrcset.'" sizes="(min-width: 769px) 640px, (min-width: 767px) 320px, (min-width: 480px) 640px, 320px" />';
                  } else {
                    $imgsrc =  wp_get_attachment_image_src($first_attachment->ID, 'medium' );
                    $imgsrcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post->ID), 'medium' );
                    $imgsizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post->ID), 'medium' );
                    echo '<img src="'.$imgsrc[0].'" srcset="'.$imgsrcset.'" sizes="'.$imgsizes.'" />';
                  }
                  ?>
                  <div class="pinbin-copy">
                    <p>
                      <small><?php the_time('F j, Y'); ?></small><br />
	                    <?php
	                    if (get_the_title()!='') :
	                       echo '<strong>'.get_the_title().'</strong>';
	                    endif;
											if (has_excerpt($post->ID)) :
	                    	echo '<span>'.get_the_excerpt().'</span>';
	                    endif;
		                  ?>
		                </p>
		              </div>
                </a>
              </div>
              <?php }
              else { ?>
               <div class="pinbin-text">
               <h2><a href="<?php the_permalink() ?>" class="left"><span><?php
                  $excerpt = get_the_excerpt();
                  echo string_limit_words($excerpt,25);
                  ?></span> <br />continue...</a></h2>
              </div>
              <?php } ?>
        </article>

<?php } ?>
</div>
<?php } else { ?>

<article id="post-0" class="post no-results not-found">
        <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'Nothing Found', 'pinbin' ); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pinbin' ); ?></p>
          <?php get_search_form(); ?>
        </div><!-- .entry-content -->
</article><!-- #post-0 -->

<?php } ?>


    <div id="footerbutton">
      <!--a class="nextpostlink">Load older entries...</a-->
    </div>


    <nav id="nav-below" class="navigation" role="navigation">
        <div class="view-previous"><?php next_posts_link( __( '&#171; Previous', 'pinbin' ),$ITquery->max_num_pages ) ?></div>
        <div class="view-next"><?php previous_posts_link( __( 'Next &#187;', 'pinbin' ),$ITquery->max_num_pages ) ?> </div>
    </nav>
<?php get_footer(); ?>
