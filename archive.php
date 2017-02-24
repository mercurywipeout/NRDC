<?php get_header(); ?>
			<header role="banner" class="top">
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
					<h1 class="page-title"><?php single_cat_title(''); ?></h1>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" role="article">
						<header>
							<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
							<h3><?php echo get_the_date(); ?></h3>
						</header>
						<p>
							<?php if(get_field('short_description')) { ?>
							<?php the_field('short_description'); ?>
							<?php } else {
							$content = get_the_content();
							$trimmed_content = wp_trim_words( $content, 25, '...' );
							echo $trimmed_content;
							} ?>
						</p>
					</article>
					
					<hr />

					<?php endwhile; ?>

					<?php bones_page_navi(); ?>

					<?php else : ?>

					<article id="post-not-found" class="hentry cf">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>
					<?php endif; ?>
				</div>
			</div>

<?php get_footer(); ?>