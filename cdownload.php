<?php
If(empty($_POST["url"])){header('Location: index.php'); exit;}
ignore_user_abort(true);
set_time_limit(12*31*24*60*60); //372 days if you are wondering, in seconds.
$url = $_POST["url"];
$email = $_POST["email"];
$domain = $_SERVER['SERVER_NAME'];
$filename = basename($url);
include "shareurl.php"; //for shared URLs (like from dropbox)


ob_implicit_flush(true);
ob_start();

echo "Downloading $url "; 
echo "<br>";
ob_flush();
flush();

$filename = str_replace ([' ','%', '?', '[' , ']', '-','&', '^', '*' , '/'], '', $filename);
file_put_contents("downloads/$filename", fopen("$url", 'r'), LOCK_EX);
echo "Downloaded, correcting name <br>";
ob_flush();
flush();
include 'filetype.php';
rename("files/$filename", "downloads/$newfilename");

echo "to ";
echo "<br>";
$downloadedto = 'http://' . $domain . '/downloads/' . $newfilename;

echo "<a href='$downloadedto'>$downloadedto</a>";
ob_flush();
flush();

if(!empty($email)){
	mail ($email, "Your cloud download is complete!", "Good news! Your cloud download of $filename is finished! please download it soon before it is auto deleted from our server $downloadedto");
}
?>
