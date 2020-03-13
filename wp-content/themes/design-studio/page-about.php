<?php get_header(); ?>


	<div id="primary-about" class="content-about">

		<main id="main-about" class="site-about" role="main">

			<input type="checkbox" id="sidebar-t" name="" value="">

			<div class="page-wrap">

				<label for="sidebar-t" class="menu-toggle">☰</label>

				<div class="page-content">

					<section class="about">

						<?php 
							$args = array(
									'type'				=> 'post',
									'order'				=> 'ASC',
									'category_name'		=> 'About',
									'posts_per_page'	=> 1
								);

							$blogLoop = new WP_Query($args);

							if( $blogLoop->have_posts() ):
								
								while( $blogLoop->have_posts() ): $blogLoop->the_post();

								get_template_part( 'template-parts/content', 'aside' );//template-part - folder where are all the content files. get-template-part function will search a folder template-parts and files with start content- .
									//get_post_format() - retrieve the_post_format of the current post that is in the post loop.

								endwhile;

							endif;

							wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).

							//wp_reset_query() - ensure that the main query has been reset to the original main query. (USE wp_reset_query() - immediately after every loop using query_posts()).
						?>

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

	</div><!-- #primary-about -->


<?php get_footer(); ?>