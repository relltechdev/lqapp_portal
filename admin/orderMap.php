 <?php include('common/header.php'); ?>
 

 </style>
 <?php include('functions/getOrderStatistics.php');?>
 
 
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="far fa-thumbs-up"></i></div>
                  <div class="count"> <?php echo $week_sorder_count;  ?></div>
                  <h3>Success Orders</h3>
                  <p>Last 7 days.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="far fa-thumbs-down"></i></div>
                  <div class="count"><?php echo $week_forder_count;  ?></div>
                  <h3>Failed Orders</h3>
                  <p>Last 7 days.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="far fa-thumbs-up"></i></div>
                  <div class="count"><?php echo $month_sorder_count;  ?></div>
                  <h3>Success Orders</h3>
                  <p>This Month</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="far fa-thumbs-down"></i></div>
                  <div class="count"><?php echo $month_forder_count;  ?></div>
                  <h3>Failed Orders</h3>
                  <p>This Month</p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaction Summary <small>Weekly progress</small></h2>
                    <div class="filter">
                     <div id="daterange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>January 01, 2018 - December 31, 2019</span> <b class="caret"></b>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
					   <div class="chart-container">
                       <canvas id="salesChart" width="400" height="auto"></canvas>
                    </div>
					  
                      <div class="tiles">
                        <div class="col-md-4 tile">
                          <span>Expected Revenue</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                               <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Loss</span>
                          <h2>$231,809</h2>
                          <span class="sparkline22 graph" style="height: 160px;">
                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                        <div class="col-md-4 tile">
                          <span>Total Revenue</span>
                          <h2>231,809</h2>
                          <span class="sparkline11 graph" style="height: 160px;">
                                 <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                          </span>
                        </div>
                      </div>

                    </div>

                    

                  </div>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Weekly Summary <small>Activity shares</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                      <div class="col-md-7" style="overflow:hidden;">
                        <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                
								 </span>
                        <h4 style="margin:18px">Weekly sales progress</h4>
                      </div>

                      <div class="col-md-5">
                        <div class="row" style="text-align: center;">
                          <div class="col-md-4">
                            <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Expected Revenue</h4>
                          </div>
                          <div class="col-md-4">
                            <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Total Loss</h4>
                          </div>
                          <div class="col-md-4">
                            <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                            <h4 style="margin:0">Total Revenue</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



           
          </div>
        </div>
       
        <!-- /page content -->
		<?php include('common/script.php'); ?>
		
		<script>
		
		$(document).ready(function(){
			
		daterangepicker_init();	
		
		
		});
		
		
		// DATE PICKER
		
		
function daterangepicker_init() {

   var sdate,edate;
   
   
			if( typeof ($.fn.daterangepicker) === 'undefined'){ return; }
			console.log('daterangepicker_init');
		
			var cb = function(start, end, label) {
			//  console.log(start.toISOString(), end.toISOString(), label);
			  $('#daterange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			};

			var optionSet1 = {
			  startDate: moment().subtract(29, 'days'),
			  endDate: moment(),
			  minDate: '01/01/2012',
			  maxDate: '12/31/2030',
			  dateLimit: {
				days: 60
			  },
			  showDropdowns: true,
			  showWeekNumbers: true,
			  timePicker: false,
			  timePickerIncrement: 1,
			  timePicker12Hour: true,
			  ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			  },
			  opens: 'left',
			  buttonClasses: ['btn btn-default'],
			  applyClass: 'btn-small btn-primary',
			  cancelClass: 'btn-small',
			  format: 'YYYY-MM-DD',
			  separator: ' to ',
			  locale: {
				applyLabel: 'Submit',
				cancelLabel: 'Clear & Load All',
				fromLabel: 'From',
				toLabel: 'To',
				customRangeLabel: 'Custom',
				daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
				monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
				firstDay: 1
			  }
			};
			
			$('#daterange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
			$('#daterange').daterangepicker(optionSet1, cb);
			$('#daterange').on('show.daterangepicker', function() {
			  
			});
			$('#daterange').on('hide.daterangepicker', function() {
			 
			});
			
			$('#daterange').on('apply.daterangepicker', function(ev, picker) {
			  console.log("apply event fired, start/end dates are " + picker.startDate.format('YYYY-MM-DD') + " to " + picker.endDate.format('YYYY-MM-DD'));
			sdate=picker.startDate.format('YYYY-MM-DD');
			edate=picker.endDate.format('YYYY-MM-DD');
			$('#sdate').val(sdate);
			$('#edate').val(edate);
			url= '?edate='+edate+'&sdate='+sdate; 
			window.location.href=url;
			});
			$('#daterange').on('cancel.daterangepicker', function(ev, picker) {
			  window.location.href='manageOrders.php';
			  console.log("all");
			});
			$('#options1').click(function() {
			  $('#daterange').data('daterangepicker').setOptions(optionSet1, cb);
			});
			$('#options2').click(function() {
			  $('#daterange').data('daterangepicker').setOptions(optionSet2, cb);
			});
			$('#destroy').click(function() {
			  $('#daterange').data('daterangepicker').remove();
			  
			});
   
		}
		
		
		// Chart
		
		
var ctx = document.getElementById("salesChart");
  ctx.height = 180;
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
				labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [{
					label: 'Orders handled',
					backgroundColor: "#98dd1e",
					borderColor: "green",
					data: [2,6,7,8,2,5,6],
					
					fill: false,
				}, {
					label: 'Orders failed',
					fill: false,
					backgroundColor: "#f9d4d4",
					borderColor: "red",
				data: [ 3,9,4,6,1,3,1 ],
					
				}]
			},
    options: {
				responsive: true,
				
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				}
			},
				title: {
					display: true,
					text: 'LQ Sales Report'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				plugins: {
				filler: {
					propagate: false
				}
			   },
				scales: {
					xAxes: [{
						display: true,
						ticks: {
						autoSkip: false,
						maxRotation: 0
					},
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						ticks: {
						autoSkip: false,
						maxRotation: 0
					},
						scaleLabel: {
							display: true,
							labelString: 'Orders'
						}
					}]
				}
			}
		});
</script>
		
		
		<?php include('common/footer.php'); ?>