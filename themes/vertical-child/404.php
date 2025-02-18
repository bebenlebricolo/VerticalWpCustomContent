<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package flatsome
 */

get_header(); ?>

<div  class="page-wrapper">
<div class="row">

	
<div id="content" class="large-12 left columns" role="main">
		<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Désolé ! Cette page n\'a pu être trouvé.', 'flatsome' ); ?></h1>
				</header><!-- .entry-header -->
				<?php get_search_form(); ?>
				<div class="entry-content">


		<p>Désolé ! De deux choses l'une : ou nous bossons sur le site, et il est indisponible pendant quelques temps, ou la page que tu cherche n'existe plus.
		 Dans tous les cas, nous te conseillons de revenir plus tard ou de regarder cette vidéo de magie époustouflante :</p><br>
		 <center><iframe width="420" height="315" src="https://www.youtube.com/embed/6Xw--nJ1c7k" frameborder="0" allowfullscreen></iframe></center>
		 <br>
		 <br>
		 <p>Vous pouvez aussi nous suivre sur Facebook : <a href="http://www.facebook.com/assovertical" title="Facebook officiel de Vertical Association">Vertical Association</a></p>

					

								</div><!-- .entry-content -->
			</article><!-- #post-0 .post .error404 .not-found -->


</div><!-- end #content large-9 left -->

</div><!-- end row -->
</div><!-- end page-right-sidebar container -->


<?php get_footer(); ?>


	
