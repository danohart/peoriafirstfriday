<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>  

<head profile="http://gmpg.org/xfn/11">  
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
<link rel="icon" href="<?php bloginfo('template_url');?>/favicon.ico" type="image/x-icon" />

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" /> 
<?php wp_head(); ?>

<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Open+Sans" rel="stylesheet">

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css"/>

<meta property="og:title" content="<?php wp_title(); ?>" />
<meta property="og:type" content="website" />
<meta property="og:site_name" content="<?php wp_title(); ?>" />
<meta property="fb:admins" content="595996194" />
<meta property="og:image" content="<?php bloginfo(template_url); ?>/images/logo-black.png" />
<meta property="og:url" content="<?php the_permalink(); ?>" />

</head>

<?php echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>

<div id="header" style="background:linear-gradient(rgba(126, 55, 45, .6), rgba(20,20,20, .6)), url(<?php the_post_thumbnail_url('large');?>) no-repeat;">

  <div id="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
      <img src="<?php bloginfo('template_url'); ?>/images/logo-white.png"/>
    </a>
  </div>

 <!--- <ul class="nav">
      <?php wp_nav_menu( array('menu' => 'Main Nav', 'theme_location' => 'main-menu', 'items_wrap' => '%3$s', 'container' => 'false'  )); ?>
  </ul>-->

    <?php if (is_front_page()) {?>

    <?php } else { ?>
 
    <?php } ?>