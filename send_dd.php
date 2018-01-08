<?php

$webmaster_email = "rahul.raj2015@vit.ac.in";

$feedback_pag = "demanddraftform.html";
$error_pag = "error.html";
$thankyou_pag = "success.html";

$first_name = $_REQUEST['first_name'] ;
$last_name = $_REQUEST['last_name'] ;
$college = $_REQUEST['college'] ;
$college_id = $_REQUEST['college_id'];
$bank_name = $_REQUEST['bank_name'] ;
$branch_name = $_REQUEST['branch_name'] ;
$dd_no = $_REQUEST['dd_no'] ;
$address = $_REQUEST['address'];
$city = $_REQUEST['city'];
$state = $_REQUEST['state'];
$number = $_REQUEST['number'];
$email = $_REQUEST['email'] ;

$event=" ";
	$cat = $_POST['cat'];
	if ($cat == "m"){
			//echo 'Correct';
			$event = $event ." ". "ml-m";
			$ml = "700";
		}
		else if($cat == 'nm'){
		    $event = $event ." "."ml-nm";
			$ml = "900";
		}
		else {
			//echo 'Incorrect';
			
			$ml = "0";
		}
		
	$cat2 = $_POST['cat2'];
	if ($cat2 == "m"){
			//echo 'Correct';
			$event = $event." "."vlsi-m";
			$vlsi = "800";
		}
		else if($cat2 == 'nm'){
		    $event = $event." "."vlsi-nm";
			$vlsi = "1000";
		}
		else {
			//echo 'Incorrect';
			$vlsi = "0";
		}

	$cat3 = $_POST['cat3'];
	if ($cat3 == "m"){
			//echo 'Correct';
			$event = $event." "."adw-m";
			$adw = "200";
		}
		else if($cat3 == 'nm'){
		    $event = $event." "."adw-nm";
			$adw = "200";
		}
		else {
			//echo 'Incorrect';
			$adw = "0";
		}
	$cat4 = $_POST['cat4'];	
	if ($cat4 == "m"){
			//echo 'Correct';
			$event = $event ." "."rw-m";
			$rw = "800";
		}
		else if($cat4 == 'nm'){
		    $event = $event." "."rw-nm";
			$rw = "1000";
		}
		else {
			//echo 'Incorrect';
			$rw = "0";
		}
		
		$paper = $_POST['paper'];
		if ($paper == '300'){
			$event = $event." "."paper";
			$paper = "300";
		}
		
		$code = $_POST['code'];
		if ($code == '300'){
			$event = $event." "."code";
			$code = "300";
		}
		
		$guestlecture = $_POST['guestlecture'];
		if ($guestlecture == '0'){
			$event = $event." "."guestlecture";
			$guestlecture = "0";
		}
		
		$cultural = $_POST['cultural'];
		if ($cultural == '350'){
			$event = $event." "."cultural";
			$cultural = "350";
		}
		
		$c1 = $_POST['c1'];
		if ($c1 == '1450'){
			$event = $event." "."c1";
			$c1 = "1450";
		}
		
		
		$c2 = $_POST['c2'];
		if ($c2 == '1550'){
			$event = $event." "."c2";
			$c2 = "1550";
		}
		
		$c3 = $_POST['c3'];
		if ($c3 == '1450'){
			$event = $event." "."c3";
			$c3 = "1450";
		}
		
		$c4 = $_POST['c4'];
		if ($c4 == '1450'){
			$event = $event." "."c4";
			$c4 = "1450";
		} 
		
		$c5 = $_POST['c5'];
		if ($c5 == '1050'){
			$event = $event." "."c5";
			$c5 = "1050";
		}
		
 $amount="$ml"+"$vlsi"+"$adw"+"$rw" + "$paper" + "$code" + "$guestlecture" + "$cultural" + "$c1" + "$c2" + "$c3" + "$c4" + "$c5";
 
	
	











$msg = 
"First Name: " . $first_name . "\r\n" . 
"Last Name: " . $last_name . "\r\n" . 
"College: " . $college . "\r\n" . 
"College_id: " . $college_id. "\r\n" . 
"Bank Name: " . $bank_name . "\r\n" .
"Branch Name: " . $branch_name . "\r\n" .
"DD_no: " . $dd_no . "\r\n" . 
"Address: " . $address . "\r\n" . 
"City: " . $city . "\r\n" .
"State: " . $state . "\r\n" .
"Number: " . $number . "\r\n" . 
"Amount: " . $amount . "\r\n" . 
"Event: " . $event . "\r\n" . 
"Email: " . $email ;



function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

if (!isset($_REQUEST['email'])) {
header( "Location: $feedback_pag" );
}

// If the form fields are empty, redirect to the error page.
elseif (empty($first_name) || empty($email) || empty($last_name) || empty($college) || empty($college_id) || empty($bank_name) || empty($branch_name) || empty($dd_no)|| empty($address) || empty($city)|| empty($state) || empty($number) ) {
header( "Location: $error_pag" );
}

/* 
If email injection is detected, redirect to the error page.
If you add a form field, you should add it here.
*/
elseif ( isInjected($email) || isInjected($first_name)  || isInjected($number) || isInjected($last_name)|| empty($college) || empty($college_id) || empty($bank_name) || empty($branch_name) || empty($dd_no)|| empty($address) || empty($city)|| empty($state) ) {
header( "Location: $error_pag" );
}

// If we passed all previous tests, send the email then redirect to the thank you page.
else {

	mail( "$webmaster_email", "Demand Draft Results", $msg );    
	header( "Location: $thankyou_pag" );
}
?>
