<?php
include('functions/session.php');
include('../admin/functions/connect.php');
$get_id = $_GET['id'];
mysql_query("delete from quiz where quiz_id='$get_id'")or die(mysql_error());
header('location:quiz.php');
?>
