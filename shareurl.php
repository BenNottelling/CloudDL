<?php
$downdomain = str_replace ('www.', '', parse_url($url, PHP_URL_HOST)); //Let's find what domain this is.

	$url = str_replace (['?dl=0','?dl=1', '?'], '', $url);
	$url = $url . '?dl=1';
	$filename = str_replace (['?dl=0','?dl=1', '?'], '', $filename);
}

	$fileid = str_replace (['https://drive.google.com/file/d/','http://drive.google.com/file/d/', '/edit?usp=sharing', '/view?usp=sharing'], '', $url);
	$url = 'https://drive.google.com/uc?export=download&id=' . $fileid;
}
?>