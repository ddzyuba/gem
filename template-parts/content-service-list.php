<?php
/**
 * Template part for displaying page content in page-service-list.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields = get_fields();
$services_list_count = count( $acf_fields['services_list'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

?>

<div class="service-list page-normal">
	<div class="wrapper-top service-list__wrapper-top">
		<?php if ( $acf_fields['heading'] ) : ?>
		<h1 class="heading-normal text-navy-blue__heading"><?php esc_html_e( $acf_fields['heading'] ); ?></h1>
		<?php endif; ?>
		<?php if ( $acf_fields['text'] ) : ?>
		<p class="text-normal text-dark-blue__text"><?php esc_html_e( $acf_fields['text'] ); ?></p>
		<?php endif; ?>
	</div><!-- .wrapper-top .service-list__wrapper-top -->

	<div class="service-list__wrapper">
	<?php for ( $i = 0; $i < $services_list_count; $i++ ) : ?>
		<div class="service-list__item service-list__item-<?php echo $i + 1; ?>">
			<div class="service-list__item-container service-list__item-container-<?php echo $i + 1; ?> container-2">
				<div class="service-list__item-col-1">
					<div class="service-list__item-wrapper service-list__item-wrapper-<?php echo $i + 1; ?>">
						<?php if ( $acf_fields['services_list'][ $i ]['heading'] ) : ?>
						<h2 class="text-dark-blue__heading service-list__item-heading"><a href="" id="<?php esc_html_e( $acf_fields['services_list'][ $i ]['subheading_id'] ); ?>"><?php esc_html_e( $acf_fields['services_list'][ $i ]['heading'] ); ?></a></h2>
						<?php endif; ?>
						<?php if ( $acf_fields['services_list'][ $i ]['subheading'] ) : ?>
						<p class="service-list__item-subheading text-dark-blue__text"><?php esc_html_e( $acf_fields['services_list'][ $i ]['subheading'] ); ?></p>
						<?php endif; ?>
						<?php if ( $acf_fields['services_list'][ $i ]['text'] ) : ?>
						<div class="service-list__item-text service-list__item-text-<?php echo $i + 1; ?> text-dark-blue__text"><?php echo wp_kses_post( $acf_fields['services_list'][ $i ]['text'] ); ?></div>
						<?php endif; ?>
						<?php if ( $acf_fields['services_list'][ $i ]['button_text'] && $acf_fields['services_list'][ $i ]['button_link'] ) : ?>
						<div class="service-list__item-button-wrapper">
							<a 
								class="service-list__item-button text-dark-blue__button" 
								href="<?php echo esc_url( $acf_fields['services_list'][ $i ]['button_link'] ); ?>"
							><?php esc_html_e( $acf_fields['services_list'][ $i ]['button_text'] ); ?></a>
						</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="service-list__item-col-2">
					<?php echo wp_get_attachment_image( $acf_fields['services_list'][ $i ]['image'], $size, false, array( "class" => "service-list__item-image service-list__item-image-" . ( $i + 1 ) ) ); ?>
				</div>
			</div>
		</div>
	<?php endfor; ?>
	</div><!-- .service-list__wrapper -->
	<div class="service-list__wrapper-bottom container-2">
		<?php if ( $acf_fields['heading_2'] ) : ?>
		<h2 class="text-dark-blue__heading service-list__heading-2"><a href="#" id="<?php esc_html_e( $acf_fields['heading_2_id'] ); ?>"><?php esc_html_e( $acf_fields['heading_2'] ); ?></a></h2>
		<?php endif; ?>
		<?php if ( $acf_fields['text_2'] ) : ?>
		<div class="text-dark-blue__text service-list__text-2"><?php echo wp_kses_post( $acf_fields['text_2'] ); ?></div>
		<?php endif; ?>
	</div><!-- .service-list__wrapper-bottom .container -->
</div><!-- .service-list -->