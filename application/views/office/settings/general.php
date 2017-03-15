<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo get_website_title('Pages'); ?></title>
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
						General
						<div class="pull-right">
							<a href="<?php echo base_url('office/pages/add'); ?>" class="btn btn-success">
								Add page
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Website title</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
							</div>
						</form>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="Save settings"/>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
</body>
</html>
