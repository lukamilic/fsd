<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FSD
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
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fsd' ); ?></a> -->

	<header id="masthead" class="site-header">
		<!-- <nav class="navbar navbar-expand-lg static-top"> -->
  			<div class="container">
			  <div class="row align-items-center">
			  	<div class="col-9 col-sm-9 col-md-2">
				  <!-- <a class="navbar-brand" href="#"> -->
          		<img src="http://localhost:8888/fsd/wp-content/uploads/2020/03/logo.jpg" alt="">
        		</a>
				</div>
    			
    			<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> -->
          			<!-- <span class="navbar-toggler-icon"></span>
        		</button> -->
				
						<div class="col-3 col-sm-3 hamburger ml-auto none d-lg-none d-md-none  d-sm-flex justify-content-end">
							<div id="nav-icon1">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</div>
						<div class="col-md-10 show  d-md-block d-lg-block">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							
						) );
						?>
				</div>
    			</div>
				</div>
  			</div>
		<!-- </nav> -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
