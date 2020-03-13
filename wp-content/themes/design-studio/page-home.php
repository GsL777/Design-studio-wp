<?php get_header(); ?>


	<div id="primary-home" class="content-home">

		<main id="main-home" class="site-home" role="main">

			<input type="checkbox" id="sidebar-t" name="" value="">

			<div class="page-wrap">

				<label for="sidebar-t" class="menu-toggle">☰</label>

				<div class="page-content">

					<div class="container">

						<div class="row">

							<?php 
								$args = array(
										'type'				=> 'post',
										'order'				=> 'ASC',
										'category_name'		=> 'Design',
										'posts_per_page'	=> 2
									);

								$blogLoop = new WP_Query($args);

								if( $blogLoop->have_posts() ):
									while( $blogLoop->have_posts() ): $blogLoop->the_post();
							?>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

							<?php 
									get_template_part( 'template-parts/content', 'image' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
										//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
							?> 

									</div><!-- .col-lg-6 -->
							
							<?php
									endwhile;

								endif;

								wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

								//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
							?>

						</div><!-- .row -->


							<?php 
								$args = array(
										'type'				=> 'post',
										'order'				=> 'ASC',
										'category_name'		=> 'Design',
										'posts_per_page'	=> 1,
										'offset'			=> 2
									);

								$blogLoop = new WP_Query($args);

								if( $blogLoop->have_posts() ):

									while( $blogLoop->have_posts() ): $blogLoop->the_post();
							?>

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 p-0">

							<?php 
										get_template_part( 'template-parts/content', 'image' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
										//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
							?> 

									</div><!-- .col-lg-12 -->
							
							<?php
									endwhile;

								endif;

								wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
							?>


						<div class="row">
							<?php 
								$args = array(
										'type'				=> 'post',
										'order'				=> 'ASC',
										'category_name'		=> 'Design',
										'posts_per_page'	=> 2,
										'offset'			=> 3
									);

								$blogLoop = new WP_Query($args);

								if( $blogLoop->have_posts() ):
									
									while( $blogLoop->have_posts() ): $blogLoop->the_post();
							?>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

							<?php 
										get_template_part( 'template-parts/content', 'image' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
										//get_post_format() - retrieve the_post_format of the current post that is in the post loop.
							?> 

									</div><!-- .col-lg-6 -->
							
							<?php
									endwhile;

								endif;

								wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
							?>
						</div><!-- .row -->

					</div><!-- .container -->

				</div><!-- .page-content -->

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