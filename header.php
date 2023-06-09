<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package remmie_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'remmie_theme' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			// the_custom_logo();
			// if ( is_front_page() && is_home() ) :
				?>
				<!-- <h1 class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></h1> -->
				<?php
			// else :
				?>
				<!-- <p class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></p> -->
				<?php
			// endif;
			// $remmie_theme_description = get_bloginfo( 'description', 'display' );
			// if ( $remmie_theme_description || is_customize_preview() ) :
				?>
				<!-- <p class="site-description"><?php //echo $remmie_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p> -->
			<?php //endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<!-- <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php //esc_html_e( 'Primary Menu', 'remmie_theme' ); ?></button> -->
			<?php
			// wp_nav_menu(
			//  array(
			// 		'theme_location' => 'menu-1',
			// 		'menu_id'        => 'primary-menu',
			// 	)
			// );
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div class="main-page-top">
    <div class="navbar">
        <!-- <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                        <div class="dropdown-menu-bg">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                Menu
                            </a>
                            
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Projects</a></li>
                                    <li><a class="dropdown-item" href="#">Certificates</a></li>
                                    <li><a class="dropdown-item" href="#">About Me</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->

        <nav>
                <ul>
                    <li><a href="http://localhost/portfolio/wordpress/">Home</a></li>
                    <li>
                        <a href="#">Menu</a>
                        <ul>
                            <li><a href="http://localhost/portfolio/wordpress/strona-glowna/projects/">Projects</a></li>
                            <li><a href="#">Certificates</a></li>
                            <li><a href="#">About Me</a></li>
                        </ul>
                    </li>
                </ul>
        </nav>

        <div class="social-buttons">
            <a href="https://www.linkedin.com/in/remigiusz-ciszewski-137068264/" target="_blank">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/remciszewski" target="_blank">
                <i class="fab fa-github"></i>
            </a>
        </div>
    </div>

</div>