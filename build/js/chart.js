/* -------------- REVENUE CHART --------------   */
		// Sync data
	var datai,config1;
    var data1=[],data2=[];
	datai=0;	
    var ctx = document.getElementById("Chart2"); // get canvas
    ctx.height = 180; 
    var chart;
    var footerLine={
		0:[0,0,0,0,0,0,0],
	    1:[0,0,0,0,0,0,0]
		           };
  
  var  config1 = {

     type: 'line',
	 pointStyle:'cross',
     data: {
				labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets: [{
					label: 'This Week',
					backgroundColor: "#98dd1e",
					borderColor: "green",
					data: [0,0,0,0,0,0],
					
					fill: false,
				}, {
					label: 'Last Week',
					pointStyle:'cross',
					fill: false,
					backgroundColor: "#f9d4d4",
					borderColor: "red",
			    	data: [0,0,0,0,0,0],
					
				}]
			},
    options:{
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
	
	tooltips:  {
                enabled: true,
                mode: 'index',
                intersect: true,
				callbacks:  {
                label: function(tooltipItems, data) { 
				
				 var count=tooltipItems.index;
					 return data.datasets[tooltipItems.datasetIndex].label+': '+footerLine[tooltipItems.datasetIndex][count]+' - '+tooltipItems.yLabel;
									   
													   },
	           												   				  
	                         }
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
		};	
		
		if(typeof chart != 'undefined')      {
	
	    chart.destroy();
	                                         }
  
      chart = new Chart(ctx,config1);

	
  
   function syncdata(){
// ajax data sync
	$.ajax({
    url: 'functions/ajaxOrderStatistics.php',
    type: 'get',
	data: '',                                       //$('#chartform').serializeArray()
    dataType:'json',
    
    
   
    
    success: function(json) {
		
		
	
   	       if(json['status']!='success') {
		   
		  new PNotify({
                                  title: 'SARDIUS WEB PORTAL',
                                  text: json['error'],
                                  type: 'error',
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
		   
		                                 }
    else {
	// reset and set chart data if not empty
	
	     json["count1"].forEach(function(packet) {
         data1.push(packet);
		                                         });
		json["count2"].forEach(function(packet) {
        data2.push(packet);
	                                             });
 
  
    //console.log(json['count1'][1]);
     
    datai = {                                  

	labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],   
	datasets :[

              ]

             };


// pushing data 

  datai.datasets.push({

		label : json['label1'],
		fill:false,
		backgroundColor: "#98dd1e",
		borderColor: "green",
		data : data1	
                     });	

  datai.datasets.push ({

		label : json['label2'],
		fill: false,
		backgroundColor: "#f9d4d4",
		borderColor: "red",
		data : data2	
                     });
  //config.tooltips.label=  json['date1'];
  
  footerLine[0]=json['date1'];
  footerLine[1]=json['date2'];
   
  // console.log(datai.datasets[1].label);
  
      updateChart();
   }
       
   },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
    }
  });	
	
 return true;
   }	
	
	function updateChart()
  {
	       
	      // chart.data.datasets[0].data=data1;
		  // chart.data.datasets[1].data=data2;
		   chart.data=datai;
           chart.update();
	  
  }
	
	syncdata();   // sync order data
        
	  /* -------------- REVENUE CHART --------------   */
	  
	  
	  
	    
	  /* -------------- DELIVERED ORDER --------------   */
	  
	  
	  	// Sync data
	var datai2,config2;
    var revenue1=[],revenue2=[];
	datai2=0;	
    var ctx2 = document.getElementById("Chart1"); // get canvas
    ctx2.height = 180; 
    var chart2;
    var footerLine2={
		0:[0,0,0,0,0,0,0],
	    1:[0,0,0,0,0,0,0]
		           };
  
  var  config2 = {

     type: 'bar',
	 
     data: {
				labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets: [{
					label: 'This Week',
					fill: false,
					backgroundColor: "#98dd1e",
					borderColor: "green",
					data: [0,0,0,0,0,0],
				}, {
					label: 'Last Week',
					fill: false,
					backgroundColor: "#f9d4d4",
					borderColor: "red",
			    	data: [0,0,0,0,0,0],
					
				}]
			},
    options:{
				responsive: true,
				
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				      }
			},
				title: {
					display: true,
					text: 'LQ Revenue Report'
				},
	
	tooltips:  {
                enabled: true,
                mode: 'index',
                intersect: true,
				callbacks:  {
                label: function(tooltipItems, data) { 
				
				 var count=tooltipItems.index;
					 return data.datasets[tooltipItems.datasetIndex].label+': '+footerLine[tooltipItems.datasetIndex][count]+' - ₹.'+tooltipItems.yLabel;
									   
													   },
	           												   				  
	                         }
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
							labelString: 'Revenue( in ₹ )'
						}
					}]
				}
			}
		};	
		
		if(typeof chart2 != 'undefined')      {
	
	    chart2.destroy();
	                                         }
  
      chart2 = new Chart(ctx2,config2);

	
  
   function syncdeliverydata(){
// ajax data sync
	$.ajax({
    url: 'functions/ajaxRevenueStatistics.php',
    type: 'get',
	data: '',                                       //$('#chartform').serializeArray()
    dataType:'json',
    
    
   
    
    success: function(json) {
		
		
	
   	       if(json['status']!='success') {
		   
		  new PNotify({
                                  title: 'SARDIUS WEB PORTAL',
                                  text: json['error'],
                                  type: 'error',
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
		   
		                                 }
    else {
	// reset and set chart data if not empty
	
	     json["revenue1"].forEach(function(packet) {
         revenue1.push(packet);
		
		                                         });
												  console.log(revenue1);
		json["revenue2"].forEach(function(packet) {
        revenue2.push(packet);
	                                             });
 
  
    //console.log(json['count1'][1]);
     
    datai2 = {                                  

	labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],   
	datasets :[

              ]

             };


// pushing data 

  datai2.datasets.push({

		label : json['label1'],
		fill:false,
		backgroundColor: "#98dd1e",
		borderColor: "green",
		data : revenue1	
                     });	

  datai2.datasets.push ({

		label : json['label2'],
		fill: false,
		backgroundColor: "#f9d4d4",
		borderColor: "red",
		data : revenue2	
                     });
  //config.tooltips.label=  json['date1'];
  
  footerLine2[0]=json['date1'];
  footerLine2[1]=json['date2'];
   
  // console.log(datai.datasets[1].label);
  
      updateChart2();
   }
       
   },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
    }
  });	
	
 return true;
   }	
	
	function updateChart2()
  {
	       
	      // chart.data.datasets[0].data=data1;
		  // chart.data.datasets[1].data=data2;
		   chart2.data=datai2;
           chart2.update();
	  
  }
	
	syncdeliverydata();   // sync order data
	  
	  /* -------------- DELIVERED ORDER --------------   */
	  
	   /* -------------- REVENUE LOSS --------------   */
	  
	  
	  	// Sync data
	var datai3,config3;
    var revenueloss1=[],revenueloss2=[];
	datai3=0;	
    var ctx3 = document.getElementById("Chart3"); // get canvas
    ctx3.height = 180; 
    var chart3;
    var footerLine3={
		0:[0,0,0,0,0,0,0],
	    1:[0,0,0,0,0,0,0]
		           };
  
  var  config3 = {

     type: 'bar',
	 
     data: {
				labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets: [{
					label: 'This Week',
					fill: false,
					backgroundColor: "#98dd1e",
					borderColor: "green",
					data: [0,0,0,0,0,0],
				}, {
					label: 'Last Week',
					fill: false,
					backgroundColor: "#f9d4d4",
					borderColor: "red",
			    	data: [0,0,0,0,0,0],
					
				}]
			},
    options:{
				responsive: true,
				
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				      }
			},
				title: {
					display: true,
					text: 'LQ Revenue Report'
				},
	
	tooltips:  {
                enabled: true,
                mode: 'index',
                intersect: true,
				callbacks:  {
                label: function(tooltipItems, data) { 
				
				 var count=tooltipItems.index;
					 return data.datasets[tooltipItems.datasetIndex].label+': '+footerLine[tooltipItems.datasetIndex][count]+' - ₹.'+tooltipItems.yLabel;
									   
													   },
	           												   				  
	                         }
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
							labelString: 'Revenue( in ₹ )'
						}
					}]
				}
			}
		};	
		
		if(typeof chart3 != 'undefined')      {
	
	    chart3.destroy();
	                                         }
  
      chart3 = new Chart(ctx3,config3);

	
  
   function syncrevenuelossdata(){
// ajax data sync
	$.ajax({
    url: 'functions/ajaxRevenueLossStatistics.php',
    type: 'get',
	data: '',                                       //$('#chartform').serializeArray()
    dataType:'json',
    
    
   
    
    success: function(json) {
		
		
	
   	       if(json['status']!='success') {
		   
		  new PNotify({
                                  title: 'SARDIUS WEB PORTAL',
                                  text: json['error'],
                                  type: 'error',
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
		   
		                                 }
    else {
	// reset and set chart data if not empty
	
	     json["revenueloss1"].forEach(function(packet) {
         revenueloss1.push(packet);
		
		                                         });
												  console.log(revenueloss1);
		json["revenueloss2"].forEach(function(packet) {
        revenueloss2.push(packet);
	                                             });
 
  
    //console.log(json['count1'][1]);
     
    datai3 = {                                  

	labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],   
	datasets :[

              ]

             };


// pushing data 

  datai3.datasets.push({

		label : json['label1'],
		fill:false,
		backgroundColor: "#98dd1e",
		borderColor: "green",
		data : revenueloss1	
                     });	

  datai3.datasets.push ({

		label : json['label2'],
		fill: false,
		backgroundColor: "#f9d4d4",
		borderColor: "red",
		data : revenueloss2	
                     });
  //config.tooltips.label=  json['date1'];
  
  footerLine3[0]=json['date1'];
  footerLine3[1]=json['date2'];
   
  // console.log(datai.datasets[1].label);
  
      updateChart3();
   }
       
   },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
    }
  });	
	
 return true;
   }	
	
	function updateChart3()
  {
	       
	      // chart.data.datasets[0].data=data1;
		  // chart.data.datasets[1].data=data2;
		   chart3.data=datai3;
           chart3.update();
	  
  }
	
	syncrevenuelossdata();   // sync order data
	  
	  /* --------------  REVENUE LOSS  --------------   */