<?php
include('functions/session.php');
include('functions/connect.php');
$get_id = $_GET['id'];
mysql_query("delete from lecturer where lecturer_id='$get_id'")or die(mysql_error());
header('location:lecturer.php');
?>
