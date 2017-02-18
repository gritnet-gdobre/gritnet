<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Lumino - Dashboard</title>
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
					<div class="panel-heading">
						Pages
						<div class="pull-right">
							<a href="<?php echo base_url('office/pages/add'); ?>" class="btn btn-success">
								Add page
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<table class="table table-striped">
							<thead>
								<th>Title</th>
								<th>Category</th>
								<th>Author</th>
								<th>Comments</th>
								<th>Date</th>
								<th>Options</th>
							</thead>
							<tbody>
								<?php foreach($pages as $page): ?>
									<tr>
										<td><?php echo $page['page_title']; ?></td>
										<td><?php echo $page['page_parent_title']; ?></td>
										<td></td>
										<td></td>
										<td></td>
										<td><a href="<?php echo base_url('office/pages/view/' . $page['page_slug']); ?>" class="btn btn-warning">View</a></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
</body>
</html>
