<?php /*
Template Name: lightbox-page
*/ ?>

<?php get_header('noheader'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       			<div class="pinbin-copy container">
           		   <?php the_content(); ?>                 
         		</div>          
       </article>
		<?php endwhile; endif; ?>      
<?php get_footer('nofooter'); ?>
