<?php
/*
 Template Name: Home Page
*/
?>
<?php get_header(); ?>
			<?php if ( has_post_thumbnail() ) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'home-hero' );
			$url = $thumb['0']; ?>
			<?php } ?>
			<header role="banner" class="top" style="background-image: url('<?=$url?>');">
				<div class="content">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
						<h1><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" alt="Secure California's Energy Future" class="logo" /><span class="hidden"><?php bloginfo( 'name' ); ?></span></h1>
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
				<div class="content">
					<?php if(get_field('hero_caption_1') || get_field('hero_caption_2') ) { ?>
					<h2>
						<?php if(get_field('hero_caption_1')) { ?>
						<span><?php the_field('hero_caption_1'); ?></span>
						<?php } if(get_field('hero_caption_2')) { ?>
						<span><?php the_field('hero_caption_2'); ?></span>
						<?php } ?>
					</h2>
					<?php } ?>
					<?php if(get_field('hero_button_link')) { ?>
					<a href="<?php the_field('hero_button_link'); ?>" class="btn"><?php the_field('hero_button_text'); ?></a>
					<?php } ?>
				</div>
			</header>

			<div id="main-content" role="main">
				<section class="about" id="about">
					<div class="content">
						<h2>About</h2>
						<hr />
						<div class="col">
							<?php if(get_field('about_content')) { 
								the_field('about_content'); 
							} ?>
						</div>
						<div class="col">
							<?php if(get_field('about_toggle') == 'video') { ?>
							<div class="embed-container">
								<?php if(get_field('about_video')) { 
									the_field('about_video'); 
								} 
							} if(get_field('about_toggle') == 'image') {
								$image = get_field('about_image');
								$size = 'two-thirds-width';
								
								if( $image ) {
									echo wp_get_attachment_image( $image, $size );
								}
							} ?>
							</div>
						</div>
					</div>
				</section>
				<section class="coalition" id="coalition">
					<div class="content">
						<h2>Our Coalition</h2>
						<hr />
						<?php 
						$images = get_field('coalition_logos');
						if( $images ): ?>
						    <ul class="slider">
					        <?php foreach( $images as $image ): ?>
					            <li>
				                     <img src="<?php echo $image['sizes']['logo']; ?>" alt="<?php echo $image['alt']; ?>" />
					            </li>
					        <?php endforeach; ?>
						    </ul>
						<?php endif; ?>
					</div>
				</section>
				<section class="news" id="news">
						<h2>News</h2>
						<hr />
						<?php $posts_query = new WP_Query( array( 'posts_per_page' => '6', 'cat' => '1' ) );
						if ($posts_query->have_posts()) : ?>
						<ul>
						<?php while ($posts_query->have_posts()) : $posts_query->the_post(); ?>
							<a href="<?php the_permalink() ?>">
								<li>
									<h3><?php the_title(); ?></h3>
									<p>
										<?php if(get_field('short_description')) { ?>
										<?php the_field('short_description'); ?>
										<?php } else {
										$content = get_the_content();
										$trimmed_content = wp_trim_words( $content, 15, '...' );
										echo $trimmed_content;
										} ?>
									</p>
									<span>Read More</span>
								</li>
							</a>
						<?php endwhile; ?>
						</ul>
						<?php endif; ?>
						<div class="content">
							<?php $category_link = get_category_link('1');?>
							<a href="<?php echo esc_url( $category_link ); ?>" class="btn">View All News</a>
						</div>
				</section>
			</div>

<?php get_footer(); ?>