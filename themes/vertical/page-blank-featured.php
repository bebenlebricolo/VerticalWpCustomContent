<?php
/*
Template name: Full Width (100%) - Parallax Title
*/
get_header(); ?>

<div class="parallax-title">
<?php while ( have_posts() ) : the_post(); ?>
	<?php ob_start(); ?>
	<header class="entry-header  text-center">
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="tx-div small"></div>
		<?php if( has_excerpt() ) { ?>
		<p class="lead">
			<?php echo do_shortcode(get_the_excerpt()); ?>
		</p>
		<?php } ?>
	</header>
	<?php 
	$bg = '#333';
	if( has_post_thumbnail() ) $bg = get_post_thumbnail_id();
	$header_html = ob_get_contents();
	$header_html = '[ux_banner animate="fadeInUp" bg_overlay="#000" parallax="8" parallax_text="2" height="300px" bg="'.$bg.'"]'.$header_html.'[/ux_banner]';
	ob_end_clean();
	echo do_shortcode($header_html); ?>
<?php endwhile; // end of the loop. ?>
</div>


<div id="content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>

		<?php the_content(); ?>
	
	<?php endwhile; // end of the loop. ?>
			
</div>
<?php get_footer(); ?>
