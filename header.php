<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Stones-2021
 */

if ( function_exists( 'get_field' ) ) {
	$phone = get_field( 'phone', 'option' );
} else {
	$phone = '+66 2233 3964';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'stones' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-header__container container-2">
			<div class="site-header__wrapper">
				<button
					id="js-navigation-button"
					class="menu-toggle"
					aria-controls="js-mobile-nav"
					aria-expanded="false"
					aria-label="<?php esc_html_e( 'Mobile Navigation', 'stones' ); ?>"
				><span class="icon-menu"></span></button>
				<a class="site-header__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo( 'title' ); ?>" rel="home">
					<span class="site-header__logo-svg"></span>
				</a>
				<div class="site-header__top-links-wrapper">
					<a href="tel:<?php the_field( 'phone', 'option' ); ?>" class="site-header__phone"><span class="site-header__phone-icon"></span><span class="site-header__phone-text"><?php esc_html_e( $phone ); ?></span></a>
					<a href="<?php echo esc_url( home_url( '/contact-us/' ) ); ?>" class="site-header__contact-us"><?php esc_html_e( 'CONTACT US', 'stones' ); ?></a>
				</div><!-- .site-header__top-links-wrapper -->
				<nav class="header-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'header-menu',
						)
					);
					?>
				</nav><!-- .header-navigation -->
				
			</div><!-- .site-header__wrapper -->
		</div><!-- .site-header__container .container -->
	</header><!-- #masthead -->
