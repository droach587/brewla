<?php
/*
 * Template Name: Brewla Blank w/ Header
 * Description: This is the Default Homepage
*/

get_header();

?>
<section class="hero hero--main">
		<div class="hero__container">
			<?php 
				global $post;	
			?>
	        <div class="hero__slide hero__slide--short" style="background-image: url(<?php echo get_field("header_page_background_image", $post->ID); ?>) !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase"><?php echo the_title(); ?></div>
			        </div>
				</div>
			</div>
		</div>
</section>

<section class="hero--push full-width">
	<div class="full-width padded-section">
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
				the_content();
			endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		</div>	
	</div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>