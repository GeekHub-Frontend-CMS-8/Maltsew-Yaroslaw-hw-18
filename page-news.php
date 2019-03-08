<?php
	/*
	Template Name: News page
	*/
?>
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lesson-18
 */

get_header();
?>
	<div class="news-page">
		<div class="wrapper">
			<h1 class="news-page__title">
				News
			</h1>		
		</div>
			
		 <ul class="news-list">
 			
				<?php // Display blog posts on any page @ http://m0n.co/l
				$temp = $wp_query; $wp_query= null;
				$wp_query = new WP_Query(); $wp_query->query('showposts=5' . '&paged='.$paged);
				while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
 				
 				<li class="news-list__item" style="cursor: pointer" onclick="document.location.href='<?php echo the_permalink() ?>'">
					<img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="" class="news-list__img">
					
					<div class="news-list__text">
						<h3 class="news-list__title">
							<?php echo the_title(); ?>
						</h3>
						<div class="news-list__desc">
							<?php echo the_excerpt(); ?>
						</div>
						<p class="news-list__date">
							<?php echo the_date(); ?>
						</p>
					</div>
				</li>
 				
				<?php endwhile; ?>
 
				<?php if ($paged > 1) { ?>
				<?php } else { ?>
 
				<nav id="nav-posts">
						<div class="prev"><?php next_posts_link('&laquo; Previous Posts'); ?></div>
				</nav>
 
				<?php } ?>
 
				<?php wp_reset_postdata(); ?>
 
		</ul>
	</div>
	

<?php
get_sidebar();
get_footer();
