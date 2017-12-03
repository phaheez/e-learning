<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include('header-lecturer.php');
include('functions/session.php');
ob_start();
?>

<body>
	<?php include('navhead-lecturer.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-12">
				<div class="pull-left">
					<a title="Back to Quiz Page" href="quiz.php" role="button" class="btn btn-success">
						<span class="glyphicon glyphicon-circle-arrow-left"></span>&nbsp;Back to Quiz Page
					</a>
				</div>
			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-book"></span>&nbsp;Quiz Question List</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Title</th>
								<th >Question</th>
								<th>Option 1</th>
								<th>Option 2</th>
								<th>Option 3</th>
								<th>Option 4</th>
								<th>Answer</th> 
								<th width="180">Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$get_id = $_GET['id'];
							$lecturer_id = $_SESSION['lecturer_id'];
							$query = mysql_query("select * from questions where (quiz_id='$get_id' && lecturer_id='$lecturer_id')") or die(mysql_error());
							while ($row = mysql_fetch_array($query)) {
								$question_id = $row['question_id'];
								$quiz_id = $row['quiz_id'];

								$query1 = mysql_query("select course_id,title from quiz where quiz_id='$quiz_id'");
								while ($row1 = mysql_fetch_array($query1)) {
									$course_id = $row1['course_id'];
									$title = $row1['title'];
									
									$query2 = mysql_query("select code from course where course_id='$course_id'");
									while ($row2 = mysql_fetch_array($query2)) {
										$code = $row2['code'];
										

										?>
										<tr>
											<td><?php echo $code; ?></td>
											<td><?php echo $title; ?></td>
											<td><?php echo $row['question']; ?></td>
											<td><?php echo $row['option1']; ?></td>
											<td><?php echo $row['option2']; ?></td>
											<td><?php echo $row['option3']; ?></td>
											<td><?php echo $row['option4']; ?></td>
											<td><?php echo $row['answer']; ?></td>
											<td>
												<a href="#edit-question<?php echo $question_id; ?>" title="Edit Question" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
												<a href="#delete-question<?php echo $question_id; ?>" title="Delete Question" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
												<?php
												include('edit_question_modal.php');
												?>
											</td>

											<!-- Delete Question Modal -->
											<div id="delete-question<?php echo $question_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
											aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<!-- Modal Header -->
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="close">
															<span aria-hidden="true">&times;</span>
														</button>
														<h4 class="modal-title text-success" id="myModalLabel">Question Delete Confirmation?</h4>
													</div>

													<!-- Modal Body -->
													<div class="modal-body" style="font-family:tahoma">
														<p>Do you want to delete this question?</p>
														<!-- Modal Footer -->
														<div class="modal-footer">
															<a href="delete_question.php?id=<?php echo $question_id; ?>" class="btn btn-danger">Delete</a>
															<button type="button" class="btn btn-success" data-dismiss="modal">
																Cancel
															</button>
														</div>
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal-dialog -->
										</div><!-- /.modal -->
										<?php
									}
								}


								//echo $question_id ." ". $quiz_id ." ". $question ."<br>";

								/*$query1 = mysql_query("select question_id from questions where quiz_id='$quiz_id'");
								while ($row1 = mysql_fetch_array($query1)) {
									$question_id = $row1['question_id'];
									echo $question_id."<br>";
								}

								foreach ($quiz_id as $quizID) {
									
									
									$query1 = mysql_query("select question_id from questions where quiz_id='$quizID'");
									while ($row1 = mysql_fetch_array($query1)) {
										$question_id = array($row1['question_id']);
										$qui_id = array($row1['quiz_id']);
										
										foreach ($qui_id as $quiID) {
											$query2 = mysql_query("select question from questions where quiz_id='$quiID'");
											while ($row2 = mysql_fetch_assoc($query2)) {
												$json[] = $row2;

												
											}

											echo json_encode( $json );
										}
									}

									
								}*/

								/*foreach ($quiz_id as $qID) {
									$query1 = mysql_query("select course_id from quiz where quiz_id='$qID'");
									$row1 = mysql_fetch_array($query1);
									$course_id = array($row1['course_id']);

									foreach ($course_id as $cID) {
										$query2 = mysql_query("select code from course where course_id='$cID'");
										$row2 = mysql_fetch_array($query2);
										$code = $row2['code'];
									}

									$query3 = mysql_query("select * from questions where question_id='$qID'");
									$row3 = mysql_fetch_array($query3);
									$question = $row3['question'];

									echo $code ."-". $question ."<br>";
								}*/
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
				</div>
				
			</div>
		</div>

		<?php include('footer-lecturer.php'); ?>
	</div>
</body>