<?php
$pagenum = get_query_var('paged') ? get_query_var('paged') : 1 ;

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
  $advformat = get_field('sponsor_format',$advpost->ID);
  $advpics = get_field('sponsor_pics',$advpost->ID);
  $advStart = get_field('sponsor_start_date',$advpost->ID);
  $advEnd = get_field('sponsor_end_date',$advpost->ID);


  if ( ($currentTS > $advStart && $currentTS < $advEnd) ) {
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

}
?>

