<?php
include('functions/session.php');
include('../admin/functions/connect.php');
$get_id = $_GET['id'];
mysql_query("delete from document where document_id='$get_id'")or die(mysql_error());
header('location:document.php');
?>
