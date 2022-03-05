<?php
/**
 * Template part for displaying page content in page-stone-list.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields     = get_fields();
$carousel_count = count( $acf_fields['carousel'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

$carousel_images    = array();
$carousel_images_2x = array();
for ( $i = 0; $i < $carousel_count; $i++ ) {
	$carousel_images[ $i ] = wp_get_attachment_image_url( $acf_fields['carousel'][ $i ]['image'], $size );
	$carousel_images_2x[ $i ] = wp_get_attachment_image_url( $acf_fields['carousel'][ $i ]['image_2x'], $size );
}
?>

<div class="stone-list page-normal">
	<div class="container-2">
		<div class="wrapper-top stone-list__wrapper-top">
			<?php if ( $acf_fields['heading'] ) : ?>
			<h1 class="heading-normal text-navy-blue__heading"><?php esc_html_e( $acf_fields['heading'] ); ?></h1>
			<?php endif; ?>
			<?php if ( $acf_fields['text'] ) : ?>
			<p class="text-normal text-dark-blue__text"><?php esc_html_e( $acf_fields['text'] ); ?></p>
			<?php endif; ?>
		</div><!-- .wrapper-top -->

		<div class="stone-list__carousel">
			<div class="stone-list__carousel-wrapper">
			<?php for ( $i = 0; $i < $carousel_count; $i++ ) : ?>
				<div class="stone-list__carousel-item">
					<div class="stone-list__carousel-item-wrapper">
						<a href="<?php echo esc_url( $acf_fields['carousel'][ $i ]['link'] ); ?>">
							<picture>
								<source 
									srcset="<?php echo esc_url( $carousel_images_2x[ $i ] ); ?>" 
									media="(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)" loading="lazy">
									<img src="<?php echo esc_url( $carousel_images[ $i ] ); ?>" alt="" loading="lazy" />
							</picture>
						</a>
						<div class="stone-list__carousel-item-text-wrapper">
							<h3 class="stone-list__carousel-item-heading">
								<a href="<?php echo esc_url( $acf_fields['carousel'][ $i ]['link'] ); ?>"><?php esc_html_e( $acf_fields['carousel'][ $i ]['heading'] ); ?></a>
							</h3>
							<p class="stone-list__carousel-item-text"><?php esc_html_e( $acf_fields['carousel'][ $i ]['text'] ); ?></p>
						</div>
					</div>
				</div>
			<?php endfor; ?>
			</div><!-- .stone-list__carousel-wrapper -->

			<a href="#" class="home-our-stones__arrow stone-list__arrow  stone-list__arrow-left" aria-label="<?php esc_html_e( 'Previous carousel item', 'stones' ); ?>">
				<span class="home-our-stones__arrow-icon home-our-stones__arrow-icon-left"></span>
			</a>
			<a href="#" class="home-our-stones__arrow stone-list__arrow stone-list__arrow-right" aria-label="<?php esc_html_e( 'Next carousel item', 'stones' ); ?>">
				<span class="home-our-stones__arrow-icon home-our-stones__arrow-icon-right"></span>
			</a>
		</div><!-- .stone-list__carousel -->

		<?php if ( $acf_fields['heading_2'] ) : ?>
		<h2 class="stone-list__heading-2 text-dark-blue__heading"><?php esc_html_e( $acf_fields['heading_2'] ); ?></h2>
		<?php endif; ?>
		<?php if ( $acf_fields['text_2'] ) : ?>
		<div class="stone-list__text-2 text-dark-blue__text"><?php echo wp_kses_post( $acf_fields['text_2'] ); ?></div>
		<?php endif; ?>

		<?php if ( have_rows( 'stone_sliders' ) ): ?>
			<?php $i = 1; ?>
			<div class="stone-list__wrapper-bottom">
			<?php
			while ( have_rows( 'stone_sliders' ) ) : the_row();
				$heading = get_sub_field( 'heading' );
				$images = get_sub_field( 'images' );
				?>
				<div class="stone-list__item stone-list__item-<?php echo $i; ?>">
					<div class="stone-list__item-wrapper">
						<div class="stone-list__item-col-1">
							<h4 class="stone-list__item-heading"><?php esc_html_e( $heading ); ?></h4>
						</div>

						<div class="stone-list__item-col-2">
							<div class="stone-list__item-col-2-wrapper">
								<div class="stone-list__item-col-2-col-1">
									<a 
										href="#" 
										class="stone-list__item-arrow stone-list__item-arrow-left stone-list__item-arrow-left-<?php echo $i; ?>"
										aria-label="<?php esc_html_e( 'Previous slide', 'stones' ); ?>"
										></a>
									<p class="stone-list__item-arrow-text"><?php esc_html_e( 'More', 'stones' ); ?></p>
									<p class="stone-list__item-arrow-text"><?php esc_html_e( 'Saturation', 'stones' ); ?></p>
								</div>
								<div class="stone-list__item-col-2-col-2">
									<div class="stone-list__item-slider">
									<?php for ( $j = 0; $j < count( $images ); $j++ ) : ?>
										<div 
											class="stone-list__item-slide stone-list__item-slide-<?php echo $i; ?> <?php if ( 0 === $j ) { echo 'stone-list__item-slide-showing'; } ?>"
											data-image="<?php echo esc_url( $images[ $j ]['image'] ); ?>"></div>
									<?php endfor; ?>
									</div>
									<span class="stone-list__item-slide-count stone-list__item-slide-count-<?php echo $i; ?>"><?php esc_html_e( '1', 'stones' ); ?></span>
								</div>
								<div class="stone-list__item-col-2-col-3">
									<a 
										href="#" 
										class="stone-list__item-arrow stone-list__item-arrow-right stone-list__item-arrow-right-<?php echo $i; ?>"
										aria-label="<?php esc_html_e( 'Next slide', 'stones' ); ?>"
										></a>
									<p class="stone-list__item-arrow-text"><?php esc_html_e( 'Less', 'stones' ); ?></p>
									<p class="stone-list__item-arrow-text"><?php esc_html_e( 'Saturation', 'stones' ); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$i++;
			endwhile;
			?>
			</div><!-- .stone-list__wrapper-bottom -->
		<?php endif; ?>
	</div><!-- .container-2 -->
</div><!-- .stone-list -->