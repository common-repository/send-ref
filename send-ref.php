<?php
/*
Plugin Name: Send Ref
Plugin URI: http://scanwp.net
Description: Add hidden fields to Contact Form 7 (or other contact forms) with all the parameters in the URL.
Author: Avi Klein
Version: 0.1
Author URI: http://scanwp.net
Text Domain: send-ref
*/

function send_ref_Shortcode( $atts ){
	$ref = '';
	foreach ($_GET as $key => $value) {
		$ref .=  "<input type='hidden' name='$key' id='$key' value='$value'>";
	}

	return $ref;
}
add_shortcode( 'send_ref', 'send_ref_Shortcode' );



function send_ref_menu() {
	add_plugins_page( 'send ref Settings Page', 'send ref', 'read', 'send-ref', 'send_ref_plugin_text');

}
add_action('admin_menu', 'send_ref_menu');





add_filter( 'wpcf7_form_elements', 'send_ref_form_elements' );

function send_ref_form_elements( $form ) {
    $form = do_shortcode( $form );

    return $form;
}

function send_ref_plugin_text(){ ?>


	<br><br><br>Add the following where you want the hidden fields to be:<code>[send_ref]</code>
<?php } ?>
