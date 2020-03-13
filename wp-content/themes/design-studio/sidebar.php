<?php
/*
	@package Design-studio-theme
*/

	if( !is_active_sidebar( 'design-sidebar' ) ){//design-sidebar - id from theme-support.php design_sidebar_init array
		return;//return null (nothing)
	}//safety check if the sidebar is not active 
?>

<aside id="secondary" class="widget_area" role="complementary">
<!-- <div class="visible-xs"> -->
		<?php //theme-support.php function design_register_nav_menu and in WP dashboard -> widgets -> add Navigation menu widget.
			/*
			wp_nav_menu(
				array(
					'theme_location'	=> 'primary',
					'container'			=> false,
					'menu_class'		=> 'sidebar-menu',
					'walker'			=> new Design_Walker_Nav_primary()
				)
			);
			*/
		?>
<!-- </div> .visible-xs -->

	<?php dynamic_sidebar( 'design-sidebar' ); //design-sidebar - id from theme-support.php design_sidebar_init array. Sidebar putted in page-blog.php?>
</aside>