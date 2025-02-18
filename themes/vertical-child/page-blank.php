<?php
/*
Template name: Full Width (100%)
*/
get_header(); ?>



<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content(); ?>
			
			<?php endwhile; // end of the loop. ?>


			
</div>
<?php get_footer(); ?>
