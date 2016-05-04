<?php
/*
 * Template Name: Brewla Flavors
 * Description: This is the Default Homepage
*/

get_header();

?>


<section class="hero hero--main">
	
	<div class="hero__container">
        <?php pull_all_flavors_hero(); ?>
    </div>
    
</section>

<section class="hero--push full-width flavors alternating-rows">
	<?php pull_all_flavors(); ?>
	
<!-- Section Terminates Here -->

<?php get_footer(); ?>