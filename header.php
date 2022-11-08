<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package itrebels
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'itrebels' ); ?></a>

	<!-- Navbar Start -->
<div class="container-fluid bg-white position-relative">
        <nav id="header-menu" class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand text-secondary">
				<?php the_custom_logo(); ?>
                <h2 class="display-4 text-uppercase"><?php bloginfo( 'name' ); ?></h2>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0 pr-3 border-right">
                    <a href="./" class="nav-item nav-link home active">Home</a>
                    <a href="./about.php" class="nav-item nav-link about">About</a>
                    <!-- <a href="service.html" class="nav-item nav-link services">Services</a> -->
                    <!-- <a href="price.html" class="nav-item nav-link prices">Prices</a>
                    <a href="project.html" class="nav-item nav-link projects">Projects</a> -->
                    <div class="nav-item dropdown">
                        <a href="./services.php" class="nav-link dropdown-toggle services" data-toggle="dropdown">Services</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="./services.php" class="dropdown-item">Services</a>
                            <!-- <a href="team.html" class="dropdown-item">Website Development</a> -->
                            <!-- <a href="testimonial.html" class="dropdown-item">Website Maintainance</a> -->
                        </div>
                    </div>
                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                <div class="d-none d-lg-flex align-items-center pl-4">
                    <i class="fa fa-2x fa-mobile-alt text-primary mr-3"></i>
                    <div>
                        <h6 class="text-body text-uppercase mb-1"><small>Call Anytime</small></h6>
                        <h6 class="m-0">+91 702 124 5436</h6>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$itrebels_description = get_bloginfo( 'description', 'display' );
			if ( $itrebels_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $itrebels_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'itrebels' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
