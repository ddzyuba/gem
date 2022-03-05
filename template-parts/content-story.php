<?php
/**
 * Template part for displaying page content in page-story.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields         = get_fields();
$image_group_count  = count( $acf_fields['image_group'] );
$text_group_count   = count( $acf_fields['text_group'] );
$team_members_count = count( $acf_fields['team']['team_members'] );

if ( wp_is_mobile() ) {
	$size = 'medium_large';
} else {
	$size = 'full';
}

$hero_background_image_url = wp_get_attachment_image_url( $acf_fields['hero']['background_image'], $size );
$hero_image_url = wp_get_attachment_image_url( $acf_fields['hero']['image'], $size );
$responsibility_image = wp_get_attachment_image_url( $acf_fields['responsibility']['image'], $size );
?>

<div class="story">
	<div class="story__hero">
		<div class="story__hero-image" style="background-image: url(<?php echo esc_url( $hero_background_image_url ); ?>);"></div>
	</div><!-- .story__hero -->

	<div class="story__under-hero">
		<div class="story__under-hero-wrapper-top container">
			<?php if ( $acf_fields['hero']['heading'] ) : ?>
			<h1 class="story__under-hero-heading text-navy-blue__heading"><?php esc_html_e( $acf_fields['hero']['heading'] ); ?></h1>
			<?php endif; ?>
			<?php if ( $acf_fields['hero']['text'] ) : ?>
			<p class="story__under-hero-text text-dark-blue__text"><?php esc_html_e( $acf_fields['hero']['text'] ); ?></p>
			<?php endif; ?>
			<div class="story__under-hero-image" style="background-image: url(<?php echo esc_url( $hero_image_url ); ?>);">
				<a href="#" class="story__under-hero-play" data-video="<?php echo $acf_fields['hero']['video_link']; ?>"></a>
			</div>
		</div><!-- .story__under-hero-wrapper-top -->
		<div class="container-2 story__under-hero-container">
			<?php if ( $acf_fields['hero']['description_open'] ) : ?>
			<div class="text-grey__text story__under-hero-text-open"><?php echo wp_kses_post( $acf_fields['hero']['description_open'] ); ?></div>
			<?php endif; ?>
			<?php if ( $acf_fields['hero']['description_closed'] ) : ?>
			<div class="text-grey__text story__under-hero-text-closed"><?php echo wp_kses_post( $acf_fields['hero']['description_closed'] ); ?></div>
			<?php endif; ?>
			<div class="story__under-hero-more-wrapper">
				<a class="story__under-hero-more" href="#"><span class="story__under-hero-more-icon"></span><?php esc_html_e( 'READ MORE', 'stones' ); ?></a>
			</div>

			<div class="story__under-hero-bottom-img-wrapper container-2">
			<?php for ( $i = 0; $i < $image_group_count; $i++ ) : ?>
				<?php $image = wp_get_attachment_image( $acf_fields['image_group'][ $i ]['image'], 'full' ); ?>
				<div class="story__under-hero-bottom-img"><?php echo $image; ?></div>
			<?php endfor; ?>
			</div>
		</div><!-- .container -->
	</div><!-- .story__under-hero -->

	<div class="container-2">
		<section class="story__middle-info">
		<?php for ( $i = 0; $i < $text_group_count; $i++ ) : ?>
			<div class="story__middle-info-item story__middle-info-item-<?php echo $i + 1; ?>">
				<?php if ( $acf_fields['text_group'][ $i ]['heading'] ) : ?>
				<h2 class="text-dark-blue__heading story__middle-info-heading"><a href="" id="<?php esc_html_e( $acf_fields['text_group'][ $i ]['heading_id'] ); ?>"><?php esc_html_e( $acf_fields['text_group'][ $i ]['heading'] ); ?></a></h2>
				<?php endif; ?>
				<?php if ( $acf_fields['text_group'][ $i ]['text_open'] ) : ?>
				<div class="text-dark-blue__text story__middle-info-text-open"><?php echo wp_kses_post( $acf_fields['text_group'][ $i ]['text_open'] ); ?></div>
				<?php endif; ?>
				<?php if ( $acf_fields['text_group'][ $i ]['text_closed'] ) : ?>
				<div class="text-dark-blue__text story__middle-info-text-closed"><?php echo wp_kses_post( $acf_fields['text_group'][ $i ]['text_closed'] ); ?></div>
				<?php endif; ?>
				<div class="story__middle-info-more-wrapper">
					<a class="story__middle-info-more" href="#"><span class="story__middle-info-more-icon"></span><?php esc_html_e( 'READ MORE', 'stones' ); ?></a>
				</div>
			</div>
		<?php endfor; ?>
		</section><!-- .story__middle-text -->
	</div><!-- .container -->

	<section class="story__responsibility">
		<div class="story__responsibility-container container-2">
			<div class="story__responsibility-col-1">
				<div class="story__responsibility-wrapper">
					<?php if ( $acf_fields['responsibility']['heading'] ) : ?>
					<h2 class="text-dark-blue__heading story__responsibility-heading"><?php esc_html_e( $acf_fields['responsibility']['heading'] ); ?></h2>
					<?php endif; ?>
					<?php if ( $acf_fields['responsibility']['text'] ) : ?>
					<div class="text-dark-blue__text story__responsibility-text"><?php echo wp_kses_post( $acf_fields['responsibility']['text'] ); ?></div>
					<?php endif; ?>
					<?php if ( $acf_fields['responsibility']['button_text'] && $acf_fields['responsibility']['button_link'] ) : ?>
					<a 
						class="story__responsibility-button text-dark-blue__button" 
						href="<?php echo esc_url( $acf_fields['responsibility']['button_link'] ); ?>"
					><?php esc_html_e( $acf_fields['responsibility']['button_text'] ); ?></a>
					<?php endif; ?>
				</div>
			</div>

			<div class="story__responsibility-col-2">
				<?php echo wp_get_attachment_image( $acf_fields['responsibility']['image'], $size, false, array( "class" => "story__responsibility-image") ); ?>
			</div>
		</div><!-- .story__responsibility-container-->
	</section><!-- .story__responsibility -->
</div><!-- .story -->
<?php get_template_part( 'template-parts/content', 'video' ); ?>
