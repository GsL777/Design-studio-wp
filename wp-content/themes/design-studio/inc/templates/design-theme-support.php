<h1>Design Theme Options</h1>
<?php settings_errors(); //function that will print an error?>

<form method="post" action="options.php" class="design-general-form"> 

	<?php settings_fields( 'design-theme-support' ); //Theme Options from function design_custom_settings?>
	
	<?php do_settings_sections( 'design_website_theme' );?>

	<?php submit_button(); //First parameter - text parameter of submit button. Second parameter - the type of the button. Third parameter - name will be used as an id. ?>
</form>
