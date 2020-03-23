<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package yourweblayout
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>	
	
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'yourweblayout' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div id="logo">						
						<!-- If no logo uploaded, the Site Title will be pulled in through the dashboard General Settings -->
						<?php yourweblayout_custom_logo(); ?>
						<!-- The Tagline will be pulled in through the dashboard General Settings -->
						<!-- <h3 class="site-description"><?php //bloginfo( 'description' ); ?></h3> -->
					</div><!-- #logo -->
				</div><!-- .col -->
				<div class="col-md-6">
					<div class="header-widget-1">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-widget-1') ) : endif; ?>
					</div><!-- end header-widget-1-->
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
		<nav id="site-navigation" class="navbar navbar-default">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="navbar-header">
							<!--<a class="navbar-brand visible-xs" data-toggle="collapse" data-target="#primary-navbar" href="#">Main Menu</a>-->
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary-navbar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div><!-- .navbar-header -->
						<?php wp_nav_menu( array(
							'menu'              => 'primary',
							'theme_location'    => 'primary',
							'depth'             => 3,
							'container'         => 'div',
							'container_class'   => 'collapse navbar-collapse',
							'container_id'      => 'primary-navbar',
							'menu_class'        => 'navbar-nav mr-auto',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						) );
						?>
					</div><!-- .col -->
				</div><!-- .row -->
			</div><!-- .container -->
		</nav><!-- #site-navigation -->
	</header><!-- .site-header -->

	<div id="content" class="site-content">
		<div class="container">