<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-student.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">

		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-success pull-left">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>STUDENT DASHBOARD!</strong>&nbsp;Welcome to Carlo Hilado Memorial State College Student Dashboard.
				</div>
				<div class="alert alert-success pull-right">
					<span class="glyphicon glyphicon-calendar"></span>
					<?php
					$Today = date('y:m:d');
					$new = date('l, F d, Y', strtotime($Today));
					echo $new;
					?>
				</div>
			</div>
		</div>

		<div class="row text-center" id="dashboard">
			<br>
			<div class="col-md-4 col-xs-4 ">
				<a href="document.php">
					<img src="../images/placehold.png" class="img-circle" height="150" width="150" alt="">
					<h4><span >Download Document(s)</span></h4>
				</a>
			</div>
			<div class="col-md-4 col-xs-4">
				<a href="video.php">
					<img src="../images/placehold.png" class="img-circle" height="150" width="150" alt="">
					<h4><span>Download/Watch Video(s)</span></h4>
				</a>
			</div>
			<div class="col-md-4 col-xs-4">
				<a href="assignment.php">
					<img src="../images/placehold.png" class="img-circle" height="150" width="150" alt="">
					<h4><span>My Assignment</span></h4>
				</a>
			</div>
		</div>
		
		<div class="row text-center" id="dashboard">
			<br>
			<div class="col-md-4 col-xs-4 ">
				<a href="quiz.php">
					<img src="../images/placehold.png" class="img-circle" height="150" width="150" alt="">
					<h4><span >Take Quiz</span></h4>
				</a>
			</div>
			<!--<div class="col-md-4 col-xs-4">
				<a href="message.php">
					<img src="../images/placehold.png" class="img-circle" height="150" width="150" alt="">
					<h4><span>Message(s)</span></h4>
				</a>
			</div>-->
			<div class="col-md-4 col-xs-4">
				<a href="profile.php">
					<img src="../images/placehold.png" class="img-circle" height="150" width="150" alt="">
					<h4><span>My Profile</span></h4>
				</a>
			</div>
		</div>


		<?php include('footer-student.php'); ?>
	</div>
</body>
</html>