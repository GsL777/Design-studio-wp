<?php
/*
	Template Name: Solutions Template
*/
get_header(); ?>


	<div id="primary-blog" class="content-blog">

		<main id="main-blog" class="site-blog" role="main">

			<input type="checkbox" id="sidebar-t" name="" value="">

			<div class="page-wrap">
				
				<label for="sidebar-t" class="menu-toggle">☰</label>

				<div class="page-content">

					<section class="blog">

						<div class="container">

							<div class="row">

								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

									<div class="row">
										<?php 
											$args = array(
												'post_type'			=> 'solutions',
												'posts_per_page'	=> 4,
												'order'				=> 'ASC',
												'tax_query' => array(
													array(
														'taxonomy' => 'field',//custom taxonomy name written in category http field (as example: http://localhost/portfolio2/wp-admin/term.php?taxonomy=field&). In this case Wp dashboard->Projects->Field->Press on the category....
														'field'    => 'slug',
														'terms'    => array( 'Blogitem' ), //blogitem - category name
													),
												),//on custom taxonomies if you could not print one or several categories use tax_query 
											);

											$blogLoop = new WP_Query($args);

											if( $blogLoop->have_posts() ):
												while( $blogLoop->have_posts() ): $blogLoop->the_post();
										?>

												<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 post-content">

										<?php 
												get_template_part( 'template-parts/content', 'archive-solutions' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
													//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
										?> 

												</div><!-- .col-lg-3 -->
										
										<?php
												endwhile;

											endif;

											wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
										?>

									</div><!-- .row -->

									<div class="row">
										<?php 
											$args = array(
												'post_type'			=> 'solutions',
												'posts_per_page'	=> 4,
												'order'				=> 'ASC',
												'offset'			=> 4,
												'tax_query' => array(
													array(
														'taxonomy' => 'field',//custom taxonomy name written in category http field (as example: http://localhost/portfolio2/wp-admin/term.php?taxonomy=field&). In this case Wp dashboard->Projects->Field->Press on the category....
														'field'    => 'slug',
														'terms'    => array( 'Blogitem' ), //blogitem - category name
													),
												),//on custom taxonomies if you could not print one or several categories use tax_query 
											);

											$blogLoop = new WP_Query($args);

											if( $blogLoop->have_posts() ):
												while( $blogLoop->have_posts() ): $blogLoop->the_post();
										?>

												<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 post-content">

										<?php 
												get_template_part( 'template-parts/content', 'archive-solutions' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
													//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
										?> 

												</div><!-- .col-lg-3 -->
										
										<?php
												endwhile;

											endif;

											wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
										?>
									</div><!-- .row -->

								</div><!-- .col-lg-8 -->

								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

									<div class="sidebar-section">

										<?php get_sidebar(); //sidebar.php and theme-support.php files?>

									</div><!-- .sidebar-section -->
								</div><!-- .col-lg-4 -->

							</div><!-- .container -->

						</div><!-- .row -->

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

	</div><!-- #primary-blog -->




<?php get_footer(); ?>