<?php  

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

function diw_post_thumbnail_feeds($content) {

	global $post;

	if(has_post_thumbnail($post->ID)) {

		$content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;

	}

	return $content;

}

add_filter('the_excerpt_rss', 'diw_post_thumbnail_feeds');

add_filter('the_content_feed', 'diw_post_thumbnail_feeds');

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

add_image_size( 'pages', 720, 300, true ); 
}

function login_logo() { ?>
    <style type="text/css">
        body {
          background: #3AA39F !important;
        }
        .login form {
          background-color: #d9f9f8 !important;
          box-shadow: none !important;
        }
        .login #backtoblog a, .login #nav a {
          color:#FFF !important;
        }
        .wp-core-ui .button-primary {
          border:none !important;
          background: #3aa39f !important;
        }
        #login h1 a, .login h1 a {
          background-image: url(<?php bloginfo('template_url');?>/images/logo.png);
          width: 100%;
          background-size: 40%;
          height: 160px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'login_logo' );

function natural_theme_wrapper_start() {
  echo '<div id="container"><div id="content" role="main">';
}

function natural_theme_wrapper_end() {
  echo '</div><!-- #content -->
  </div><!-- #container -->';
}

add_filter( 'single_add_to_cart_text', 'woo_custom_cart_button_text' );    // 2.1 +
function woo_custom_cart_button_text() {
  return __( 'Start Course', 'woothemes-sensei' );
}

add_filter( 'woocommerce_get_price_html', 'wpa83367_price_html', 100, 2 );
function wpa83367_price_html( $price, $product ){
    return '';
}

add_filter('add_to_cart_redirect', 'lessons_add_to_cart_redirect');
function lessons_add_to_cart_redirect() {
 global $woocommerce;
 $checkout_url = $woocommerce->cart->get_checkout_url();
 return $checkout_url;
}

add_filter( 'woocommerce_add_cart_item_data', 'woo_custom_add_to_cart' );

function woo_custom_add_to_cart( $cart_item_data ) {

    global $woocommerce;
    $woocommerce->cart->empty_cart();

    // Do nothing with the data and return
    return $cart_item_data;
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

?>