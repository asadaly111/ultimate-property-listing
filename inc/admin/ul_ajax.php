<?php 
/**
 * Generated by the WordPress Meta Box generator
 * at http://jeremyhixon.com/tool/wordpress-meta-box-generator/
 */

/**
 * Custom Fields
 */
class ul_ajax_requests{


	function __construct(){
		 add_action( 'wp_ajax_ul_form_submit_email',  array( $this, 'ul_form_submit_email') );
		 add_action( 'wp_ajax_nopriv_ul_form_submit_email',  array( $this, 'ul_form_submit_email') );

		 add_action( 'wp_ajax_property_action',  array( $this, 'property_action') );
		 add_action( 'wp_ajax_nopriv_property_action',  array( $this, 'property_action') );


	}

	public function ul_form_submit_email(){
		$headers = array('Content-Type: text/html; charset=UTF-8');

		$to = (isset($_POST['sendemail'])) ? $_POST['sendemail']: get_option('admin_email');

		$subject = "My off plan Form Data";
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		$message = '<html><body>';
		$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
		foreach ($_POST as $key => $value) {
			$message .= "<tr style='background: #eee;'><td><strong>".ucwords(str_replace('_', ' ', $key)).":</strong> </td><td>".$value."</td></tr>";
		}
		$message .= "</table>";
		$message .= "</body></html>";
		$message .= "</table>";
		$message .= "</body></html>";
		wp_mail($to, $subject,$message, $headers);
		print(json_encode(array('status' => true)));
		exit();
	}


	public function property_action(){
		$headers = array('Content-Type: text/html; charset=UTF-8');
		$sendemail = "";
		$to = (isset($sendemail)) ? $sendemail: get_option('admin_email');
		$subject = "NOT THE RIGHT PROPERTY FOR YOU?";
		$message = '<html><body>';
		$message .= '<br>';
		$message .= 'Dear Admin,<br><br>';
		$message .= 'Please see below details which have been sent from NOT THE RIGHT PROPERTY FOR YOU? (FORM): <br><br>';
		$message .= '<strong>Property Name: </strong><a href="'.$_POST['link'].'"> '.$_POST['post']."</a><br>";
		$message .= '<strong>Name: </strong> '.$_POST['name']."<br>";
		$message .= '<strong>Name: </strong> '.$_POST['email_address']."<br>";
		$message .= '<strong>Name: </strong> '.$_POST['phone_Number']."<br>";
		$message .= '<strong>Name: </strong> '.$_POST['budget']."<br>";
		$message .= '<strong>Name: </strong> '.$_POST['preferred_location']."<br>";
		$message .= '<strong>Name: </strong> '.$_POST['peferred_contact']."<br>";
		$message .= '<strong>Name: </strong> '.$_POST['message']."<br>";

		$message .= "</body></html>";


		wp_mail($to, $subject,$message, $headers);
		print(json_encode(array('status' => true)));
		exit();
	}


}


new ul_ajax_requests();