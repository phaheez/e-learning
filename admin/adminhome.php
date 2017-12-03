<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-admin.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-admin.php'); ?>

	<div class="container body-content">
		<div class="row">
			<?php include('navleft-admin.php'); ?>

			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success pull-left">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
							<strong>ADMIN DASHBOARD!</strong>&nbsp;Welcome to Carlo Hilado Memorial State College.
						</div>
					</div>
				</div>

				<div class="jumbotron">
					<!--<img src="../images/1.jpg" alt="..." width="100%">
					<div class="caption">
						<h3>Thumbnail label</h3>
						<p>...</p>
						<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
					</div>-->
				</div>
			</div>
		</div>

		<?php include('footer-admin.php'); ?>
	</div>
</body>
</html>