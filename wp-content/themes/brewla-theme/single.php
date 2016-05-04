<?php
/*
 * Template Name: Brewla Faq
 * Description: This is the Default Homepage
*/

get_header();

?>

<section class="full-width">
	
	<div class="row">
	
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <div class="full-width push--20 padded-section" id="post-<?php the_ID(); ?>">

            <h1 class="hdg hdg--2 archer-bold red-text text-left"><?php the_title(); ?></h1>
			
			<div class="hdg hdg--5 gotham-book push--20">
				<?php the_content(); ?>
			</div>			
            
            <div class="push--20 section--divider hdg hdg--5 gotham-medium full-width">
            	<p>Posted <strong><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></strong> on <time datetime="<?php the_time('l, F jS, Y') ?>" pubdate><?php the_time('l, F jS, Y') ?></time></p> 
			</div>

			<div class="full-width push--20">
	            <div class="float-left post-link">
		            <?php previous_post_link( '%link', '&larr; %title', $in_same_term = true ); ?>
	            </div>
	            <div class="float-right post-link">
		            <?php next_post_link( '%link', '%title &rarr;', $in_same_term = true ); ?>
	            </div>
            </div>
    
           <?php endwhile; // end of the loop. ?>
        </div>
        
    </div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>