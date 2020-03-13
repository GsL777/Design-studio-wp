<?php
/*

	@package Design-studio-theme

	==========================================
		ASIDE POST FORMAT
	==========================================

*/
?>

<!-- aside post format is not related with html <aside></aside> tag. It's just a name. -->
<article id="post-<?php the_ID(); ?>" <?php post_class( array('design-format-aside') ); //array() - for declaring multiple classes, but if there is one class than array word could be deleted.?>>

	<div class="container">

		<div class="row">

		<?php if( has_post_thumbnail() ): ?>

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

				<?php the_title('<h4 class="row-align"><b>', '</b></h4>'); ?>

				<p class="text"><?php the_content(); ?></p>

			</div><!-- .col-lg-6 -->

			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

				<?php if( design_get_attachment() ): //design_get_attachment() function in theme-support.php?>

					<div class="images" style="background-image: url(<?php echo design_get_attachment(); ?>);"></div>

				<?php endif; 
				//GO TO WP DASBOARD -> MEDIA -> SELECT LIST ICON ON THE LEFT AND UNATTACH ALL OF THE IMAGES. THAN GO TO POSTS -> SELECT A POST -> ADD MEDIA -> SELECT A PICTURE -> INSERT PHOTO -> MAKE SURE IT IS UNDER THE TEXT -> UPDATE. IF IT DOESN'T WORK REUPLOAD AN IMAGE.
				?>

			</div><!-- .col-lg-6 -->

		<?php else: ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<?php the_title('<h4 class="row-align"><b>', '</b></h4>'); ?>

				<p class="text"><?php the_content(); ?></p>

			</div><!-- .col-lg-12 -->

		<?php endif; ?>

		</div><!-- .row -->

	</div><!-- .container -->

</article><!-- standard WordPress markup -->