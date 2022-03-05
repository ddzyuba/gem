<?php
/**
 * Template part for displaying page content in page-responsibilities.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields = get_fields();
$responsibility_list_count = count( $acf_fields['responsibility_list'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

?>

<div class="responsibilities page-normal">
	<div class="wrapper-top responsibilities__wrapper-top">
		<?php if ( $acf_fields['heading'] ) : ?>
		<h1 class="heading-normal text-navy-blue__heading"><?php esc_html_e( $acf_fields['heading'] ); ?></h1>
		<?php endif; ?>
		<?php if ( $acf_fields['text'] ) : ?>
		<p class="text-normal text-dark-blue__text"><?php esc_html_e( $acf_fields['text'] ); ?></p>
		<?php endif; ?>
	</div><!-- .wrapper-top .responsibilities__wrapper-top -->

	<div class="responsibilities__wrapper">
	<?php for ( $i = 0; $i < $responsibility_list_count; $i++ ) : ?>
		<div class="responsibilities__item responsibilities__item-<?php echo $i + 1; ?>">
			<div class="responsibilities__item-container responsibilities__item-container-<?php echo $i + 1; ?> container-2">
				<div class="responsibilities__item-col-1">
					<?php echo wp_get_attachment_image( $acf_fields['responsibility_list'][ $i ]['image'], $size, false, array( "class" => "responsibilities__item-image responsibilities__item-image-" . ( $i + 1 ) ) ); ?>
				</div>

				<div class="responsibilities__item-col-2">
					<div class="responsibilities__item-wrapper responsibilities__item-wrapper-<?php echo $i + 1; ?>">
						<?php if ( $acf_fields['responsibility_list'][ $i ]['text'] ) : ?>
						<div class="responsibilities__item-text responsibilities__item-text-<?php echo $i + 1; ?> text-dark-blue__text"><?php echo wp_kses_post( $acf_fields['responsibility_list'][ $i ]['text'] ); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endfor; ?>
	</div><!-- .service-list__wrapper -->
</div><!-- .responsibilities -->