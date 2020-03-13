<!-- Custom Design Theme Support on WordPress dashboard-->
<h1>Design Theme Support</h1>

<?php settings_errors();//function that will print an error ?>

<form method="post" action="options.php" class="design-general-form">
	<?php settings_fields( 'design-theme-support' ); ?>
	<?php do_settings_sections('design_website_theme');?>
	<?php submit_button(); ?>
</form>