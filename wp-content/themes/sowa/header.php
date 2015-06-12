<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/touchTouch.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/touchTouch.jQuery.js"></script>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-lg-md.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-sm.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style-xs.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">
    <script src="<?php echo get_template_directory_uri(); ?>/js/custom.js"></script>
</head>
<body <?php body_class(); ?>>
	<div id="page" class="container">
        <!--  Nagłówek -->
		<header class="row header">
            <div class="col-lg-3 col-md-3 col-sm-12 hidden-xs">
                <a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/img/logoa.png" alt="Sowa &amp; przyjaciele - restauracja"></a>
            </div>
            
            <?php
            $temp = get_pages(array('post_type' => 'sova_menu_item'));
            $menus = array();
            foreach($temp as $menu) {
                $menus[$menu->ID] = $menu->to_array();
            }
            unset($temp);
            
            //$menu = sowa_nav_menu($menus);
            
            
            
			//echo '<pre>'.print_r($menus, 1).'</pre>';
			?>
            
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="navbar navbar-default top-menu">
    				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
                        <div class="navbar-header">
    	                    <button data-target="#top-menu" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
    			              <span class="sr-only">Rozwiń nawigację</span>
    			              <span class="icon-bar"></span>
    			              <span class="icon-bar"></span>
    			              <span class="icon-bar"></span>
    			            </button>
    			            <a href="index.html" class="navbar-brand visible-xs-block">
                                Sowa &amp; przyjaciele
    			            </a>
                        </div>
                        
                        <?php
                        	$args = array(
                                'theme_location' => 'top-bar',
                                'depth'	=> 0,
                                'container'	=> 'div',
                                'menu_class'	=> 'nav navbar-nav',
                            	'container_class' => 'collapse navbar-collapse',
                        	    'container_id' => 'top-menu',
                        	    'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>',
                                'walker'	=> new wp_bootstrap_navwalker(),
                            );
                            wp_nav_menu($args);
                        	//do_action( 'jcs/split_menu' , $menu, $args );
                        ?>
                    </nav>
    			</div>
    		</div>
		</header>
		
		<!-- Rotator -->
        <div class="row rotator hidden-xs hidden-sm">
            <div class="col-lg-12">
                <div id="carousel-example-generic" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="<?php echo get_template_directory_uri(); ?>/rotate/1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/rotate/2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/rotate/3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/rotate/4.jpg" alt="">
                        </div>
                        <div class="item">
                            <img src="<?php echo get_template_directory_uri(); ?>/rotate/5.jpg" alt="">
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="icon-next"></span>
                    </a>
                </div>
            </div>
        </div>
