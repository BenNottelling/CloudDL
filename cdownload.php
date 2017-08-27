<?php
if (empty($_POST["url"])){header('Location: index.php'); exit;}


//Mailgun config
$usemailgun = false;
$mailuser = '';
$mailpass = '';

//Setting the download URL, getting email, ect
set_time_limit(0);
$url = $_POST["url"];
$email = $_POST["email"];
$domain = $_SERVER['SERVER_NAME'];
$filename = basename($url);

echo "Downloading $url "; 
echo "<br>";
echo "to ";
echo "<br>";
$downloadedto = 'http://' . $domain . '/downloads/' . $filename;

echo "<a href='$downloadedto'>$downloadedto</a>";


file_put_contents("downloads/$filename", fopen("$url", 'r'), LOCK_EX);

if (!empty($email)){
	if ($usemailgun) {
	include 'mailgun.php';
	echo 'using mailgun';
	} else {
	mail ($email, "Your cloud download is complete!", "Good news! Your cloud download of $filename is finished!, please download it soon before it is auto deleted from our server $downloadedto");
	echo 'not using mailgun';
	}
}
?>