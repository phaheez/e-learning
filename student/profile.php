<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-student.php');
include('functions/session.php');
ob_start();

$student_id = $_SESSION['student_id'];
$query = mysql_query("SELECT * FROM student WHERE student_id='$student_id'");
while ($row = mysql_fetch_array($query)) {
	$fullname = $row['fullname'];
	$dept_id = $row['dept_id'];
	$email = $row['email'];
	$password = $row['password'];

	$query1 = mysql_query("SELECT code FROM department WHERE dept_id='$dept_id'");
	while ($row1 = mysql_fetch_array($query1)) {
		$code = $row1['code'];
	}
}
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<strong><span class="glyphicon glyphicon-user"></span>&nbsp;My Profile</strong>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div id="responsive">
					<div class="row">
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="file">MatricNo:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblStudentID" style="font-weight:500"><?php echo $student_id; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="file">Fullname:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblName" style="font-weight:500"><?php echo $fullname; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="file">Department:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblDept" style="font-weight:500"><?php echo $code; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="file">Email:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblEmail" style="font-weight:500"><?php echo strtolower($email); ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="file">Password:</label>
							<div class="col-sm-6 col-md-3">
								<label for="lblPassword" style="font-weight:500"><?php echo $password; ?></label>
							</div>
							<div class="col-sm-3 col-md-6">
								<a href="#password<?php echo $student_id; ?>" title="Change Password" role="button" class="btn btn-primary" data-toggle="modal">
									<span class="glyphicon glyphicon-pencil"></span>&nbsp;Change Password
								</a>
								<?php include('changepassword_modal.php'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php include('footer-student.php'); ?>
	</div>
</body>