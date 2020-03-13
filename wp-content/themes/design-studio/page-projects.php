<?php get_header(); ?>


	<div id="primary-projects" class="content-projects">

		<main id="main-projects" class="site-projects" role="main">

			<input type="checkbox" id="sidebar-t" name="" value="">

			<div class="page-wrap">

				<label for="sidebar-t" class="menu-toggle">☰</label>

				<div class="page-content">

					<section class="projects">

						<div class="container">

							<div class="row">

								<?php 
									$args = array( 
										'type'				=> 'post',
										'posts_per_page'	=> 5,
										'category_name'		=> 'Project',
										'order'				=> 'ASC'
									);

									$blogLoop = new WP_Query( $args ); 

									if( $blogLoop->have_posts() ): 

										$i = 0;

										while( $blogLoop->have_posts() ): $blogLoop->the_post(); 

											if($i==0): $column = 8;

												elseif($i > 0 && $i < 2): $column = 4;

												elseif($i > 1 && $i < 3): $column = 12;

												elseif($i > 2 && $i < 4): $column = 4;

												elseif($i > 3 && $i < 5): $column = 8;

												elseif($i > 4): $column = 12;

											endif;
								?>

											<div class="col-lg-<?php echo $column; ?> col-md-<?php echo $column; ?> col-sm-12 col-xs-12">

												<?php the_title('<h4 class="text-center row-align"><b>', '</b></h4>'); ?>

													<?php if( has_post_thumbnail() ):
														$urlImg = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
													endif; ?>

													<div class="images" style="background-image: url(<?php echo $urlImg; ?>);"></div><!-- .images -->

											</div><!-- .col-lg- -->

								<?php 
										$i++;

										endwhile;

									endif;

									wp_reset_postdata(); //ensures that the global $post has been restored to the current post in the main query. (USE immediately after every custom WP_Query()).
								?>

<!-- 
								<nav class="navigation" aria-label="Page navigation">
									<ul class="pagination">
										<li class="page-item">
											<a class="page-link" href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
											<span class="sr-only">Previous</span>
											</a>
										</li>

										<li class="page-item"><a class="page-link" href="#">1</a></li>

										<li class="page-item"><a class="page-link" href="#">2</a></li>

										<li class="page-item"><a class="page-link" href="#">3</a></li>

										<li class="page-item">
											<a class="page-link" href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
											<span class="sr-only">Next</span>
											</a>
										</li>
									</ul>
								</nav>
 -->

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

	</div><!-- #primary-about -->


<?php get_footer(); ?>