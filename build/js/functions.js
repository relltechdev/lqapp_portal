

/* Login page controls */


function auth_user(){
 
   
    
  $.ajax({
    url: 'common/auth_user.php',
    type: 'post',
    data: $('#auth_form').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
		$key=json['key'];
        $('#auth_form')[0].reset();
        window.location.href=$key;
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
     
    }
  });


}


/* Login page controls end*/


/* OTP page controls */

function auth_otp(){
 
 
 
   
    
  $.ajax({
    url: 'common/auth_otp.php',
    type: 'post',
    data: $('#otp_form').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
		$url=json['location'];
        $('#otp_form')[0].reset();
        window.location.href=$url;
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
     
    }
  });


}

/* OTP page controls end */


/* Add Category page controls */


function add_category(){
 
    
  $.ajax({
    url: 'functions/add_category.php',
    type: 'post',
    data: $('#add_category').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
		 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
		 $("#lastcatid").val(json['catid']);
      //  window.location.href=$key;
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}


//category description


function add_category_desc(){
 
   
    
  $.ajax({
    url: 'functions/add_category_desc.php',
    type: 'post',
    data: $('#add_category_desc').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
    }
  });


}


/* Add Category page controls end*/


/* MANAGE CATEGORY PAGE CONTROLS */

 //delete function
    
function delete_category()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_category.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}

//update category

function update_category(){
 
 
    PNotify.desktop.permission();
   
    
  $.ajax({
    url: 'functions/update_category.php',
    type: 'post',
    data: $('#update_category').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',

                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
			
			
          });
		  
		location.reload();
		 
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}


//update Category description


function update_category_desc(){
 

    
  $.ajax({
    url: 'functions/update_category_desc.php',
    type: 'post',
    data: $('#update_category_desc').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
     
    }
  });


}



/* MANAGE CATEGORY PAGE CONTROLS */

/* Add Product page controls */


function add_product(){
 
 
    
   
    
  $.ajax({
    url: 'functions/add_product.php',
    type: 'post',
    data: $('#add_product').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
		 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
		 $("#lastproid").val(json['proid']);
      //  window.location.href=$key;
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}


//Product description


function add_product_desc(){
 
 
  
   
    
  $.ajax({
    url: 'functions/add_product_desc.php',
    type: 'post',
    data: $('#add_product_desc').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
     
    }
  });


}


/* Add Product page controls end*/

/* MANAGE PRODUCT PAGE CONTROLS */

 //delete function
    
function delete_product()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_product.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}

//update product

function update_product(){
 
 
    PNotify.desktop.permission();
   
    
  $.ajax({
    url: 'functions/update_product.php',
    type: 'post',
    data: $('#update_product').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',

                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
			
			
          });
		  
		location.reload();
		 
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}


//update Product description


function update_product_desc(){
 

    
  $.ajax({
    url: 'functions/update_product_desc.php',
    type: 'post',
    data: $('#update_product_desc').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
     
    }
  });


}



/* MANAGE PRODUCT PAGE CONTROLS */



/* PILOT PAGE CONTROLS */


//add pilot

function add_pilot(){
 
    
  $.ajax({
    url: 'functions/add_pilot.php',
    type: 'post',
    data: $('#add_pilot').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.href="managePilot.php";
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

//update pilot

function update_pilot(){
 
    
  $.ajax({
    url: 'functions/update_pilot.php',
    type: 'post',
    data: $('#update_pilot').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.reload();
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

//get live Data

function getLiveData(pilotid){
 
 var availability="";
    
  $.ajax({
    url: 'functions/getPilot_live_data.php',
    type: 'post',
    data: {'id':pilotid},
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed")
	     {
        
      $('.info-table').hide();
	   $('.info-message').text("NO DATA FOUND");
         }
         else
      if (json['status']=="success") 
	     {
			  $('.info-table').show();
			   $('.info-message').text("");
			 //availability
			 if(json['availability']=='1')
			 {
				availability=" Online"; 
				$('.availablity').css('color','green');
				$('.info-availability').css('color','green');
			 }
			 else
			 {
				 availability=" Offline";
				 $('.availablity').css('color','red');
				 $('.info-availability').css('color','red');
			 }
                
            $('.info-availability').text(availability);       

           //image
		   if(json['image']!="")
		   {
           $('.info-image').attr('src','images/'+json['image']);

		   }
          else	
		  {
	    $('.info-image').attr('src','images/cache/no_image_40x40.png');
		  }	  
            // name
			$('.info-name').text(json['first_name']+" "+json['last_name']);
			 // cash
			$('.info-cash').text(json['cash']);
			 // contact
			$('.info-contact').text(json['mobile']);
		    pilotMap(json['lat'],json['lng'],json['first_name']+" "+json['last_name']);
         }
    
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

//delete function
    
function delete_pilot()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_pilot.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}

/* PILOT PAGE CONTROLS END*/


/* VALIDATOR FUNCTION */

function formValidator(check,type,field,identifier,id){
 
    
  $.ajax({
    url: 'functions/validator.php',
    type: 'post',
    data: {'check':check,'type':type,'field':field,'identifier':identifier},
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
          });
		     var className=json['identifier'];
                    $("."+className).css({"border-color": "#F44336"});  
                    $("."+className).val(""); 					

   					   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}
/* VALIDATOR FUNCTION END */

/* USER PAGE CONTROLS */


//add user

function add_user(){
 
    
  $.ajax({
    url: 'functions/add_user.php',
    type: 'post',
    data: $('#add_user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.href="manageUser.php";
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

//update user

function update_user(){
 
    
  $.ajax({
    url: 'functions/update_user.php',
    type: 'post',
    data: $('#update_user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.reload();
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}


//delete user function
    
function delete_user()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_user.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}

/* USER PAGE CONTROLS END */

/* CUSTOMER PAGE CONTROLS */


//add user

function add_customer(){
 
    
  $.ajax({
    url: 'functions/add_customer.php',
    type: 'post',
    data: $('#add_customer').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.href="manageCustomer.php";
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

//update user

function update_customer(){
 
    
  $.ajax({
    url: 'functions/update_customer.php',
    type: 'post',
    data: $('#update_customer').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.reload();
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}


//delete user function
    
function delete_customer()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_customer.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}

/* CUSTOMER PAGE CONTROLS END */

/* USER GROUP PAGE CONTROL*/


	function update_usergroup(){
 
 
    PNotify.desktop.permission();
   
    
  $.ajax({
    url: 'functions/update_usergroup.php',
    type: 'post',
    data: $('#update_usergroup').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',

                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
			
			
          });
		  
		window.location.href="manageUserGroup.php";
		 
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}



//delete usergroup function
    
function delete_usergroup()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_usergroup.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}


//add user

function add_usergroup(){
 
    
  $.ajax({
    url: 'functions/add_usergroup.php',
    type: 'post',
    data: $('#add_usergroup').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       window.location.href="manageUserGroup.php";
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

/* USER GROUP DATA  END*/

/* TAX DATA */

//get tax rule

function getTaxruleData(rateid){
 
 
    
  $.ajax({
    url: 'functions/getTaxrule.php',
    type: 'post',
    data: {'id':rateid},
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed")
	     {
        
                 new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: "Data Not Found",
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") 
	     {
			$('#taxrate').val(json['tax_rate_id']);
			$('#rule_name').val(json['name']);
         }
    
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}


//get tax rate

function getTaxrateData(rateid){
 
 
    
  $.ajax({
    url: 'functions/getTaxrate.php',
    type: 'post',
    data: {'id':rateid},
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed")
	     {
        
                 new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: "Data Not Found",
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") 
	     {
			$('#rate_value').val(json['rate']);
			$('#type').val(json['type']);
			$('#rate_name').val(json['name']);
         }
    
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

// update tax rule
function update_taxrule(){
 
 
    PNotify.desktop.permission();
   
    
  $.ajax({
    url: 'functions/update_taxrule.php',
    type: 'post',
    data: $('#update_taxrule').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',

                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
			
			
          });
		  
		location.reload();
		 
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}



//delete tax rule
    
function delete_taxrule()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_taxrule.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}


//add taxrule

function add_taxrule(){
 
    
  $.ajax({
    url: 'functions/add_taxrule.php',
    type: 'post',
    data: $('#add_taxrule').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       location.reload();
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

// update tax rate
function update_taxrate(){
 
 
    PNotify.desktop.permission();
   
    
  $.ajax({
    url: 'functions/update_taxrate.php',
    type: 'post',
    data: $('#update_taxrate').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',

                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
			
			
          });
		  
	location.reload();
		 
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}



//delete tax rate
    
function delete_taxrate()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_taxrate.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}


//add taxrate

function add_taxrate(){
 
    
  $.ajax({
    url: 'functions/add_taxrate.php',
    type: 'post',
    data: $('#add_taxrate').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
                              new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                 desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
          });
		  
		
		
       location.reload();
                                   }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}

/* TAX RATE END */


/* USER SETTINGS AND PROFILE PAGE */


function loadUserSettings()
{
	
	var id=$('#userid').val();
// load settings
 $.ajax({
    url: 'functions/ajaxSettingsData.php',
    type: 'post',
    data: {"id":id},
    dataType:'json',
    
    
    
    
    success: function(json) {
      
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['msg'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         
      if (json['status']=="success") {
     
	    var otp_settings=json['otp_security'];
		var timeout=json['session_timeout'];
		
		$('#otplogin').val(otp_settings);
		$('#timeout').val(timeout);
		var changeC = document.querySelector('.js-switch');
		
		if($('#otplogin').val()=="ENABLE"&&changeC.checked==false)
		 {  
			 changeC.click();
		 }
		 else if($('#otplogin').val()=="DISABLE"&&changeC.checked==true)
		 {  
			changeC.click();
		 }
	       
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['msg'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
        
      
      }
   
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
      new PNotify({
        title: 'GET ME A DRINK PORTAL',
        text: 'Sorry Something Went Wrong',
//thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
        styling: 'bootstrap3'
    });
    }
  });
	
	
}


//save user settings

function saveUserSettings()
{
	  $.ajax({
    url: 'functions/saveUserSettings.php',
    type: 'post',
    data: $('#user_settings').serializeArray(),
    dataType:'json',
    
    
    
    
    success: function(json) {
      
     //console.log( json['error'] );
    //   console.log( json['success'] );
      if(json['error']){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['error'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         
      if (json['success']) {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['success'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
        location.reload();
      
      }
   
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
      new PNotify({
        title: 'GET ME A DRINK PORTAL',
        text: 'Sorry Something Went Wrong',

        styling: 'bootstrap3'
    });
    }
  });
	
}

//save user profile 

function saveUserProfile()
{
	PNotify.desktop.permission();
	  $.ajax({
    url: 'functions/update_profile.php',
    type: 'post',
    data: $('#user_pofile_form').serializeArray(),
    dataType:'json',
    
    
    
    
    success: function(json) {
      
     //console.log( json['error'] );
    //   console.log( json['success'] );
      if(json['status']=="failed"){
        
         new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
	  }
         
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
       location.reload();
      
      }
   
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
      
      new PNotify({
        title: 'GET ME A DRINK PORTAL',
        text: 'Sorry Something Went Wrong',

        styling: 'bootstrap3'
    });
    }
  });
	
}
/* USER SETTINGS AND  PROFILE PAGE */


/* BANNER PAGE CONTROLS */



 //delete function
    
function delete_banner()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_banner.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
   
	
	
	
	
}

//update banner

function update_banner(){
 
 
    PNotify.desktop.permission();
   
    
  $.ajax({
    url: 'functions/update_banner.php',
    type: 'post',
    data: $('#update_banner').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
     
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',

                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
			
			
          });
		  
		location.reload();
		 
     
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
    
    }
  });


}


//ADD BANNER

function add_banner(){
 
    
  $.ajax({
    url: 'functions/add_banner.php',
    type: 'post',
    data: $('#add_banner').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
   
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  styling: 'bootstrap3',
                   animate: {
               animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
                         }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  styling: 'bootstrap3',
            animate: {
              animate: true,
              in_class: 'bounceInLeft',
              out_class: 'zoomOut'
            }
          });
		  
		 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
		
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}


/* BANNER PAGE END */


/* MANAGE ORDERS */


 //delete function
    
function delete_order()
{
	
PNotify.desktop.permission();

 
 
   (new PNotify({
    title: 'Confirmation Needed',
    text: 'Are you sure?',
    icon: 'glyphicon glyphicon-question-sign',
    hide: false,
    confirm: {
        confirm: true
    },
    buttons: {
        closer: false,
        sticker: false
    },
    history: {
        history: false
    },
    addclass: 'stack-modal',
    stack: {
        'dir1': 'down',
        'dir2': 'right',
        'modal': true
    }
})).get().on('pnotify.confirm', function() {
 
//ajax function call


 $.ajax({
    url: 'functions/delete_order.php',
    type: 'post',
    data: $('#form-user').serializeArray(),
    dataType:'json',
    
    
    success: function(json) {
      
    
      if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: json['message'],
                                  desktop: {
                            desktop: true,
						   icon: 'images/logo_40x40.png'
                                           }
                              });
         }
         else
      if (json['status']=="success") {
     
      new PNotify({
                            title: 'GET ME A DRINK PORTAL',
                                  text: json['message'] ,
                                  type: 'success',
                                  desktop: {
                              desktop: true,
							 icon: 'images/logo_40x40.png'
                                            }
          });
		  
          location.reload();
      }
    
      
       
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  
                                desktop: {
                              desktop: true,
							  icon: 'images/logo_40x40.png'
                                          }
                              });
     
    }
  });



//ajax function end
	

   }).on('pnotify.cancel', function() {
	 
   return false;
});
 
} 

// get path track

//get live Data

function getTrackData(orderid){
 
 
    
  $.ajax({
    url: 'functions/getTrackingData.php',
    type: 'post',
    data: {'id':orderid},
    dataType:'json',
    
    
    success: function(json) {
      
   var base_url="http://"+window.location.hostname+"/lqapp";
   console.log("base url "+base_url);
      if(json['status']=="failed")
	     {
        
      $('.info-table').hide();
	   $('.info-message').text("NO DATA FOUND");
         }
         else
      if (json['status']=="success") 
	     {
			  $('.info-table').show();
			   $('.info-message').text("");
			   //link
	 if(json['customer_id']!="")
	 {    
        var link = base_url+'/admin/manageCustomer.php?id='+json['customer_id'];
		 $('.customerlink').attr('href',link);
	 }
	  if(json['pilot_id']!="")
	 {
		 var link = base_url+'/admin/managePilot.php?id='+json['pilot_id'];
		 
		 $('.pilotlink').attr('href',link);
	 }
	 
	 
	 
			   
			   
			 //availability
			 if(json['date']!="")
			 {
				 
				 $('.orderdate').text(" "+json['date']);
			 }
			 else
			 {
				$('.orderdate').text(" no data"); 
				 
			 }
			 
                
                  

           //image
		   if(json['order_id']!="")
		   {
		 var link =base_url+'/admin/viewBill.php?id='+json['order_id'];
           $('.order_id').text(" "+json['order_id']);
           $('.billlink').attr('href',link);;
		   }
		   else
			 {
				$('.order_id').text(" no data"); 
				 
			 }
         
           if(json['slat']!=""&&json['elat']!=""&&json['slng']!=""&&json['elng']!="")
		   {
		    trackMap(json['slat'],json['slng'],json['elat'],json['elng']);
		   }
		   else
		   {
			 $("#trackmap").empty();  
			 $("#trackmap").html("<span>No Tracking data found </span>"); 
		   }
         }
    
    },
    //error handler
    error: function(xhr, ajaxOptions, thrownError) {
      
      new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Sorry Something Went Wrong',
                  //thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText
                                  styling: 'bootstrap3'
                              });
      
    }
  });


}   

