<?php
/**
 * Template part for displaying video modal content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */
?>
<div class="overlay-modal">
	<a href="#" class="close-overlay" aria-label="<?php esc_html_e( 'Close modal', 'stones' ); ?>">×</a>
	<div class="overlay-modal__content">
		<video
		id="my-video"
		class="video-js"
		controls
		preload="auto"
		data-setup="{}"
	>
		<source src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/uploads/2021/03/KV_Gems_v5_small.m4v" type="video/mp4" />
		<p class="vjs-no-js">
			<?php esc_html_e( 'To view this video please enable JavaScript, and consider upgrading to a
			web browser that', 'stones' ); ?>
			<a href="https://videojs.com/html5-video-support/" target="_blank"><?php esc_html_e( 'supports HTML5 video', 'stones' ); ?></a>
		</p>
	</video>
	</div>
</div>