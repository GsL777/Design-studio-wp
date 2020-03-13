<?php 

/*
	@package Design-studio-theme

	==================================
		SINGLE PAGE
	==================================
*/

get_header(); ?>

<!-- IF WORDPRESS CAN NOT FIND THE single-projects.php PAGE AND ECHO'ES 404 PAGE THAN GO TO:
	WP Dashboard -> Settings -> Permalinks -> Set on 'Plain' -> Save Changes -> go to the existing webpage and press on the buttons -> than refresh (ctrl+f5) -> go to WP Dashboard -> Settings -> Permalinks -> Set to 'Post name' -> Save Changes -> go to the existing webpage -->


<div id="primary-home" class="content-home">

	<main id="main-home" class="site-home" role="main">

		<input type="checkbox" id="sidebar-t" name="" value="">

		<div class="page-wrap">

			<label for="sidebar-t" class="menu-toggle">☰</label>

			<div class="page-content">
		
				<?php 
					if(have_posts()):

						while(have_posts()): the_post(); ?>

							<section class="single">

								<div class="container">

									<?php the_title('<h2 class="single-text">','</h2>' ); ?>

									<p class="text"><?php the_content(); ?></p>
									
										<?php if( design_get_attachment() ): //design_get_attachment() function in theme-support.php
											//GO TO WP DASBOARD -> MEDIA -> SELECT LIST ICON ON THE LEFT AND UNATTACH ALL OF THE IMAGES. THAN GO TO POSTS -> SELECT A POST -> ADD MEDIA -> SELECT A PICTURE -> INSERT PHOTO -> MAKE SURE IT IS UNDER THE TEXT -> UPDATE. IF IT DOESN'T WORK REUPLOAD AN IMAGE.
										?>

											<div class="images" style="background-image: url(<?php echo design_get_attachment(); ?>);"></div><!-- .images -->

										<?php endif; ?>

									<?php echo design_post_navigation();//post navigation. function from theme-support.php ?>

									<div class="single-sidebar-section">

										<?php get_sidebar(); //sidebar.php and theme-support.php files?>

									</div><!-- .single-sidebar-section -->
									
								</div><!-- .container -->
							</section>


							<div class="container">
								<?php 
									if( comments_open() ) { 
										comments_template();//calls comments.php file
									}else{
										echo '<h5 class="text-center">Sorry, but your comments are not allowed!</h5>';
									}
								?>
							</div><!-- .container -->

						<?php 
						endwhile;

					endif;
				?>

			</div><!-- .page-content --> <!-- animation -->

			<div class="sidebar">
				<?php //theme-support.php function design_register_nav_menu and in WP dashboard -> widgets -> add Navigation menu widget.
					wp_nav_menu(
						array(
							'theme_location'	=> 'primary',
							'container'			=> false,
							'menu_class'		=> 'sidebar-menu',
							'walker'			=> new Design_Walker_Nav_primary()
						)
					);
				?>
			</div><!-- .sidebar -->

		</div><!-- .page-wrap -->

	</main>
</div><!-- #primary-home -->


<?php get_footer(); ?>