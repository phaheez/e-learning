<?php 
include('header-lecturer.php');
include('functions/session.php');
?>

<body>
	<?php include('navhead-lecturer.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<a title="Back to Assignment" href="assignment.php" role="button" class="btn btn-success">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back to Assignment
					</a>
				</div>
			</div>
		</div><br>

		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Submitted Assignments</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th>MatricNo</th>
								<th>Course</th>
								<th>Filename</th>
								<th>Format</th>
								<th>Submitted Date</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$get_id = $_GET['id'];
							$query = mysql_query("select * from assignments_submit where assignments_id='$get_id'");
							while ($row = mysql_fetch_array($query)) {
								$assignments_submit_id = $row['assignments_submit_id'];
								$assignments_id = $row['assignments_id'];
								$student_id = $row['student_id'];
								$filename = $row['filename'];
								$format = $row['format'];
								$submit_date = $row['submitted_date'];

								$query1 = mysql_query("select * from assignments where assignments_id='$assignments_id'");
								$row1 = mysql_fetch_array($query1);
								$course_id = $row1['course_id'];

								$query2 = mysql_query("select code from course where course_id='$course_id'");
								$row2 = mysql_fetch_array($query2);
								$course_code = $row2['code'];

								?>
								<tr>
									<td><?php echo $student_id; ?></td>
									<td><?php echo $course_code; ?></td>
									<td><?php echo $filename; ?></td>
									<td><?php echo $format; ?></td>
									<td><?php echo $submit_date; ?></td>
									<td>
										<a href="<?php echo "assignments/$filename"; ?>" target="_blank" title="Download Assignment" role="button" class="btn btn-primary">
											<span class="glyphicon glyphicon-download"></span>&nbsp;Download
										</a>
									</td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>

					<nav arial-label="..." class="pull-right">
						<ul class="pager">
							<li>
								<a href="#"><span arial-hidden="true">&larr;</span>prev</a>
							</li>
							<li>
								<a href="#">Next<span arial-hidden="true">&rarr;</span></a>
							</li>
						</ul>
					</nav>
				</div><br>

				<!--<div class="text-center">
					<a href="#" title="Download All Assignment" role="button" class="btn btn-primary">
						<span class="glyphicon glyphicon-download"></span>&nbsp;Download All Once (.zip files)
					</a>
				</div>-->
			</div>
		</div>

		<?php include('footer-lecturer.php'); ?>
	</div>
</body>