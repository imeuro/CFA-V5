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
  $advposition = get_field('sponsor_position',$post->ID);
  $advformat = get_field('sponsor_format',$post->ID);
  $advpics = get_field('sponsor_pics',$advpost->ID);
  $advStart = get_field('sponsor_start_date',$advpost->ID);
  $advEnd = get_field('sponsor_end_date',$advpost->ID);


  if ( $currentTS > $advStart && $currentTS < $advEnd  ) {

    $advout = '<section id="ADVblock-inarticle-'.$advpost->post_title.'" class="type-post post-spinsert inarticle-spinsert inarticle-spinsert-'.$advposition.' inarticle-spinsert-'.$advformat.'">';
    $advout .= '  <div class="spblock newitem">';
    $advout .= '    <a href="'.get_field("sponsor_url",$advpost->ID).'?cid=CFA" target="_blank" rel="nofollow noopener" class="left">';
    $advout .= '      <div class="spimage">';
    foreach ($advpics as $advpic) {
      $advpicsrc =  wp_get_attachment_image_src($advpic["sponsor_pic"]["ID"], "medium" );
      $advout .= '        <img src="'.$advpicsrc[0].'" loading="lazy" />';
    }
    
    $advout .= '      </div>';
    $advout .= '      <div class="spcopy" id="'.$advpost->post_title.'">';
    $advout .= '        <p><img src="'.get_field('sponsor_logo',$advpost->ID).'" loading="lazy" /></p>';
    $advout .= '      </div>';
    $advout .= '     </a>';
    $advout .= '  </div>';
    $advout .= '</section>';

    if ($advposition == 'inpage') {
      the_injected_content(2,$advout);
    } else if ($advposition == 'start' || $advposition == 'summary') {
      echo $advout;
    }
    
  }

}
?>

