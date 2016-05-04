<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<title>
	<?php
	global $page, $paged;
	wp_title( '|', true, 'right' );
		bloginfo( 'name' );
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " | $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
	?>
</title>
<meta name="description" content="<?php if ( is_single() ) {
	single_post_title('', true);
	} else {
	bloginfo('name'); echo " - "; bloginfo('description');
	}
?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo bloginfo('template_directory'); ?>/favicon.png">
	<link rel="apple-touch-icon" href="<?php echo bloginfo('template_directory'); ?>/apple-touch-icon-precomposed.png"/>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/vendor-non-build/modernizr.custom.71136.js"></script>

	<?php wp_head(); ?>
	
	<?php if(is_single()): ?>	
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<?php endif; ?>

</head>

<body <?php body_class(); ?> id="top">
	
	<!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <header class="primary-header">
        <div class="full-width primary-logo--mobile text-center">
			<a href="<?php echo get_home_url(); ?>"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/brewla-logo-2x.png" width="128" height="auto" title="Brewla Speciality Brewed Bars" alt="Brewla Logo"></a>
			<a class="mobile-nav-toggle" href="!#">
				<i class="fa fa-bars"></i>
			</a>
        </div>
		<ul class="primary-nav">
<!--
			<li><a href="#">about us</a></li>
			<li><a href="#">our flavors</a></li>
			<li><a href="#">locations</a></li>
-->
			<?php wp_nav_menu(array(
				'menu' => 'Main Nav Left',
				'container' => false,
				'items_wrap' => '%3$s'
			)); ?>
			<li class="primary-nav__logo">
				<a href="<?php echo get_home_url(); ?>"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/brewla-logo-2x.png" width="128" height="auto" title="Brewla Speciality Brewed Bars" alt="Brewla Logo"></a>
			</li>
<!--
			<li><a href="#">shop</a></li>
			<li><a href="#">stick with us</a></li>
			<li><a href="#">more</a></li>
-->
			<?php wp_nav_menu(array(
				'menu' => 'Main Nav Right',
				'container' => false,
				'items_wrap' => '%3$s'
			)); ?>
	
			<li class="primary-nav__search"><a href="!#"><i class="fa fa-search"></i></a></li>
<!--
			<li class="primary-nav__social"><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li class="primary-nav__social"><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li class="primary-nav__social"><a href="#"><i class="fa fa-instagram"></i></a></li>
-->
			<?php wp_nav_menu(array(
				'menu' => 'Main Nav Social',
				'container' => false,
				'items_wrap' => '%3$s'
			)); ?>
		</ul>
		<div class="primary-header__search">
			<form role="search" method="get" class="searchform group" action="<?php echo home_url(); ?>">
				<input type="text" value="<?php echo get_search_query() ?>" name="s" placeholder="How can we help you?">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
    </header>
