<?php get_header(); ?>
			<?php if ( has_post_thumbnail() ) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'hero' );
			$url = $thumb['0']; ?>
			<?php } ?>
			<header role="banner" class="top" style="background-image: url('<?=$url?>');">
				<div class="content">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
						<h1><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" alt="Secure California's Energy Future" class="logo" /><span class="hidden">Secure California's Energy Future</span></h1>
					</a>
					<nav role="navigation" aria-labelledby="main navigation" class="desktop">
						<?php wp_nav_menu(array(
							'container' => false,
							'menu' => __( 'Main Menu', 'bonestheme' ),
							'menu_class' => 'main-nav',
							'theme_location' => 'main-nav',
							'before' => '',
							'after' => '',
							'depth' => 1,
						)); ?>
					</nav>
				</div>
			</header>
			<div class="content">
				<div class="col" id="main-content" role="main">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<header>
							<h1><?php the_title(); ?></h1>
							<hr />
							<h3><?php echo get_the_date(); ?></h3>
						</header>
						<section>
							<?php the_content(); ?>
						</section>
					</article>

				<?php endwhile; else : ?>

					<article id="post-not-found" <?php post_class( 'cf' ); ?> role="article">
						<h1>Page Not Found</h1>
						<section>
							<p>Sorry but the page you are looking for is not here. Consider visiting the <a href="<?php echo home_url(); ?>">homepage</a> or doing a site search.</p>
						</section>
					</article>

				<?php endif; ?>

				</div>
			</div>

<?php get_footer(); ?>