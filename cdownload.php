<?php
$url = $_POST["url"];
If(empty($url)){header('Location: index.php'); exit;}
$email = $_POST["email"];
$domain = $_SERVER['SERVER_NAME'];
$filename = basename($url);
echo "Downloading $url "; 
echo "<br>";
echo "to ";
echo "<br>";
$downloadedto = 'http://' . $domain . '/downloads/' . $filename;
echo "<a href='$downloadedto'>$downloadedto</a>";
sleep(20);
file_put_contents("downloads/$filename", fopen("$url", 'r'), LOCK_EX);
If(!empty($email)){
mail ($email, "Your cloud download is complete!", "Good news! Your cloud download of $filename is finished!, please download it soon before it is auto deleted from our server $downloadedto");
}
?>