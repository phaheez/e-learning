<?php
include('header-student.php');
include('functions/session.php');

date_default_timezone_set("Africa/Lagos");

$student_dept = $_SESSION['student_dept_id'];
$student_id = $_SESSION['student_id'];
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		<!--My Quiz-->
		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-pencil"></span>&nbsp;Quiz(s)</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Quiz Title</th>
								<th width="230">Lecturer</th>
								<th width="120">Total Question</th>
								<th width="50">Minute</th>
								<th width="160">Start Date</th>
								<th width="160">End Date</th> 
								<th width="120">Action</th>
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

								$query1 = mysql_query("SELECT * FROM quiz WHERE lecturer_id='$lecturer_id'") or die(mysql_error());
								while ($row1 = mysql_fetch_array($query1)) {
									$quiz_id = $row1['quiz_id'];
									$course_id = $row1['course_id'];
									$title = $row1['title'];
									$totalQuestion = $row1['noOfQuestion'];
									$minute = $row1['minute'];

									$qStartDate = date_create($row1['quiz_date']);
									$quiz_start_date = date_format($qStartDate, "m/d/Y h:i A");

									$cur_time = date_format($qStartDate, 'm/d/Y h:i A');
									$duration = '+'. $minute .' minutes';
									$quiz_end_date = date('m/d/Y h:i A', strtotime($duration, strtotime($cur_time)));
									
									$tdate = date_create($row1['quiz_date']);
									$txt_date = date_format($tdate, "m/d/Y h:i A");

									$query2 = mysql_query("SELECT code FROM course WHERE course_id='$course_id'") or die(mysql_error());
									while ($row2 = mysql_fetch_array($query2)) {
										$code = $row2['code'];

										$today = new DateTime('NOW');
										$date_now = date_format($today, "m/d/Y h:i A");

										$now_timeStamp = strtotime($date_now);
										$start_timeStamp = strtotime($txt_date);

										$query3 = mysql_query("SELECT result_id,score FROM result WHERE (quiz_id='$quiz_id' && student_id='$student_id')") or die(mysql_error());
										$count = mysql_num_rows($query3);
										while ($res = mysql_fetch_array($query3)) {
											$score = $res['score'];
										}
										if ($count > 0 && $score !== null) {
											?>
											<tr>
												<td><?php echo $code; ?></td>
												<td><?php echo $title; ?></td>
												<td><?php echo $fullname; ?></td>
												<td><?php echo $totalQuestion; ?></td>
												<td><?php echo $minute; ?></td>
												<td><?php echo $quiz_start_date; ?></td>
												<td><?php echo $quiz_end_date; ?></td>
												<td>
													<a role="button" class="btn btn-default" disabled>Already Taken</a>
												</td>
											</tr>
											<?php
										} else {
											if ($now_timeStamp > $start_timeStamp) {
												?>
												<tr>
													<td><?php echo $code; ?></td>
													<td><?php echo $title; ?></td>
													<td><?php echo $fullname; ?></td>
													<td><?php echo $totalQuestion; ?></td>
													<td><?php echo $minute; ?></td>
													<td><?php echo $quiz_start_date; ?></td>
													<td><?php echo $quiz_end_date; ?></td>
													<td>
														<a role="button" class="btn btn-default" disabled>Quiz Time Due</a>
													</td>
												</tr>
												<?php
											} else {
												?>
												<tr>
													<td><?php echo $code; ?></td>
													<td><?php echo $title; ?></td>
													<td><?php echo $fullname; ?></td>
													<td><?php echo $totalQuestion; ?></td>
													<td><?php echo $minute; ?></td>
													<td><?php echo $quiz_start_date; ?></td>
													<td><?php echo $quiz_end_date; ?></td>
													<td>
														<a href="quizexam.php?quiz_id=<?php echo $quiz_id; ?>" title="Start Quiz" role="button" class="btn btn-primary">
															<span class="glyphicon glyphicon-time"></span>&nbsp;Start Quiz
														</a>
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

		<!--My Quiz Result-->
		<br>
		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-ok"></span>&nbsp;Quiz Result(s)</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Quiz Title</th>
								<th width="230">Lecturer</th>
								<th width="150">Score</th>
								<th width="100">Percentage</th>
								<th width="130">Grade</th>
								<th width="160">Taken Date</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$query21 = mysql_query("SELECT * FROM result WHERE (student_id='$student_id' AND status='Completed')") or die(mysql_error());
							while ($row21 = mysql_fetch_array($query21)) {
								$quiz_id21 = $row21['quiz_id'];
								$score21 = $row21['score'];
								$percentage21 = $row21['percentage'];
								$grade21 = $row21['grade'];
								$result_date21 = date_create($row21['result_date']);
								$computeDate = date_format($result_date21, "m/d/Y h:i A");

								$query22 = mysql_query("SELECT * FROM quiz WHERE quiz_id='$quiz_id21'") or die(mysql_error());
								while ($row22 = mysql_fetch_array($query22)) {
									$course_id22 = $row22['course_id'];
									$lecturer_id22 = $row22['lecturer_id'];
									$title22 = $row22['title'];
									$noOfQuestion22 = $row22['noOfQuestion'];

									$query23 = mysql_query("SELECT * FROM lecturer WHERE lecturer_id='$lecturer_id22'") or die(mysql_error());
									while ($row23 = mysql_fetch_array($query23)) {
										$title23 = $row23['title'];
										$name23 = $row23['fullname'];
										$fullname23 = $title23 ." ". $name23;

										$query24 = mysql_query("SELECT code FROM course WHERE course_id='$course_id22'") or die(mysql_error());
										while ($row24 = mysql_fetch_array($query24)) {
											$code24 = $row24['code'];

											$totalScore = "Score ". $score21 ." out of ". $noOfQuestion22;
											?>
											<tr>
												<td><?php echo $code24; ?></td>
												<td><?php echo $title22; ?></td>
												<td><?php echo $fullname23; ?></td>
												<td><?php echo $totalScore; ?></td>
												<td><?php echo $percentage21; ?></td>
												<td><?php echo $grade21; ?></td>
												<td><?php echo $computeDate; ?></td>
											</tr>
											<?php
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


		<?php include('footer-student.php'); ?>
	</div>
</body>