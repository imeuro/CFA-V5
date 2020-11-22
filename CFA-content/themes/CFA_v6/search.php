<?php get_header(); ?>
<?php if (have_posts()) : ?>

<h1 class="category-title left"><?php printf( __( 'Search Results for: "%s"', 'pinbin' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
<div style="clear:both"></div>
<div class="category-description"></div>
<div id="post-area">
<?php 
$postnum=0;
while (have_posts()) : the_post(); 
$postnum++;

if ($post->post_type == 'post') { ?>  
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
                $imgsrc =  wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large' );
                echo '<img src="'.$imgsrc[0].'" loading="lazy" />';
              } else {
                $imgsrc =  wp_get_attachment_image_src($first_attachment->ID, 'large' );
                echo '<img src="'.$imgsrc[0].'" loading="lazy" />';
              }
              ?>
              <div class="pinbin-copy">
                <p>
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
          <?php } ?>
  </article>
<?php }
endwhile; ?>
</div>
<?php else : ?>

<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
	    <h1 class="category-title left"><?php printf( __( 'Search Results for: "%s"', 'pinbin' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		<div style="clear:both"></div>
		<div class="category-description">
			<p><?php _e( 'Sorry, but nothing matched your search terms. Please <a href="/cfa/sections/">try again</a> with some different keywords.', 'pinbin' ); ?></p>
		</div>
    </header><!-- .entry-header -->

    <div class="entry-content">
      <?php // get_search_form(); ?>
    </div><!-- .entry-content -->
</article><!-- #post-0 -->

<?php endif; ?>
    <div id="footerbutton">
      <!--a class="nextpostlink">Load older entries...</a-->
    </div>
    
    <nav id="nav-below" class="navigation" role="navigation">
        <div class="view-previous"><?php next_posts_link( __( '&#171; Previous', 'pinbin' ) ) ?></div>
        <div class="view-next"><?php previous_posts_link( __( 'Next &#187;', 'pinbin' ) ) ?> </div>
    </nav> 
<?php get_footer(); ?>