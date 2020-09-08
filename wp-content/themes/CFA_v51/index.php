<?php
/**
 * Theme index file
 */
?>

<?php get_header(); ?>
<span id="trigger"></span>
<?php if (have_posts()) : ?>
<div id="post-area"><!--class="scroller"-->

<?php
$currentTS = time();
$postnum=0;
while (have_posts()) : the_post();
$postnum++;
$pagenum = get_query_var('paged') ? get_query_var('paged') : 1 ;

$advposts = get_posts(array(
  'numberposts' => 1,
  'post_status' => 'publish',
  'post_type'   => 'cfa_sponsors',
  'meta_key'    => 'sponsor_position',
  'meta_value'  => $postnum
));
if (!empty($advposts)) {
  $advpost = $advposts[0];
  $advpics = get_field('sponsor_pics',$advpost->ID);
  $advStart = get_field('sponsor_start_date',$advpost->ID);
  $advEnd = get_field('sponsor_end_date',$advpost->ID);
  ?>
  <?php 

    
  if (($currentTS > $advStart && $currentTS < $advEnd ) && $pagenum === 1) {
    ?>
    <article id="post-<?php echo $advpost->ID; ?>" class="post type-post has-post-thumbnail hentry status-publish format-adv3 post-ad-insert">
      <div class="adv-block newitem">
      <a href="<?php echo get_field('sponsor_url',$advpost->ID); ?>?cid=CFA" target="_blank" class="left">
          <div class="adv-image">
            <?php foreach ($advpics as $advpic) {
              $advpicsrc =  wp_get_attachment_image_src($advpic["sponsor_pic"]["ID"], 'large' );
              echo '<img src="'.$advpicsrc[0].'" loading="lazy" />';
            }
            ?>
          </div>
          <div class="adv-copy" id="<?php echo $advpost->post_title ?>">
            <p><img src="<?php echo get_field('sponsor_logo',$advpost->ID); ?>" loading="lazy" /></p>
          </div>
      </a>
      </div>  
    </article>
  <?php
  }
}

 ?>
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

<?php 



endwhile; ?>
</div>
<?php else : ?>

<article id="post-0" class="post no-results not-found">
        <header class="entry-header">
          <h1 class="entry-title"><?php _e( 'Nothing Found', 'pinbin' ); ?></h1>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'pinbin' ); ?></p>
          <?php get_search_form(); ?>
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
