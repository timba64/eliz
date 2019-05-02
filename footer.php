<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package elising
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">

			<div class="copy"><?php echo get_field('copy_text', 'option'); ?></div>
			<div class="agreement"><a href="<?php echo get_field('link_agrem', 'option'); ?>"><?php echo get_field('link_agrem_text', 'option'); ?></a>   </div>

			<div class="developer">
				<a href="http://ablead.by/" target="_blank">Лидогенерация <img src="<?php echo get_template_directory_uri() ?>/img/ablead.svg" alt=""></a>
			</div>

		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->
	<div id="blanket" class="bibop"></div>
    <div id="calPop" class="bibop">
        <div class="modal-form">
            <div class="modal-header">
                <button class="close" type="button">X</button>
                <h3><?php echo get_field('promo_pop_title'); ?></h3>
            </div>
            <div class="modal-body">
        <?php 
			$promo_form = get_field('promo_form');
			echo (do_shortcode("$promo_form")); 
		?>
            </div>
        </div>
	</div>

<?php wp_footer(); ?>
<script async src="//app.call-tracking.by/scripts/calltracking.js?3886579c-2c87-4f23-9cdd-e05a4a178c42"></script>
<script type="text/javascript">
    document.addEventListener( 'wpcf7mailsent', function( e ) {
        window.location.href = '/thank-you/';
    }, false );
</script>

</body>
</html>
