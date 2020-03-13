<?php get_header(); ?>


	<div id="primary-services" class="content-services">

		<main id="main-services" class="site-services" role="main">

			<input type="checkbox" id="sidebar-t" name="" value="">

			<div class="page-wrap">

				<label for="sidebar-t" class="menu-toggle">☰</label>

				<div class="page-content">

					<section class="services">

						<div class="container">
								
							<p class="text"><?php echo get_post_field('post_content', $post->ID); ?></p><!--  display the content from WP dashboard -> services page -->

							<div class="row">

							<?php 
								$args = array(
										'type'				=> 'post',
										'order'				=> 'ASC',
										'category_name'		=> 'Service',
										'posts_per_page'	=> 4
									);

								$blogLoop = new WP_Query($args);

								if( $blogLoop->have_posts() ):

									while( $blogLoop->have_posts() ): $blogLoop->the_post();
							?>

									<div class="column col-md-3 col-sm-6 col-xs-12">

										<?php get_template_part( 'template-parts/content', 'image' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
										//get_post_format() - retrieve the_post_format of the current post that is in the post loop. ?> 

									</div><!-- .col-lg-12 -->
							
							<?php
									endwhile;

								endif;

								wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
							?>

							</div><!-- .row -->

						</div><!-- .container -->

					</section>

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

	</div><!-- #primary-services -->


<?php get_footer(); ?>