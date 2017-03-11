<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo get_website_title('Portofolio'); ?></title>
		<?php echo office_load_styles(); ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('vendor/jcrop/css/jquery.Jcrop.min.css'); ?>"/>
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">

/* Apply these styles only when #preview-pane has
   been placed within the Jcrop widget */
.jcrop-holder #preview-pane {
  display: block;
  position: absolute;
  z-index: 2000;
  top: 10px;
  right: -280px;
  padding: 6px;
  border: 1px rgba(0,0,0,.4) solid;
  background-color: white;

  -webkit-border-radius: 6px;
  -moz-border-radius: 6px;
  border-radius: 6px;

  -webkit-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 1px 1px 5px 2px rgba(0, 0, 0, 0.2);
}

/* The Javascript code will set the aspect ratio of the crop
   area based on the size of the thumbnail preview,
   specified here */
#preview-pane .preview-container {
  width: 250px;
  height: 170px;
  overflow: hidden;
}

</style>
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
		
		<div class="row" style="margin-top: 25px;">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $project->project_name; ?>
					<div class="pull-right">
						<a href="<?php echo base_url('office/portofolio'); ?>" class="btn btn-primary">Back to projects</a>
					</div></div>
					<div class="panel-body">
						<div id="add_project_pictures_console"></div>
						<form id="add_project_pictures">
							<input type="hidden" name="project_id" id="project_id" value="<?php echo $project->project_id; ?>"/>
							<div class="form-group" style="border: 1px solid #ddd; background: #f7f7f7; border-radius: 4px; padding: 15px;">
								<label for="">Upload new pictures</label>
								<div style="width: 100%;">
								<span class="btn btn-success fileinput-button" style="width:100%; border-radius: 0px;">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Select files</span>
									<!-- The file input field used as target for the file upload widget -->
									<input id="fileupload" type="file" name="files[]" multiple>
								</span>
								<br>
								<br>
								<!-- The global progress bar -->
								<div id="progress" class="progress">
									<div class="progress-bar progress-bar-success"></div>
								</div>
								<!-- The container for the uploaded files -->
								<div id="files" class="files"></div>
								</div>
								<div class="row" id="thumbnails"></div>
							<div>
								<input type="submit" class="btn btn-success" value="Save"/>
							</div>
							</div>
						</form>
						<h4>Pictures</h4>
						<hr/>
						<div class="row">	
						<?php
						
							foreach($project_pictures as $project_picture)
							{
								echo '<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/server/php/files/thumbnail/' . $project_picture->ppicture_thumb_url . '" alt="...">
      <div class="caption">
		<h3>' . $project->project_name . '</h3>
        <p>
			<a href="#" class="btn btn-primary" role="button">Set as cover</a> 
			<a href="#" data-image="https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/server/php/files/thumbnail/' . $project_picture->ppicture_thumb_url . '" id="imgcrop" class="btn btn-primary" role="button" data-toggle="modal" data-target="#thumbnail_crop"><i class="fa fa-crop"></i></a>
			<a href="#" class="btn btn-danger" role="button"><i class="fa fa-trash"></i></a></p>
      </div>
    </div>
  </div>';
							}
							
						?>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
		
	
								
	</div>
	
	<div class="modal fade" id="thumbnail_crop" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crop image</h4>
      </div>
      <div class="modal-body">
        <div class="row">
			<div class="col-sm-6">
				<div class="img2crop"></div>
			</div>
			<div class="col-sm-6">
				<div id="preview-pane">
					<div class="preview-container">
					</div>
				  </div>
			</div>
			<div class="clearfix"></div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<script src="<?php echo base_url(); ?>public/js/jquery-1.11.1.min.js"></script>
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function()
	{
		$('form#add_project_pictures').submit(function(event)
		{
			event.preventDefault();
			$.ajax(
			{
				type: "POST",
				url: "<?php echo site_url('portofolio/add_project_pictures'); ?>",
				data: $(this).serialize(),
				dataType: "html",
				success: function(data)
				{
					if(data=='1')
					{
						location.reload();
					}
					else
					{
						$('#add_project_pictures_console').html(data);
					}
				}
			});
		});
	});
	</script>
	<script type="text/javascript" src="https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/js/vendor/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/js/jquery.fileupload.js"></script>
	<script type="text/javascript">
			$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = 'https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/server/php/';
			$('#fileupload').fileupload({
				url: url,
				dataType: 'json',
				maxFileSize: 10000000,
				maxChunkSize: 10000000,
				done: function (e, data) {
					$.each(data.result.files, function (index, file) {
						// $('<p/>').text(file.name).appendTo('#files');
						$('#files').append('<input type="hidden" name="callback_files[]" value="' + file.name + '"/>');
						$('#thumbnails').append('<div class="col-sm-2"><img src="https://wrapart.uk/Public/vendors/jquery-file-upload/9_14_2/server/php/files/thumbnail/' + file.name + '" class="img-thumbnail img-responsive" style="margin-bottom: 15px;"/></div>');
					});
					
				},
				progressall: function (e, data) {
					var progress = parseInt(data.loaded / data.total * 100, 10);
					$('#progress .progress-bar').css(
						'width',
						progress + '%'
					);
				}
			}).prop('disabled', !$.support.fileInput)
				.parent().addClass($.support.fileInput ? undefined : 'disabled');
		});
	</script>
	<script type="text/javascript" src="<?php echo base_url('vendor/jcrop/js/jquery.Jcrop.min.js'); ?>"></script>
	<script type="text/javascript">
		$('a#imgcrop').click(function(event)
		{
			event.preventDefault();
			var url = $(this).attr('data-image');
			$('.img2crop').html('<img src="' + url + '" id="target"/>');
			$('.preview-container').html('<img src="' + url + '" class="jcrop-preview" alt="Preview"/>');
			 $('#target').Jcrop();
			 // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    
    console.log('init',[xsize,ysize]);
    $('#target').Jcrop({
      onChange: updatePreview,
      onSelect: updatePreview,
      aspectRatio: xsize / ysize
    },function(){
      // Use the API to get the real image size
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;

      // Move the preview into the jcrop container for css positioning
      $preview.appendTo(jcrop_api.ui.holder);
    });

    function updatePreview(c)
    {
      if (parseInt(c.w) > 0)
      {
        var rx = xsize / c.w;
        var ry = ysize / c.h;

        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
      }
    };
		});
	</script>
</body>

</html>
