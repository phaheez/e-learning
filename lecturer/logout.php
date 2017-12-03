<?php

session_start();
unset($_SESSION['lecturer_id']);
session_destroy();
header('location:index.php');

?>