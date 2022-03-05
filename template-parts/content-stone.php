<?php
/**
 * Template part for displaying page content in page-stone.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields          = get_fields();
$slider_images_count = count( $acf_fields['slider_images'] );
$tech_spec_count     = count( $acf_fields['tech_spec'] );
$tabs_count          = count( $acf_fields['tabs'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

$tab_image_urls = array();
for ( $i = 0; $i < $tabs_count; $i++ ) {
	$tab_image_urls[ $i ] = wp_get_attachment_image_url( $acf_fields['tabs'][ $i ]['image'], $size );
}

$slider_images    = array();
$slider_images_2x = array();
for ( $i = 0; $i < $slider_images_count; $i++ ) {
	$slider_images[ $i ] = wp_get_attachment_image_url( $acf_fields['slider_images'][ $i ]['image'], $size );
	$slider_images_2x[ $i ] = wp_get_attachment_image_url( $acf_fields['slider_images'][ $i ]['image_2x'], $size );
}
?>

<div class="stone page-normal">
	<div class="container-2">
		<div class="stone__container-top">
			<div class="stone__wrapper-top">
				<?php if ( $acf_fields['heading'] ) : ?>
				<h1 class="stone__heading heading-normal text-navy-blue__heading"><?php esc_html_e( $acf_fields['heading'] ); ?></h1>
				<?php endif; ?>
				<?php if ( $acf_fields['text'] ) : ?>
				<div class="stone__text text-normal text-dark-blue__text"><?php echo wp_kses_post( $acf_fields['text'] ); ?></div>
				<?php endif; ?>
			</div><!-- .stone__wrapper-top -->

			<div class="stone__slider">
				<div class="stone__slider-wrapper">
				<?php for ( $i = 0; $i < $slider_images_count; $i++ ) : ?>
					<div class="stone-list__carousel-item">
						<picture>
							<source 
								srcset="<?php echo esc_url( $slider_images_2x[ $i ] ); ?>" 
								media="(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)">
								<img src="<?php echo esc_url( $slider_images[ $i ] ); ?>" alt="" />
						</picture>
					</div>
				<?php endfor; ?>
				</div><!-- .stone__slider-wrapper -->
			</div><!-- .stone__slider -->

			<div class="stone__tech-specs">
			<?php for ( $i = 0; $i < $tech_spec_count; $i++ ) : ?>
				<div class="stone__tech-specs-item">
					<div class="stone__tech-specs-col-1"><?php esc_html_e( $acf_fields['tech_spec'][ $i ]['column_1'] ); ?></div>
					<div class="stone__tech-specs-col-2"><?php esc_html_e( $acf_fields['tech_spec'][ $i ]['column_2'] ); ?></div>
				</div>
			<?php endfor; ?>
			</div><!-- .stone__tech-specs -->
		</div><!-- .stone__container-top -->

		<?php if ( $acf_fields['heading_2'] ) : ?>
		<h2 class="stone__heading-2 heading-normal text-dark-blue__heading"><?php esc_html_e( $acf_fields['heading_2'] ); ?></h2>
		<?php endif; ?>

		<div class="stone__tab-buttons">
		<?php
		$tab_images = array();
		for ( $i = 0; $i < $tabs_count; $i++ ) {
			if ( $acf_fields['tabs'][ $i ]['image'] ) {
				$tab_images[ $i ] = true;
			} else {
				$tab_images[ $i ] = false;
			}
		}
		?>
		<?php for ( $i = 0; $i < $tabs_count; $i++ ) : ?>
			<?php
			$button_id = '';
			switch ( $acf_fields['tabs'][ $i ]['tab_title'] ) {
				case 'Corundum':
					$button_id = 'corundum';
					break;

				case 'Blue Sapphire':
					$button_id = 'blue_sapphire';
					break;

				case 'Padparadscha':
					$button_id = 'padparadscha';
					break;

				case 'Fancy Sapphires':
					$button_id = 'fancy_sapphires';
					break;
			}
			?>
			<a
				href="#"
				id="<?php echo $button_id; ?>"
				class="stone__tab-button stone__tab-button-<?php echo $i + 1; ?> <?php if ( 0 === $i ) { echo 'stone__tab-button-active'; } ?>" 
				data-tab-content-index="<?php echo $i + 1; ?>"
				data-tab-image="<?php echo $tab_images[ $i ]; ?>"
				><?php esc_html_e( $acf_fields['tabs'][ $i ]['tab_title'] ); ?></a>
		<?php endfor; ?>
		</div><!-- .stone__tab-buttons -->
	</div><!-- .container -->

	<div class="stone__tab-wrapper <?php if ( $tab_images[0] ) { echo 'stone__tab-wrapper-img'; } ?>">
		<div class="stone__tab-container container-2">
		<?php for ( $i = 0; $i < $tabs_count; $i++ ) : ?>
			<div class="stone__tab-content stone__tab-content-<?php echo $i + 1; ?> <?php if ( 0 === $i ) { echo 'stone__tab-content-active'; } ?>">
				<a href="#" class="stone__tab-button-mobile <?php if ( 0 === $i ) { echo 'stone__tab-button-mobile-active'; } ?>"><?php esc_html_e( $acf_fields['tabs'][ $i ]['tab_title'] ); ?></a>
				<div class="stone__tab-content-wrapper <?php if ( $acf_fields['tabs'][ $i ]['image'] ) { echo 'stone__tab-content-wrapper-img'; } ?> <?php if ( 0 === $i ) { echo 'stone__tab-content-wrapper-active'; } ?> ">
					<div class="stone__tab-content-text <?php if ( $acf_fields['tabs'][ $i ]['image'] ) { echo 'stone__tab-content-text-img'; } ?>"><?php echo wp_kses_post( $acf_fields['tabs'][ $i ]['text'] ); ?></div>

					<?php if ( $acf_fields['tabs'][ $i ]['image'] ) : ?>
					<div class="stone__tab-image" data-image="<?php echo esc_url( $tab_image_urls[ $i ] ); ?>">
						<div class="stone__tab-image-container">
							<a href="#" class="stone__tab-play" data-video="<?php echo $acf_fields['tabs'][ $i ]['video_file']; ?>"></a>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endfor; ?>
		</div><!-- .stone__tab-container -->
	</div><!-- .stone__tab-wrapper -->

	<div class="stone__subscripe-wrapper">
		<div class="container-2">
			<?php
			if ( shortcode_exists( 'contact-form-7' ) ) {
				echo do_shortcode( '[contact-form-7 id="526"]' );
			}
			?>	
		</div>
	</div>
</div><!-- .stone -->
<?php get_template_part( 'template-parts/content', 'video' ); ?>
