<?php

include('functions/session.php');
include('../admin/functions/connect.php');

if(isset($_GET['id'])) 
{
	$id    = $_GET['id'];
	$query = "SELECT filename FROM document WHERE document_id='11'";

	$result = mysql_query($query) or die('Error, query failed');

	$filename =  mysql_fetch_array($result);

	$path = $_SERVER['DOCUMENT_ROOT']."/assignments/" .$filename;

	$size = filesize($path);

	header('Content-Type: application/pdf');
	header('Content-Length: '.$size);
	header('Content-Disposition: attachment; filename='.$filename);
	header('Content-Transfer-Encoding: binary');

	echo $content;

	exit;
}
?>








<!--<?php
/*include('functions/session.php');
include('../admin/functions/connect.php');

if (isset($_GET['fileSource']) && basename($_GET['fileSource']) == $_GET['fileSource']) {
	$filename = $_GET['fileSource'];
} else {
	$filename = NULL;
}

$err = 'Sorry, the file you are requesting is unavailable.';

if (!$filename) {
	echo $err;
} else {
	$path = $_SERVER['DOCUMENT_ROOT']."/assignments/" .$filename;
	if (file_exists($path) && is_readable($path)) {
		$size = filesize($path);
		header('Content-Type: application/octet-stream');
		header('Content-Length: '.$size);
		header('Content-Disposition: attachment; filename='.$filename);
		header('Content-Transfer-Encoding: binary');
		$file = @ fopen($path, 'rb');
		if ($file) {
			fpassthru($file);
			exit;
		} else {
			echo $err;
		}
	} else {
		echo $err;
	}
}*/

?>-->






<!--<?php 
/*ignore_user_abort(true);
set_time_limit(0);

$path = "assignments/";

$fullPath = $path.$_GET['fileSource'];
if($fullPath) {
	$fsize = filesize($fullPath);
	$path_parts = pathinfo($fullPath);
	$ext = strtolower($path_parts["extension"]);
	switch ($ext) {
		case "pdf": //pdf
		header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
        break;
        case "doc": //doc
		header("Content-type: application/msword");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
        break;
        case "docx": //docx
		header("Content-type: application/vnd.openxmlformats-officedocument.wordprocessingml.document");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
        break;
        case "ppt": //ppt
		header("Content-type: application/vnd.ms-powerpoint");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
        break;
        case "pptx": //pptx
		header("Content-type: application/vnd.openxmlformats-officedocument.presentationml.presentation");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");
        break;
        default;
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
    }
    if($fsize) {//checking if file size exist
    	header("Content-length: $fsize");
    }
    readfile($fullPath);
    exit;
}*/
?>-->




