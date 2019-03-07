<!DOCTYPE html>
<html <?php language_attributes();?>>

  <head>
    	<meta charset="<?php bloginfo('charset'); ?>" />
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <!--meta name="keywords" content="a list, of keywords, separated, by commas"-->
      <meta name="description" content="<?php
        if ( is_home() ) : bloginfo('description');
        else :
          global $post;
          setup_postdata( $post );
          $post_desc = get_the_excerpt();
          //$post_desc = substr($post_desc, 7);  // toglie "&nbsp; " all'inizio
          $post_desc = str_replace('&nbsp; ','',$post_desc);
          echo $post_desc;
        endif;
      ?>">
      <meta name="language" content="EN">
      <title><?php wp_title('&#124;', true, 'right'); ?></title>
      <link href="https://www.conceptualfinearts.com/cfa/favicon.ico" rel="shortcut icon" type="image/x-icon" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      <?php wp_head(); ?>
      <?php if ($_GET["print"]=="enabled") : ?>
        <script>window.self.print();</script>
      <?php endif; ?>
  </head>

  <body <?php body_class(); ?>>
<div id="whitecurtain"></div>

 	<!-- logo and navigation -->
 <nav id="site-navigation">

    <div id="main-nav-wrapper" class="<?php if (!is_home() || !is_front_page()) : echo 'single '; endif; ?>left on">
			<?php if (is_home() || is_front_page()) :
				echo '<h1 id="logo">CONCEPTUAL FINE ARTS</h1> ';
			else:
				echo '<div id="logo">CONCEPTUAL FINE ARTS</div>';

			endif; ?>

			<?php if(is_page('about-us')): ?>
				<div id="headline">
					<?php
						$count_posts = wp_count_posts();
						$doubled_posts = str_split($count_posts->publish * 2);
						$split_count_posts = '';
						foreach ($doubled_posts as $number) {
							$split_count_posts .= "<span>".$number."</span>";
						}
					?>
					<span class="headline1"><span class="postcount"><?php echo $split_count_posts; ?></span> art writings and</span>
					<span class="headline2">a meta-gallery space</span>
				</div>
			<?php endif; ?>

			<?php
			wp_nav_menu( array(
		    'menu'				=> 'Header-menu',
				'menu_id'			=> 'header-menu',
				'container'			=> 'ul',
			) );
			?>

	    <div id="lang-switcher">
				<?php
					if ( class_exists( 'WPGlobus' ) ) {
						//print_r(WPGlobus::Config());
						foreach( WPGlobus::Config()->enabled_languages as $lang ) {
							if ( $lang == WPGlobus::Config()->language ) {
								echo  "<span>".$lang."</span>";
								continue;
							}
							echo ' <a href="' . WPGlobus_Utils::localize_current_url( $lang ). '">' . $lang . '</a>';
						}
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
