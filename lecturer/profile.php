<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-lecturer.php');
include('functions/session.php');
ob_start();

$lecturer_id = $_SESSION['lecturer_id'];
$query = mysql_query("SELECT * FROM lecturer WHERE lecturer_id='$lecturer_id'");
while ($row = mysql_fetch_array($query)) {
	$name = $row['fullname'];
	$title = $row['title'];
	$fullname = $title ." ". $name;
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
	<?php include('navhead-lecturer.php'); ?>

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
							<label  class="col-sm-3 col-md-3 control-label" for="lblLecturerID">LecturerID:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblLecturerID" style="font-weight:500"><?php echo $lecturer_id; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="lblName">Fullname:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblName" style="font-weight:500"><?php echo $fullname; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="lblDept">Department:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblDept" style="font-weight:500"><?php echo $code; ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="lblEmail">Email:</label>
							<div class="col-sm-9 col-md-9">
								<label for="lblEmail" style="font-weight:500"><?php echo strtolower($email); ?></label>
							</div>
						</div>
						<div class="form-group">
							<label  class="col-sm-3 col-md-3 control-label" for="lblPassword">Password:</label>
							<div class="col-sm-6 col-md-3">
								<label for="lblPassword" style="font-weight:500"><?php echo $password; ?></label>
							</div>
							<div class="col-sm-3 col-md-6">
								<a href="#change-password<?php echo $lecturer_id; ?>" title="Change Password" role="button" class="btn btn-primary" data-toggle="modal">
									<span class="glyphicon glyphicon-pencil"></span>&nbsp;Change Password
								</a>
                    			<?php include('change_password_modal.php'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php include('footer-lecturer.php'); ?>
	</div>
</body>