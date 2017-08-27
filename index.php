<html>
<head><title>CloudDL</title></head>
<body>

<?php
	include 'downspeed.php';
	echo "Server's speed is: $speed MB/s";
	echo '<br>';
	if(!file_exists('downloads')){mkdir ('downloads');}
	$bf= disk_free_space('downloads/');
	$bt = disk_total_space('/');
	
	function HumanSize($Bytes){
		$Type=array('', 'kilo', 'mega', 'giga', 'tera', 'peta', 'exa', 'zetta', 'yotta');
		$Index=0;
		while($Bytes>=1024)  {
		$Bytes/=1024;
		$Index++;
		}
	echo('Cloud space left: '. round($Bytes, 2).' '.$Type[$Index].'bytes');
	}
HumanSize($bf);
?>

<form action='cdownload.php' method='post'>
	URL to download: <input type='text' name='url'><br>
	My email (to notify, optional): <input type='text' name='email'><br>
<input type='submit'>
</form>
<a href='https://github.com/BenNottelling/CloudDL'>Powered by CloudDL</a>

</body>
</html>
