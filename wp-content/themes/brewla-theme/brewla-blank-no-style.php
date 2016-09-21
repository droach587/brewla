<?php
/*
 * Template Name: Brewla Blank No Style
 * Description: This is the Default Homepage
*/

get_header('min');

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
	the_content();
endwhile; else: ?>
	<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>

<?php get_footer('min'); ?>