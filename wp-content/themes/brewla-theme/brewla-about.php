<?php
/*
 * Template Name: Brewla About
 * Description: This is the Default Homepage
*/

get_header();

?>


<section class="hero hero--main">
	
	<div class="hero__container">
        <?php pull_all_about_hero(); ?>
    </div>
    
</section>

<section class="hero--push full-width">
	<div class="full-width section section--white">
		<div class="row">
	        <?php pull_about_lead(); ?>
        </div>
	</div>
	<div class="full-width section section--white push--50 section--divider">
		<div class="row">
	        <?php pull_about_buckets(); ?>
        </div>
	</div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>