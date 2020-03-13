<?php get_header(); ?>


	<div id="primary-contact" class="content-contact">
		
		<main id="main-contact" class="site-contact" role="main">

			<input type="checkbox" id="sidebar-t" name="" value="">

			<div class="page-wrap">

				<label for="sidebar-t" class="menu-toggle">☰</label>

				<div class="page-content">

					<section class="contact">

						<div class="container">

							<div class="row">

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 row-align">

									<?php 
										$args = array(
											'type'				=> 'post',
											'order'				=> 'ASC',
											'category_name'		=> 'Contact',
											'posts_per_page'	=> 1
											);

										$blogLoop = new WP_Query($args);

										if( $blogLoop->have_posts() ):

											while( $blogLoop->have_posts() ): $blogLoop->the_post();
											
											the_title('<h4><b>', '</b></h4>');
									?>
											
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

												<?php the_content(); ?>

											</div><!-- .col-lg-12 -->

									<?php
											endwhile;

										endif;

										wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
									?>

								</div><!-- .col-lg-6 -->

								<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 input-form">

									<?php 
										$args = array(
											'page_id'	=> '17'
										);

										$lastBlog = new WP_Query($args);

										if( $lastBlog->have_posts() ):
											
											while( $lastBlog->have_posts() ): $lastBlog->the_post();

												// get_template_part('template-parts/content', 'page');
									?>

												<article id="post-<?php the_ID(); ?>" class="<?php post_class(); ?>">
													<div class="entry-content">
														<?php the_content(); ?>
													</div><!-- .entry-content -->
												</article>

									<?php 
											endwhile;

										endif;

										wp_reset_postdata();
									?>

								</div><!-- .input-form -->

							</div><!-- .row -->

						</div><!-- .container -->

						<div class="container">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">

								<div class="map">

									<?php 
										$args = array(
											'type'				=> 'post',
											'order'				=> 'ASC',
											'category_name'		=> 'Map',
											'posts_per_page'	=> 1
											);

										$blogLoop = new WP_Query($args);

										if( $blogLoop->have_posts() ):

											while( $blogLoop->have_posts() ): $blogLoop->the_post();

											the_content();

											endwhile;

										endif;

										wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
									?>

								</div><!-- .map -->

							</div><!-- .col-lg-12 -->

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

	</div><!-- #primary-contact -->


<?php get_footer(); ?>