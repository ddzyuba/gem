<?php
/**
 * Template part for displaying page content in page-contact.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

$acf_fields = get_fields();
?>

<div class="contact page-normal">
	<div class="container-2">
		<?php if ( $acf_fields['heading'] ) : ?>
		<h1 class="entry-title heading-normal text-navy-blue__heading"><?php esc_html_e( $acf_fields['heading'] ); ?></h1>
		<?php endif; ?>
	</div>
	<div class="contact__main">
		<div class="container-2">
			<div class="contact__main-wrapper">
				<div class="contact__col-1">
					<p class="contact__subheading"><?php esc_html_e( $acf_fields['subheading'] ); ?></p>
					<h4 class="contact__main-heading contact__main-heading-phone"><?php esc_html_e( 'Phone', 'stones' ); ?></h4>
					<a 
						href="tel:<?php esc_html_e( $acf_fields['phone'] ); ?>" 
						class="contact__main-phone"
					><?php esc_html_e( $acf_fields['phone'] ); ?></a>
					<h4 class="contact__main-heading contact__main-heading-address"><?php esc_html_e( 'Address', 'stones' ); ?></h4>
					<div class="contact__main-address"><?php echo wp_kses_post( $acf_fields['address'] ) ?></div>
					<div class="contact__main-google-link-wrapper">
						<img 
							class="contact__main-google-link-image" 
							src="<?php echo get_template_directory_uri() . '/assets/img/dist/Google_Maps_icon.svg'; ?>" 
							alt="<?php esc_html_e( 'Google Maps icon', 'stones' ); ?>"
						/>
						<a 
							class="contact__main-google-link"
							href="<?php echo esc_url( $acf_fields['google_map_link'] ); ?>" 
							target="_blank"
							rel="nofollow noopener noreferrer"
							aria-label="<?php esc_html_e( 'KVGems location on Google map', 'stones' ); ?>"
						><?php esc_html_e( 'Open in Google Map', 'stones' ); ?></a>
					</div>
					<h4 class="contact__main-heading contact__main-heading-media"><?php esc_html_e( 'Social Media', 'stones' ); ?></h4>
					<div class="contact__main-social-wrapper">
						<a 
							class="contact__main-social-link contact__main-social-link-facebook" 
							href="<?php echo esc_url( $acf_fields['facebook_link'] ); ?>" 
							target="_blank"
							rel="nofollow noopener noreferrer"
							aria-label="<?php esc_html_e( 'Facebook profile link', 'stones' ); ?>"
						><img 
							class="contact__main-social-image" 
							src="<?php echo get_template_directory_uri() . '/assets/img/dist/facebook.svg'; ?>"
							alt="<?php esc_html_e( 'Facebook icon', 'stones' ); ?>"
						/></a>
						<a 
							class="contact__main-social-link contact__main-social-link-instagram" 
							href="<?php echo esc_url( $acf_fields['instagram_link'] ); ?>" 
							target="_blank"
							rel="nofollow noopener noreferrer"
							aria-label="<?php esc_html_e( 'Instagram profile link', 'stones' ); ?>"
						><img 
							class="contact__main-social-image" 
							src="<?php echo get_template_directory_uri() . '/assets/img/dist/instagram-logo.svg'; ?>"
							alt="<?php esc_html_e( 'Instagram icon', 'stones' ); ?>"
						/></a>
					</div>
				</div>
				<div class="contact__col-2">
					<?php 
					if ( shortcode_exists( 'contact-form-7' ) ) {
						echo do_shortcode( $acf_fields['contact_form'] );
					}
					?>
				</div>
			</div><!-- .contact__main-wrapper -->
		</div><!-- .container -->
	</div><!-- .contact__main -->

	<div class="container-2">
		<div class="contact__images">
			<?php for ( $i = 0; $i < count( $acf_fields['partner_images'] ); $i++ ) : ?>
				<img class="home-partners__image" src="<?php echo esc_url( $acf_fields['partner_images'][ $i ]['image'] ); ?>" alt="" />
			<?php endfor; ?>
		</div>
	</div><!-- .home-partners__images -->
</div>