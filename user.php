<?php
	session_start();
	include '.env.php';
	if(!isset($_SESSION['access_token'])){
		header("Location: ".$myDomain);
		die();
	}
    $ch = curl_init();
	$client_id = "24ba6bca5ae2487b9b4b169a7b8bbf95";
    $url = "https://api.instagram.com/v1/users/self/media/recent/?client_id=".$client_id."&access_token=".$_SESSION['access_token'];
    curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    // curl_setopt($ch, CURLOPT_HEADER, 0);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($ch, CURLOPT_TIMEOUT, 100);
    $output = curl_exec($ch);
 
    curl_close($ch);
    $pic_arr = json_decode($output);
    //echo"<pre>";
    //print_r($pic_arr);
    //echo "</pre>";
    //echo $pic_arr->data[0]->images->standard_resolution->url;
    ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
    <?php foreach($pic_arr->data as $pic){ ?>

    	<img src="<?php echo $pic->images->standard_resolution->url;?>"> </img>
    	

    	<?php } ?>
</body>
</html>
