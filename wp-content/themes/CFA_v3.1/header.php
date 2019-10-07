<!DOCTYPE html>
<html <?php language_attributes();?>>

  <head>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5MLKFBX');</script>
      <!-- End Google Tag Manager -->
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
      <link href="http://www.conceptualfinearts.com/cfa/favicon.ico" rel="shortcut icon" type="image/x-icon" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
      <?php wp_head(); ?>
      <?php if ($_GET["print"]=="enabled") : ?>
        <script>window.self.print();</script>
      <?php endif; ?>
  </head>

  <body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5MLKFBX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="whitecurtain"></div>

<div id="blackcurtain">

	<div class="whitestripe"></div>

	<div id="menu-coldx" class="hidden">
    <div class="fullcol">
    <?php
    $about_us = get_post( 1 );
    $title = $about_us->post_title;
    $content =  get_field('riassunto',1);
    ?>
      <h3 class="clickable"><a href="<?php echo get_permalink($about_us->ID).'#menu'; ?>"><?php echo strtoupper($title); ?></a></h3>
      <p><?php echo $content; ?></p>
    </div>
  </div>

	<div id="patrons-coldx" class="hidden">
    <div class="fullcol">
	    <?php
	    $patrons = get_post( 7701 );
	    $title = $patrons->post_title;
	    $content = get_field('riassunto',7701);
	    ?>
      <h3 class="clickable"><?php echo strtoupper($title); ?></h3>
      <p><?php echo $content; ?></p>
    </div>
  </div>

  <div id="menu-colsx" class="hidden">
    <div class="fullcol">
      <h3 class="clickable"><a class="search_menu">SEARCH</a></h3>
      <div class="search_submenu submenu hidden"><?php get_search_form(); ?></div>

      <h3 class="clickable"><a class="sections_menu" title="Sections">SECTIONS</a></h3>
      <div class="sections_submenu submenu hidden"><?php echo get_page_by_path( 'sections' )->post_content; ?></div>

      <h3><a href="<?php echo get_permalink( get_page_by_path( 'newsletter' ) ).'#menu'; ?>" title="NEWSLETTER">NEWSLETTER</a></h3>

      <h3><a href="<?php echo get_permalink( get_page_by_path( 'hashcloud' ) ).'#menu'; ?>" title="A-Z index">A-Z INDEX</a></h3>

      <h3><a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ).'#menu'; ?>" title="Timetable">TIMETABLE</a></h3>
    </div>
  </div>

  <div id="patrons-colsx" class="hidden">
    <div class="fullcol">
	    <?php
	    $patrons = get_post( 7701 );
	    $title = $patrons->post_title;
	    $content = $patrons->post_content;
	    ?>
      <p><?php echo $content; ?></p>
    </div>
  </div>

</div>

 	<!-- logo and navigation -->
 <nav id="site-navigation">

    <div id="main-nav-wrapper" class="<?php if (!is_home() || !is_front_page()) : echo 'single '; endif; ?>left on">

        <div id="logo">
          <img class="ready" width="280" height="93" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo280.png" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
					<div id="patrons-btn"></div>
					<div id="menu-btn"></div>
        </div>

    </div>
  </nav>

<div class="clear"></div>
<div id="wrap">
  <div id="header"></div>
