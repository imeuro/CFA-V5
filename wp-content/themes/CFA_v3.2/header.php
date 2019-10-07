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

	<div id="menu-coldx" class="hidden">
    <div class="fullcol">
      <span>
        <?php
        $about_us = get_post( 1 );
        $title = $about_us->post_title;
        $content =  apply_filters('the_content',$about_us->post_content);
        $AboutUs_BGimage = wp_get_attachment_image_src( get_post_thumbnail_id( $about_us->ID ), 'full', false );
        ?>
        <?php echo $content; ?>
      </span>
    </div>
  </div>

  <div id="patrons-coldx" class="hidden">
    <div class="fullcol">
      <span>
        <?php
        $patrons = get_post( 7701 );
        $title = $patrons->post_title;
        $content = $patrons->post_content;
        $Patrons_BGimage = wp_get_attachment_image_src( get_post_thumbnail_id( $patrons->ID ), 'full', false );
        ?>
        <p><?php echo $content; ?></p>
      </span>
    </div>
  </div>


  <div id="residency-coldx" class="hidden">
    <div class="fullcol">
			<span>
	    <?php
	    $residency = get_post( 12830 );
	    $title = $residency->post_title;
	    $content =  apply_filters('the_content',$residency->post_content);
	    $Residency_BGimage = wp_get_attachment_image_src( get_post_thumbnail_id( $residency->ID ), 'full', false );
	    ?>
      <h2 class="clickable"><a href="<?php echo get_permalink($residency->ID).'#residency'; ?>"><?php echo strtoupper($title); ?></a></h2>
      <?php echo $content; ?>
			</span>
    </div>
  </div>


  <div id="menu-colsx" class="hidden">
    <div class="fullcol">
      <span>
        <h3 class="clickable"><a class="search_menu">SEARCH</a></h3>
        <div class="search_submenu submenu hidden"><?php get_search_form(); ?></div>

        <h3 class="clickable"><a class="sections_menu" title="Sections">SECTIONS</a></h3>
        <div class="sections_submenu submenu hidden"><?php echo get_page_by_path( 'sections' )->post_content; ?></div>

        <h3><a href="<?php echo get_permalink( get_page_by_path( 'newsletter' ) ).'#menu'; ?>" title="NEWSLETTER">NEWSLETTER</a></h3>

        <h3><a href="<?php echo get_permalink( get_page_by_path( 'hashcloud' ) ).'#menu'; ?>" title="A-Z index">A-Z INDEX</a></h3>

        <h3><a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ).'#menu'; ?>" title="Timetable">TIMETABLE</a></h3>
      </span>
    </div>
  </div>

	<style>
		#blackcurtain.menu.show {
				background: url('<?php echo $AboutUs_BGimage[0] ?>') no-repeat center center rgba(255,255,255,0.85);
				background-size: cover;
		}
		#blackcurtain.patrons.show {
				background: url('<?php echo $Patrons_BGimage[0] ?>') no-repeat center center rgba(255,255,255,0.85);
				background-size: cover;
		}
		#blackcurtain.residency.show {
				background: url('<?php echo $Residency_BGimage[0] ?>') no-repeat center center rgba(255,255,255,0.85);
				background-size: cover;
		}
	</style>

</div>

 	<!-- logo and navigation -->
 <nav id="site-navigation">

    <div id="main-nav-wrapper" class="<?php if (!is_home() || !is_front_page()) : echo 'single '; endif; ?>left on">

        <div id="logo">
					<?php include(get_stylesheet_directory().'/images/logo-CFA.svg'); ?>
					<div id="residency-btn"></div>
          <div id="menu-btn"></div>
					<div id="patrons-btn"></div>
        </div>

    </div>
  </nav>

<div class="clear"></div>
<div id="wrap">
  <div id="header"></div>
