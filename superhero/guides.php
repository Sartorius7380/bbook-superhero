<?php
/**
 * Template Name: Guides Page
 *
 *
 * @package Superhero
 * @since Superhero 1.0
 */

get_header(); ?>

<?php get_template_part('content', 'guide'); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>