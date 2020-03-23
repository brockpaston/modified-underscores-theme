<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package yourweblayout
 */
?>

		</div><!-- .container -->
	</div><!-- .site-content -->
	
	<footer id="colophon" class="site-footer">
		<div class="container">
        	<div class="row">
				<div class="col-md-12">
					<nav id="footer-navigation" class="nav">
						<?php wp_nav_menu( array(
							'menu'              => 'secondary',
							'theme_location'    => 'secondary',
							'depth'             => 2,
							'container'         => 'div',
							'container_class'   => 'nav',
							'container_id'      => 'secondary-nav',
							'menu_class'        => 'nav nav-pills nav-justified',
							'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							'walker'            => new wp_bootstrap_navwalker())
							);
						?>
					</nav><!-- #footer-navigation -->
				</div><!-- .col -->
            </div><!-- .row -->
			<div class="row">
				<div class="col-md-12">
					<div class="attribution">
						<p>Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
						</p>
					</div><!-- .attribution -->
				</div><!-- .col -->
			</div><!-- .row -->
		</div><!-- .container -->
	</footer><!-- .site-footer -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
