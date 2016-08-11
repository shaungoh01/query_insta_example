<?php 
include '.env.php';
if(isset($_GET['code'])){
	$code = $_GET['code'];

}

    // OK cool - then let's create a new cURL resource handle
    $ch = curl_init();
 
    // Now set some options (most are optional)
 
    // Set URL to download
    $url = "https://api.instagram.com/oauth/access_token";
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
	            "client_id=".$client_id."&client_secret=".$client_secret."&grant_type=authorization_code&redirect_uri=".$redirect_uri."&code=".$code);
    // curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    $output = curl_exec($ch);
 
    curl_close($ch);
    // echo $output;
     $arr = json_decode($output);
    // echo "<br>";
     print_r($arr);
    // echo "<br>".$arr->access_token;
     session_start();

     $_SESSION['access_token'] = $arr->access_token;
   	header("Location: ".$myDomain."/user.php");
	die();