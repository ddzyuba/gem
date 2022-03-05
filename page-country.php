<?php
/**
 * Template Name: Country
 *
 *
 * @package Stones-2021
 */

get_header();
?>

	<main id="primary" class="site-main page-normal">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'country' );

		endwhile; // End of the loop.
		?>

	</div><!-- #primary -->

<?php
get_footer();
