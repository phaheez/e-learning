<?php
include('functions/session.php');
include('../admin/functions/connect.php');
$get_id = $_GET['id'];
mysql_query("delete from subject where subject_id='$get_id'")or die(mysql_error());
header('location:subject.php');
?>
