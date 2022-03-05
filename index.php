<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container-2 page-normal">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title heading-normal text-navy-blue__heading"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'blog-post' );

			endwhile;

			global $wp_query;
			$pages_of_posts = (int) $wp_query->max_num_pages;
			$new_paged      = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			bineks_pagination( $pages_of_posts, $new_paged, 'blog' );

			if ( shortcode_exists( 'elfsight_instagram_feed' ) ) : ?>
			<div class="instagram-wrapper">
				<h3 class="instagram-heading heading-normal text-navy-blue__heading"><?php esc_html_e( 'Our Instagram', 'stones' ); ?></h3>
				<?php echo do_shortcode( '[elfsight_instagram_feed id="1"]' ); ?>
			</div>
			<?php
			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
