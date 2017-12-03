<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-student.php');
include('functions/session.php');
ob_start();

date_default_timezone_set("Africa/Lagos");

$student_dept = $_SESSION['student_dept_id'];
$student_id = $_SESSION['student_id'];

?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		<!--UnSubmitted Assignment-->
		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Assignment(s)</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Assignment</th>
								<th width="230">Lecturer</th>
								<th width="160">Upload Date</th> 
								<th width="160">Due Date</th>              
								<th class="text-center">Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							
							$query = mysql_query("SELECT * FROM lecturer WHERE dept_id='$student_dept'") or die(mysql_error());
							while ($row = mysql_fetch_array($query)) {
								$lecturer_id = $row['lecturer_id'];
								$title = $row['title'];
								$name = $row['fullname'];
								$fullname = $title ." ". $name;

								$query1 = mysql_query("SELECT * FROM assignments WHERE lecturer_id='$lecturer_id'") or die(mysql_error());
								while ($row1 = mysql_fetch_array($query1)) {
									$assignments_id = $row1['assignments_id'];
									$course_id = $row1['course_id'];
									$assignment = $row1['assignment'];
									$adate = date_create($row1['added_date']);
									$added_date = date_format($adate, "d/m/Y h:i A");

									$ddate = date_create($row1['due_date']);
									$due_date = date_format($ddate, "d/m/Y h:i A");

									$tdate = date_create($row1['due_date']);
									$txt_date = date_format($tdate, "m/d/Y h:i A");

									$query2 = mysql_query("select code from course where course_id='$course_id'") or die(mysql_error());
									while ($row2 = mysql_fetch_array($query2)) {
										$code = $row2['code'];

										$today = new DateTime('NOW');
										$date_now = date_format($today, "m/d/Y h:i A");

										$now_timeStamp = strtotime($date_now);
										$due_timeStamp = strtotime($txt_date);

										$query8 = mysql_query("SELECT assignments_submit_id FROM assignments_submit WHERE (assignments_id='$assignments_id' && student_id='$student_id')") or die(mysql_error());
										$count = mysql_num_rows($query8);
										if ($count > 0) {
											?>
											<tr>
												<td><?php echo $code; ?></td>
												<td><?php echo $assignment; ?></td>
												<td><?php echo $fullname; ?></td>
												<td><?php echo $added_date; ?></td>
												<td><?php echo $due_date; ?></td>
												<td>
													<a role="button" class="btn btn-default" disabled>Submitted</a>
												</td>
											</tr>
											<?php
										} else {
											if($now_timeStamp > $due_timeStamp)
											{   
												?>
												<tr>
													<td><?php echo $code; ?></td>
													<td><?php echo $assignment; ?></td>
													<td><?php echo $fullname; ?></td>
													<td><?php echo $added_date; ?></td>
													<td><?php echo $due_date; ?></td>
													<td>
														<a role="button" class="btn btn-default" disabled>Submittion Due</a>
													</td>
												</tr>
												<?php

											}else{
												?>
												<tr>
													<td><?php echo $code; ?></td>
													<td><?php echo $assignment; ?></td>
													<td><?php echo $fullname; ?></td>
													<td><?php echo $added_date; ?></td>
													<td><?php echo $due_date; ?></td>
													<td>
														<a href="#assignment<?php echo $assignments_id; ?>" title="Submit Assignment" role="button" class="btn btn-primary" data-toggle="modal">
															<span class="glyphicon glyphicon-paperclip"></span>&nbsp;Submit Assignment
														</a>
														<?php include('assignment_modal.php'); ?>
													</td>
												</tr>
												<?php
											}
										}
									}
								}
							}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>

		

		<!--Submitted Assignment-->
		<br><br>
		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Submitted Assignment(s)</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Assignment</th>
								<th>Filename</th>
								<th width="50">Format</th>
								<th width="160">Submittion Date</th>
								<th width="160">Due Date</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$query3 = mysql_query("SELECT * FROM assignments_submit WHERE student_id='$student_id'") or die(mysql_error());
							while ($row3 = mysql_fetch_array($query3)) {
								$std_assignments_id = $row3['assignments_id'];
								$ass_filename = $row3['filename'];
								$ass_format = $row3['format'];

								$sub_date = date_create($row3['submitted_date']);
								$submit_date = date_format($sub_date, "d/m/Y h:i A");

								$query4 = mysql_query("SELECT * FROM assignments WHERE assignments_id='$std_assignments_id'") or die(mysql_error());
								while ($row4 = mysql_fetch_array($query4)) {
									$ass_course_id = $row4['course_id'];
									$std_assignment = $row4['assignment'];

									$as_d_date = date_create($row4['due_date']);
									$ass_due_date = date_format($as_d_date, "d/m/Y h:i A");

									$query5 = mysql_query("select code from course where course_id='$ass_course_id'") or die(mysql_error());
									while ($row5 = mysql_fetch_array($query5)) {
										$ass_course = $row5['code'];

										?>
										<tr>
											<td><?php echo $ass_course; ?></td>
											<td><?php echo $std_assignment; ?></td>
											<td><?php echo $ass_filename; ?></td>
											<td><?php echo $ass_format; ?></td>
											<td><?php echo $submit_date; ?></td>
											<td><?php echo $ass_due_date; ?></td>
										</tr>
										<?php
									}
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<?php include('footer-student.php'); ?>
	</div>
</body>