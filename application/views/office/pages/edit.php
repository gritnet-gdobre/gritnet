<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo get_website_title($page['page_title'] . ' - Update page - Pages'); ?></title>
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
				<h1 class="page-header"><?php echo $page['page_title']; ?></h1>
			</div>
		</div><!--/.row-->
		<form id="pages_add">
		<input type="hidden" name="page_id" id="page_id" value="<?php echo $page['page_id']; ?>"/>
		<div class="row">
			<div class="col-sm-9">
				<div id="pages_add_console"></div>
				<div class="form-group">
					<input type="text" name="page_title" id="page_title" placeholder="Enter title here" class="form-control" value="<?php echo $page['page_title']; ?>"/>
				</div>
				<textarea name="page_content" id="page_content"><?php echo $page['page_content']; ?></textarea>
			</div>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-heading">Publishing</div>
					<div class="panel-body">
						Published on
						<?php echo $page['page_created']; ?>
						<br/>
						Modified on <?php echo $page['page_modified']; ?>
					</div>
					<div class="panel-footer">
						<input type="submit" class="btn btn-primary" value="Publish"/>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Page attributes</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="page_parent">Parent</label>
							<select name="page_parent" id="page_parent" class="form-control">
								<?php echo default_option($pages, 'page_parent', 'page_id', 'page_title', $page['page_parent']); ?>
							</select>
						</div>
						<div class="form-group">
							<label for="page_parent">Template</label>
							<select name="page_template" id="page_template" class="form-control">
								<option value="" disabled="disabled" selected="selected">(default)</option>
							</select>
						</div>
						<div class="form-group">
							<label for="page_order">Order</label>
							<input type="number" name="page_order" id="page_order" value="0" class="form-control"/>
						</div>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div><!--/.row-->
		</form>
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
	<?php echo form_js('pages_add', 'pages_add_console', 'office/pages/edit_page', true); ?>
	<script type="text/javascript" src="<?php echo base_url('vendor/tinymce/tinymce/tinymce.min.js'); ?>"></script>
	<script type="text/javascript">
	tinymce.init(
	{
		selector: 'textarea#page_content',
		height: 500,
		menubar: false,
		plugins: 
		[
			'advlist autolink lists link image charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],
		toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
		content_css: '//www.tinymce.com/css/codepen.min.css'
	});
	</script>
</body>
</html>
