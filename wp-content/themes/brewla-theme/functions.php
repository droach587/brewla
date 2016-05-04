<?php

add_theme_support( 'menus' );

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<aside>',
		'after_widget' => '</aside>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
));

add_post_type_support('page', 'excerpt');

function post_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>

			<p class="comment-meta">
				<?php printf( __( '%s' ), sprintf( '%s', get_comment_author_link() ) ); ?>

                <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                    <?php printf( __( '%1$s' ), get_comment_date() ); ?>
                </a>

                <?php if ( $comment->comment_approved == '0' ) : ?>
                    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
                <?php endif; ?>
            </p>
		</div>

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>

	<li class="post pingback">
		<p><?php _e( 'Pingback:' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)' ), ' ' ); ?></p>
	<?php

		break;
	endswitch;
}

// Custom functions

/* nav menus */
if ( function_exists( 'register_nav_menu' ) ) {
	register_nav_menu('main_nav_left', __('Header Navigation Left'));
	register_nav_menu('main_nav_right', __('Header Navigation Right'));
	register_nav_menu('main_nav_social', __('Header Navigation Social'));

	register_nav_menu('footer_nav_col_one', __('Footer Navigation One'));
	register_nav_menu('footer_nav_col_two', __('Footer Navigation Two'));
	register_nav_menu('footer_nav_col_three', __('Footer Navigation Three'));
	register_nav_menu('footer_nav_legal', __('Footer Navigation Legal'));
}

function pull_all_hp_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'hp-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = get_field("pop_image", $post->ID);
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		echo '
			<div class="hero__slide" style="background-image: url('.$bgImage.') !important;">
		        <div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
		        <div class="hero__content-box">
			        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
			        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
		        </div>
			</div>
		';
	}

    wp_reset_postdata();
}

function pull_all_faq_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'faqs-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}

function pull_all_jobs_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'jobs-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}


function pull_all_about_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'about-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}

function pull_all_press_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'press-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}

function pull_all_blog_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'blog-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}


function pull_all_shop_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'shop-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}

function pull_all_flavors_hero(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'flavors-hero',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$bgImage = get_field("background_image", $post->ID);
		$productImage = (get_field("pop_image", $post->ID))? get_field("pop_image", $post->ID) : false ;
		$headline = get_field("headline", $post->ID);
		$subHeadline = get_field("sub_headline", $post->ID);

		if($productImage){
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__bar" style="background-image: url('.$productImage.') !important;"></div>
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}else{
			echo '
				<div class="hero__slide hero__slide--short" style="background-image: url('.$bgImage.') !important;">
				<div class="hero__content-box">
				        <div class="hdg hdg--1 archer-bold hdg--white uppercase">'.$headline.'</div>
				        <div class="hdg hdg--3 gotham-bold hdg--white uppercase">'.$subHeadline.'</div>
			        </div>
				</div>
			';
		}


	}

    wp_reset_postdata();
}

function pull_all_hp_about_lead(){

	$page = get_page_by_title( 'About Us' );
	$featuredImage = get_field("founders_pic", $page->ID);
	$headline = get_field("homepage_headline", $page->ID);
	$excerpt = get_field("homepage_excerpt", $page->ID);
	$link = get_field("homepage_link", $page->ID);
	$signature = get_field("homepage_signature", $page->ID);

	echo '
		<div class="columns large-4 medium-6 large-offset-0 medium-offset-3 small-12 large-text-right full-image-small">
	        <img src="'.$featuredImage.'" width="90%" height="auto">
        </div>
        <div class="columns large-8 medium-10 large-offset-0 medium-offset-1 small-12 end">
	        <div class="hdg hdg--3 archer-bold hdg--red uppercase push--50">
		        '.$headline.'
	        </div>
	        <div>
		        <p class="hdg hdg--5 gotham-book push--20">
			        '.$excerpt.'
		        </p>
	        </div>
	        <div class="hdg hdg--5 push--20">
		        <a class="link" href="'.$link.'">READ MORE</a>
	        </div>
	        <div class="push--30 full-image-small">
		    	<img src="'.$signature.'" width="400" height="auto">
		    </div>
        </div>
	';
}

function pull_about_lead(){

	$page = get_page_by_title( 'About Us' );
	$featuredImage = get_field("founders_pic", $page->ID);
	$headline = get_field("homepage_headline", $page->ID);
	$excerpt = get_field("homepage_excerpt", $page->ID);
	$link = get_field("homepage_link", $page->ID);
	$signature = get_field("homepage_signature", $page->ID);
	$content = apply_filters('the_content', $page->post_content);

	echo '
		<div class="columns large-4 medium-6 large-offset-0 medium-offset-3 small-12 large-text-right full-image-small">
	        <img src="'.$featuredImage.'" width="90%" height="auto">
        </div>
        <div class="columns large-8 medium-10 large-offset-0 medium-offset-1 small-12 end">
	        <div class="hdg hdg--3 archer-bold hdg--red uppercase push--20">
		        '.$headline.'
	        </div>
	        <div>
		        <p class="hdg hdg--5 gotham-book push--20">
			        '.$excerpt.'
		        </p>
	        </div>
	        <div class="hdg hdg--3 archer-bold hdg--red uppercase push--30">
		        More about Brewla
	        </div>
	        <div class="hdg hdg--5 gotham-book push--20">
	        	'.$content.'
	        </div>
	        <div class="push--30 full-image-small">
		    	<img src="'.$signature.'" width="400" height="auto">
		    </div>
        </div>
	';
}

function pull_about_buckets(){

	$page = get_page_by_title( 'About Us' );

	$headlineOne = get_field("bucket_one_heading", $page->ID);
	$subHeadlineOne = get_field("bucket_one_sub_heading", $page->ID);
	$headlineOneCTA = get_field("bucket_one_link_cta", $page->ID);
	$headlineOneURL = get_field("bucket_one_link_url", $page->ID);

	$headlineTwo = get_field("bucket_two_heading", $page->ID);
	$subHeadlineTwo = get_field("bucket_two_sub_heading", $page->ID);
	$headlineTwoCTA = get_field("bucket_two_link_cta", $page->ID);
	$headlineTwoURL = get_field("bucket_two_link_url", $page->ID);

	$headlineThree = get_field("bucket_three_heading", $page->ID);
	$subHeadlineThree = get_field("bucket_three_sub_heading", $page->ID);
	$headlineThreeCTA = get_field("bucket_three_link_cta", $page->ID);
	$headlineThreeURL = get_field("bucket_three_link_url", $page->ID);

	echo '
		<div class="columns large-4 medium-4 small-12 text-center">
		    <div class="hdg hdg--4 red-text uppercase archer-bold">'.$headlineOne.'</div>
		    <div class="hdg hdg--5 gotham-book">'.$subHeadlineOne.'</div>
		    <a href="'.$headlineOneURL.'" class="btn btn--blue text-center push--20">'.$headlineOneCTA.'</a>
		</div>
		<div class="columns large-4 medium-4 small-12 text-center push--small-20">
		    <div class="hdg hdg--4 red-text uppercase archer-bold">'.$headlineTwo.'</div>
		    <div class="hdg hdg--5 gotham-book">'.$subHeadlineTwo.'</div>
		    <a href="'.$headlineTwoURL.'" class="btn btn--blue text-center push--20">'.$headlineTwoCTA.'</a>
		</div>
		<div class="columns large-4 medium-4 small-12 text-center push--small-20">
		    <div class="hdg hdg--4 red-text uppercase archer-bold">'.$headlineThree.'</div>
		    <div class="hdg hdg--5 gotham-book">'.$subHeadlineThree.'</div>
		    '.$headlineThreeURL.'
		</div>
	';
}

function pull_stick_with_us(){

	$page = get_page_by_title( 'Stick With Us' );
	$copy = get_field("modal_copy", $page->ID);

	echo $copy;
}


function pull_all_flavors(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'flavors',
        'posts_per_page'=>30,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$boxImage = get_field("box_image", $post->ID);
		$gmo = (get_field("gmo_tag", $post->ID))? '<img class="inline-block push--30" src="/wp-content/themes/brewla-theme/assets/img/gmo2x.png" width="60" height="auto">' : '';
		$tagline = get_field("flavor_tagline", $post->ID);
		$flavor = get_field("flavor_title", $post->ID);
		$headlineColor = get_field("headline_color", $post->ID);
		$desc = get_field("flavor_description", $post->ID);
		$benefits = get_field("flavor_benefits", $post->ID);
		$nutrition = get_field("nutrition_facts", $post->ID);

		echo '
			<div class="full-width alternating-rows__row">
				<div class="row">
					<div class="columns large-12">
						<div class="row">
							<div class="columns large-4 medium-6 small-12 text-center">
								<img class="flavors__product-image" src="'.$boxImage.'" width="100%" height="auto">
							</div>
							<div class="columns large-8 medium-6 small-12 text-left">
								<h2 class="hdg hdg--4 archer-bold-italic uppercase">'.$tagline.'</h2>
								<h1 class="hdg hdg--3 archer-bold push--10 uppercase" style="color:'.$headlineColor.' !important;">'.$flavor.'</h1>
								<p class="hdg hdg--4 gotham-book push--20">'.$desc.'</p>
								'.$gmo.'
								<p class="hdg hdg--5 gotham-book">'.$benefits.'</p>
								<a class="btn btn--black fancybox" href="'.$nutrition.'"><i class="fa fa-plus"></i> Nutrition Info</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		';


	}

    wp_reset_postdata();
}

function pull_all_faqs(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'faqs',
        'posts_per_page'=>300,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$question = get_field("question", $post->ID);
		$answer = get_field("answer", $post->ID);

		echo '
			<div class="columns small-12 content-row clear-left">
				<div class="hdg hdg--4 gotham-bold">'.$question.'</div>
				<div class="hdg hdg--4 gotham-book push--10">'.$answer.'</div>
			</div>
		';


	}

    wp_reset_postdata();
}

function pull_all_press(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'press',
        'posts_per_page'=>3,
        'order'=>'DESC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$thumbnail = get_field("press_page_thumbnail", $post->ID);

		echo '
			<div class="columns small-12 medium-4 large-4 grid-item article">
				<img src="'.$thumbnail.'" width="100%" height="auto">
				<div class="hdg hdg--4 uppercase red-text text-center gotham-medium push--20">'.$post->post_title.'</div>
				<div class="hdg hdg--4 text-center gotham-book push--10">'.get_the_excerpt($post->ID).'</div>
				<div class="full-width push--20 text-center">
					<a href="'.get_permalink($post->ID).'" class="link gotham-bold uppercase">read more</a>
				</div>
			</div>
		';


	}

    wp_reset_postdata();
}

function pull_all_blog(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'blog',
        'posts_per_page'=>3,
        'order'=>'DESC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		echo '
			<div class="columns small-12 medium-4 large-4 grid-item article">
				<div class="hdg hdg--4 uppercase red-text text-center gotham-medium push--20">'.$post->post_title.'</div>
				<div class="hdg hdg--4 text-center gotham-book push--10">'.get_the_excerpt($post->ID).'</div>
				<div class="full-width push--20 text-center">
					<a href="'.get_permalink($post->ID).'" class="link gotham-bold uppercase">read more</a>
				</div>
			</div>
		';


	}

    wp_reset_postdata();
}

function pull_all_blog_count(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'blog',
        'posts_per_page'=>3000,
        'order'=>'DESC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	$total = count($myposts);

	echo $total;

    wp_reset_postdata();
}

function pull_all_press_count(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'press',
        'posts_per_page'=>3000,
        'order'=>'DESC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	$total = count($myposts);

	echo $total;

    wp_reset_postdata();
}

function pull_all_shop(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'shop',
        'posts_per_page'=>30,
        'order'=>'DESC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$thumbnail = get_field("product_image", $post->ID);
		$title = get_field("product_title", $post->ID);
		$desc = get_field("product_description", $post->ID);
		$price = get_field("product_price", $post->ID);
		$url = get_field("product_buy_url", $post->ID);

		echo '
			<div class="columns small-12 medium-4 large-4 grid-item article">
				<img src="'.$thumbnail.'" width="100%" height="auto">
				<div class="hdg hdg--4 uppercase red-text text-center gotham-medium push--20">'.$title.'</div>
				<div class="hdg hdg--5 uppercase text-center gotham-medium push--20">'.$price.'</div>
				<div class="hdg hdg--4 text-center gotham-book push--20">'.$desc.'</div>
				<div class="full-width push--20 text-center">
					<a href="'.$url.'" target="_blank" class="btn btn--blue text-center">Buy Now</a>
				</div>
			</div>
		';


	}

    wp_reset_postdata();
}

function pull_all_jobs(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'jobs',
        'posts_per_page'=>300,
        'order'=>'ASC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$jobTitle = get_field("job_title", $post->ID);
		$jobLocation = get_field("location", $post->ID);
		$jobDesc = get_field("job_description", $post->ID);
		$jobURL = get_field("job_url", $post->ID);

		echo '
			<div class="columns small-12 content-row clear-left">
				<div class="hdg hdg--4 gotham-bold">'.$jobTitle.'</div>
				<div class="hdg hdg--5 gotham-bold">'.$jobLocation.'</div>
				<div class="hdg hdg--4 gotham-book push--10">'.$jobDesc.'</div>
				<div class="full-width push--20">
					<a href="'.$jobURL.'" class="text-center btn btn--blue">Apply Now</a>
				</div>
			</div>
		';


	}

    wp_reset_postdata();
}


function get_latest_ig(){
	function fetchData($url){
	  $ch = curl_init();
	  curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	  $result = curl_exec($ch);
	  curl_close($ch);
	  return $result;
	}

	$result = fetchData("https://api.instagram.com/v1/users/20570730/media/recent/?access_token=7943951.1677ed0.87bf15fcf1d04d88a7ffa24aa6fe1343&count=4");


	$result = json_decode($result);
    $i = 1;
	foreach ($result->data as $post) {
		if(empty($post->caption->text)) {
			return false;
	 	} else {
		 	//error_log(print_r($post->images,1));
             if($i === 1){
                echo '
                    <div class="photo photo--tall" style="background-image: url('.$post->images->standard_resolution->url.');">
                    	<div class="photo__hashtag text-center">
                    		<a class="hdg hdg--3 gotham-bold hdg--white" href="https://www.instagram.com/brewlabars/" target="_blank">#LickWellLiveWell</a>
                    	</div>
                    </div>
                ';
             }
             if($i === 2){
                echo '<div class="photo photo--half" style="background-image: url('.$post->images->standard_resolution->url.');"></div>';
             }
             if($i === 3){
                echo '<div class="photo photo--third photo--push" style="background-image: url('.$post->images->standard_resolution->url.');"></div>';
             }
             if($i === 4){
                echo '<div class="photo photo--third photo--push photo--push-left" style="background-image: url('.$post->images->standard_resolution->url.');"></div>';
             }
		 	$i++;
	 	}
	}
}


function pull_recent_press(){

	$args = array(
        'post_type'=>'post',
        'category_name' => 'press',
        'posts_per_page'=>1,
        'order'=>'DESC',
        'orderby'=>'date',
        'post_status'=>'publish'
    );

	$myposts = get_posts( $args );

	foreach($myposts as $post){

		$featuredImage = get_field("homepage_featured_image", $post->ID);

		echo '
			<div class="large-7 image-card image-card-7--left image-card--stack-med" style="background-image: url('.$featuredImage.');"></div>
				<div class="large-5 columns image-card-push-5 image-card--text text-center">
					<div class="hdg hdg--3 archer-bold hdg--white uppercase">'.$post->post_title.'</div>
					<div class="hdg hdg--5 gotham-book hdg--white push--20">
						'.get_the_excerpt($post->ID).'
					</div>
					<div class="push--40">
						<a href="'.get_permalink($post->ID).'" class="btn btn--blue">
							read more
						</a>
					</div>
				</div>
		';
	}

    wp_reset_postdata();
}

function more_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $cat = (isset($_POST['cat'])) ? $_POST['cat'] : '';

    header("Content-Type: text/html");

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'cat' => $cat,
        'paged'    => $page,
    );

    $loop = new WP_Query($args);

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();

    $url = get_permalink($id);
    $title = get_the_title();
    $categories = get_the_category($id);
    $excerpt =  get_the_excerpt();
    $id = get_the_ID();

	$thumbnail = get_field("press_page_thumbnail", $id);

	$out .='<div class="columns small-12 medium-4 large-4 grid-item article">
		<img src="'.$thumbnail.'" width="100%" height="auto">
		<div class="hdg hdg--4 uppercase red-text text-center gotham-medium push--20">'.$title.'</div>
		<div class="hdg hdg--4 text-center gotham-book push--10">'.$excerpt.'</div>
		<div class="full-width push--20 text-center">
			<a href="'.$url.'" class="link gotham-bold uppercase">read more</a>
		</div>
	</div>';


    endwhile;
    endif;
    wp_reset_postdata();
    die($out);
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

// Tidy up the <head> a little. Full reference of things you can show/remove is here: http://rjpargeter.com/2009/09/removing-wordpress-wp_head-elements/
remove_action('wp_head', 'wp_generator');// Removes the WordPress version as a layer of simple security

add_theme_support('post-thumbnails');
?>