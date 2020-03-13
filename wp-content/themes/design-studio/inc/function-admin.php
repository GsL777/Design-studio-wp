<?php 

/*
@package Design-studio-theme

	=====================
		ADMIN PAGE
	=====================
*/


function design_add_admin_page(){

	//Generate Design Website Admin Page
	add_menu_page('Design Website Theme Options', 'Design', 'manage_options', 'design_website', 'design_theme_create_page', 'dashicons-editor-unlink', 110);//First parameter - Page title. Second parameter - menu title. Third parameter - Capability(capability to display options to specific users). Fourth parameter - menu slug(parameter that appears in the navigation bar to avoid errors). Fifth parameter - a function name. Sixth parameter - icon url(wordpress premade icons in https://developer.wordpress.org/resource/dashicons/#art) Need to choose the icon and paste the icon name to the Sixth parameter place. Seventh parameter - the position of a menu that specifies a location.

	//Generate design Admin Sub Pages
	//design Theme Options
	add_submenu_page('design_website', 'Design Theme Options', 'Theme Options', 'manage_options', 'design_website', 'design_theme_create_page');

	//Design Contact Form Options
	add_submenu_page('design_website', 'Design Contact Form', 'Contact Form', 'manage_options', 'design_website_theme_contact', 'design_contact_form_page');

	//Design CSS Options
	add_submenu_page('design_website', 'Design CSS Options', 'Custom CSS', 'manage_options', 'design_website_css', 'design_theme_settings_page');

}

add_action('admin_menu', 'design_add_admin_page');//Activate this function. First value - when to trigger this function (in this case during the generation of admin_menu). Second value - the name of the function that must be triggered.

//Activate custom settings
add_action( 'admin_init', 'design_custom_settings' );//adding into design_add_admin_page, because of the safety precautions


//Activate custom settings
function design_custom_settings(){

	//Theme Support Options
	register_setting('design-theme-support', 'post_formats');

	add_settings_section( 'design-theme-options', 'Theme Options', 'design_theme_options', 'design_website_theme' );

	add_settings_field( 'post_formats', 'Post Formats', 'design_post_formats', 'design_website_theme', 'design-theme-options' );


	//Custom Header in Theme Support Options
	register_setting('design-theme-support', 'custom_header');	

	add_settings_field('custom-header', 'Custom Header', 'design_custom_header', 'design_website_theme', 'design-theme-options');


	//Custom Background in Theme Support Options
	register_setting('design-theme-support', 'custom_background');
	
	add_settings_field('custom-background', 'Custom Background', 'design_custom_background', 'design_website_theme', 'design-theme-options');


	//Contact Form Options
	register_setting( 'design-contact-options', 'activate_contact' );//design-contact-form.php and custom-post-type.php files.

	add_settings_section( 'design-contact-section', 'Contact Form', 'design_contact_section', 'design_website_theme_contact' );

	add_settings_field( 'activate-form', 'Activate Contact Form', 'design_activate_contact', 'design_website_theme_contact', 'design-contact-section' );

	//Custom CSS Options
	register_setting( 'design-custom-css-options', 'website_css', 'design_sanitize_custom_css');//design-custom-css.php
	//PUT IN header.php that it will be displayed and will work.

	add_settings_section( 'design-custom-css-section', 'Custom CSS', 'design_custom_css_section_callback', 'design_website_css' ); //design_website_css - from function design_add_admin_page(), //design CSS Options section.
	//design-custom-css.php

	add_settings_field( 'custom-css', 'Insert your Custom CSS', 'design_custom_css_callback', 'design_website_css', 'design-custom-css-section' );
}


//Post Formats
function design_post_formats(){
	$options =  get_option( 'post_formats' );
	$formats = array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
	$output = '';
	foreach ($formats as $format){
		$checked = ( @$options[$format] == 1 ? 'checked' : '');//@ - means if this variable exists
		$output .= '<label><input type="checkbox" id="' . $format . '" name="post_formats['.$format.']" value="1" '. $checked .' />' . $format . '</label><br>';
	}
	echo $output;//in a callback function for specific settings field have to echo
}//dashboard -> design -> Theme Options to turn on or off in POSTS -> All posts -> Find post



function design_custom_header(){
	$options = get_option( 'custom_header' );
	$output = '';

	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.' /> Activate the Custom Header</label>';
}//Activate a theme support in inc -> theme-support.php file



function design_custom_background(){
	$options = get_option( 'custom_background' );
	$output = '';

	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}//Activate a theme support in inc -> theme-support.php file



//design Theme Options
function design_theme_options(){
	echo 'Activate and Deactivate specific Theme Support Options';
}


//Contact Options Functions
function design_contact_section(){
	echo 'Activate and Deactivate the Built-in Contact Form';
}

//Custom Contact Form
function design_activate_contact(){//variables from function design_custom_settings Theme Support Options
	$options =  get_option( 'activate_contact' );
	$checked = ( @$options == 1 ? 'checked' : '');

	echo '<label><input type="checkbox" id="activate_contact" name="activate_contact" value="1" '. $checked .' /></label>';
}//Appears in WP dashboard -> design


//Design CSS Info
function design_custom_css_section_callback(){
	echo 'Customize Design Theme with your own CSS';
}

//Design CSS Options
function design_custom_css_callback(){
	$css = get_option( 'website_css' );
	$css = ( empty($css) ? '/* Design Theme Custom CSS */' : $css );
	//echo '<textarea placeholder="Sunset Custom Css" >'.$css.'</textarea>';
	echo '<div id="customCss">'.$css.'</div><textarea id="website_css" name="website_css" style="display:none;visibility:hidden;">'.$css.'</textarea>';
}//div id must be the same as in admin-js -> design.custom_css.js in ace.edit() section.
//Contact CSS Options

//Design CSS Sanitization
function design_sanitize_custom_css ($input){//Custom CSS Options,register_setting Third parameter.
	//$output = esc_textarea( $input );//sanitize an input. Function incodes all the information in database. //sanitize the input of textarea
	$output = sanitize_textarea_field( $input );//UPDATE FOR esc_textarea($input);
	return $output;
}


//Template submenu functions
function design_theme_create_page(){ //the same name as Fifth Value in function design_add_admin_page().
	//echo '<h1>design Theme Options</h1>';
	require_once( get_template_directory() . '/inc/templates/design-admin.php' );
}

//Design Contact Options
function design_contact_form_page(){
	require_once( get_template_directory() . '/inc/templates/design-contact-form.php' );
}

//Design CSS Options
function design_theme_settings_page() {
	require_once( get_template_directory() . '/inc/templates/design-custom-css.php' );
}