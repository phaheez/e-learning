<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-admin.php');
include('functions/session.php');
ob_start();

$id = $_SESSION['id'];
$query = mysql_query("SELECT * FROM admin WHERE id='$id'");
while ($row = mysql_fetch_array($query)) {
	$admin_id = $row['id'];
	$admin_username = $row['username'];
	$admin_password = $row['password'];
}
?>

<body>
	<?php include('navhead-admin.php'); ?>

	<div class="container body-content">
		<div class="row">
			<?php include('navleft-admin.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div id="responsive">
							<div class="alert alert-info">
								<strong><span class="glyphicon glyphicon-user"></span>&nbsp;My Profile</strong>
							</div>

							<div class="row">
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblUsername">Username:</label>
									<div class="col-sm-9 col-md-9">
										<label for="lblUsername" style="font-weight:500"><?php echo $admin_username; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<label  class="col-sm-3 col-md-3 control-label" for="lblPassword">Password:</label>
									<div class="col-sm-6 col-md-3">
										<label for="lblPassword" style="font-weight:500"><?php echo $admin_password; ?></label>
									</div>
								</div><br>
								<div class="form-group">
									<div class="col-sm-3 col-md-3"></div>
									<div class="col-sm-9 col-md-9">
										<a href="#edit-account<?php echo $admin_id; ?>" title="Edit Account" role="button" class="btn btn-success" data-toggle="modal">
											<span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit Account
										</a>
										<?php include('edit_account_modal.php'); ?>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		

		<?php include('footer-admin.php'); ?>
	</div>
</body>