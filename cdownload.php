<?php
set_time_limit(0);
$url = $_POST["url"];
If(empty($url)){header('Location: index.php'); exit;}
$email = $_POST["email"];
$domain = $_SERVER['SERVER_NAME'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);
$dl = curl_exec($ch);
$filename = basename($url);
echo "Downloading $url "; 
echo "<br>";
echo "to ";
echo "<br>";
$downloadedto = 'http://' . $domain . '/downloads/' . $filename;

echo "<a href='$downloadedto'>$downloadedto</a>";



file_put_contents("downloads/$filename", $dl, 'r', LOCK_EX);
If(!empty($email)){
mail ($email, "Your cloud download is complete!", "Good news! Your cloud download of $filename is finished!, please download it soon before it is auto deleted from our server $downloadedto");
}
?>