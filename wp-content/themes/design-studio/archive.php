<?php 
/*
	@package Design-studio-theme

	==================================
		ARCHIVE PAGE
	==================================
*/
get_header(); ?>


<div class="row">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<div class="row text-center no-margin">

			<div class="container">

				<?php if(have_posts() ): ?>
					
					<header class="page-header">
						<?php 
							the_archive_title('<h1 class="page-title">', '</h1>');
							the_archive_description('<div class="taxonomy-description">', '</div>');
						?>
					</header>

					<?php while(have_posts()): the_post(); ?>

						<?php get_template_part('template-parts/content', 'archive-solutions'); ?>

					<?php endwhile; ?>

				<?php endif; ?>

			</div><!-- .container -->

		</div><!-- .row -->

	</div><!-- .col-lg-12 -->

</div><!-- .row -->


<?php get_footer(); ?>