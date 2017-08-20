<?php
set_time_limit(0); //This is needed for the webpage to not timeout on large downloads, if it does the download will keep running and still email however!
//These must be defined for everything to work, if $url is empty attempt to redirect to index file.
$url = $_POST["url"];
If(empty($url)){header('Location: index.php'); exit;}
$email = $_POST["email"];
$domain = $_SERVER['SERVER_NAME'];
if(!empty(filesize($url))){$dlsize=filesize($url);}else{$dlsize = 99*99;}
if(!empty($_POST["curl"])){$usecurl = $_POST["curl"];}

$maxcurlsize = memory_get_usage();

//cURL options
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_TIMEOUT, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$dl = curl_exec($ch);
$filename = basename($url);
echo "Downloading $url "; 
echo "<br>";
echo "to ";
echo "<br>";
$downloadedto = 'http://' . $domain . '/downloads/' . $filename;

echo "<a href='$downloadedto'>$downloadedto</a>";

//If the file size is larger than our maximum ram ammount then lets just write the file with fopen.
if($dlsize > $maxcurlsize){
	file_put_contents("downloads/$filename", fopen("$url", 'r'), LOCK_EX);
}else{
	file_put_contents("downloads/$filename", $dl, LOCK_EX);
}
if(!empty($email)){
	mail ($email, "Your cloud download is complete!", "Good news! Your cloud download of $filename is finished!, please download it soon before it is auto deleted from our server $downloadedto");
}
?>