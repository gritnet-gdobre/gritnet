<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo get_website_title('Clients'); ?></title>
		<?php echo office_load_styles(); ?>
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>

<body>
	<?php echo $header; ?>
	<?php echo $navigation; ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		<hr/>
		<div class="row">
			<div class="col-lg-12">
				<form method="POST" action="<?= $_SERVER['REQUEST_URI']; ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						Clients
						<div class="pull-right">
							<a href="<?php echo base_url('office/clients/add'); ?>" class="btn btn-success">
								Add client
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<th><input type="checkbox" value="all"/></th>
								<th>First name</th>
								<th>Last name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Date</th>
								<th colspan="3">Options</th>
							</thead>
							<tbody>
								<?php foreach($clients as $client): ?>
									<tr>
										<td><input type="checkbox" name="client_selected[]" value="<?php echo $client['client_id']; ?>"/></td>
										<td><?php echo $client['client_fname']; ?></td>
										<td><?php echo $client['client_lname']; ?></td>
										<td><?php echo $client['client_email']; ?></td>
										<td><?php echo $client['client_phone']; ?></td>
										<td>
											<?php echo $client['client_date']; ?> 
											<i class="fa fa-info-circle" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="<?php echo $client['client_datetime']; ?> "></i>
										</td>
										<td>
											<a href="" class="btn btn-xs btn-warning">
												<i class="fa fa-eye" aria-hidden="true"></i> 
												View
											</a>
										</td>
										<td>
											<a href="" class="btn btn-xs btn-primary">
												<i class="fa fa-commenting" aria-hidden="true"></i>
												SMS
											</a>
										</td>
										<td>
											<a href="" class="btn btn-xs btn-success">
												<i class="fa fa-phone" aria-hidden="true"></i>
												Call
											</a>
										</td>
										<td>
											<a href="" class="btn btn-xs btn-danger">
												<i class="fa fa-trash" aria-hidden="true"></i> 
												Delete
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					<div class="panel-footer">
						<div class="row">
							<div class="col-sm-6">
								Send text message to <span class="selected_contacts">0</span> selected contacts <input type="submit" class="btn btn-xs btn-default" value="GO"/>
							</div>
							<div class="col-sm-6" align="right">
								<nav aria-label="Page navigation">
								  <ul class="pagination">
									 <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
									<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li>
									  <a href="#" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									  </a>
									</li>
								  </ul>
								</nav>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
</body>
</html>