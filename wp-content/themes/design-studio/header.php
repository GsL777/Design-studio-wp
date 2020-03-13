<?php
	/*
		This is the template for the header

		@package Design-studio-theme
	*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title><!-- To set a page title go to dashboard Settings -> General -> write in a Site Title a title. It can be seen with an inspect -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta charset="<?php bloginfo( 'charset' ); //print the bloginfo charset?>">
		<meta name="viewport" content="width=device-width, initial-scale=1"><!-- for responsive devices to print full screen -->
		<link rel="profile" href="http://gmpg.org/xfn/11"> <!-- necessary for html5 validation  -->
		<?php if( is_singular() && pings_open( get_queried_object() ) ): //check if this page is not an archive, search result or generic blog loop ?>
			<link rel="pingback" href="<?php bloginfo('pingback_url'); //pingback_url - for page to scale up on search engine result page (SERP)?>">
		<?php endif; ?>
		<?php wp_head(); ?>
	</head>

	<?php 
		//ON WORDPRESS DASHBOARD -> Design-studio -> CUSTOM CSS a custom css code could be written
		$custom_css = esc_attr(get_option( 'website_css' ));//website_css - unique handler from function-admin.php //Custom CSS Options
		if(!empty($custom_css) ):
			echo '<style>' . $custom_css . '</style>';
		endif;
	?>

	<body <?php 
		body_class(
			//body_class($design_classes);
			//array( 'design-class', 'my-class' )  //through an array we can insert class'es
		); //if we change page the class of the body will change and it's going to print a custom class based on the page. With this class there is an ability to style a page in a different way based on the content the user sees?>
	>

	<header class="header" style="background-image: url(<?php header_image(); //header_image(); - php built in function automatically prints the header image. Write a function design_register_nav_menu in theme-support.php before adding image in WP dashboard -> Appearance -> Header ?>);">
		<?php the_title('<h1><b>', '</b></h1>'); ?>
		<h4><b><?php bloginfo( 'description' ); //prints info from WP Dashboard -> Settings -> General -> Tagline?></b></h4>
	</header>