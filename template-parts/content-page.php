<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Stones-2021
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-2">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title heading-normal text-navy-blue__heading">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>

	<?php stones_post_thumbnail(); ?>
	<div class="container-2">
		<div class="entry-content">
			<?php
			the_content();
			?>
		</div><!-- .entry-content -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
