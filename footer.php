<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FSD
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container pt-5 pb-5">
			<div class="row pb-5">
				<div class="col-sm-12 col-md-3">
					<div class="footer--logo">
						<?php 
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						 $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
						?>
						 <img src="<?php echo $logo[0] ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
					</div>
					<div class="copyright pt-5 mb-3">
						<p class="mb-0">&copy; Copyright 2009-20014,</p>
						<p class="mb-0">All Rights Reserved</p>
						<p class="mb-0">Created and Hosted by AAA</p>
					</div>
				</div>
				<div class="col-sm-12 col-md-3">
					<h4>Kontakt</h4>
					<ul>
						<li><span class="fw-bold">Naziv firme: </span> Lorem ipsum dolor</li>
						<li><span class="fw-bold">Tel./ Fax: </span><a href="tel:0181/4681-1681">0181/4681-1681</a></li>
						<li><span class="fw-bold">Prodaja: </span><a href="tel:0381/4111681">0381/4111681,</a><br><a href="tel:1515/46818-486">1515/46818-486</a></li>
						<li><span class="fw-bold">e-mail: </span><a href="mailto:office@gmail.com">office@gmail.com</a></li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-4">
					<h4>Najnovije vesti</h4>
					<ul class="news-footer mr-5">
						<li class="pb-2">Lorem ipsum dolor sit amet</li>
						<li class="pb-2 pt-3">Lorem ipsum dolor sit amet</li>
						<li class="pb-2 pt-3">Lorem ipsum dolor sit amet</li>
						<li class="pb-2 pt-3">Lorem ipsum dolor sit amet</li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-2">
				<h4>Mapa Sajta</h4>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'footer-menu',
						'menu_id' => 'footer-menu',
						// 'menu_class' => '',
					));
				?>
				</div>
			</div>
		</div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
