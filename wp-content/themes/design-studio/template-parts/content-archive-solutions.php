<article id="post-<?php the_ID(); ?>" <?php post_class( array('design-format-archive') ); //array() - for declaring multiple classes, but if there is one class than array word could be deleted.?>>

	<?php if( has_post_thumbnail() ): ?>

		<?php if( design_get_attachment()  ): //design_get_attachment() function in theme-support.php
		//GO TO WP DASBOARD -> MEDIA -> SELECT LIST ICON ON THE LEFT AND UNATTACH ALL OF THE IMAGES. THAN GO TO POSTS -> SELECT A POST -> ADD MEDIA -> SELECT A PICTURE -> INSERT PHOTO -> MAKE SURE IT IS UNDER THE TEXT -> UPDATE. IF IT DOESN'T WORK REUPLOAD AN IMAGE.
		?>

			<div class="images" style="background-image: url(<?php echo design_get_attachment(); ?>);"></div><!-- .images -->

		<?php endif; ?>

		<div class="content">

			<span class="date"><?php the_time('F j, Y'); ?></span>

			<?php if( !is_archive() ):

				the_title( '<h3>', '</h3>' );

			?>
				
				<a href="<?php the_permalink(); ?>" class="reading"><?php _e( 'Read more' ); ?><i class="fa fa-angle-right"></i></a>
			
			<?php 

			else:

				the_title( sprintf('<h3><a href="%s">', esc_url(get_permalink() ) ),'</a> </h3>' );
			
			endif;

			?>

		</div><!-- .content -->

	<?php else: ?>

		<div class="content">

			<span class="date"><?php the_time('F j, Y'); ?></span>

			<?php if( !is_archive() ):

				the_title( '<h3>', '</h3>' );

			?>

				<a href="<?php the_permalink(); ?>" class="reading"><?php _e( 'Read more' ); ?><i class="fa fa-angle-right"></i></a>
			
			<?php 

			else: 
			
				the_title( sprintf('<h3><a href="%s">', esc_url(get_permalink() ) ),'</a> </h3>' );
			
			endif; ?>

		</div><!-- .content -->

	<?php endif; ?>

</article>