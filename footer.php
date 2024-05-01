<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shapiro
 */

?>

<footer id="colophon" class="site-footer">

	<?php $select_footer = get_theme_mod('footer_option'); ?>
	<?php if ($select_footer === 'footer-1') : ?>

		<div class="footer-simple">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-lg-6">
						<div class="simple-footer-logo">
							<?php

							$image = get_theme_mod('footer_logo', '');
							if (!empty($image)) : ?>
								<img src="<?php echo $image; ?>" alt="" srcset="" />
							<?php else : ?>

								<h2 class="site-title">
									<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
										<?php echo get_theme_mod('footer_logo_id'); ?>
									</a>
								</h2>
							<?php endif; ?>

						</div>
					</div>
					<div class="col-lg-6">
						<div class="simple-footer-content">
							<p>
								<?php echo get_theme_mod('footer_copyright') ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php else : ?>

		<div class="footer-main">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('footer-1'); ?>
				</div>
			</div>
		</div>

	<?php endif; ?>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>