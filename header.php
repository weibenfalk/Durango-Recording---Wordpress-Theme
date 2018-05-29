<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Durango_Recording
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site" >

	<header id="masthead" class="site-header" role="banner">

		<div class="container-fluid  navbar-static-top">
			<div class="container header-container">
				<div class="row" >
					<!-- Theme Logo -->
					<div class="col-md-12">
						<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
							<div class='site-logo'>
								<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img class="header-logo" src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
							</div>
						<?php else : ?>
							<hgroup>
								<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
								<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
							</hgroup>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div id="content" class="site-content">