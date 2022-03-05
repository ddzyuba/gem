<?php
/**
 * Template part for displaying page content in page-factory.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields = get_fields();
?>

<div class="factory page-normal">
	<div class="container-2">
		<div class="wrapper-top factory__wrapper-top">
			<?php if ( $acf_fields['heading'] ) : ?>
			<h1 class="heading-normal text-navy-blue__heading"><?php esc_html_e( $acf_fields['heading'] ); ?></h1>
			<?php endif; ?>
			<?php if ( $acf_fields['text'] ) : ?>
			<div class="text-normal text-dark-blue__text"><?php echo wp_kses_post( $acf_fields['text'] ); ?></div>
			<?php endif; ?>
		</div><!-- .wrapper-top .factory__wrapper-top -->

		<div class="factory__carousel">
		<?php for ( $i = 0; $i < count( $acf_fields['carousel'] ); $i++ ) : ?>
			<?php $image = wp_get_attachment_image( $acf_fields['carousel'][ $i ]['image'], 'full' ); ?>
			<div class="factory__carousel-item">
				<div class="factory__carousel-item-container">
					<div class="factory__carousel-item-wrapper">
						<?php echo $image; ?>
					</div>
				</div>
			</div>
		<?php endfor; ?>
		</div><!-- .factory__carousel -->
	</div><!-- .container -->
</div><!-- .factory -->