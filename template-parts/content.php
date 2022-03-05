<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields = get_fields();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header container-2">
		<?php the_title( '<h1 class="entry-title heading-normal text-navy-blue__heading">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="single-post__wrapper-top container-2">
		<div class="single-post__wrapper-top-col-1"><?php echo wp_kses_post( $acf_fields['content_top']['text_left'] ); ?></div>
		<div class="single-post__wrapper-top-col-2">
			<?php echo wp_get_attachment_image( $acf_fields['content_top']['image_right'], 'medium-large', null, array( 'class' => 'single-post__wrapper-top-image-inner' ) ); ?>
		</div>
	</div>
	<div class="container-2">
		<div class="single-post__content-middle"><?php echo wp_kses_post( $acf_fields['text_middle'] ); ?></div>
		<div class="single-post__gallery">
		<?php for ( $i = 0; $i < count( $acf_fields['gallery'] ); $i++ ) : ?>
			<?php $image = wp_get_attachment_image( $acf_fields['gallery'][ $i ]['image'], 'full' ); ?>
			<div class="single-post__gallery-item single-post__gallery-item-<?php echo $i + 1; ?>"><?php echo $image; ?></div>
		<?php endfor; ?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
