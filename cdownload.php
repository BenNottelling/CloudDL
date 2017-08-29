<?php
If(empty($_POST["url"])){header('Location: index.php'); exit;}
ignore_user_abort(true);
set_time_limit(12*31*24*60*60); //372 days if you are wondering, in seconds.
$url = $_POST["url"];
$email = $_POST["email"];
$domain = $_SERVER['SERVER_NAME'];
$filename = basename($url);
include "shareurl.php"; //for shared URLs (like from dropbox)

echo "Downloading $url "; 
echo "<br>";
echo "to ";
echo "<br>";
$downloadedto = 'http://' . $domain . '/downloads/' . $filename;

echo "<a href='$downloadedto'>$downloadedto</a>";


file_put_contents("downloads/$filename", fopen("$url", 'r'), LOCK_EX);

if(!empty($email)){
	mail ($email, "Your cloud download is complete!", "Good news! Your cloud download of $filename is finished! please download it soon before it is auto deleted from our server $downloadedto");
}
?>
