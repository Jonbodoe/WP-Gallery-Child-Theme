<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Gallery
 */

?>

<?php 
	$footer_settings = get_field('footer_settings', 'option'); 
	// print_r($footer_settings);
	if (!empty($footer_settings)) :
		$footer_logo = $footer_settings['logo'];
		$footer_address = $footer_settings['location'];
		$footer_hours = $footer_settings['hours'];
	endif;
?>

<footer id="colophon" class="">
	<div class="container-fluid bg-dark pt-3">
		<div class="row site-info px-3 py-5 flex-wrap-reverse">
			<div class="col-md-3 d-flex align-items-center">
				<div class="py-4 hide-mobile">
					<img class="img-fluid img-logo" src=" <?php echo !empty($footer_logo) ? $footer_logo: ''; ?>">
				</div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-2">
				<p class="font-bold-600 text-light">Location</p>
				<div class="text-gray">
					<?php 
						echo !empty($footer_address) ? $footer_address : '';
					?>
				</div>
			</div>
			<div class="col-md-2">
				<p class="font-bold-600 text-light">Gallery Hours</p>
				<div class="text-gray">
					<?php 
						echo !empty($footer_hours) ? $footer_hours: '';
					?>
				</div>
			</div>
			<div class="col-md-2">
				<p class="font-bold-600 text-light">More Information</p>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu' => 'Footer Links',
						'menu_class' => 'no-bullets pb-4',
					)
				);
				?>
			</div>
		</div>
	</div><!-- .site-info -->
	<div class="container-fluid bg-dark border-top border-info">
		<div class="row d-flex px-4 py-2 flex-wrap-reverse justify-content-between align-items-center">
			<!-- <div class="col-md-6"> -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu' => 'Social Links',
						'menu_class' => 'no-bullets d-flex py-2',
					)
				);
				?>
			<!-- </div> -->
			<!-- <div class="col-md-6"> -->
				<p class="text-gray no-margin">
					WP Gallery & Works On Paper, Inc. © <?php echo date("Y"); ?>
				</p>
			<!-- </div> -->
		</div>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>