<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-lecturer.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-lecturer.php'); ?>

	<div class="container body-content">

		<div class="row">
			<div class="col-md-12">
				<div class="alert bg-primary pull-left">
					<strong>LECTURER DASHBOARD</strong>
				</div>
				<div class="alert bg-primary pull-right">
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
			<div class="col-md-3 col-xs-3 ">
				<a href="subject.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span >Subject</span></h4>
				</a>
			</div>
			<div class="col-md-3 col-xs-3">
				<a href="document.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span>Document</span></h4>
				</a>
			</div>
			<div class="col-md-3 col-xs-3">
				<a href="video.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span>Video</span></h4>
				</a>
			</div>
			<div class="col-md-3 col-xs-3 ">
				<a href="assignment.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span >Assignment</span></h4>
				</a>
			</div>
		</div>
		
		<div class="row text-center" id="dashboard">
			<br>
			<div class="col-md-3 col-xs-3">
				<a href="quiz.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span>Quiz</span></h4>
				</a>
			</div>
			<!--<div class="col-md-3 col-xs-3">
				<a href="message.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span>Message</span></h4>
				</a>
			</div>-->
			<div class="col-md-3 col-xs-3">
				<a href="profile.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span>My Profile</span></h4>
				</a>
			</div>
			<div class="col-md-3 col-xs-3">
				<a href="logout.php">
					<img src="../images/placehold.png" class="img-thumbnail" width="150" alt="">
					<h4><span>Logout</span></h4>
				</a>
			</div>
		</div>


		<?php include('footer-lecturer.php'); ?>
	</div>
</body>
</html>