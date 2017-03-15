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
				<?php echo breadcrumbs(); ?>
			</ol>
		</div><!--/.row-->
		<hr/>
		<div class="row">
			<div class="col-lg-12">
				<div id="client_add_console"></div>
				<form id="client_add">
				<div class="panel panel-default">
					<div class="panel-heading">
						Add client
						<div class="pull-right">
							<a href="<?php echo base_url('office/clients'); ?>" class="btn btn-success">
								<i class="fa fa-chevron-left"></i> Clients
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="client_fname">First name</label>
								<input type="text" class="form-control" name="client_fname" id="client_fname" placeholder="First name">
							</div>
							<div class="form-group">
								<label for="client_lname">Last name</label>
								<input type="text" class="form-control" name="client_lname" id="client_lname" placeholder="Last name">
							</div>
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label for="client_email">Email address</label>
								<input type="email" class="form-control" name="client_email" id="client_email" placeholder="Email address">
							</div>
							<div class="form-group">
								<label for="client_phone">Phone number</label>
								<input type="tel" class="form-control" name="client_phone" id="client_phone" placeholder="Phone number">
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<input type="submit" name="client_add" id="client_add" value="Add client" class="btn btn-primary"/>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
	<?php echo form_js('client_add', 'client_add_console', 'office/clients/add_client', false); ?>
</body>
</html>