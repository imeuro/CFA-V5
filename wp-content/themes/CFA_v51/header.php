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
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <!--meta name="keywords" content="a list, of keywords, separated, by commas"-->
      <meta name="description" content="<?php
        if ( is_home() || is_page('it') ) : bloginfo('description');
        else :
          global $post;
          setup_postdata( $post );
          $post_desc = get_the_excerpt();
          //$post_desc = substr($post_desc, 7);  // toglie "&nbsp; " all'inizio
          $post_desc = str_replace('&nbsp; ','',$post_desc);
          echo $post_desc;
        endif;
      ?>">

      <?php 
      // if (is_page('it') || get_post_type(get_the_ID()) == 'cfa_translations') : 
      // 	$lang = 'IT'; 
      // else: 
      // 	$lang = 'EN'; 
      // endif; 
      ?>
      <meta name="language" content="<?php echo $lang; ?>">
      <title><?php wp_title('&#124;', true, 'right'); ?></title>
      <link href="https://www.conceptualfinearts.com/cfa/favicon.ico" rel="shortcut icon" type="image/x-icon" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
<div id="whitecurtain"></div>

 	<!-- logo and navigation -->

<div id="logo-print">
	<img src="<?php echo get_template_directory_uri(); ?>/images/logo-CFA-orange.svg" width="283" alt="CONCEPTUAL FINE ARTS" />
</div>

 <nav id="site-navigation">

    <div id="main-nav-wrapper" class="<?php if (!is_home() || !is_front_page() || !is_page('it')) : echo 'single '; endif; ?>left on">
		<?php if (is_home() || is_front_page() || is_page('it')) :
			echo '<h1 id="logo">CONCEPTUAL FINE ARTS</h1> ';
		else:
			echo '<div id="logo">CONCEPTUAL FINE ARTS</div>';
		endif; ?>

		<?php
		wp_nav_menu( array(
	    	'menu'				=> 'Header-menu',
			'menu_id'			=> 'header-menu',
			'container'			=> 'ul',
		) );
		?>

		<div id="lang-switcher">
			<?php
				if ( function_exists('get_langswitcherDOM') ) {
					echo get_langswitcherDOM(); // plugins/cfa/index.php
				}
			?>
		</div>

		<div id="social-pad">
			<ul>
				<li class="FB_btn"><a href="https://www.facebook.com/Conceptualfinearts" target="_blank">FB</a></li>
				<li class="IG_btn"><a href="https://www.instagram.com/conceptual_fine_arts/" target="_blank">IG</a></li>
			</ul>
		</div>

	</div>

  </nav>

<div class="clear"></div>
<div id="wrap">