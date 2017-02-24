		<footer role="contentinfo">
			<div class="content">
				<a href="<?php echo home_url(); ?>" rel="nofollow">
					<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" alt="Secure California's Energy Future" class="logo" />
				</a>
				<nav role="navigation" aria-labelledby="footer navigation">
					<?php 
						wp_nav_menu(array(
							'container' => '',
							'menu' => __( 'Footer Links', 'bonestheme' ),
							'menu_class' => 'footer-nav',
							'theme_location' => 'footer-links',
							'before' => '',
							'after' => '',
							'depth' => 2,
						));
					?>
				</nav>
				<div class="copyright">
					<p>
						&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?><br />
					</p>
					<nav role="navigation" aria-labelledby="footer navigation">
						<?php 
							wp_nav_menu(array(
								'container' => '',
								'menu' => __( 'Copyright Links', 'bonestheme' ),
								'menu_class' => 'copyright-links',
								'theme_location' => 'copyright-links',
								'before' => '',
								'after' => '',
								'depth' => 1,
							));
						?>
					</nav>
				</div>
			</div>
		</footer>
		<?php wp_footer(); ?>
	</body>
</html>