<?php
/*
 * Template Name: Brewla Shop
 * Description: This is the Default Homepage
*/

get_header();

?>


<section class="hero hero--main">
	
	<div class="hero__container">
        <?php pull_all_shop_hero(); ?>
    </div>
    
</section>

<section class="hero--push full-width">
	<div class="full-width padded-section">
		<div class="row">
			<div class="full-width general-grid">
				<?php pull_all_shop(); ?>
			</div>
		</div>
	</div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>