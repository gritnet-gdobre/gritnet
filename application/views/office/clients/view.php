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
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $client['client_fname'] . ' ' . $client['client_lname']; ?>
					</div>
						<table class="table">
							<tr>
								<td>First name</td>
								<td><?php echo $client['client_fname']; ?></td>
							</tr>
							<tr>
								<td>Last name</td>
								<td><?php echo $client['client_lname']; ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $client['client_email']; ?></td>
							</tr>
							<tr>
								<td>Phone</td>
								<td><?php echo $client['client_phone']; ?></td>
							</tr>
						</table>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Notes
					</div>
					<div class="panel-body">
						<textarea class="form-control" rows="5"></textarea>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<i class="fa fa-paper-plane" aria-hidden="true"></i> Quotes
						<div class="pull-right">
							<a href="#" class="btn btn-warning btn-xs">
								<i class="fa fa-plus-square" aria-hidden="true"></i>
								Add quote
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<table class="table table-striped">
						<thead>
							<th>&nbsp;</th>
							<th>Product/Service</th>
							<th>Vehicle</th>
							<th>Price</th>
							<th>Status</th>
							<th>Date</th>
						</thead>
					</table>
					<div class="panel-body">
						<fieldset style="text-align: center;">
							No quotes added <button class="btn btn-xs btn-warning">Add quote</button>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<i class="fa fa-car" aria-hidden="true"></i> Vehicles
						<div class="pull-right">
							<a href="#" class="btn btn-info btn-xs" data-toggle="modal" data-target=".vehicle_add">
								<i class="fa fa-plus-square" aria-hidden="true"></i>
								Add vehicle
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<table id="vehicles" class="table table-striped">
						<thead>
							<th><input type="checkbox"></th>
							<th>Make</th>
							<th>Model</th>
							<th>Engine</th>
							<th>Body</th>
							<th>Year</th>
							<th>Registration</th>
							<th colspan="3">Options</th>
						</thead>
						<tbody>
							<?php
							
								foreach($vehicles as $vehicle)
								{
									echo '
									<tr>
										<td>
											<input type="checkbox" name="vehicles[]" value="' . $vehicle['vehicle_id'] . '"/>
										</td>
										<td>' . $vehicle['vehicle_make'] . '</td>
										<td>' . $vehicle['vehicle_model'] . '</td>
										<td>' . $vehicle['vehicle_engine'] . '</td>
										<td>' . $vehicle['vehicle_body'] . '</td>
										<td>' . $vehicle['vehicle_year'] . '</td>
										<td>' . $vehicle['vehicle_registration'] . '</td>
										<td><a href="#" class="btn btn-xs btn-warning"><i class="fa fa-pencil-square-o"></i> Edit</a></td>
										<td><a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Delete</a></td>
									</tr>';
								}
								
							?>
						</tbody>
					</table>
					<?php
					
						if(count($vehicles)===0)
						{
							echo '
							<div class="panel-body">
								<fieldset style="text-align: center;">
									No vehicles added <button class="btn btn-xs btn-info">Add vehicle</button>
								</fieldset>
							</div>';
						}
						
					?>
				</div>
			</div>
			<!-- Vehicles add modal -->
			<div class="modal fade vehicle_add" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				<div class="modal-dialog modal-sm" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="exampleModalLabel">
								<i class="fa fa-car" aria-hidden="true"></i> 
								Add vehicle
							</h4>
						</div>
						<form id="vehicle_add">
							<div class="modal-body">
								<div id="vehicle_add_console"></div>
								<div class="form-group">
									<input type="text" class="form-control" name="vehicle_make" id="vehicle_make" placeholder="Make">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="vehicle_model" id="vehicle_model" placeholder="Model">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="vehicle_engine" id="vehicle_engine" placeholder="Engine">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="vehicle_body" id="vehicle_body" placeholder="Body">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="vehicle_year" id="vehicle_year" placeholder="Year">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="vehicle_registration" id="vehicle_registration" placeholder="Registration">
								</div>
							</div>
							<div class="modal-footer">
								<input type="reset" class="btn btn-default" value="Reset"/>
								<input type="submit" class="btn btn-primary" value="Add vehicle"/>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Vehicles add modal -->
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-success">
					<div class="panel-heading">
						<i class="fa fa-clock-o" aria-hidden="true"></i> History
					</div>
					<div class="panel-body">
    <ul class="timeline">
        <li>
          <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Invoiced</h4>
              <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">Quoted for Volkswagen Golf</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
            </div>
          </div>
        </li>
        <li>
          <div class="timeline-badge info"><i class="glyphicon glyphicon-floppy-disk"></i></div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4 class="timeline-title">First contact</h4>
            </div>
            <div class="timeline-body">
              <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.</p>
              <hr>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="glyphicon glyphicon-cog"></i> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
    </ul>
					</div>
				</div>
			</div>
		</div>
	</div>	<!--/.main-->
	<?php echo office_load_scripts(); ?>
	<?php echo form_js('vehicle_add', 'vehicle_add_console', 'office/clients/add_vehicle/' . $client['client_id'], false, 'vehicles'); ?>
</body>
</html>