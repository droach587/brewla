<?php
/*
 * Template Name: Brewla Faq
 * Description: This is the Default Homepage
*/

get_header();

?>


<section class="hero hero--main">
	
	<div class="hero__container">
        <?php pull_all_faq_hero(); ?>
    </div>
    
</section>

<section class="hero--push full-width">
	<div class="full-width padded-section">
		<div class="row">
			<?php pull_all_faqs(); ?>
		</div>	
	</div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>