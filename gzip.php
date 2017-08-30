<?php
/**
 * GZIPs a file on disk (appending .gz to the name)
 *
 * From http://stackoverflow.com/questions/6073397/how-do-you-create-a-gz-file-using-php
 * Based on function by Kioob at:
 * http://www.php.net/manual/en/function.gzwrite.php#34955
 * 
 * @param string $source Path to file that should be compressed
 * @param integer $level GZIP compression level (default: 9)
 * @return string New filename (with .gz appended) if success, or false if operation fails
 */
function gzCompressFile($source, $level = 9){ 
    $dest = $source . '.gz'; 
    $mode = 'wb' . $level; 
    $error = false; 
    if ($fp_out = gzopen($dest, $mode)) { 
        if ($fp_in = fopen($source,'rb')) { 
            while (!feof($fp_in)) 
                gzwrite($fp_out, fread($fp_in, 1024 * 512)); 
            fclose($fp_in); 
        } else {
            $error = true; 
        }
        gzclose($fp_out); 
    } else {
        $error = true; 
    }
    if ($error)
        return false; 
    else
        return $dest; 
}
//Defining if we need to add the file to a gzip
$needcompress = array(
	'html' => 'true',
	'php' => 'true',
	'htm' => 'true',
	'png' => 'true',
	'gif' => 'true',
	'mp4' => 'true',
	'mp3' => 'true',
	'mov' => 'true',

);
$togzip = $needcompress[$filetype];
if ($tozip) {
$newfilename = gzCompressFile("downloads/$newfilename",0);
}
?>
