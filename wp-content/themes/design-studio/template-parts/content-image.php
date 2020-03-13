<?php
/*

	@package Design-studio-theme

	==========================================
		IMAGE POST FORMAT
	==========================================

*/
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('studio-format-image'); ?>>

		<?php the_title('<h3 class="text-center text-design">', '</h3>'); ?>

		<?php if( has_post_thumbnail() ): ?>

			<?php if( design_get_attachment() ): //design_get_attachment() function in theme-support.php
			//GO TO WP DASBOARD -> MEDIA -> SELECT LIST ICON ON THE LEFT AND UNATTACH ALL OF THE IMAGES. THAN GO TO POSTS -> SELECT A POST -> ADD MEDIA -> SELECT A PICTURE -> INSERT PHOTO -> MAKE SURE IT IS UNDER THE TEXT -> UPDATE. IF IT DOESN'T WORK REUPLOAD AN IMAGE.
			?>

				<div class="images" style="background-image: url(<?php echo design_get_attachment(); ?>);"></div><!-- .images -->

				<?php the_content(); 

			endif;

		else: 

			the_content();

		endif; ?>

	</article><!-- standard WordPress markup -->