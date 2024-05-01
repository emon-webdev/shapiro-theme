<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package shapiro
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
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e('Skip to content', 'shapiro'); ?>
		</a>



		<header id="masthead" class="site-header">

		<?php $select_header = get_theme_mod('header_option'); ?>

		<?php if ($select_header === 'header-1'): ?>

			<div class="header-style-one">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-md-6">
							<div class="header-one-logo">

								<?php
									$custom_logo_id = get_theme_mod('custom_logo');
									if (!empty($custom_logo_id)):
										the_custom_logo();
									else: ?>
									<h2 class="site-title">
										<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo bloginfo('name'); ?></a>
									</h2>
								<?php endif; ?>

								<?php
								$custom_logo_id = get_theme_mod('custom_logo');
								if (!empty($custom_logo_id)): ?>
									<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
										<?php get_theme_mod('custom_logo'); ?>
										<span><?php echo bloginfo('name'); ?></span>
									</a>
								<?php	else: ?>
									<h2 class="site-title">
										<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo bloginfo('name'); ?></a>
									</h2>
									
								<?php endif; ?>
							</div>
						</div>
						<div class="col-md-6">
							<div class="header-button-2">
								<a href="tel:+4106624764">(410) 662-4764</a>
							</div>
						</div>
					</div>
				</div>
			</div>	

			<?php else: ?>

			<div class="main-header">
				<div class="header_top">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<div class="header_top_left">
									<div class="header_call_info">
										<a href="tel:6585881503">
											<span>
												<i class="fa fa-phone"></i></span>
											+65 85881503</a>
										<a href="mailto:ENQUIRY@CITYWIDE.SG">
											<span>
												<i class="fa fa-envelope-o"></i>
											</span>
											ENQUIRY@GAMIL.COM</a>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="header_top_right ">
									<div class="header_socials">
										<a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
										<a href=""><i class="fa fa-google" aria-hidden="true"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="header_navigation">
					<div class="container">
						<nav class="navbar navbar-expand-lg navbar-light">
							<?php
							$custom_logo_id = get_theme_mod('custom_logo');
							if (!empty($custom_logo_id)):
								the_custom_logo();
							else: ?>
								<h2 class="site-title">
									<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo bloginfo('name'); ?></a>
								</h2>
								
							<?php endif; ?>
							
							<button class="navbar-toggler" type="button" data-toggle="collapse"
								data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
								aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'container_class' => 'collapse navbar-collapse justify-content-end',
										'container_id' => 'navbarTogglerDemo02',
										'menu_class' => 'navbar-nav ml-auto',
										'menu_id' => 'primary-menu',
									)
								);
							?>
						</nav>
					</div>
				</div>
			</div>

		<?php endif; ?>									


		</header><!-- #masthead -->