


<?php wp_footer(); ?>
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