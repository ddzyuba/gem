<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stones-2021
 */

if ( function_exists( 'get_field' ) ) {
	$heading   = get_field( 'footer_heading', 'option' );
	$text      = get_field( 'footer_text', 'option' );
	$copyright = get_field( 'copyright', 'option' );
	$facebook  = get_field( 'facebook_url', 'option' );
	$instagram = get_field( 'instagram_url', 'option' );
} else {
	$heading   = '';
	$text      = '';
	$copyright = '';
	$facebook  = '';
	$instagram = '';
}
?>

	<footer id="colophon" class="site-footer">
		<div class="container-2">
			<div class="site-footer__menu-wrapper">
				<div class="site-footer__column site-footer__column-1">
					<div class="site-footer__text-wrapper">
						<a class="site-footer__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'title' ); ?>" rel="home">
							<span class="site-footer__logo-svg"></span>
						</a>
						<?php if ( $heading ) : ?>
						<h5 class="site-footer__heading"><?php esc_html_e( $heading ); ?></h5>
						<?php endif; ?>
						<?php if ( $text ) : ?>
						<p class="site-footer__text"><?php esc_html_e( $text ); ?></p>
						<?php endif; ?>
					</div><!-- .site-footer__text-wrapper -->
				</div><!-- .site-footer__column -->

				<div class="site-footer__column site-footer__column-2">
					<?php
					if ( is_active_sidebar( 'footer-column-1' ) ) {
						dynamic_sidebar( 'footer-column-1' );
					}
					?>
				</div><!-- .site-footer__column -->

				<div class="site-footer__column site-footer__column-3">
					<?php
					if ( is_active_sidebar( 'footer-column-2' ) ) {
						dynamic_sidebar( 'footer-column-2' );
					}
					?>
				</div><!-- .site-footer__column -->

				<div class="site-footer__column site-footer__column-4">
					<?php
					if ( is_active_sidebar( 'footer-column-3' ) ) {
						dynamic_sidebar( 'footer-column-3' );
					}
					?>
					<?php
					if ( is_active_sidebar( 'footer-column-4' ) ) {
						dynamic_sidebar( 'footer-column-4' );
					}
					?>
				</div><!-- .site-footer__column -->

				<div class="site-footer__column site-footer__column-5">
					<?php if ( shortcode_exists( 'contact-form-7' ) ) : ?>
						<div class="site-footer__subscribe">
							<h5 class="site-footer__subscribe-heading"><?php esc_html_e( 'Newsletter', 'stones' ); ?></h5>
							<p class="site-footer__subscribe-text-1"><?php esc_html_e( 'Subscribe to our newsletter to stay up to date on our next exhibitions', 'stones' ); ?></p>
							<?php echo do_shortcode( '[contact-form-7 id="212"]' ); ?>
						</div>
					<?php endif; ?>
					<div class="site-footer__social-wrapper">
						<?php if ( $facebook ) : ?>
							<a 
								class="site-footer__social-link site-footer__social-link-facebook" 
								href="<?php echo esc_url( $facebook ); ?>" 
								target="_blank"
								rel="nofollow noopener noreferrer"
								aria-label="<?php esc_html_e( 'Facebook profile link', 'stones' ); ?>"
							><img 
								class="site-footer__social-image" 
								src="<?php echo get_template_directory_uri() . '/assets/img/dist/facebook-footer.svg'; ?>"
								alt="<?php esc_html_e( 'Facebook icon', 'stones' ); ?>"
							/></a>
						<?php endif; ?>
						<?php if ( $instagram ) : ?>
							<a 
								class="site-footer__social-link site-footer__social-link-instagram" 
								href="<?php echo esc_url( $instagram ); ?>" 
								target="_blank"
								rel="nofollow noopener noreferrer"
								aria-label="<?php esc_html_e( 'Instagram profile link', 'stones' ); ?>"
							><img 
								class="site-footer__social-image" 
								src="<?php echo get_template_directory_uri() . '/assets/img/dist/instagram-logo-footer.svg'; ?>"
								alt="<?php esc_html_e( 'Instagram icon', 'stones' ); ?>"
							/></a>
						<?php endif; ?>
					</div>
				</div><!-- .site-footer__column -->
			</div><!-- .site-footer__menu-wrapper -->

			<div class="site-footer__bottom">
				<div class="site-footer__bottom-col-1">
					<nav class="footer-navigation" role="navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
							)
						);
						?>
					</nav><!-- .header-navigation -->
				</div>

				<div class="site-footer__bottom-col-2">
					<div class="site-footer__copyright"><?php echo wp_kses_post( $copyright ); ?></div>
				</div>
			</div><!-- .site-footer__bottom -->
		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Mobile Nav -->
<section id="js-mobile-nav" class="mobile-nav">
	<div class="mobile-nav__container">
		<button
			id="js-close-menu"
			class="icon-cross mobile-nav__close"
			aria-controls="js-mobile-nav"
			aria-expanded="false"
			aria-label="<?php esc_html_e( 'Mobile Navigation', 'stones' ); ?>"
		></button>
		<div class="mobile-nav__menu" role="navigation">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-3',
					'menu_id'        => 'mobile-menu',
				)
			);
			?>
		</div>
	</div>
</section><!-- /.mobile-nav -->

<?php wp_footer(); ?>

</body>
</html>
