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
									<strong><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Department(s)</strong>
								</div>

								<div class="row">
									<div class="col-md-12">
										<?php include('add_department_modal.php'); ?>

										<a href="#add-department" title="Add New Department" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>&nbsp;ADD NEW DEPARTMENT</a>
										
									</div>
								</div><br>

								<thead>
									<tr style="background-color:#333; color: white">
										<th>S/N</th>
										<th>Department Name</th>
										<th>Department Code</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody style="font-family: tahoma">
									<?php
									$query = mysql_query("select * from department") or die(mysql_error());

									$count = 1;

									while ($row = mysql_fetch_array($query)) {
										$dept_id = $row['dept_id'];
										?>
										<tr>
											<td><?php echo $count++; ?></td>
											<td><?php echo $row['name']; ?></td>
											<td><?php echo $row['code']; ?></td>
											<td>
												<a href="#edit-department<?php echo $dept_id; ?>" title="Edit Department" role="button" class="btn btn-success" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span>&nbsp;Edit</a>
												<a href="#delete-department<?php echo $dept_id; ?>" title="Delete Department" role="button" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a>

												<?php
												include('edit_department_modal.php');
												?>
											</td>

											<!--Department Delete Modal-->
											<div id="delete-department<?php echo $dept_id; ?>" class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" 
												aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="close">
																<span aria-hidden="true">&times;</span>
															</button>
															<h4 class="modal-title text-success" id="myModalLabel">Department Delete Confirmation?</h4>
														</div>

														<!-- Modal Body -->
														<div class="modal-body" style="font-family:tahoma">
															<p>Do you want to delete this department?</p>
															<!-- Modal Footer -->
															<div class="modal-footer">
																<a href="delete_department.php?id=<?php echo $dept_id; ?>" class="btn btn-danger">Delete</a>
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