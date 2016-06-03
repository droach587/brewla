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
		            <?php 
			        	$cats = get_the_category();
						$cat_name = $cats[0]->name;
						$cat_slug = $cats[0]->slug;    
			        ?>
		            <a href="/<?php echo strtolower($cat_slug); ?>">&laquo; Back to <?php echo $cat_name; ?></a>
	            </div>
            </div>
    
           <?php endwhile; // end of the loop. ?>
        </div>
        
    </div>
	
<!-- Section Terminates Here -->
<?php get_footer(); ?>