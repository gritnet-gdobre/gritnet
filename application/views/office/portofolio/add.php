<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lumino - Dashboard</title>

<link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>public/css/bootstrap-table.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url(); ?>public/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>public/js/html5shiv.js"></script>
<script src="<?php echo base_url(); ?>public/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<?php echo $header; ?>
	<?php echo $sidebar; ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" style="margin-top: 25px;">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Add project
					<div class="pull-right">
						<a href="<?php echo base_url(); ?>portofolio" class="btn btn-primary">Back to projects</a>
					</div></div>
					<div class="panel-body">
						<div id="project_add_console"></div>
						<form id="project_add">
							<div class="form-group">
								<label for="project_parent">Project parent</label>
								<select name="project_parent" class="form-control">
									<option value="" selected="selected" disabled="disabled">Please select</option>
									<option value="0" style="color: #E30009">New main category</option>
									<?php
									
										foreach($categories as $category)
										{
											if($category->gallery_parent==0)
											{
												echo '<option value="' . $category->gallery_id . '">' . $category->gallery_title . '</option>';
											}
										}
										
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="project_name">Title</label>
								<input type="text" class="form-control" name="project_name" id="project_name" value=""/>
							</div>
							<div>
								<input type="submit" value="Add project" class="btn btn-success"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	
								
	</div>	<!--/.main-->

	<script src="<?php echo base_url(); ?>public/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap-table.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('form#project_add').submit(function(event)
		{
			event.preventDefault();
			$.ajax(
			{
				type: "POST",
				url: "<?php echo site_url('portofolio/add_project'); ?>",
				data: $(this).serialize(),
				dataType: "html",
				success: function(data)
				{
					if(data=='1')
					{
						window.location.replace('/portofolio'); 
					}else{
					$('#project_add_console').html(data);
					}
					console.log(data);
				}
			});
		});
	});
	</script>
</body>

</html>
