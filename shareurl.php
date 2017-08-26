<?php
$domain = str_replace ('www.', '', parse_url($url, PHP_URL_HOST)); //Let's find what domain this is.

if ($domain = "dropbox.com") { //If it's dropbox we want it to end with "?dl=1" for auto downloading.
	$url = str_replace (['?dl=0','?dl=1', '?'], '', $url);
	$url = $url . '?dl=1';
}
?>