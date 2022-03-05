<?php
/**
 * The template for displaying Front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( class_exists( 'acf' ) ) {
			get_template_part( 'template-parts/content', 'front' );
		} else {
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'page' );
			endwhile; // End of the loop.
		}
		?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
