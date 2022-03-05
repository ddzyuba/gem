<?php
/**
 * Template part for displaying page content in page-source.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

?>

<div class="source page-normal">
	<div class="container-2">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title heading-normal text-navy-blue__heading">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
			the_content();
			?>
		</div><!-- .entry-content -->
		<div class="source__map-wrapper">
			<div class="source__map-links">
				<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/madagascar/"><span class="source__map-link source__map-link-madagascar" ><?php esc_html_e( 'Madagascar', 'stones' ); ?></span></a>
				<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/mozambique/"><span class="source__map-link source__map-link-mozambique" ><?php esc_html_e( 'Mozambique', 'stones' ); ?></span></a>
				<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/myannmar/"
				><span class="source__map-link source__map-link-myanmar" ><?php esc_html_e( 'Myanmar', 'stones' ); ?></span></a>
				<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/sri-lanka/"><span class="source__map-link source__map-link-srilanka"><?php esc_html_e( 'Sri Lanka', 'stones' ); ?></span></a>
				<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/tanzania/"
				><span class="source__map-link source__map-link-tanzania"><?php esc_html_e( 'Tanzania', 'stones' ); ?></span></a>
				<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/vietnam/"
				><span class="source__map-link source__map-link-vietnam"><?php esc_html_e( 'Vietnam', 'stones' ); ?></span></a>
			</div>
			<img 
				class="source__map-image" 
				src="<?php echo get_template_directory_uri() . '/assets/img/dist/map.svg' ?>" 
				alt="<?php esc_html_e( 'Map', 'stones' ); ?>" />
		</div><!-- .source__map-wrapper -->
		<div class="source__mobile-links">
			<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/madagascar/" class="source__mobile-link"><?php esc_html_e( 'Madagascar', 'stones' ); ?></a>
			<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/mozambique/" class="source__mobile-link"><?php esc_html_e( 'Mozambique', 'stones' ); ?></a>
			<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/myannmar/" class="source__mobile-link"><?php esc_html_e( 'Myanmar', 'stones' ); ?></a>
			<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/sri-lanka/" class="source__mobile-link"><?php esc_html_e( 'Sri Lanka', 'stones' ); ?></a>
			<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/tanzania/" class="source__mobile-link"><?php esc_html_e( 'Tanzania', 'stones' ); ?></a>
			<a href="<?php echo site_url(); ?>/our-services/sourcing-origins/vietnam/" class="source__mobile-link"><?php esc_html_e( 'Vietnam', 'stones' ); ?></a>
		</div>
	</div><!-- .container-2 -->
</div><!-- .source -->