<?php
/**
 * Template part for displaying posts in index.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

global $post;
$thumbnail = get_the_post_thumbnail( $post->ID, 'full' );
$permalink = get_permalink();
$text      = get_field( 'content_top', $post->ID );
?>
<div class="blog__item">
	<div class="blog__item-wrapper">
		<div class="blog__item-col-1">
			<div class="blog__item-image-wrapper"><?php echo $thumbnail; ?></div>
		</div>
		<div class="blog__item-col-2">
			<h3 class="blog__item-heading"><a href="<?php echo esc_url( $permalink ); ?>"><?php esc_html_e( wp_trim_words( get_the_title(), 20 ) ); ?></a></h5>
			<p class="blog__item-date"><?php esc_html_e( 'Date: ' ) . the_modified_date( 'd M Y' ); ?></p>
			<p class="blog__item-text"><?php esc_html_e( wp_trim_words( $text['text_left'], 50 ) ); ?></p>
			<div class="blog__item-button-wrapper">
				<a href="<?php echo esc_url( $permalink ); ?>" class="blog__item-more-link text-dark-blue__button"><?php esc_html_e( 'READ MORE', 'stones' ); ?></a>
			</div>
		</div>
	</div>
</div><!-- .blog__item -->
