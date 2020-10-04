<?php
/**
 * Single post template
 */

?>
<?php get_header(); 

$advinsert = get_posts(array(
  'numberposts' => 1,
  'post_status' => 'publish',
  'post_type'   => 'cfa_sponsors',
  'meta_key'    => 'sponsor_position',
  //'meta_value'  => $postnum,
  'orderby'     => 'rand',
));
if (!empty($advinsert)) {
  $currentTS = time();
  $advpost = $advinsert[0];
  $advpics = get_field('sponsor_pics',$advpost->ID);
  $advStart = get_field('sponsor_start_date',$advpost->ID);
  $advEnd = get_field('sponsor_end_date',$advpost->ID);
}
?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

   		<article id="post-<?php the_ID(); ?>" <?php post_class('scroller'); ?>>

        <div class="pinbin-copy">

          <?php
        if (!get_field('author_name',$post->ID)) :  // old format ?>
          <h1><?php the_title(); ?></h1>
        <?php else :  // new format ?>
          <h1><?php the_title(); ?></h1>
          <div class="post-data">
            <small class="author">
            <?php if (get_field('author_link_int',$post->ID)) {
              $authPostID = get_field('author_link_int',$post->ID);
              ?>
              <a href="<?php echo get_permalink($authPostID[0]); ?>" title="View <?php echo get_field('author_name',$post->ID); ?>'s bio"><?php the_field('author_name',$post->ID); ?></a>
            <?php } elseif (get_field('author_link_ext',$post->ID)) { ?>
              <a href="http://<?php the_field('author_link_ext',$post->ID); ?>" title="View <?php echo get_field('author_name',$post->ID); ?>'s bio"><?php the_field('author_name',$post->ID); ?></a>
            <?php } else { ?>
              <?php the_field('author_name',$post->ID); ?>
            <?php } ?>
            </small>
          </div>
        <?php endif; ?>

        <div class="clear"></div>

					<?php if (has_excerpt()): ?>
						<div class="container excerpt-container">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>
          


        <?php
        if (!empty($advinsert) && ($currentTS > $advStart && $currentTS < $advEnd) ) {
        ?>
        <section id="ADVblock-inarticle-<?php echo $advpost->post_title; ?>" class="type-post post-spinsert inarticle-ad-insert">
          <div class="spblock newitem">
            <a href="<?php echo get_field('sponsor_url',$advpost->ID); ?>?cid=CFA" target="_blank" rel="nofollow noopener" class="left">
                <div class="spimage">
                  <?php foreach ($advpics as $advpic) {
                    $advpicsrc =  wp_get_attachment_image_src($advpic["sponsor_pic"]["ID"], 'medium' );
                    echo '<img src="'.$advpicsrc[0].'" loading="lazy" />';
                  }
                  ?>
                </div>
                <div class="spcopy" id="<?php echo $advpost->post_title ?>">
                  <p><img src="<?php echo get_field('sponsor_logo',$advpost->ID); ?>" loading="lazy" /></p>
                </div>
            </a>
          </div>
        </section>
        <?php
        }
        ?>


          <?php if (get_field('display_automatic_summary')): ?>
            <div class="container summary-container"></div>
          <?php endif; ?>

          <?php the_content('Read more'); ?>

          <div class="clear"></div>

          <p class="post-pubdate"><?php echo get_post_modified_time('F j, Y'); ?></p>

          <div class="clear"></div>

        </div>


        <div class="posttags"><?php the_tags('<h3 class="posttags-title">Tags:</h3> ',', ',' '); ?></div>

        <div class="clear"></div>

        <div class="share-link">
          <div class="share-link-title">Share this page:</div>

          <ul class="share-link-buttons-list">
            <li class="share-link-buttons">
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()) ?>" class="share-link-facebook" title="Share via Facebook" target="_blank" rel="nofollow noopener">
                <img alt="Share via Facebook" width="48" height="48" src="<?php echo get_template_directory_uri(); ?>/images/noun_FB.svg" />
              </a>
            </li>
            <li class="share-link-buttons share-link-buttons-whatsapp">
              <a href="whatsapp://send?text=<?php echo urlencode(get_the_title()) ?>:+<?php echo urlencode(get_permalink()) ?>" class="share-link-whatsapp" title="Share via WhatsApp" target="_blank" rel="nofollow noopener">
                <img alt="Share via WhatsApp" width="48" height="48" src="<?php echo get_template_directory_uri(); ?>/images/noun_WA.svg"></a>
            </li>
            <li class="share-link-buttons">
              <a href="http://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo urlencode(get_permalink()) ?>&amp;name=<?php echo urlencode(get_the_title()) ?>" class="share-link-tumblr" title="Share via Tumblr" target="_blank" rel="nofollow noopener">
                <img alt="Share via Tumblr" width="48" height="48" src="<?php echo get_template_directory_uri(); ?>/images/noun_TB.svg">
              </a>
            </li>
            <li class="share-link-buttons">
              <a href="mailto:?Subject=<?php echo urlencode(get_the_title()) ?>&amp;Body=Hi,%20I%20found%20this%20article%20and%20thought%20you%20might%20like%20this:%20<?php echo urlencode(get_permalink()) ?>" class="share-link-email" title="Share via Email" rel="nofollow">
                <img alt="Share via Email" width="48" height="48" src="<?php echo get_template_directory_uri(); ?>/images/noun_ML.svg">
              </a>
            </li>
            <li class="share-link-buttons share-link-buttons-print">
              <a class="share-link-print" href="?print=enabled" target="_blank" rel="nofollow noopener" title="Print this Page" rel="nofollow">
                <img alt="Print this Page" width="48" height="48" src="<?php echo get_template_directory_uri(); ?>/images/noun_PR.svg">
              </a>
            </li>
          </ul>
        </div>

        <div class="clear"></div>

      </article>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>
