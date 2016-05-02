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

</head>

<body <?php body_class(); ?> id="top">
	
	<!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <header class="primary-header">
        <div class="full-width primary-logo--mobile text-center">
			<a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/brewla-logo-2x.png" width="128" height="auto" title="Brewla Speciality Brewed Bars" alt="Brewla Logo"></a>
			<a class="mobile-nav-toggle">
				<i class="fa fa-bars"></i>
			</a>
        </div>
		<ul class="primary-nav">
			<li><a href="#">about us</a></li>
			<li><a href="#">our flavors</a></li>
			<li><a href="#">locations</a></li>
			<li class="primary-nav__logo">
				<a href="#"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/brewla-logo-2x.png" width="128" height="auto" title="Brewla Speciality Brewed Bars" alt="Brewla Logo"></a>
			</li>
			<li><a href="#">shop</a></li>
			<li><a href="#">stick with us</a></li>
			<li><a href="#">more</a></li>
			<li class="primary-nav__search"><a href="#"><i class="fa fa-search"></i></a></li>
			<li class="primary-nav__social"><a href="#"><i class="fa fa-facebook"></i></a></li>
			<li class="primary-nav__social"><a href="#"><i class="fa fa-twitter"></i></a></li>
			<li class="primary-nav__social"><a href="#"><i class="fa fa-instagram"></i></a></li>
		</ul>
		<div class="primary-header__search">
			<form>
				<input type="text" value="" placeholder="How can we help you?">
				<button type="submit"><i class="fa fa-search"></i></button>
			</form>
		</div>
    </header>
