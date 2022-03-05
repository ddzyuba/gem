<?php
/**
 * Template part for displaying page content in front-page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields      = get_fields();
$slide_counter   = count( $acf_fields['hero']['slider_images'] );
$partner_counter = count( $acf_fields['our_partner']['images'] );
$carousel_count  = count( $acf_fields['our_stones']['carousel'] );
$service_counter = count( $acf_fields['services'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

$slider_image_urls = array();
for ( $i = 0; $i < $slide_counter; $i++ ) {
	$slider_image_urls[ $i ] = wp_get_attachment_image_url( $acf_fields['hero']['slider_images'][ $i ]['image'], $size );
}

$who_we_are_image_url = wp_get_attachment_image_url( $acf_fields['who_we_are']['image'], $size );

$carousel_images    = array();
$carousel_images_2x = array();
for ( $i = 0; $i < $carousel_count; $i++ ) {
	$carousel_images[ $i ] = wp_get_attachment_image_url( $acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['image'], $size );
	$carousel_images_2x[ $i ] = wp_get_attachment_image_url( $acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['image_2x'], $size );
}

?>

<section class="home-hero-slider">
	<div class="home-hero-slider__wrapper">
	<?php for ( $i = 0; $i < $slide_counter; $i++ ) : ?>
		<div 
			class="home-hero-slider__item <?php if ( 0 === $i ) { echo ' home-hero-slider__item-showing'; } ?>"
			<?php if ( $i === 0 ) : ?>
			style="background-image: url(<?php echo esc_url( $slider_image_urls[ $i ] ); ?>);"
			<?php else : ?>
			data-image="<?php echo esc_url( $slider_image_urls[ $i ] ); ?>"
			<?php endif; ?>
			></div>
	<?php endfor; ?>
	</div><!-- .home-hero-slider__wrapper -->
	<div class="home-hero-slider__info">
		<div class="home-hero-slider__info-container container-2">
			<div class="home-hero-slider__info-wrapper">
				<?php if ( $acf_fields['hero']['heading'] ) : ?>
				<h1 class="home-hero-slider__heading"><?php esc_html_e( $acf_fields['hero']['heading'] ); ?></h1>
				<?php endif; ?>
				<?php if ( $acf_fields['hero']['text'] ) : ?>
				<p class="home-hero-slider__text"><?php esc_html_e( $acf_fields['hero']['text'] ); ?></p>
				<?php endif; ?>
				<?php if ( $acf_fields['hero']['cta_button_text'] && $acf_fields['hero']['cta_button_link'] ) : ?>
				<a 
					class="home-hero-slider__button" 
					href="<?php echo esc_url( $acf_fields['hero']['cta_button_link'] ); ?>"
				><?php esc_html_e( $acf_fields['hero']['cta_button_text'] ); ?></a>
				<?php endif; ?>
				<?php if ( $slide_counter > 1 ) : ?>
					<div class="home-hero-slider__dots">
					<?php for ( $i = 0; $i < $slide_counter; $i++ ) : ?>
						<span class="home-hero-slider__dots-item <?php if ( ( $slide_counter - 1 ) === $i ) { echo ' home-hero-slider__dots-item-last'; } ?> <?php if ( 0 === $i ) { echo ' active'; } ?>"
							role="button"
							aria-label="<?php esc_html_e( 'Go to slide ' . $i ); ?>"
							></span>
					<?php endfor; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div><!-- .home-hero-slider__info .container -->
</section><!-- .home-hero-slider -->

<section class="home-who-we-are">
	<div class="home-who-we-are__image" data-image="<?php echo esc_url( $who_we_are_image_url ); ?>"></div>
	<div class="home-who-we-are__container container-2">
		<div class="home-who-we-are__wrapper">
			<?php if ( $acf_fields['who_we_are']['heading'] ) : ?>
			<h2 class="text-grey__heading"><?php esc_html_e( $acf_fields['who_we_are']['heading'] ); ?></h2>
			<?php endif; ?>
			<?php if ( $acf_fields['who_we_are']['text'] ) : ?>
			<p class="home-who-we-are__text text-grey__text"><?php esc_html_e( $acf_fields['who_we_are']['text'] ); ?></p>
			<?php endif; ?>
			<?php if ( $acf_fields['who_we_are']['cta_button_text'] && $acf_fields['who_we_are']['cta_button_link'] ) : ?>
			<a 
				class="home-who-we-are__button text-grey__button" 
				href="<?php echo esc_url( $acf_fields['who_we_are']['cta_button_link'] ); ?>"
			><?php esc_html_e( $acf_fields['who_we_are']['cta_button_text'] ); ?></a>
			<?php endif; ?>
		</div><!-- .home-who-we-are__wrapper -->
	</div><!-- .home-who-we-are__container .container -->
</section><!-- .home-who-we-are -->

<section class="home-our-stones">
	<div class="home-our-stones__container container">
		<?php if ( $acf_fields['our_stones']['heading'] ) : ?>
		<h2 class="text-dark-blue__heading home-our-stones__heading"><?php esc_html_e( $acf_fields['our_stones']['heading'] ); ?></h2>
		<?php endif; ?>
		<?php if ( $acf_fields['our_stones']['text'] ) : ?>
		<p class="text-dark-blue__text home-our-stones__text"><?php esc_html_e( $acf_fields['our_stones']['text'] ); ?></p>
		<?php endif; ?>
	</div><!-- .home-our-stones__container .container -->
	<div class="home-our-stones__carousel-wrapper">
		<div class="home-our-stones__wrapper">
		<?php for ( $i = 0; $i < $carousel_count; $i++ ) : ?>
			<div class="home-our-stones__item">
				<div class="home-our-stones__item-wrapper">
					<picture>
						<source srcset="<?php echo esc_url( $carousel_images_2x[ $i ] ); ?>" 
							media="(-webkit-min-device-pixel-ratio: 2),(min--moz-device-pixel-ratio: 2),(-o-min-device-pixel-ratio: 2/1),(min-device-pixel-ratio: 2),(min-resolution: 192dpi),(min-resolution: 2dppx)">
						<img src="<?php echo esc_url( $carousel_images[ $i ] ); ?>" alt="" />
					</picture>
				</div>
				<div class="home-our-stones__item-description">
					<div class="home-our-stones__item-description-wrapper">
						<h3 class="home-our-stones__item-heading"><?php esc_html_e( $acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['heading'] ); ?></h3>
						<p class="home-our-stones__item-text"><?php esc_html_e( $acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['text'] ); ?></p>
						<a 
							class="home-our-stones__item-button text-grey__button"
							<?php
							$link = 'page' === $acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['link_type'] ?
									$acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['button_link'] :
									$acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['button_custom_link'];
							?>
							href="<?php echo esc_url( $link ); ?>"
						><?php esc_html_e( $acf_fields['our_stones']['carousel'][ $i ]['carousel_item']['button_text'] ); ?></a>
					</div>
				</div>
			</div>
		<?php endfor; ?>
		</div><!-- .home-our-stones__wrapper -->

		<a href="#" class="home-our-stones__arrow home-our-stones__arrow-left" aria-label="<?php esc_html_e( 'Previous carousel item', 'stones' ); ?>">
			<span class="home-our-stones__arrow-icon home-our-stones__arrow-icon-left"></span>
		</a>
		<a href="#" class="home-our-stones__arrow home-our-stones__arrow-right" aria-label="<?php esc_html_e( 'Next carousel item', 'stones' ); ?>">
			<span class="home-our-stones__arrow-icon home-our-stones__arrow-icon-right"></span>
		</a>
	</div><!-- .home-our-stones__carousel-wrapper-->
</section><!-- .home-our-stones -->

<section class="home-partners">
	<div class="container-2">
		<div class="home-partners__wrapper">
			<?php if ( $acf_fields['our_partner']['heading'] ) : ?>
			<h2 class="text-dark-blue__heading home-partners__heading"><?php esc_html_e( $acf_fields['our_partner']['heading'] ); ?></h2>
			<?php endif; ?>
			<?php if ( $acf_fields['our_partner']['text'] ) : ?>
			<p class="text-dark-blue__text home-partners__text"><?php esc_html_e( $acf_fields['our_partner']['text'] ); ?></p>
			<?php endif; ?>
		</div><!-- .home-partners__wrapper -->
		<div class="home-partners__images">
		<?php for ( $i = 0; $i < $partner_counter; $i++ ) : ?>
			<img class="home-partners__image" src="<?php echo esc_url( $acf_fields['our_partner']['images'][ $i ]['image'] ); ?>" alt="" />
		<?php endfor; ?>
		</div><!-- .home-partners__images -->
	</div><!-- .container -->
</section><!-- .home-partners -->

<section class="home-exhibitions">
	<div class="container-2">
		<?php if ( $acf_fields['exhibition']['heading'] ) : ?>
		<h2 class="text-dark-blue__heading home-exhibitions__heading"><?php esc_html_e( $acf_fields['exhibition']['heading'] ); ?></h2>
		<?php endif; ?>
		<?php if ( $acf_fields['exhibition']['text'] ) : ?>
		<p class="text-dark-blue__text home-exhibitions__text"><?php esc_html_e( $acf_fields['exhibition']['text'] ); ?></p>
		<?php endif; ?>
		<?php
		if ( wp_is_mobile() ) {
			$posts_per_page = 3;
		} else {
			$posts_per_page = 6;
		}
		$args = array(
			'post_type'      => 'exhibitions',
			'posts_per_page' => $posts_per_page,
			'post_status'    => 'publish',
		);
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
		?>
		<div class="home-exhibitions__wrapper">
			<?php
			foreach ( $the_query->posts as $item ) :
				$start_date  = get_field( 'start_date', $item->ID );
				$end_date    = get_field( 'end_date', $item->ID );
				$description = get_field( 'description', $item->ID );
			?>
			<div class="home-exhibitions__item">
				<div class="home-exhibitions__item-col-1">
					<div class="home-exhibitions__date">
						<span class="home-exhibitions__date-start"><?php esc_html_e( $start_date ); ?></span>
						<span class="home-exhibitions__date-end"><?php esc_html_e( $end_date ); ?></span>
					</div>
				</div>
				<div class="home-exhibitions__item-col-2">
					<h4 class="home-exhibitions__item-heading"><?php esc_html_e( $item->post_title ); ?></h4>
					<p class="home-exhibitions__item-text"><?php esc_html_e( $description ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div><!-- .home-exhibitions__wrapper -->
		<?php endif; ?>
	</div><!-- .container -->
</section><!-- .home-exhibitions -->

<section class="home-services">
<?php for ( $i = 0; $i < $service_counter; $i++ ) : ?>
	<div class="home-services__item home-services__item-<?php echo $i + 1; ?>">
		<div class="home-services__container container-2">
			<div class="home-services__col-1">
				<div class="home-services__wrapper home-services__wrapper-<?php echo $i + 1; ?>">
					<?php if ( $acf_fields['services'][ $i ]['heading'] ) : ?>
					<h2 class="text-grey__heading home-services__heading home-services__heading-<?php echo $i + 1; ?>"><?php esc_html_e( $acf_fields['services'][ $i ]['heading'] ); ?></h2>
					<?php endif; ?>
					<?php if ( $acf_fields['services'][ $i ]['text'] ) : ?>
					<p class="home-services__text text-grey__text"><?php esc_html_e( $acf_fields['services'][ $i ]['text'] ); ?></p>
					<?php endif; ?>
					<?php if ( $acf_fields['services'][ $i ]['button_text'] && $acf_fields['services'][ $i ]['button_link'] ) : ?>
					<a 
						class="home-services__button text-grey__button" 
						href="<?php echo esc_url( $acf_fields['services'][ $i ]['button_link'] ); ?>"
					><?php esc_html_e( $acf_fields['services'][ $i ]['button_text'] ); ?></a>
					<?php endif; ?>
				</div><!-- home-services__wrapper home-services__wrapper-<?php echo $i + 1; ?> -->
			</div><!-- .home-services__col-1 -->

			<div class="home-services__col-2">
				<?php echo wp_get_attachment_image( $acf_fields['services'][ $i ]['image'], $size, false, array( "class" => "home-services__image home-services__image-" . ( $i + 1 ) ) ); ?>
			</div><!-- .home-services__col-2 -->
		</div><!-- .home-services__container -->
	</div><!-- .home-services__item .home-services__item-<?php echo $i + 1; ?> -->
<?php endfor; ?>
</section><!-- .home-services -->