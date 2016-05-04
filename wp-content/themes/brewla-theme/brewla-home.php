<?php
/*
 * Template Name: Brewla Home
 * Description: This is the Default Homepage
*/

get_header();

?>


<section class="hero hero--main">

	<div class="hero__container">
        <?php pull_all_hp_hero(); ?>
    </div>

</section>

<section class="hero--push full-width">

	<div class="full-width">
		<div class="card card--red columns large-5 medium-12 text-center">
			<div class="hdg hdg--2 archer-bold hdg--white uppercase">brewla flavors</div>
			<div class="push--20">
				<a href="/flavors"><img src="<?php echo bloginfo('template_directory'); ?>/assets/img/brewla-flavors-2x.png" width="100%" height="auto"></a>
			</div>
			<div class="push--20">
				<div class="hdg hdg--white gotham-bold hdg--4 hdg--white">50 calories or less &bull; Craft-brewed ingredients</div>
			</div>
		</div>
		<div class="float-left large-7 medium-12 photo-grid">
    		<?php get_latest_ig(); ?>
		</div>
	</div>

	<div class="full-width section section--white">
		<div class="row">
	        <?php pull_all_hp_about_lead(); ?>
        </div>
	</div>

	<div class="full-width section section--med-padding section--blue">
		<div class="full-width">
			<div class="row">
				<div class="columns large-2 text-center">
					<i class="fa fa-twitter large-twitter"></i>
				</div>
				<div class="columns large-10">
					<div class="hdg hdg--3 archer-bold hdg--white push--20 break-work">
						Excited to learn about #rethink coding @girlswhocode founder Reshma Saujani - so inspiring!! @ Grind http://instagram.com/p/qML4P2C26W/
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="full-width section section--no-padding">
		<?php pull_recent_press(); ?>
	</div>

<!-- Section Terminates Here -->

<?php get_footer(); ?>