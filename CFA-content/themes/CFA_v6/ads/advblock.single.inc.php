<?php
// echo 'advblock.single.inc.php';

// cookie vars from CFA-content/plugins/cfa/inc/backend-functions.php
// $cfacookiesp = $_COOKIE["cfa_sp"];
// $threshold = get_field('sponsors_threshold','option');
// print_r($cfacookiesp);
// print_r($threshold);


if ($threshold > $cfacookiesp) {

  $exclusive = get_field('exclusive_sponsorship_in_posts','option');

  if ($exclusive && $exclusive != null) {
    // print_r( $exclusive );
    $advpost = $exclusive;
  } else {
    $advpost = get_posts(array(
      'numberposts' => 1,
      'post_status' => 'publish',
      'post_type'   => 'cfa_sponsors',
      'orderby'     => 'rand',
    ));
  }


  if (!empty($advpost)) {
    $currentTS = time();
    $advexcluded = get_field('exclude_posts_from_sponsorship','option');
    $advdisplay = in_array($post->ID, $advexcluded);
    $advpic = get_field('sponsor_pic_full',$advpost->ID);
    $advStart = get_field('sponsor_start_date',$advpost->ID);
    $advEnd = get_field('sponsor_end_date',$advpost->ID);

    // echo '<br>post->ID: ';
    // print_r( $post->ID);
    // echo '<br>advexcluded: ';
    // print_r( $advexcluded);
    // echo '<br>advdisplay: ';
    // print_r( $advdisplay);
    // echo '<br>advpost: ';
    // print_r( $advpost);
    // echo '<br>advpic: ';
    // print_r( $advpic);
    // echo '<br>advStart: ';
    // print_r( $advStart);
    // echo '<br>advEnd: ';
    // print_r( $advEnd);

    if ( $advdisplay != 1 && $currentTS > $advStart && $currentTS < $advEnd  ) {

        $advout = '<div id="spcontainer">';
        $advout .= '  <section id="spblock-inarticle-'.$advpost->post_title.'" class="inarticle-spinsert">';
        $advout .= '  <a href="'.get_field("sponsor_url",$advpost->ID).'?cid=CFA" target="_blank" rel="nofollow noopener" class="post-spinsert">';
        $advout .= '    <img src="'.$advpic["sizes"]["1536x1536"].'" width="'.$advpic["sizes"]["1536x1536-width"].'" height="'.$advpic["sizes"]["1536x1536-height"].'" class="post-spinsert-image left" />';
        $advout .= '    <span class="post-spinsert-logo" id="'.$advpost->post_title.'">';
        $advout .= '      <img src="'.get_field('sponsor_post_logo',$advpost->ID).'" /';
        $advout .= '    </span>';
        $advout .= '  </a>';
        $advout .= '  <button id="spblock-close">X</button>';
        $advout .= '  </section>';
        $advout .= '</div>';



        echo $advout;
    }

  }

}

?>

