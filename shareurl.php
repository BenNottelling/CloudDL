<?php
$downdomain = str_replace ('www.', '', parse_url($url, PHP_URL_HOST)); //Let's find what domain this is.

if ($downdomain == 'dropbox.com') { //If it's dropbox we want it to end with "?dl=1" for auto downloading.
	$url = str_replace (['?dl=0','?dl=1', '?'], '', $url);
	$url = $url . '?dl=1';
	$filename = str_replace (['?dl=0','?dl=1', '?'], '', $filename);
}

if ($downdomain == 'drive.google.com') { //If it's google drive we need to get the file ID then pass that into the download URL (this will cause an issue with links to a download (already parsed)
	$fileid = str_replace (['https://drive.google.com/file/d/','http://drive.google.com/file/d/', '/edit?usp=sharing', '/view?usp=sharing', 'https://drive.google.com/open?id='], '', $url);
	$url = 'https://drive.google.com/uc?export=download&id=' . $fileid;
}
?>