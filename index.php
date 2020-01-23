<?php
/*
Template:spun
Theme Name:spun-child
Theme URI:
Description:spunの子テーマです
Author:mariko
Version:1.0
*/

get_header(); ?>

		<div id="primary" class="content-area">
			<div id="content" class="site-content archive-top" role="main">
			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'home' );
					?>

				<?php endwhile; ?>

	<?php spun_content_nav( 'nav-below' ); ?>


			<?php elseif ( current_user_can( 'edit_posts' ) ) : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>