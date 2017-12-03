<div class="col-md-3">
	<div id="admin-responsive">
		<div class="alert alert-success">
			<span class="glyphicon glyphicon-calendar"></span>
			<?php
			$Today = date('y:m:d');
			$new = date('l, F d, Y', strtotime($Today));
			echo $new;
			?>
		</div>
	</div><br>

	<div id="admin-responsive">
		<ul class="nav nav-pills nav-stacked">
			<li class="nav-header" style="margin-left:15px">Links</li>
			<li class="active">
				<a href="adminhome.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Home</a>
			</li>
			<li>
				<a href="course.php"><span class="glyphicon glyphicon-tags"></span>&nbsp;Manage Course</a>
			</li>
			<li>
				<a href="department.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Manage Department</a>
			</li>
			<li>
				<a href="assigncourse.php"><span class="glyphicon glyphicon-link"></span>&nbsp;Assign Courses to Lecturer</a>
			</li>
			<li>
				<a href="subject.php"><span class="glyphicon glyphicon-check"></span>&nbsp;Manage Subject</a>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
					<span class="glyphicon glyphicon-user"></span>&nbsp;Manage Account <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="student.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Student</a></li>
					<li><a href="lecturer.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Lecturer</a></li>
				</ul>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
					<span class="glyphicon glyphicon-file"></span>&nbsp;Manage Course Material <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><a href="document.php"><span class="glyphicon glyphicon-file"></span>&nbsp;Document</a></li>
					<li><a href="video.php"><span class="glyphicon glyphicon-film"></span>&nbsp;Video</a></li>
				</ul>
			</li>
			<!--<li>
				<a href="assignment.php"><span class="glyphicon glyphicon-paperclip"></span>&nbsp;Manage Assignment</a>
			</li>
			<li>
				<a href="quiz.php"><span class="glyphicon glyphicon-book"></span>&nbsp;Manage Quiz</a>
			</li>
			<li>
				<a href="message.php"><span class="glyphicon glyphicon-envelope"></span>&nbsp;Message <span class="badge">4</span></a>
			</li>-->
		</ul>
	</div>
</div>