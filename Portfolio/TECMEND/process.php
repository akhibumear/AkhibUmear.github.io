<?php
$errors = array();
// array to hold validation errors
$data = array();
// array to pass back data
$service = '';
$number = '';

$data['success'] = true;
$data['messageSuccess'] = 'Hey! Thanks for reaching out. I will get back to you soon';

// CHANGE THE TWO LINES BELOW
$page = $_POST['pageId'];
$postData = $_POST['data'];

if ($page == 'testimonial') {

	if (isset($postData['selectOption'])) {
		$service = "<tr><td>Service: " . $postData['selectOption'] . "</td></tr>";
	}

	if (isset($postData['phoneNo'])) {
		$number = "<tr><td>Phone no.: " . $postData['phoneNo'] . "</td></tr>";
	}
	$email_to = "kuldeep@sparxitsolutions.com";
	$email_subject = $postData['subject'];
	$name = $postData['name'];
	$email_from = $postData['email'];
	$cc = "shyam.sunder@sparxtechnologies.com";
	$message = $postData['message'];

	// Form Message begin
	$email_subject = "BusinessPlus";
	$email_message = "<table border='0' cellpadding='2' cellspacing='2' width='600'>
		<tr><td>Form details below:</td></tr>
		<tr><td>Name: " . $name . " </td></tr>
		<tr><td>Email: " . $email_from . "</td></tr>
		<tr><td>Message: " . $message . "</td></tr>" . $service . $number . "
		</table>";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'Reply-To: ' . $email_from . "\r\n";
	$headers .= 'From: ' . $email_from . "\r\n";
	$headers .= 'Cc: ' . $cc . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion();
	// Send Mail
	@mail($email_to, $email_subject, $email_message, $headers);
}

	// Contact-Us form comes from Footer contacts -Us form
	if ($page == 'contactUs') {
		
	
	if (isset($postData['selectOption'])) {
		$service = "<tr><td>Service: " . $postData['selectOption'] . "</td></tr>";
	}

	if (isset($postData['phoneNo'])) {
		$number = "<tr><td>Phone no.: " . $postData['phoneNo'] . "</td></tr>";
	}				
	
	$email_to = "anshika.yadav@sparxitsolutions.com";
	$email_subject = $postData['subject'];
	$name = $postData['name'];
	$email_from = $postData['email'];
	$cc = "shyam.sunder@sparxtechnologies.com";
	$message = $postData['message'];

	// Form Message begin
	$email_subject = "BusinessPlus";
	$email_message = "<table border='0' cellpadding='2' cellspacing='2' width='600'>
		<tr><td>Form details below:</td></tr>
		<tr><td>Name: " . $name . " </td></tr>
		<tr><td>Email: " . $email_from . "</td></tr>
		<tr><td>Message: " . $message . "</td></tr>" . $service . $number . "
		</table>";
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	// Additional headers
	$headers .= 'Reply-To: ' . $email_from . "\r\n";
	$headers .= 'From: ' . $email_from . "\r\n";
	$headers .= 'Cc: ' . $cc . "\r\n";
	$headers .= 'X-Mailer: PHP/' . phpversion();
	// Send Mail
	@mail($email_to, $email_subject, $email_message, $headers);
}

// To send HTML mail, the Content-type header must be set

//}

// return a response ===========================================================
// response if there are errors

if (!empty($errors)) {
	// if there are items in our errors array, return those errors
	$data['success'] = false;
	$data['errors'] = $errors;
	$data['messageError'] = '*Note: Please check the fields in red';
}
// return all our data to an AJAX call
echo json_encode($data);
?>
