<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lecturer - CHMSC Elearning System</title>
	<link href="../images/chmsc.png" rel="icon" type="image">
	<!--Bootstrap CSS-->
	<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!--Bootstrap DateTimePicker CSS-->
	<link href="../css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
	<!--font-awesome CSS-->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="../css/style.css" rel="stylesheet" type="text/css">
	<!--Bootstrap DataTable CSS
	<link href="../css/datatables.min.css" rel="stylesheet" type="text/css">-->
	<?php include('../admin/functions/connect.php'); ?>
</head>

<script src="../js/jquery-2.2.3.min.js" type="text/javascript"></script>
<!--<script src="../js/jquery-2.1.1.min.js" type="text/javascript"></script>-->
<!--Bootstrap JS-->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
<!--Bootstrap DateTimePicker JS-->
<script src="../js/moment.js" type="text/javascript"></script>
<script src="../js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<!--Bootstrap DataTable JS
<script src="../js/datatables.min.js" type="text/javascript"></script>-->


<script type="text/javascript">
/*$(document).ready(function() {
	$('#example').DataTable();
});*/

$(function () {
	$('#datetimepicker1').datetimepicker();
	$('#datetimepicker3').datetimepicker();
});
</script>