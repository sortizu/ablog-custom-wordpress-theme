<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.2
 */

?>
<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'twentyseventeen' ); ?>">
	<a id="site-name" class="site-name-container" href="http://ablog.local"><?php echo get_bloginfo("name"); ?></a>
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo twentyseventeen_get_svg( array( 'icon' => 'bars' ) );
		echo twentyseventeen_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'twentyseventeen' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>

	<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && has_custom_header() ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text">
			<?php
			/* translators: Hidden accessibility text. */
			_e( 'Scroll down to content', 'twentyseventeen' );
			?>
		</span></a>
	<?php endif; ?>
</nav><!-- #site-navigation -->
<script>
	$(document).ready(function(){
		$("#top-menu>li").on("mouseenter",function(){
			$(this).find(".nav-image-hover").show();
			$(this).find(".nav-image-default").hide();
		});
		$("#top-menu>li").on("mouseleave",function(){
			if(!$(this).hasClass("current-menu-item")){
				$(this).find(".nav-image-default").show();
				$(this).find(".nav-image-hover").hide();	
			}
		});
	});
</script>