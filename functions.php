<?php
/**
 * Stones-2021 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Stones-2021
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! defined( 'STONES_THEME_DIRECTORY_URL' ) ) {
	// Replace the version number of the theme on each release.
	define( 'STONES_THEME_DIRECTORY_URL', get_template_directory_uri() );
}

if ( ! defined( 'STONES_THEME_DIRECTORY_PATH' ) ) {
	// Replace the version number of the theme on each release.
	define( 'STONES_THEME_DIRECTORY_PATH', get_stylesheet_directory() );
}

if ( ! function_exists( 'stones_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function stones_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Stones-2021, use a find and replace
		 * to change 'stones' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'stones', STONES_THEME_DIRECTORY_PATH . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Header', 'stones' ),
				'menu-2' => esc_html__( 'Footer', 'stones' ),
				'menu-3' => esc_html__( 'Mobile', 'stones' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'stones_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'stones_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function stones_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stones_content_width', 640 );
}
add_action( 'after_setup_theme', 'stones_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function stones_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'stones' ),
			'id'            => 'footer-column-1',
			'description'   => esc_html__( 'Add widgets here.', 'stones' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'stones' ),
			'id'            => 'footer-column-2',
			'description'   => esc_html__( 'Add widgets here.', 'stones' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'stones' ),
			'id'            => 'footer-column-3',
			'description'   => esc_html__( 'Add widgets here.', 'stones' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'stones' ),
			'id'            => 'footer-column-4',
			'description'   => esc_html__( 'Add widgets here.', 'stones' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'stones_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function stones_scripts() {
	//$css_ver = date( 'YsB', filemtime( STONES_THEME_DIRECTORY_PATH . '/style.css' ) );
	$js_ver = date( 'YsB', filemtime( STONES_THEME_DIRECTORY_PATH . '/assets/js/dist/scripts.min.js' ) );
	
	// Do not load the theme style.css here as it's lazyloaded in the
	// stones_lazyload_stylesheets() function.
	//wp_enqueue_style( 'stones-style', get_stylesheet_uri(), array(), $css_ver );
	wp_enqueue_script( 'stones-navigation', STONES_THEME_DIRECTORY_URL . '/assets/js/dist/scripts.min.js', array( 'jquery', 'slick-js' ), $js_ver, true );
	wp_enqueue_script( 'slick-js', STONES_THEME_DIRECTORY_URL . '/assets/js/dist/slick.min.js', array( 'jquery', 'jquery-migrate' ), '1.8.0', true );

	wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'wp-block-library' );

	if ( is_page( array( 'our-story', 'ruby', 'sapphires', 'spinel', 'tsavorite', 'peridot' ) ) ) {
		/*wp_enqueue_style( 
			'videojs-css', 
			STONES_THEME_DIRECTORY_URL . '/assets/css/video-js.min.css', 
			array(), 
			'7.10.2' 
		);*/
		wp_enqueue_script( 
			'videojs', 
			STONES_THEME_DIRECTORY_URL . '/assets/js/dist/videojs.js',
			array(), 
			'7.10.2', 
			true 
		);
	}
}
add_action( 'wp_enqueue_scripts', 'stones_scripts' );

/**
 * Lazyload stylesheets.
 */
function stones_lazyload_stylesheets() {
	$site_url = get_site_url();
	$uniqid = uniqid();
	$styles = [
		[
			'rel'   => 'stylesheet',
			'href'  => $site_url . '/wp-content/themes/stones-2021/style.css',
			'type'  => 'text/css',
			'media' => 'all',
			'id'    => 'stones-style-css'
		],
		[
			'rel'   => 'stylesheet',
			'href'  => $site_url . '/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.4',
			'type'  => 'text/css',
			'media' => 'all',
			'id'    => 'contact-form-7-css'
		],
	];

	if ( is_page( array( 'our-story', 'ruby', 'sapphires', 'spinel', 'tsavorite', 'peridot' ) ) ) {
		$videojs_css = [
			'rel'   => 'stylesheet',
			'href'  => $site_url . '/wp-content/themes/stones-2021/assets/css/video-js.min.css?ver=7.10.2',
			'type'  => 'text/css',
			'media' => 'all',
			'id'    => 'videojs-css-css'
		];

		array_push( $styles, $videojs_css );
	}

	echo '
	<script type="text/javascript">
		(function() {
			var ls'. $uniqid .' = '. json_encode($styles) .';
			ls'. $uniqid .'.forEach(function(attributes, index) {
			var link = document.createElement("link", attributes);
			for (var attribute in attributes) {
			link[attribute] = attributes[attribute];
		}

			document.getElementsByTagName("head")[0].appendChild(link);
		});
	})();
	</script>
	';
}
add_action( 'wp_footer', 'stones_lazyload_stylesheets', 1 );

/**
 * Load critical CSS
 */
function stones_load_critical_css() {

	if ( is_front_page() ) {
		$critical_css_file = 'assets/css/critical/home.min.css';
	} elseif ( is_page( 'our-story' ) ) {
		$critical_css_file = 'assets/css/critical/our-story.min.css';
	} elseif ( is_page( 'our-stones' ) ) {
		$critical_css_file = 'assets/css/critical/our-stones.min.css';
	} elseif ( is_page( array( 'ruby', 'sapphires', 'spinel', 'tsavorite', 'peridot' ) ) ) {
		$critical_css_file = 'assets/css/critical/stone.min.css';
	} elseif ( is_page( 'our-services' ) ) {
		$critical_css_file = 'assets/css/critical/our-services.min.css';
	} elseif ( is_page( 'sourcing-origins' ) ) {
		$critical_css_file = 'assets/css/critical/sourcing.min.css';
	} elseif ( is_page( 'our-factory' ) ) {
		$critical_css_file = 'assets/css/critical/our-factory.min.css';
	} elseif ( is_page( 'our-responsibility' ) ) {
		$critical_css_file = 'assets/css/critical/our-responsibility.min.css';
	} elseif ( is_page( 'contact-us' ) ) {
		$critical_css_file = 'assets/css/critical/contact-us.min.css';
	} elseif ( is_page( 'blog' ) ) {
		$critical_css_file = 'assets/css/critical/blog.min.css';
	} elseif ( is_single() ) {
		$critical_css_file = 'assets/css/critical/post.min.css';
	} elseif ( basename( get_page_template() ) === 'page.php' ) {
		$critical_css_file = 'assets/css/critical/default-page.min.css';
	} else {
		$critical_css_file = 'assets/css/critical/default-page.min.css';
	}
	?>
	<style>
	<?php include $critical_css_file; ?>
	</style>
	<?php
}
add_action( 'wp_head', 'stones_load_critical_css', 1 );

/**
 * Unload jQuery from head and load in footer.
 */
function mytheme_move_jquery_to_footer() {
	wp_scripts()->add_data( 'jquery', 'group', 1 );
	wp_scripts()->add_data( 'jquery-core', 'group', 1 );
	wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'mytheme_move_jquery_to_footer' );

/**
 * Preload Google fonts that are located in the theme.
 */
function stones_preload_fonts() {
	?>
	<link rel="preload" href="<?php echo STONES_THEME_DIRECTORY_URL . '/assets/fonts/Maven_Pro/MavenPro-latin-400.woff2'?>" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo STONES_THEME_DIRECTORY_URL . '/assets/fonts/Maven_Pro/MavenPro-latin-700.woff2'?>" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo STONES_THEME_DIRECTORY_URL . '/assets/fonts/Proza_Libre/Proza_Libre-latin-700.woff2'?>" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo STONES_THEME_DIRECTORY_URL . '/assets/fonts/Proza_Libre/Proza_Libre-latin-400.woff2'?>" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo STONES_THEME_DIRECTORY_URL . '/assets/fonts/Nothing_You_Could_Do/NothingYouCouldDo-Regular.woff2'?>" as="font" crossorigin="anonymous">
	<link rel="preload" href="<?php echo STONES_THEME_DIRECTORY_URL . '/assets/fonts/Cormorant_Garamond/Cormorant_Garamond-latin-400.woff2'?>" as="font" crossorigin="anonymous">
	<?php
}
add_action( 'wp_head', 'stones_preload_fonts' );

/**
 * Implement the Custom Header feature.
 */
require STONES_THEME_DIRECTORY_PATH . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require STONES_THEME_DIRECTORY_PATH . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require STONES_THEME_DIRECTORY_PATH . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require STONES_THEME_DIRECTORY_PATH . '/inc/customizer.php';

/**
 * Add theme options to WP admin panel with ACF Pro plugin.
 */
if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	) );
	
	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	) );
	
	acf_add_options_sub_page( array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	) );	

}

/**
 * Create numeric pagination for a custom post type and archive pages.
 *
 * @param int    $pages_of_posts Number of posts in WP Query.
 * @param int    $paged          Page number from WP Query.
 * @param string $slug           Page slug
 * @return void                  Outputs HTML.
 */
function bineks_pagination( $pages_of_posts, $paged, $slug ) {

	if ( $pages_of_posts > 1 ) {
		$site_url = get_site_url();
		?>
		<div class="pagination">
			<ul class="pagination__list">

			<?php if ( ( $paged - 1 ) > 1 ) : // generate a link to one page back if it exists ?>
				<?php $newer = $paged - 1; ?>
				<li class="pagination__newer-arrow">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $newer . '/' ); ?>"><?php esc_html_e( 'Previous', 'stones' ); ?></a>
				</li>
			<?php elseif ( ( $paged - 1 ) === 1 ) : ?>
				<?php $newer = $paged - 1; ?>
				<li class="pagination__newer-arrow">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/' ); ?>"><?php esc_html_e( 'Previous', 'stones' ); ?></a>
				</li>
			<?php endif; ?>

			<?php if ( ( $paged - 2 ) > 1 ) : // generate a link to two pages back if it exists ?>
				<?php $newer = $paged - 2; ?>
				<li class="pagination__newer-2">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $newer . '/' ); ?>">
						<?php echo esc_html( $newer ); ?>
					</a>
				</li>
			<?php elseif ( ( $paged - 2 ) === 1 ) : ?>
				<?php $newer = $paged - 2; ?>
				<li class="pagination__newer-2">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/' ); ?>">
						<?php echo esc_html( $newer ); ?>
					</a>
				</li>
			<?php endif; ?>

			<?php if ( ( $paged - 1 ) > 1 ) : // generate a link to one page back if it exists ?>
				<?php $newer = $paged - 1; ?>
				<li class="pagination__newer">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $newer . '/' ); ?>">
						<?php echo esc_html( $newer ); ?>
					</a>
				</li>
			<?php elseif ( ( $paged - 1 ) === 1 ) : ?>
				<?php $newer = $paged - 1; ?>
				<li class="pagination__newer">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/' ); ?>">
						<?php echo esc_html( $newer ); ?>
					</a>
				</li>
			<?php endif; ?>

				<li class="pagination__current">
					<?php echo esc_html( $paged ); // a holder for the current page ?>
				</li>

			<?php if ( ( $paged + 1 ) < $pages_of_posts ) : // generate a link to one page ahead if it exists ?>
				<?php $older = $paged + 1; ?>
				<li class="pagination__older">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $older . '/' ); ?>">
						<?php echo esc_html( $older ); ?>
					</a>
				</li>
			<?php endif; ?>

			<?php if ( ( $paged + 2 ) <= $pages_of_posts ) : // generate a link to two pages ahead if it exists ?>
				<?php $older = $paged + 2; ?>
				<li class="pagination__older-2">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $older . '/' ); ?>">
						<?php echo esc_html( $older ); ?>
					</a>
				</li>
			<?php endif; ?>

			<?php if ( ( $paged + 1 ) <= $pages_of_posts ) : // generate a link to one page ahead if it exists ?>
				<?php $older = $paged + 1; ?>
				<li class="pagination__older-arrow">
					<a href="<?php echo esc_url( $site_url . '/' . $slug . '/page/' . $older . '/' ); ?>"><?php esc_html_e( 'Next', 'stones' ); ?></a>
				</li>
			<?php endif; ?>
			</ul>
		</div>
		<?php
	}
}

/**
 * Load JS script file in head.
 *
 */
function stones_add_to_head() {
	?>
	<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=2ynchkpcpfwgppngnfg6lq" async="true"></script>
	<?php
}
add_action( 'wp_head', 'stones_add_to_head' );
