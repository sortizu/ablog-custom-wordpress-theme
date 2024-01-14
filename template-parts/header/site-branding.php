<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?>
<div class="site-branding">
	<div id="main-presentation" class="wrap">
		<?php the_custom_logo(); ?>
		<div class="site-branding-text">
			<!--
			<?php if ( is_front_page() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			-->
			<?php
			$description = get_bloginfo( 'description', 'display' );

			if ( $description || is_customize_preview() ) :
				?>
				<div id="description-container">
				<div class="message-bubble">
				<div class="bubble-origin blur"></div>
				<div class="bubble-content blur">
					<div class="site-description">
						<?php 
						// Searching "\np" code in the site description to know if
						// is necessary to add new pages to description message bubble
						// and add the description controls
						$array_desc = explode("\\np",$description);
						$index = 0;
						foreach($array_desc as $msg){
							echo "<p class='description-page' id='description-page-$index'>$msg</p>";
							$index += 1;
						}
						//echo $desc;
						?>
					</div>
					<?php
					if(sizeof($array_desc)>1){
					echo '<div class="description-controls">';
					echo '<button id="previous-description-page"><i class="bi bi-caret-left"></i></button>';
					echo '<button id="next-description-page"><i class="bi bi-caret-right-fill"></i></button>';
					echo '</div>';
					}
					?>
				</div>
				</div>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding-text -->

		<?php if ( ( twentyseventeen_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><?php echo twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ); ?><span class="screen-reader-text">
			<?php
			/* translators: Hidden accessibility text. */
			_e( 'Scroll down to content', 'twentyseventeen' );
			?>
		</span></a>
	<?php endif; ?>

	</div><!-- .wrap -->
</div><!-- .site-branding -->
<script>
	$(document).ready(function(){
		// Hides all the description pages if there are any and initialize the necessary variables to control
		// description pages
		var currentDescriptionPage = 0;
		var descriptionPages = $(".description-page");
		var pages = descriptionPages.length;
		updateDescriptionPagesVisibility();
		
		$("#next-description-page").on("click",function(){
			currentDescriptionPage++;
			updateDescriptionPagesVisibility();
		});
		$("#previous-description-page").on("click",function(){
			currentDescriptionPage--;
			updateDescriptionPagesVisibility();
		});
		
		function updateDescriptionPagesVisibility(){
			if(pages>currentDescriptionPage){
				hideDescriptionPages();
				$("#description-page-"+currentDescriptionPage).show();
			}
			updateDescriptionControlsVisibility();
		}
		function updateDescriptionControlsVisibility(){
			if(pages>1){
				if(currentDescriptionPage==0){
					$("#previous-description-page").prop('disabled',true);
					$("#next-description-page").prop('disabled',false);
				}else if (currentDescriptionPage<pages-1){
					$("#previous-description-page").prop('disabled',false);
					$("#next-description-page").prop('disabled',false);
				}else{
					$("#previous-description-page").prop('disabled',false);
					$("#next-description-page").prop('disabled',true);
				}
			}
		}
		function hideDescriptionPages(){
			descriptionPages.hide();
		}
		
	});
</script>