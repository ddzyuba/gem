<?php
/**
 * Template part for displaying page content in page-country.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields    = get_fields();
$slide_counter = count( $acf_fields['slider_images'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

$slider_image_urls = array();
for ( $i = 0; $i < $slide_counter; $i++ ) {
	$slider_image_urls[ $i ] = wp_get_attachment_image_url( $acf_fields['slider_images'][ $i ]['image'], $size );
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-2">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title heading-normal text-navy-blue__heading">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>

	<section class="country-hero-slider">
		<div class="country-hero-slider__wrapper">
		<?php for ( $i = 0; $i < $slide_counter; $i++ ) : ?>
			<div 
				class="country-hero-slider__item <?php if ( 0 === $i ) { echo ' country-hero-slider__item-showing'; } ?>"
				<?php if ( $i === 0 ) : ?>
				style="background-image: url(<?php echo esc_url( $slider_image_urls[ $i ] ); ?>);"
				<?php else : ?>
				data-image="<?php echo esc_url( $slider_image_urls[ $i ] ); ?>"
				<?php endif; ?>
				></div>
		<?php endfor; ?>

		<?php if ( $slide_counter > 1 ) : ?>
			<?php /* ?>
			<div class="country-hero-slider__dots">
			<?php for ( $i = 0; $i < $slide_counter; $i++ ) : ?>
				<span class="country-hero-slider__dots-item <?php if ( ( $slide_counter - 1 ) === $i ) { echo ' country-hero-slider__dots-item-last'; } ?> <?php if ( 0 === $i ) { echo ' active'; } ?>"
					role="button"
					aria-label="<?php esc_html_e( 'Go to slide ' . $i ); ?>"
					></span>
			<?php endfor; ?>
			</div>
			<?php */ ?>
		<?php endif; ?>
		</div><!-- .country-hero-slider__wrapper -->

		<a href="#" class="country-hero-slider__arrow country-hero-slider__arrow-left" aria-label="<?php esc_html_e( 'Previous slider item', 'stones' ); ?>">
			<span class="country-hero-slider__arrow-icon country-hero-slider__arrow-icon-left"></span>
		</a>
		<a href="#" class="country-hero-slider__arrow country-hero-slider__arrow-right" aria-label="<?php esc_html_e( 'Next slider item', 'stones' ); ?>">
			<span class="country-hero-slider__arrow-icon country-hero-slider__arrow-icon-right"></span>
		</a>
	</section><!-- .country-hero-slider -->

	<div class="container-2">
		<div class="entry-content">
			<?php
			the_content();
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
