<?php
session_start();
$myDomain = "http://localhost/insta_pic";
if(isset($_SESSION['access_token'])){
	header("Location: ".$myDomain."/user.php");
	die();
}
include '.env.php';
$request_url = "https://api.instagram.com/oauth/authorize/?client_id=".$client_id."&redirect_uri=".$redirect_uri."&response_type=".$response_type."&scope=".$scope;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insta_pic - Index</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h1>Hello World</h1>
		<a href="<?php echo $request_url ?>" class="btn btn-success">Login to Instagram</a>
	</div>
</body>
</html>