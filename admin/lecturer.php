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
									<strong><span class="glyphicon glyphicon-user"></span>&nbsp;Lecturer(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<a href="#add-lecturer" title="Add New Lecturer" role="button" class="btn btn-success" data-toggle="modal">
											<span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW LECTURER
										</a>
										<?php include('add_lecturer_modal.php'); ?>
									</div>
								</div><br>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>LecturerID</th>
										<th>Fullname</th>
										<th>Dept</th>
										<th>Email</th>
										<th>Password</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("select * from lecturer") or die(mysql_error());

									while ($row = mysql_fetch_array($query)) {
										$lecturer_id = $row['lecturer_id'];
										$deptID = $row['dept_id'];
										$name = $row['title'] ." ". $row['fullname'];
										?>
										<tr>
											<td><?php echo $lecturer_id; ?></td>
											<td><?php echo $name; ?></td>
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
												<a href="#edit-lecturer<?php echo $lecturer_id; ?>" title="Edit Lecturer" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
												<a href="#delete-lecturer<?php echo $lecturer_id; ?>" title="Delete Lecturer" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>
												<?php
												include('edit_lecturer_modal.php');
												//include('delete_lecturer_modal.php');
												?>
											</td>
											<!--Lecturer Delete Modal-->
											<div id="delete-lecturer<?php echo $lecturer_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Lecturer Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this lecturer?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_lecturer.php?id=<?php echo $lecturer_id; ?>" class="btn btn-danger">Delete</a>
																<button type="button" class="btn btn-success" data-dismiss="modal">
																	Cancel
																</button>
															</div>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											<!--End Delete Modal-->
											
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