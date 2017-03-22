<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package strikebase
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'strikebase' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php strikebase_svg( get_template_directory_uri() . '/assets/svg/strikebase.svg' ); ?>
		</a>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<ul>
				<li><a href="/"><?php esc_html_e( 'Dashboard' ); ?></a></li>
				<li><a href="/projects"><?php esc_html_e( 'Projects' ); ?></a></li>
				<li><a href="/people"><?php esc_html_e( 'People' ); ?></a></li>
				<li><a href="/organizations"><?php esc_html_e( 'Organizations' ); ?></a></li>
			</ul>
		</nav>

		<?php strikebase_page_title(); ?>

		<?php strikebase_svg( get_template_directory_uri() . '/assets/svg/header-background.svg' ); ?>
	</header>
	<div id="content" class="site-content">
