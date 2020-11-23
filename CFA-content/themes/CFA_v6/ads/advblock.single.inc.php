<?php
$pagenum = get_query_var('paged') ? get_query_var('paged') : 1 ;
$sponsorIDS = get_field('select_ads_to_display',$post->ID);
$advinsert = get_posts(array(
  'include'     => $sponsorIDS,
  'numberposts' => 1,
  'post_status' => 'publish',
  'post_type'   => 'cfa_sponsors',
  'orderby'     => 'rand',
));
if (!empty($advinsert)) {
  $currentTS = time();
  $advpost = $advinsert[0];
  $advdisplay = get_field('post_sponsor_display',$post->ID);
  $advposition = get_field('post_sponsor_position',$post->ID);
  $advpics = get_field('sponsor_post_pic',$advpost->ID);
  $advStart = get_field('sponsor_start_date',$advpost->ID);
  $advEnd = get_field('sponsor_end_date',$advpost->ID);



  if ( $advdisplay == true && $currentTS > $advStart && $currentTS < $advEnd  ) {

      $advout = '<div id="spcontainer">';
      $advout .= '  <section id="spblock-inarticle-'.$advpost->post_title.'" class="inarticle-spinsert">';
      $advout .= '  <a href="'.get_field("sponsor_url",$advpost->ID).'?cid=CFA" target="_blank" rel="nofollow noopener" class="post-spinsert">';
      $advout .= '    <img src="'.$advpics["sizes"]["1536x1536"].'" width="'.$advpics["sizes"]["1536x1536-width"].'" height="'.$advpics["sizes"]["1536x1536-height"].'" class="post-spinsert-image left" />';
      $advout .= '    <span class="post-spinsert-logo" id="'.$advpost->post_title.'">';
      $advout .= '      <img src="'.get_field('sponsor_post_logo',$advpost->ID).'" /';
      $advout .= '    </span>';
      $advout .= '  </a>';
      $advout .= '  <button id="spblock-close">X</button>';
      $advout .= '  </section>';
      $advout .= '</div>';

      // print_r( $sponsorIDS);
      // print_r( $advposition);
      // print_r( $advpics);
      // print_r( $advStart);
      // print_r( $advEnd);

      echo $advout;
  }

  

}
?>

