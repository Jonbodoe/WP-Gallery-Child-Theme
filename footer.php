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

<footer id="colophon" class="">
	<div class="container-fluid bg-dark pt-3">
		<div class="row site-info px-3 py-5 flex-wrap-reverse">
			<div class="col-md-3 d-flex align-items-center">
				<div class="py-4 hide-mobile">
					<?php
					print_r(get_custom_logo(['class' => 'img-fluid']));
					?>
				</div>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-2">
				<p class="font-bold-600 text-light">Location</p>
				<p class="text-gray">
					Works On Paper<br />
					1611 Walnut St # B<br />
					Philadelphia, PA 19103<br />
				</p>
			</div>
			<div class="col-md-2">
				<p class="font-bold-600 text-light">Gallery Hours</p>
				<p class="text-gray">
					Tuesday - Friday : 11am -5pm<br />
					Sunday - Monday : Closed<br />
				</p>
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