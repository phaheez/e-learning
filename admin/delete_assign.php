<?php
include('functions/session.php');
include('functions/connect.php');
$get_id = $_GET['id'];
mysql_query("delete from course_assign where assign_id='$get_id'")or die(mysql_error());
header('location:assigncourse.php');
?>
