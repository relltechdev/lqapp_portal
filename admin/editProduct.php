 <?php 
 require('common/header.php'); 
 require('common/imageresize2.php');
 require("../common/config.php");
 require("../common/util.php");
 require("functions/getProductData.php");



if(!empty($image_url))
		{
			$image=$image_url;
			
			$dplaceholder='images/'.$image;
			if (file_exists($dplaceholder)) {
				resize2($image,'100','100');
			$imageltrim=str_replace('catalog/','',$image_url);
			
			$parts = explode('.', $imageltrim);
			$last = array_pop($parts);
			$parts = array(implode('.', $parts), $last);

			$imgexplode= $parts[0].'_100x100.'.$parts[1]; 
			$dsrc='images/cache/'.$imgexplode;
			}
			else{
				$image='';
				$dplaceholder='images/no_image.png';
				$dsrc='images/cache/no_image.png';
			}
		}
		else{
			$image='';
		        $dplaceholder='images/no_image.png';
				$dsrc='images/cache/no_image.png';
		}
		
		
 ?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>G-MAD Admin Panel</h3>
              </div>
 
              <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="manageProduct.php" style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; " data-toggle="tooltip" data-original-title="Back" id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-reply"></i> back</a>
                    
                  </div>
                </div>
              </div>
			  
			    <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="addProduct.php" style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Add Product" id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-plus"></i></a>
                    
                  </div>
                </div>
              </div>
			  
            </div>

            <div class="clearfix"></div>

            <div class="row">
           
		   
		   
		   <!-- tab panel starts -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Edit Product</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- tab panel begins-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Global</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
					  
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          
						  
				      <br/>
					  
                      <form id="update_product" action="" data-parsley-validate class="form-horizontal form-label-left">
                     
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Model Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="model_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $model; ?>">
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Manufacturer<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="manufacturer" name="manufacturer" class="form-control" required>
                      <option value="">--Select Manufacturer--</option>
                      </select>
					 <input type="hidden" id="man_id" value="<?php echo $manufacturer; ?>" />
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Category<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="category" name="category" class="form-control" required>
                      <option value="">--Select Category--</option>
                      </select>
					  <input type="hidden" id="cat_id" value="<?php echo $category; ?>" />
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Product Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="product_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $name;  ?>">
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Price <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $price; ?>">
                      </div>
                      </div>
					   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="tax" name="tax" class="form-control" required>
                      <option value="">--Select Tax--</option>
                      </select>
					  <input type="hidden" id="tax_id" value="<?php echo $tax; ?>" />
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Weight<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="weight" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $weight; ?>">
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                      </label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="desc" required="required" class="form-control" name="desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                      data-parsley-validation-threshold="10"><?php echo $description; ?></textarea>
					  </div>
                      </div>
                     
                     
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="status" name="status" class="form-control" required>
                      <option value="">--Select--</option>
                      <option value="1">Enabled</option>
                      <option value="0">Disabled</option>
                      </select>
					  <input type="hidden" id="status_id" value="<?php echo $status; ?>" />
                      </div>
                      </div>
			          <div class="form-group required">
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-lastname">Image</label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				      <a href="" id="thumb-image" data-toggle="modal" data-target="#myModal" class="img-thumbnail"><img id="img-tag" src="<?php echo $dsrc;?>" alt="" title="" data-placeholder="<?php echo $dplaceholder;?>" /></a>
                      <input type="hidden" name="image" value="<?php echo $image;?>" id="image" />
			          <button type="button" name="remove-image" id="remove-image" class="btn btn-small btn-danger"><i class="fa fa-fw fa-remove"></i>Remove image</button>
                      </div>
			          </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					 <input type="hidden" name="productid" id="proid" value="<?php echo $id; ?>" />
                      <button type="button" class="btn btn-success save_probtn">Save</button>
                      </div>
                      </div>

                      </form>
					
						  
						  
                       </div>
						
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
				      <form id="update_product_desc" data-parsley-validate class="form-horizontal form-label-left">
                      
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Language<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="lang" name="lang" class="form-control" required>
                      <option value="">--Select language--</option>
                      </select>
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Product Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="lpro_name" name="product_name" required="required" class="form-control col-md-7 col-xs-12" >
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                      </label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="lpro_desc" required="required" class="form-control" name="desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                      data-parsley-validation-threshold="10"></textarea>
					  </div>
                      </div>
                     
                    
					
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <input type="hidden" name="productid"  value="<?php echo $id; ?>" />
                      <button type="button" class="btn btn-success save_prodescbtn">Save</button>
                      </div>
                      </div>

                      </form>
						  
                      </div>
                        
                      </div>
                    </div>
					 <!-- tab panel ends-->

                  </div>
                </div>
              </div>
			  <!-- tab panel end -->
			  
			  
			  
			  
            </div>
          </div>
        </div>
        <!-- /page content -->
		<?php 
		
		include('common/script.php'); 
		
		require('filemanagertext.php');
		?>
		<script>
		//add category function listener
		$('.save_probtn').on('click',function(e){
			
			e.preventDefault();
			
			update_product();
			
		 });
		//add category description function listener
		 $('.save_prodescbtn').on('click',function(e){
			
			e.preventDefault();
			
			update_product_desc();
			
		 });
		
		 $( "#remove-image" ).click(function() {
       	 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
	 
           });
		   
		 
       $(document).ready(function(){
	      
		 var proid=$('#proid').val();
            //language ajax call
            $.ajax({
                type:'POST',
                url:'functions/ajaxLanguage.php?tag=prolang&id='+proid,
                success:function(html){
                    $('#lang').html(html);
					
                
                }
            }); 
			  //category ajax call
            $.ajax({
                type:'POST',
                url:'functions/ajaxCategory.php',
                success:function(html){
                    $('#category').html(html);
					var cat=$('#cat_id').val();
					$("#category").val(cat);
                
                 }
            }); 
			// tax ajax call
			  $.ajax({
                type:'POST',
                url:'functions/ajaxTax.php',
                success:function(html){
                    $('#tax').html(html);
					var tax=$('#tax_id').val();
					$("#tax").val(tax);
                
                }
            }); 
			// manufacturer ajax call
			 $.ajax({
                type:'POST',
                url:'functions/ajaxManufacturers.php',
                success:function(html){
                    $('#manufacturer').html(html);
					var man_id=$('#man_id').val();
					$("#manufacturer").val(man_id);
                
                }
            }); 
			
			// Set status
					var status_id=$('#status_id').val();
					$("#status").val(status_id);
		
            });
			
			//description ajax
			$('#lang').on('change',function(e){
				
				var lang=$('#lang').val();
				 var proid=$('#proid').val();
				
				 $.ajax({
                type:'GET',
                url:'functions/getProductDesc.php',
				data:{'product_id':proid,'lang':lang},
				dataType:'json',
                success:function(json){
                     if(json['status']=="failed"){
        
        new PNotify({
                                  title: 'GET ME A DRINK PORTAL',
                                  text: 'Data fetching failed',
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
     
          $('#lpro_name').val(json['name']);
		  $('#lpro_desc').val(json['desc']);
		  
		
                     }
    
                
                        }
                      }); 
			                                  });
		
		</script>
		<?php include('common/footer.php'); ?>