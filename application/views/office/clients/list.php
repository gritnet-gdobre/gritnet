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
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.9/css/highcharts.css"/>
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
		<br/>
		<div class="row">
			<div class="col-sm-3">
				<div id="container" style="height: 300px"></div>
			</div>
			<div class="col-sm-3">
				<div id="container2" style="height: 300px;"></div>
			</div>
			<div class="col-sm-6">
				<div id="stats_funnel" style="height: 300px;"></div>
			</div>
		</div>
		<br/>
		<div class="row">
			<div class="col-lg-12">
				<form method="POST" action="<?= $_SERVER['REQUEST_URI']; ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-users" aria-hidden="true"></i> 
						Clients
						<div class="pull-right">
							<a href="<?php echo base_url('office/clients/add'); ?>" class="btn btn-success">
								Add client
							</a>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
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
												<a href="<?php echo base_url('office/clients/view/' . $client['client_id']); ?>" class="btn btn-xs btn-warning">
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
	<script type="text/javascript">
	$(function () {
    $('#container').highcharts({
         chart: {
        type: 'column'
    },
    title: {
        text: 'Clients'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Clients'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'New customers',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'Existing customers',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }],credits: {
      enabled: false
  }
    }); 
	
	$('div#stats_funnel').highcharts({
		chart: {
        type: 'funnel',
        marginRight: 100
    },
    title: {
        text: 'Sales funnel',
        x: -50
    },
    plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b> ({point.y:,.0f})',
                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                softConnector: true
            },
            neckWidth: '30%',
            neckHeight: '25%'

            //-- Other available options
            // height: pixels or percent
            // width: pixels or percent
        }
    },
    legend: {
        enabled: false
    },
    series: [{
        name: 'Unique users',
        data: [
            ['Calls/Emails', 5654],
            ['Requested price', 4064],
            ['Invoice sent', 1987],
            ['Finalized', 846]
        ]
    }],
		credits: {
      enabled: false
  }
	});
	
	$('#container2').highcharts({
     chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Contracted services'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Vehicle wrapping',
                y: 56.33
            }, {
                name: 'Branding',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Window tinting',
                y: 10.38
            }, {
                name: 'PPF',
                y: 4.77
            }, {
                name: 'Powder coating',
                y: 0.91
            }, {
                name: 'Hydrographics',
                y: 0.2
            }]
        }],
		credits: {
      enabled: false
  }
    });
});
</script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.9/highcharts.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/5.0.9/js/modules/funnel.js"></script>
</body>
</html>