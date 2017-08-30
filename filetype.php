<?php
$mime = mime_content_type("downloads/$filename");
$mime_types = array(//mime_type then extension, feel free to update it from here http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
	//Archives
	'application/zip' => 'zip',
	'application/x-rar-compressed' => 'rar',
	'application/vnd.ms-cab-compressed' => 'cab',
	'application/java-archive' => 'jar',
	'application/vnd.android.package-archive' => 'apk',
	'application/x-7z-compressed' => '7z',
	'application/x-tar' => 'tar',
);
$filetype = $mime_types[$mime];
$newfilename = $filename . '.' . $filetype;
?>
