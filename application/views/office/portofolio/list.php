<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo get_website_title('Portofolio'); ?></title>
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
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Portofolio
					<div class="pull-right">
						<a href="<?php echo base_url('office/portofolio/add'); ?>" class="btn btn-success">Add project</a>
					</div></div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-striped">
								<thead>
									<th>Project name</th>
									<th>Date</th>
									<th>Options</th>
								</thead>
								<tbody>
									<?php
									
										foreach($projects as $project)
										{
											echo '
											<tr>
												<td>' . $project->project_name . '</td>
												<td>' . $project->project_date . '</td>
												<td>
													<a href="' . base_url('office/portofolio/view/' . $project->project_id) . '" class="btn btn-xs btn-warning">View</a>
												</td>
											</tr>';
										}
										
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	
								
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
</body>

</html>
