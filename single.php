<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Spun
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php /*
					   * Are we using a post format? If so, use the content-someformat.php template.
					   * If not, use the content-single.php template.
					   */
				?>
				<?php ( '' != get_post_format() ) ? $format = get_post_format() : $format = 'single'; ?>

				<?php get_template_part( 'content', $format ); ?>
				<?php spun_content_nav( 'nav-below' ); ?>




			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>