/* Global variables */

var datedata=[];



/* -------------- DELIVERED ORDER CHART --------------   */
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
     data: {
				labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets: [{
					label: 'This Week',
					backgroundColor: "#98dd1e",
					borderColor: "green",
					borderWidth: 2,
					data: [0,0,0,0,0,0],
					
					fill: false,
				}, {
					label: 'Last Week',
					borderWidth: 2,
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
					text: 'LQ Delivered Order Report'
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
							labelString: 'Time Line'
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
	   
	   datai=0;
	 data1=[],data2=[];
// ajax data sync
	$.ajax({
    url: 'functions/ajaxOrderStatistics.php',
    type: 'get',
	data: datedata,                                       //$('#chartform').serializeArray()
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

	labels: json['label'],   
	datasets :[

              ]

             };


// pushing data 

  datai.datasets.push({

		label : json['label1'],
		fill:false,
		backgroundColor: "#5ddc42",
		borderColor: "#4e8a3e",
		borderWidth: 2,
		data : data1	
                     });	

  datai.datasets.push ({

		label : json['label2'],
		fill: false,
		backgroundColor: "red",
		borderWidth: 2,
		borderColor: "#ff9e93",
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
	
	
        
	  /* -------------- ORDER DELIVERED CHART --------------   */
	  
	  
	  
	    
	  /* -------------- REVENUE EARNED CHART --------------   */
	  
	  
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
							labelString: 'Time Line'
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
   datai2=0;
   revenue1=[],revenue2=[];
	$.ajax({
    url: 'functions/ajaxRevenueStatistics.php',
    type: 'get',
	data: datedata,                                       //$('#chartform').serializeArray()
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
    // console.log(revenue1);
		json["revenue2"].forEach(function(packet) {
        revenue2.push(packet);
	                                             });
 
    //console.log(revenue2);
    //console.log(json['count1'][1]);
     
    datai2 = {                                  

	labels: json['label'],   
	datasets :[

              ]

             };


// pushing data 
console.log(revenue1);
  datai2.datasets.push({

		label : json['label1'],
		fill:false,
		backgroundColor: "#98dd1e",
		borderColor: "green",
		data : revenue1	
                     });	
console.log(revenue2);
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
	
	
	  
	  /* -------------- REVENUE  REPORT--------------   */
	  
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
					text: 'LQ Revenue Loss Report'
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
							labelString: 'Time Line'
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
							labelString: 'Revenue Loss( in ₹ )'
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

    datai3=0;
	revenueloss1=[],revenueloss2=[];
	
	$.ajax({
    url: 'functions/ajaxRevenueLossStatistics.php',
    type: 'get',
	data: datedata,                                       //$('#chartform').serializeArray()
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
	// console.log(revenueloss1);
		json["revenueloss2"].forEach(function(packet) {
        revenueloss2.push(packet);
	                                             });
 
  
    //console.log(json['count1'][1]);
     
    datai3 = {                                  

	labels: json['label'],   
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
	
	
	  
	  /* --------------  REVENUE LOSS  --------------   */
	  
	  
	     
	  /* -------------- DELIVERY FAILED ORDER --------------   */
	  
	  
	  	// Sync data
	var datai4,config4;
   var faileddata1=[],faileddata2=[];
	datai4=0;	
    var ctx4 = document.getElementById("Chart4"); // get canvas
    ctx4.height = 180; 
    var chart4;
    var footerLine4={
		0:[0,0,0,0,0,0,0],
	    1:[0,0,0,0,0,0,0]
		           };
  
   
  var  config4 = {

     type: 'line',
     data: {
				labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
				datasets: [{
					label: 'This Week',
					backgroundColor: "#98dd1e",
					borderColor: "green",
					borderWidth: 2,
					data: [0,0,0,0,0,0],
					
					fill: false,
				}, {
					label: 'Last Week',
					borderWidth: 2,
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
					text: 'LQ Delivery Failed Report'
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
							labelString: 'Time Line'
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
		
		if(typeof chart4 != 'undefined')      {
	
	    chart4.destroy();
	                                         }
  
      chart4 = new Chart(ctx4,config4);

	
  
   function syncfailedorderdata(){
// ajax data sync

    datai4=0;
	faileddata1=[],faileddata2=[];
	
	$.ajax({
    url: 'functions/ajaxOrderFailedStatistics.php',
    type: 'get',
	data: datedata,                                       //$('#chartform').serializeArray()
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
	
	     json["failedcount1"].forEach(function(packet) {
         faileddata1.push(packet);
		
		                                         });
	  
		json["failedcount2"].forEach(function(packet) {
        faileddata2.push(packet);
	                                             });
 
  
    //console.log(json['count1'][1]);
     
    datai4 = {                                  

	labels: json['label'],   
	datasets :[

              ]

             };

  console.log(datai4);
// pushing data 

  datai4.datasets.push({

		label : json['label1'],
		fill:false,
	    backgroundColor: "#5ddc42",
		borderColor: "#4e8a3e",
		borderWidth: 2,
		data : faileddata1	
                     });	

  datai4.datasets.push ({

		label : json['label2'],
		fill: false,
		backgroundColor: "red",
		borderColor: "#ff9e93",
		borderWidth: 2,
		data : faileddata2	
                     });
  //config.tooltips.label=  json['date1'];
  
  footerLine4[0]=json['date1'];
  footerLine4[1]=json['date2'];
   
  // console.log(datai.datasets[1].label);
  
      updateChart4();
   }
       
   },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
    }
  });	
	
 return true;
   }	
	
	function updateChart4()
  {
	       
	      // chart.data.datasets[0].data=data1;
		  // chart.data.datasets[1].data=data2;
    chart4.data.labels.pop();
    chart4.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
	
	
		   chart4.data=datai4;
           chart4.update();
	  
  }
	
	
	  
	  /* -------------- FAILED ORDER --------------   */
	  
	  
	  
	  /*  CALL FUNCTIONS */
	  
	 function loadChart(sdate,edate)
	 {
		 if(sdate!=""&&edate!="")
		 {
			 datedata={'sdate':sdate,'edate':edate};
			 console.log(datedata);
		 }
		 
		syncdeliverydata();       // sync order deivered data - chart 1
		syncdata();               // sync order data Chart 2
		syncrevenuelossdata();    // sync revenue loss data - chart 3
		syncfailedorderdata();    // sync failed order data - chart 4 
		 
		 
		 
		 
	 }