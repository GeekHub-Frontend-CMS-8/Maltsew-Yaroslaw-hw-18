<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lesson-18
 */

?>
	<section class="post">
		<div class="wrapper">
			<div class="post__img" style="background: url('<?php echo get_the_post_thumbnail_url() ?>') no-repeat; background-size: 100% 100%">
				<h3 class="post__title">
					<?php 
						if ( is_singular() ) :
							the_title();
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;						
					?>
				</h3>
			</div>
			<div class="post__text">
				<?php the_content() ?>
			</div>
