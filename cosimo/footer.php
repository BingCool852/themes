<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package cosimo
 */
?>

<?php 
		$facebookURL = get_theme_mod('cosimo_theme_options_facebookurl', '#');
		$twitterURL = get_theme_mod('cosimo_theme_options_twitterurl', '#');
		$googleplusURL = get_theme_mod('cosimo_theme_options_googleplusurl', '#');
		$linkedinURL = get_theme_mod('cosimo_theme_options_linkedinurl', '#');
		$instagramURL = get_theme_mod('cosimo_theme_options_instagramurl', '#');
		$youtubeURL = get_theme_mod('cosimo_theme_options_youtubeurl', '#');
		$pinterestURL = get_theme_mod('cosimo_theme_options_pinteresturl', '#');
		$tumblrURL = get_theme_mod('cosimo_theme_options_tumblrurl', '#');
		$vkURL = get_theme_mod('cosimo_theme_options_vkurl', '#');
	?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info smallPart">
			<div class="infoFoo">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'cosimo' ) ); ?>"><?php printf( esc_html__( '自豪的使用了 %s', 'cosimo' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( esc_html__( '%1$s by %2$s.', 'cosimo' ), 'cosimo主题', '<a target="_blank" href="http://crestaproject.com/" rel="designer" title="CrestaProject">CrestaProject</a>' ); ?>
			</div>
			<div class="infoFoo right">
				<div class="socialLine">
					
				</div>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #content -->
</div><!-- #page -->
<div id="toTop"><i class="fa fa-angle-up fa-lg"></i></div>
<?php wp_footer(); ?>
</body>
</html>
