<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Stones-2021
 */

get_header();
?>

	<main id="primary" class="site-main page-normal">

		<section class="error-404 not-found">
			<div class="container">
				<header class="page-header">
					<h1 class="page-title heading-normal text-navy-blue__heading"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'stones' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'stones' ); ?></p>

						<?php
						get_search_form();
						?>
				</div><!-- .page-content -->
			</div><!-- .container -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
