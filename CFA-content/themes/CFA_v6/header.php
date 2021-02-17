<!DOCTYPE html>
<?php 
if (is_page('it') || get_post_type(get_the_ID()) == 'cfa_translations') : 
  $lang = 'IT'; 
  $lang_attr = "it-IT";
else: 
  $lang = 'EN'; 
  $lang_attr = "en-US";
endif; 
?>
<html lang="<?php echo $lang_attr;?>">

  <head>
    	<meta charset="<?php bloginfo('charset'); ?>" />
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
      <meta name="description" content="<?php
        if ( is_home() || is_page('it') ) : bloginfo('description');
        else :
          global $post;
          setup_postdata( $post );
          $post_desc = get_the_excerpt();
          $post_desc = str_replace('&nbsp; ','',$post_desc);
          echo $post_desc;
        endif;
      ?>">
      <meta name="language" content="<?php echo $lang; ?>">
      <title><?php wp_title('&#124;', true, 'right'); ?></title>

      <link rel="apple-touch-icon" sizes="180x180" href="https://www.conceptualfinearts.com/apple-touch-icon.png?v60">
      <link rel="icon" type="image/png" sizes="32x32" href="https://www.conceptualfinearts.com/favicon-32x32.png?v60">
      <link rel="icon" type="image/png" sizes="16x16" href="https://www.conceptualfinearts.com/favicon-16x16.png?v60">
      <link rel="manifest" href="https://www.conceptualfinearts.com/site.webmanifest?v60">
      <link rel="mask-icon" href="https://www.conceptualfinearts.com/safari-pinned-tab.svg?v60" color="#5bbad5">
      <link rel="shortcut icon" href="https://www.conceptualfinearts.com/favicon.ico?v60">
      <meta name="msapplication-TileColor" content="#da532c">
      <meta name="theme-color" content="#ffffff">

      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
<div id="whitecurtain"><img src="<?php echo get_template_directory_uri(); ?>/images/cross.gif" alt="loading..." style="width: 25px;"></div>

 	<!-- logo and navigation -->

<?php if (isset($_GET["print"]) && $_GET["print"] == 'enabled') : ?>
<div id="logo-print">
	<img src="<?php echo get_template_directory_uri(); ?>/images/CFA_logo_v6.svg" width="283" alt="CONCEPTUAL FINE ARTS" />
</div>
<?php endif; ?>

 <nav id="site-navigation">

    <div id="main-nav-wrapper">

      <button id="hambmenu" aria-label="Site Menu">
        <?php include("images/hamburger.svg"); ?>
      </button>

		<?php if (is_home() || is_front_page() || is_archive() || is_search() || is_page('it')) :
			echo '<h1 id="logo"><a href="'.get_home_url().'" title="Conceptual Fine Arts - Homepage">';
      include("images/CFA_logo_v6_BLACK.svg");
      echo '</a></h1> ';
		else:
			echo '<div id="logo"><a href="'.get_home_url().'" title="Conceptual Fine Arts - Homepage">';
      include("images/CFA_logo_v6_BLACK.svg");
      echo '</a></div>';
		endif; ?>

    <div class="sidemenu">
  		<?php
  		wp_nav_menu( array(
  	    'menu'				=> 'Header-menu',
  			'menu_id'			=> 'header-menu',
  			'container'			=> 'ul',
  		) );
  		?>

  		<div id="lang-switcher" class="menu">
  			<?php
  				if ( function_exists('get_langswitcherDOM') ) {
  					echo get_langswitcherDOM(); // plugins/cfa/index.php
  				}
  			?>
  		</div>

    </div>

	</div>


  </nav>

  <?php // if (is_home() || is_front_page() || is_archive() || is_search() || is_page('it')) :
    echo '<div class="WLOGO"><a href="'.get_home_url().'" title="Conceptual Fine Arts - Homepage">';
    include("images/CFA_logo_v6_WHITE.svg");
    echo '</a></div> ';
  // endif; ?>
<div class="clear"></div>
<?php                       
////////////////////////////////////////////
// exhibition banner

if (is_page('it')) :
  $exhi_post_type = 'cfa_translations';
else :
  $exhi_post_type = 'post';
endif;

$args = array(
  'post_type'         => $exhi_post_type,
  'post_status'       => array( 'publish' ),
  'cat'               => array( 2381 ),
  'meta_key'          => 'display_banner',
  'meta_value'        => 1,
  'posts_per_page'    => 1,
  'orderby'           => 'date',
  'order'             => 'DESC'
);
$q = new WP_Query( $args);

if ( ( is_home() || is_page('it') ) && $q->have_posts() ) {   // IF exhibition: print banner

  while ( $q->have_posts() ) {
    $q->the_post(); 
    if ( has_post_thumbnail() ) {
      $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
    }
    ?>
    <div id="exhibition-banner" style="background-image: url('<?php echo $imgsrc[0]; ?>')">
      <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> 
        <h4>ONLINE EXHIBITION</h4>
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
      </a>
    </div>
    <?php
  }
  wp_reset_postdata(); ?>

  <div id="wrap" class="with-exhibition">
<?php 
} else {                      // ELSE IF NO exhibition
?>
  <div id="wrap">
<?php } 
?>


