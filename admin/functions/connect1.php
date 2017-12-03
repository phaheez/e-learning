<?php
$host = 'mysql1.000webhost.com';
$user = 'a9085876_phaheez';
$pwd  = 'fasasifaiz123';
$db   = 'a9085876_cloud';

$con = mysql_connect($host, $user, $pwd) or die("Could not connect");
mysql_select_db($db, $con) or die("No database");
?>