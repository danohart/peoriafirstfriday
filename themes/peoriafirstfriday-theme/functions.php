<?php  
// flush_rewrite_rules( false );
 if ( function_exists('register_sidebar') )
   register_sidebar(array(
    'name' => 'Right Sidebar',
    'id' => 'right-sidebar',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
   ));

 if ( function_exists('register_sidebar') )
   register_sidebar(array(
    'name' => 'Footer',
    'id' => 'footer',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
   ));

function post_thumbnail_feeds($content) {

	global $post;

	if(has_post_thumbnail($post->ID)) {

		$content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;

	}

	return $content;

}

add_filter('the_excerpt_rss', 'post_thumbnail_feeds');

add_filter('the_content_feed', 'post_thumbnail_feeds');

add_theme_support( 'menus' );

function register_my_menus() {
  register_nav_menus(
    array(
    'main-menu' => __( 'Main Menu' )
    )
  );
}

add_action( 'init', 'register_my_menus' );

if ( function_exists( 'add_theme_support' ) ) { 
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true );

add_image_size( 'space', 500, 300, true );
}

function login_logo() { ?>
    <style type="text/css">
        body {
          background: #000000 !important;
        }
        .login form {
          background-color: #FFFFFF !important;
          box-shadow: none !important;
        }
        .login #backtoblog a, .login #nav a {
          color:#FFF !important;
        }
        .wp-core-ui .button-primary {
          border:none !important;
          background: #000000 !important;
        }
        #login h1 a, .login h1 a {
          background-image: url(<?php bloginfo('template_url');?>/images/logo-white.png);
          width: 100%;
          background-size: 40%;
          height: 160px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );

?>