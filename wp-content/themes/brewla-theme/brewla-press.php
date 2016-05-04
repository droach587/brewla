<?php
/*
 * Template Name: Brewla Press
 * Description: This is the Default Homepage
*/

get_header();

?>


<section class="hero hero--main">
	
	<div class="hero__container">
        <?php pull_all_press_hero(); ?>
    </div>
    
</section>

<section class="hero--push full-width">
	<div class="full-width padded-section">
		<div class="row">
			<div class="full-width general-grid" data-count="<?php pull_all_press_count(); ?>">
				<?php pull_all_press(); ?>
			</div>
			
			<div class="columns large-12 more-post-cont hidden">
				<?php if(is_category()): ?>
				    <button id="more_posts" data-cat="<?php echo get_the_category()[0]->cat_ID; ?>" class="btn btn--black full-width text-center push--40" data-cat="">Load More Press</button>
				<?php else: ?>
				    <button id="more_posts" class="btn btn--black full-width text-center push--40" data-cat="<?php echo get_cat_ID( 'press' ); ?>">Load More Press</button>
				<?php endif; ?>
			</div>
			
		</div>
	</div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>