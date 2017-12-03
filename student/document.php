<?php 
include('header-student.php');
include('functions/session.php');
?>

<body>
	<?php include('navhead-student.php'); ?>

	<div class="container body-content">
		<div class="row">
			<div class="col-md-12">
				<div id="responsive" class="table-responsive">
					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
						<div class="alert alert-info">
							<strong><span class="glyphicon glyphicon-file"></span>&nbsp;Course Material Document(s)</strong>
						</div>

						<thead>
							<tr style="background-color:#333; color: white">
								<th width="80">Course</th>
								<th>Subject</th>
								<th width="250">Lecturer</th>
								<th>Filename</th> 
								<th width="50">Format</th>
								<th width="70">Size</th>              
								<th class="text-center" width="100">Action</th>
							</tr>
						</thead>

						<tbody style="font-family: tahoma">
							<?php 
							$student_dept = $_SESSION['student_dept_id'];
							$query = mysql_query("SELECT * FROM lecturer WHERE dept_id='$student_dept'") or die(mysql_error());
							while ($row = mysql_fetch_array($query)) {
								$lecturer_id = $row['lecturer_id'];
								$title = $row['title'];
								$name = $row['fullname'];
								$fullname = $title ." ". $name;

								$query1 = mysql_query("SELECT * FROM document WHERE lecturer_id='$lecturer_id'") or die(mysql_error());
								while ($row1 = mysql_fetch_array($query1)) {
									$document_id = $row1['document_id'];
									$subject_id = $row1['subject_id'];
									$document_name = $row1['filename'];
									$format = $row1['format'];
									$size = $row1['size'];
									
									$query2 = mysql_query("SELECT course_id,description FROM subject WHERE subject_id='$subject_id'") or die(mysql_error());
									while ($row2 = mysql_fetch_array($query2)) {
										$course_id = $row2['course_id'];
										$subject = $row2['description'];
										
										$query3 = mysql_query("SELECT code FROM course WHERE course_id='$course_id'") or die(mysql_error());
										while ($row3 = mysql_fetch_array($query3)) {
											$code = $row3['code'];
											
											?>
											<tr>
												<td><?php echo $code; ?></td>
												<td><?php echo $subject; ?></td>
												<td><?php echo $fullname; ?></td>
												<td><?php echo $document_name; ?></td>
												<td><?php echo $format; ?></td>
												<td><?php echo $size; ?></td>
												<td>
													<a title="Download Material" href="<?php echo "../lecturer/documents/$document_name"; ?>" target="_blank" role="button" class="btn btn-primary">
														<span class="glyphicon glyphicon-download"></span>&nbsp;Download File
													</a>
												</td>
											</tr>
											<?php
										}
									}
								}
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

		<?php include('footer-student.php'); ?>
	</div>
</body>