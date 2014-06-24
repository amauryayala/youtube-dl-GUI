<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
	include_once("youtubedownload.php");
	$download = new youtubedownload();
	
?>
<html>
	<head>
		<title>Download youtube video/music</title>
	</head>
	<body>	
		<form action="" method="post">
			<input type="text" name="url" placeholder="Enter youtube url">
			<select>
				<option>name</option>
			</select>
			<input type="submit" name="Video" value="Download video!">
			<input type="submit" name="Music" Value="Download mp3!">
		</form>
	<?php
	if($_POST["Video"]){
		$download->download($_POST["url"]);
	}
	if($_POST["Music"]){
		$download->downloadmp3($_POST["url"]);
	}
	foreach($download->errors() as $error){
		echo $error;
	}
	//echo $download->errors();
	?>
	
	</body>
	</html>
