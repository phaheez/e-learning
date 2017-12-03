<?php
include('header-admin.php');
//Start session
session_start();
//Unset the variables stored in session
unset($_SESSION['username']);
?>

<body>
	<div class="container body-content">
		<div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6" style="margin:150px 0 0 50px;width:400px;">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title text-center">Administrator</h3>
					</div>

					<div class="panel-body">
						<form method="POST" class="form-signin">
							<?php
							if (isset($_POST['btnLogin'])) {

								function clean($str) {
									$str = @trim($str);
									if (get_magic_quotes_gpc()) {
										$str = stripslashes($str);
									}
									return mysql_real_escape_string($str);
								}

								$username = clean($_POST['txtUsername']);
								$password = clean($_POST['txtPassword']);

								$query = mysql_query("select * from admin where username='$username' and password='$password'") or die(mysql_error());
								$count = mysql_num_rows($query);
								$row = mysql_fetch_array($query);

								if ($count > 0) {
									session_start();
									session_regenerate_id();
									$_SESSION['username'] = $row['username'];
									$_SESSION['id'] = $row['id'];
									header('location:adminhome.php');
									session_write_close();
									exit();
								} else {
									session_write_close();
									?>
									<div class="alert alert-danger" role="alert">
										<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
										<span class="sr-only">Error:</span>Access Denied
									</div>
									<?php
								}
							}
							?>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">
										<span class="glyphicon glyphicon-user"></span>
									</span>
									<input type="text" class="form-control" placeholder="Username" 
									name="txtUsername" aria-describedby="basic-addon1" required>
								</div>
							</div>

							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">
										<span class="glyphicon glyphicon-lock"></span>
									</span>
									<input type="password" class="form-control" placeholder="Password" 
									name="txtPassword" aria-describedby="basic-addon1" required>
								</div>
							</div>

							<input type="submit" class="btn btn-success" name="btnLogin" value="Login" style="width:100%;">
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-3"></div>
		</div>
	</div>
</body>
</html>