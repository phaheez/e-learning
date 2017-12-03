<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header.php');
ob_start();
?>

<body>
	<?php include('navhead.php'); ?>

	<div class="container body-content">

		<div class="row">
			<div class="col-md-12">
				<br>
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Head Up!</strong>&nbsp;Welcome to Carlo Hilado Memorial State College E-Learning Portal.
				</div>

				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!--Indicators-->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!--Wrapper for slides-->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="images/1.jpg" alt="image1" style="height:300px;width:100%">
						</div>
						<div class="item">
							<img src="images/2.jpg" alt="image1" style="height:300px;width:100%">
						</div>
						<div class="item">
							<img src="images/3.jpg" alt="image1" style="height:300px;width:100%">
						</div>
					</div>
					<!--Control-->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>

		<div class="row">
			<br><br>
			<div class="col-md-4 text-center">
				<h2>Student Management</h2>
				<p>
					ASP.NET MVC gives you a powerful, patterns-based way to build dynamic websites that
					enables a clean separation of concerns and gives you full control over markup
					for enjoyable, agile development.
				</p>
				<img src="images/11.jpg" height="180" width="250">
			</div>
			<div class="col-md-4 text-center">
				<h2>Lecturer Management</h2>
				<p>
					ASP.NET MVC gives you a powerful, patterns-based way to build dynamic websites that
					enables a clean separation of concerns and gives you full control over markup
					for enjoyable, agile development.
				</p>
				<img src="images/22.jpg" height="180" width="250">
			</div>
			<div class="col-md-4 text-center">
				<h2>Admin Management</h2>
				<p>
					ASP.NET MVC gives you a powerful, patterns-based way to build dynamic websites that
					enables a clean separation of concerns and gives you full control over markup
					for enjoyable, agile development.
				</p>
				<img src="images/33.jpg" height="180" width="250">
			</div>
		</div>
		
		<div id="about" class="row" style="margin:0;">
			<br><br>
			<div class="col-md-12 text-center" style="background-color:white; padding-bottom:10px">
				<h2>About E-Learning System</h2>
				<p>
					ASP.NET MVC gives you a powerful, patterns-based way to build dynamic websites that
					enables a clean separation of concerns and gives you full control over markup for enjoyable, agile development gives you a powerful, patterns-based way to build dynamic websites that enables a clean separation of concerns and gives you full control over markup for enjoyable, agile development gives you a powerful, patterns-based way to build dynamic websites that enables a clean separation of concerns and gives you full control over markup for enjoyable, agile development gives you a powerful, patterns-based way to build dynamic websites that enables a clean separation of concerns and gives you full control over markup for enjoyable, agile development gives you a powerful, patterns-based way to build dynamic websites that
					enables a clean separation of concerns and gives you full control over markup
					for enjoyable, agile development.
				</p>
			</div>
		</div>

		<?php include('footer.php'); ?>
	</div>
</body>
</html>