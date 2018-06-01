 <?php 
 require('common/header.php'); 
 require("../common/config.php");
 ?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>G-MAD Admin Panel </h3>
              </div>

                <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="index.php"style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Home"  class="btn btn-primary viewbtn"> <i class="fa fa-home"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Orders List</h2>
                 <div id="daterange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                      <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                      <span>January 01, 2018 - December 31, 2019</span> <b class="caret"></b>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	 
     
	<div class="box-header with-border">
	
        
			<button type="button" class="btn btn-primary pull-right" id="del" disabled   data-toggle="tooltip" title="Delete">
              <i class="fa fa-fw fa-trash"></i> Delete</button>
          <!--  <a href="addProduct.php" class="btn btn-primary pull-right" style="margin-right:5px;"  data-toggle="tooltip" title="Add New">
              <i class="fa fa-plus"></i> Add New</a> -->
            
          
        </div>
        <div class="box-body">
		
		<form id="form-user" enctype="multipart/form-data"  action="">
		<input type='hidden' id="sdate"/>
		<input type='hidden' id="edate"/>

          <table id="data_table_lq" class="table table-bordered table-striped">
		  <thead>
                <tr>
				  <th style="width:1px"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
				    <th>Order ID</th>
					<th>Name</th>
					<th>City</th>
					<th>Transaction Status</th>
					<th>Date</th>
                  
                  <th style="text-align:center;">Action</th>
                </tr>
			</thead>
            <tbody>
				<?php
				if(isset($_GET['sdate'])&&isset($_GET['edate']))
				{
					$sdate=$_GET['sdate'];
					$edate=$_GET['edate'];
					$sql="SELECT order_id,CONCAT(firstname,' ',lastname) as name,payment_city,transaction_status,date_added FROM  lq_order  WHERE DATE(date_added) BETWEEN '$sdate' AND '$edate' ORDER BY order_id";
				}
				else if(isset($_GET['id']))
				{
					$customer_id=$_GET['id'];
					
				$sql="SELECT order_id,CONCAT(firstname,' ',lastname) as name,payment_city,transaction_status,date_added FROM  lq_order WHERE customer_id='$customer_id' ORDER BY order_id";	
					
				}
				else
				{
					$sql="SELECT order_id,CONCAT(firstname,' ',lastname) as name,payment_city,transaction_status,date_added FROM  lq_order ORDER BY order_id";
				}
					$result=mysqli_query($dbConn,$sql);
					if($result){
						while($row=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td><input type="checkbox" value="'.$row['order_id'].'" name="selected[]"></td>';
							echo '<td>'.$row['order_id'].'</td>';
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'.$row['payment_city'].'</td>';
							echo '<td>'.$row['transaction_status'].'</td>';
							echo '<td>'.$row['date_added'].'</td>';
							echo '<td style="text-align:center;"><a class="btn btn-info orderinfobtn" data-orderid="'.$row['order_id'].'"><i class="fa  fa-info"></i> info</a></td>';
							echo '</tr>';
						}
						mysqli_close($dbConn);
					}
				?>
			</tbody>
		</table>
			</form>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
    
      <!-- /.box -->
      

    
                  </div>
                </div>
              </div>
            </div>
			
			
			  <!-- info modal starts here -->
       <div id='info_modal' class='modal fade'>
       <div class='modal-dialog'>
       <div class='modal-content'>
       <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
       <h3>Order Information</h3>
       </div>
       <div class='modal-body'>
	   <div>
	    <div>
	   
	     <span class='info-message'>   </span>
	   <table class="table table-bordered data info-table" width="100%">
                     
                    <tbody>
                          <tr>
                          <th>Order ID :<span class='order_id'> </span></th>
                          <th colspan='2'><i class="fa fa-calendar"></i><span class="orderdate"></span></th>
						 
                          </tr>
                          <tr>
                          <td rowspan="2" style="width: 210px;">
						   <!--profile pic -->
	                     
	           <a href="" class="billlink" target="_blank"> <button type="button" style="padding-left: 48px;padding-right: 43px;" class="btn btn-primary pull-right bill_btn"    data-toggle="tooltip" title="Bill">
                                                                   <i class="fa fa-fw fa-file-alt"></i>View Bill</button> </a>
                
				<a href="" class="pilotlink" target="_blank"> <button type="button" style="padding-left: 28px;padding-right: 27px;" width="100px"  class="btn btn-primary pull-right pilot_info_btn"    data-toggle="tooltip" title="Pilot Info">
                                                                  <i class="fa fa-fw fa-user"></i>View Pilot Info</button> </a>
			  
	            <a href="" class="customerlink" target="_blank"><button type="button" class="btn btn-primary pull-right customer_info_btn"    data-toggle="tooltip" title="Customer Info">
                                                                  <i class="fas fa-user-circle"></i> View Customer Info</button> </a>          
	                        <!--pic end -->
						  
						  </td>
                          <td rowspan="2" colspan='2' >
						  
						  <div id="trackmap" style="width:auto;height:300px;"></div>
						  </td>
                          
                          </tr>
                          
                    </tbody>
                    </table>
	   
		
		
		
		</div>
		
		
		</div>
		<div>
        </div>
	    </div> <!--modal body end -->
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          
        </div>
      </div>
      </div>
      </div>
     <!-- options modal ends -->
			
			
          </div>
        </div>
        <!-- /page content -->
		<?php include('common/script.php'); ?>
		<script>
		
		$(document).ready(function(){
			
		daterangepicker_init();	
		
		
		});
		
		//Delete button listener
		$('#del').on('click',function(e){
			
			e.preventDefault();
			
			
			
			 delete_order();
			
			//confirm('Are you sure?') ? $('#form-user').submit() : false;
			
		 });
		
		//Order info button
		$('.orderinfobtn').on('click',function(e){
		
       		var orderid=$(this).attr('data-orderid');
			  getTrackData(orderid);
			 $('#info_modal').modal({show:true});
				
			   
		});
		
		
		  $('input[type="checkbox"]').click(function(){

			if ($('input[name*=\'selected\']').is(":checked")) {
         // do something if the checkbox is NOT checked
					$("#del").prop( "disabled", false );
			}
			else{
				  $("#del").prop( "disabled", true );
			}


            

        });
        $("#data_table_lq").DataTable({"order": [[ 2, "asc" ]]});
		
		
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


// Track map


 
	function trackMap(slat,slng,elat,elng) {
		
    var map=null;
    var directionsService=null;
    var directionsDisplay=null;
   
   directionsService = new google.maps.DirectionsService();
   
	initialize();
	
    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var pilot = new google.maps.LatLng(slat,slng);
        var mapOptions = {
            zoom:  15,
            center: pilot
        };
        map = new google.maps.Map(document.getElementById('trackmap'), mapOptions);
        
        directionsDisplay.setOptions( { suppressMarkers: true } );
		directionsDisplay.setMap(map);
	    calcRoute();
    }

	
	function calcRoute() {
        var start = new google.maps.LatLng(slat,slng);
        
        var end = new google.maps.LatLng(elat,elng);
		
		var startMarker = new google.maps.Marker({
            position: start,
            map: map,
			animation: google.maps.Animation.DROP,
            icon: 'images/pilot.png' 
        });
		var endMarker = new google.maps.Marker({
            position: end,
            map: map,
			animation: google.maps.Animation.DROP,
            icon: 'images/pilot.png' 
        });
		
		
       
      /*  var bounds = new google.maps.LatLngBounds();
        bounds.extend(start);
        bounds.extend(end);
        map.fitBounds(bounds); */
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
				directionsDisplay.setOptions({ preserveViewport: true });
                directionsDisplay.setDirections(response);
                //directionsDisplay.setMap(map);
				
			
            } else {
                alert("Directions Request from " + start.toUrlValue(6) + " to " + end.toUrlValue(6) + " failed: " + status);
            }
        });
		
		
    }

  
}

  

		</script>
		
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIcJjkM-A86b5VRdCosQk-YxDCA96Q1m4"></script>
		<?php include('common/footer.php'); ?>