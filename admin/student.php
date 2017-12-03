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
						<div id="responsive" class="table-responsive">
							<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example">
								<div class="alert alert-info">
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Student(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<a href="#add-student" title="Add New Student" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW STUDENT</a>
										<?php include('add_student_modal.php'); ?>
									</div>
								</div><br>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>StudentID</th>
										<th>Fullname</th>
										<th>Dept</th>
										<th>Email</th>
										<th>Password</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php 
									$query = mysql_query("select * from student") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										$student_id = $row['student_id'];
										$deptID = $row['dept_id'];
										?>
										<tr>
											<td><?php echo $student_id; ?></td>
											<td><?php echo $row['fullname']; ?></td>
											<td>
												<?php 
												$query1 = mysql_query("select * from department where dept_id='$deptID'");
												$row1 = mysql_fetch_array($query1);
												echo $row1['code'];
												?>
											</td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['password']; ?></td>
											<td>
												<a href="#edit-student<?php echo $student_id; ?>" title="Edit Student" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
												<a href="#delete-student<?php echo $student_id; ?>" title="Delete Student" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
												<?php
												include('edit_student_modal.php');
												//include('delete_student_modal.php');
												?>
											</td>
											<!-- Student Delete Modal -->
											<div id="delete-student<?php echo $student_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Student Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this student?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_student.php?id=<?php echo $student_id; ?>" class="btn btn-danger">Delete</a>
																<button type="button" class="btn btn-success" data-dismiss="modal">
																	Cancel
																</button>
															</div>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
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
						</div>

					</div>
				</div>
			</div>
		</div>


		<?php include('footer-admin.php'); ?>
	</div>
</body>