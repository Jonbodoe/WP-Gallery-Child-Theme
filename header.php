<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Gallery
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site text-dark">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'wp-gallery'); ?></a>
		<header id="masthead" class="">
			<nav id="site-navigation" class="fixed-top main-navigation navbar navbar-dark bg-dark navbar-expand-lg d-flex border-bottom border-info <?php echo is_user_logged_in() ? 'wp-nav-margin' : '' ?>">
				<div class="site-branding">
					<div class="navbar-brand">
						<?php
						the_custom_logo();
						?>
					</div>
					<?php
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					endif;
					$wp_gallery_description = get_bloginfo('description', 'display');
					if ($wp_gallery_description || is_customize_preview()) :
					?>
					<?php endif; ?>
				</div><!-- .site-branding -->
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>															?></button> -->
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<div class="navbar-nav ml-auto">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu' => 'Primary Menu',
								'menu_id'        => 'primary-menu navigation',
								'menu_class' => 'text-center',
							)
						);
						?>
					</div>
				</div>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->