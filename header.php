<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lesson-18
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="profile" href="https://gmpg.org/xfn/11"> -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>	
		<header id="" class="header">
			<div class="logo">
				<a href="#top">
					skokov
				</a>
			</div>		
			<div class="menu__img menu__img--open" id="menuButtonOpen">
				
			</div>	
			<div class="menu--open" id="menu--open">
				<div class="menu__img menu__img--close" id="menuButtonClose">

				</div>			
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</div><!--  #site-navigation  -->
		</header> <!-- #masthead  -->

		<script type="text/javascript">
			let menu = document.getElementById('menu--open'),
					menuButtonOpen = document.getElementById('menuButtonOpen'),
					menuButtonClose = document.getElementById('menuButtonClose');

			// if (document.documentElement.clientWidth < 950) {
			// 	menu.style.display = 'none';
			// }

			menuButtonClose.onclick = function() {
				menu.style.display = 'none';
				menuButtonClose.style.display = 'none';
				menuButtonOpen.style.display = 'block';
			};

			menuButtonOpen.onclick = function() {
				menu.style.display = 'flex';
				menuButtonOpen.style.display = 'none';
				menuButtonClose.style.display = 'block';
			};
		</script>
