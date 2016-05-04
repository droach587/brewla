<?php
/*
 * Template Name: Brewla General
 * Description: This is the Default Homepage
*/

get_header();

?>

<section class="full-width">
	<div class="full-width padded-section">
		<div class="row">
			<h1 class="hdg hdg--2 red-text archer-bold"><?php echo get_the_title(); ?></h1>
		</div>
		<div class="row">
			<div class="full-width hdg hdg--5 push--30 hdg gotham-book">
				<?php 
					
					$page = get_page_by_title(get_the_title());
					$content = apply_filters('the_content', $page->post_content);
					
					echo $content;
				?>
			</div>
		</div>	
	</div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>