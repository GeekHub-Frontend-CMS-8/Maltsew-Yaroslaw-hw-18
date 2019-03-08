<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lesson-18
 */

get_header();
?>
	<section class="main-section">
		<div class="wrapper">
			<div class="main-section__content">
				<h1 class="title--white main-section__title title--page">
					Global management consulting agency
				</h1>
				<p class="main-section__desc">
					Growth doesn't always go the way you expect. Our strategy consultants can help you climb.
				</p>
				<div class="main-section__button-list">
					<button class="button button--red">
						Get started
					</button>
					<button class="button button--black">
						Learn more
					</button>
				</div>
			</div>			
		</div>		
	</section>	

	<section class="services">
		<div class="wrapper">
			<h3 class="title--section">
				our services
			</h3>
			<p class="desc--section">
				Our management consulting services focus on our clients' most critical issues and opportunities. We have proven 
				a multiplier effect from optimizing the sum of the parts, not just the individual pieces.
			</p>
			<ul class="services-list">
				<?php foreach(getServices() as $post): ?>
					<li class="services-list__item">
						<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>" alt="" class="services__img">
						<h3 class="services__title">
							<?php echo the_title(); ?>
						</h3>
						<p class="services__text">
							<?php echo $post->post_content; ?>
						</p>
					</li>
				<?php endforeach; ?>	
			</ul>
		</div>
	</section>

	<section class="contact-link">
		<div class="wrapper">
			<div class="contact-link__content">
				<h3 class="title--white">
					Contact us for a FREE, NO OBLIGATION confidential 
					exploration of your needs
				</h3>
				<a href="" class="button button--red">
					Contact Us
				</a>				
			</div>
		</div>
	</section>

	<section class="about">
		<div class="wrapper">
			<h3 class="title--section">
				about us
			</h3>
			<p class="desc--section">
				SKOKOV is one of the world's leading management consulting firms. We care for our clients' business as our 
				own, they know we're in this together
			</p>
			<div class="about__content">
				<div class="about__do">
					<h5 class="title--red">
						What we do
					</h5>
					<p class="about__desc">
						When someone asks what we do SKOKOV, it’s tempting to point out our 
						four-decade track record for helping to transform the world’s great companies 
						into sharper, smarter, better versions of themselves. It’s true, our mission is to 
						help management teams create such high levels of economic value that together 
						we redefine our respective industries.
						We work with top executives to help them make better decisions, convert those 
						decisions to actions, and deliver the sustainable success they desire. For forty 
						years, we've been passionate about achieving better results for our 
						clients-results that go beyond financial and are uniquely tailored, pragmatic, 
						holistic, and enduring.
						We advise global leaders on their most critical issues and opportunities: strategy, 
						marketing, organization, operations, technology, transformations and 
						mergers & acquisitions, across all industries and geographies. 
						Our unique approach to traditional change management, called 
						Results Delivery®, helps clients measure and manage risk and overcome the 
						odds to realize results.
					</p>
				</div>
				<div class="about__clients">
					<h5 class="title--red">
						our clients
					</h5>
					<ul class="about__clients-list">
						<!-- li.about__clients-item*4>img.about__clients-img[src="img/about/clients/$.png"] -->
						<?php foreach(getClients() as $post): ?>
							<li class="about__clients-item">
								<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>" alt="" class="about__clients-img">
							</li>
						<?php endforeach; ?>	
					</ul>
				</div>
				<div class="about__team">
					<h5 class="about__title title--red">
						our team
					</h5>
					<ul class="about__team-list">
						<?php foreach(getTeam() as $team): ?>
							<li class="about__team-item">
								<div class="about__team-item-text">
									<h3 class="about__team-item-name">
										<?php echo $team['name'] ?>
									</h3>
									<p class="about__team-item-desc">
										<?php echo $team['Description'] ?>
									</p>
									<p class="about__team-item-prof">
										<?php echo $team['Job'] ?>
									</p>
								</div>
								<img src="<?php echo $team['img'] ?>" alt="" class="about__team-img">
							</li>
						<?php endforeach; ?>	
					</ul>
				</div>
			</div>
		</div>
	</section>

	<section class="approach">
		<div class="wrapper">
			<div class="approach__content">
				<img src="" alt="" class="approach__button">
				<h3 class="title title--white">
					we blend the strategic with creative
				</h3>
				<p class="desc--section">
					When someone asks what we do at SKOKOV, it’s tempting to point out our four-decade track record for helping to transform 
					the world’s great companies into sharper, smarter, better versions of themselves. 
				</p>
			</div>
		</div>
	</section>

	<section class="news">
		<div class="wrapper">
			<h3 class="title--section">
				news
			</h3>
			<p class="desc--section">
				Together, we find value across boundaries, develop insights to act on, and energize teams to sustain success. We're passionate about 
				always doing the right thing for our clients, our people and our communities, even if it isn't easy.
			</p>
		</div>
		<ul class="news-list">
			<!-- li.news-list__item{$}*3 -->
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<!-- Цикл WordPress -->
					<li class="news-list__item" style="cursor: pointer" onclick="document.location.href='<?php echo the_permalink() ?>'">
						<img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="" class="news-list__img">
						
						<div class="news-list__text">
							<h3 class="title--red">
								<?php echo the_title(); ?>
							</h3>
							<div class="news-list__desc">
								<?php echo the_excerpt(10); ?>
							</div>
							<p class="news-list__date">
								<?php echo the_date(); ?>
							</p>
						</div>
					</li>					
				<?php endwhile; else : ?>
					<h1>Clear</h1>
				<?php endif; ?>
		</ul>		
	</section>

	<section class="contact">
		<div class="wrapper">
			<div class="contact-content">
				<div class="contact-about-block">
					<h3 class="contact-about-block__title">
						skokov
					</h3>
					<p class="contact-about-block__desc">
						Thank you for your interest in SKOKOV. Please contact us using the 
						information below. To locate contacts in the SKOKOV office closest to 
						you, visit our office websites. To get the latest updates from SKOKOV, 
						subscribe to a newsletter or connect with us on social media.
					</p>
					<div class="contact-about-block__contact-info">
						<?php foreach(getContact() as $post): ?>
							<p class="contact__adress">
								<img src="<?php echo get_the_post_thumbnail_url( $post->ID) ?>">
								<?php echo the_title(); ?>
							</p>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="contact-form-block">
					<h3 class="contact-form-block__title">
						contact
					</h3>
					<p class="contact-form-block__desc">
						Please contact us using contact form below.
					</p>
					<form action="get" class="contact-form">
						<label for=""></label>
						<input type="text" placeholder="Name">
						<label for=""></label>
						<input type="text" placeholder="Email">
						<label for=""></label>
						<input type="text" placeholder="Subject">
						<textarea placeholder="Message"></textarea>
						<div class="contact__button-container">
							<button type="submit" class="button button--red">
								Submit
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<?php
get_footer(); ?>