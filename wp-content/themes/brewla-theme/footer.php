	<footer class="primary-footer">
		<div class="row">
			<div class="columns large-2 medium-4 small-12 large-offset-0 medium-offset-0 small-offset-1 text-center-small">
				<a class="primary-footer__logo" href="<?php echo get_home_url(); ?>">
					<img src="<?php echo bloginfo('template_directory'); ?>/assets/img/brewla-logo-2x.png" width="80%" height="auto">
				</a>
			</div>
			<div class="columns large-2 medium-4 small-12 push--small-20 clear-medium push--medium-20">
				<ul class="primary-footer__nav">
					<?php wp_nav_menu(array(
						'menu' => 'Footer Navigation One',
						'container' => false,
						'items_wrap' => '%3$s'
					)); ?>
				</ul>
			</div>
			<div class="columns large-2 medium-4 small-12 push--medium-20 push--small-clear">
				<ul class="primary-footer__nav">
					<?php wp_nav_menu(array(
						'menu' => 'Footer Navigation Two',
						'container' => false,
						'items_wrap' => '%3$s'
					)); ?>
				</ul>
			</div>
			<div class="columns large-2 medium-4 small-12 push--medium-20 push--small-clear">
				<ul class="primary-footer__nav">
					<?php wp_nav_menu(array(
						'menu' => 'Footer Navigation Three',
						'container' => false,
						'items_wrap' => '%3$s'
					)); ?>
				</ul>
			</div>
			<div class="columns large-4 medium-12 text-right small-12 push--medium-20 push--small-20">
				<ul class="primary-footer__nav">
					<li><a class="fancybox" href="#stick-with-us-inline"><i class="fa fa-envelope"></i> sign up for our newsletter</a></li>
				</ul>
			</div>
			<div class="columns small-12 text-right push--30">
				<ul class="primary-footer__nav primary-footer__nav--lc-horz">
					<?php wp_nav_menu(array(
						'menu' => 'Footer Navigation Legal',
						'container' => false,
						'items_wrap' => '%3$s'
					)); ?>
					<li>&copy;2016 Brewla Inc</li>
				</ul>
			</div>
		</div>
	</footer>
</section>


<?php wp_footer(); ?>

<div class="stick-hidden hidden">
	<div id="stick-with-us-inline" class="stick-with-us">
		<div class="stick__inner text-center">
			<h2 class="stick__heading archer-bold hdg--2 uppercase">stick with us!</h2>
			<p class="hdg--4"><?php pull_stick_with_us(); ?></p>
			<form action="//brewlabars.us1.list-manage.com/subscribe/post?u=f3ab616c41ca5834cb5391e20&amp;id=e9deb3496f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Your Email Address...">
<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f3ab616c41ca5834cb5391e20_e9deb3496f" tabindex="-1" value=""></div>
				<button class="btn btn--black push--10" id="mc-embedded-subscribe">sign up</button>
			</form>
		</div>
	</div>
</div>
<script src="<?php echo bloginfo('template_directory'); ?>/assets/scripts/build/app.min.js"></script>

<?php if(is_single()): ?>
<script type="text/javascript">stLight.options({publisher: "9ef92050-3705-45f1-ab99-edf73d368b7f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "9ef92050-3705-45f1-ab99-edf73d368b7f", "position": "left", "ad": { "visible": false, "openDelay": 5, "closeDelay": 0}, "chicklets": { "items": ["facebook", "twitter", "linkedin", "pinterest", "email", "sharethis"]}};
var st_hover_widget = new sharethis.widgets.hoverbuttons(options);
</script>
<?php endif; ?>

</body>
</html>