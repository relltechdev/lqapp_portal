  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 <!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 <?php
require('filemanager.php');
//var_dump($_SESSION);
?> 
 
  <div class="panel panel-default">
    <div class="panel-heading">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Image Manager</h4>
    </div>
    <div class="panel-body">
	<div id="myimage">
	 <div class="row">
        <div class="col-sm-5"><span href="<?php echo $parent; ?>"  data-toggle="tooltip" title="Parent" id="parent" class="btn btn-default"><i class="fa fa-level-up" ></i></span> <span href="<?php echo $refresh; ?>" data-toggle="tooltip" title="Refresh" id="refresh" class="btn btn-default"><i class="fa fa-refresh"  ></i></span>
          <button type="button" data-toggle="tooltip" title="Upload Images" id="button-upload" class="btn btn-primary"><i class="fa fa-upload"></i></button>
          <button type="button" data-toggle="tooltip" title="New Folder" id="button-folder" class="btn btn-default"><i class="fa fa-folder"></i></button>
          <button type="button" data-toggle="tooltip" title="Delete" id="button-delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
        </div>
		<!--
        <div class="col-sm-7">
          <div class="input-group">
            <input type="text" name="search" value="<?php //echo $filter_name; ?>" placeholder="Search" class="form-control">
            <span class="input-group-btn">
            <button type="button" data-toggle="tooltip" title="Search" id="button-search" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </span></div>
        </div>
		-->
      </div>
      <hr />
	  
      <?php foreach (array_chunk($imagesarr, 4) as $image) { ?>
      <div class="row">
        <?php foreach ($image as $image) { ?>
		
        <div class="col-sm-3 text-center">
          <?php if ($image['imagetype'] == 'directory') { ?>
          <div class="text-center"><span thumb="<?php echo $image['thumb']; ?>" href="<?php echo $image['href']; ?>" class="directory thumbnail" style="vertical-align: middle;color:#367fa9;cursor:pointer"><i class="fa fa-folder fa-5x"></i></span></div>
          <label>
            <input type="checkbox" name="path[]" value="<?php echo $image['path']; ?>" />
            <?php echo $image['name']; ?></label>
          <?php } ?>
          <?php if ($image['imagetype'] == 'image') { ?>
          <span thumb="<?php echo $image['thumb']; ?>" style="cursor:pointer;" href="<?php echo $image['href']; ?>" class="thumbnail spanthumb"><img src="<?php echo $image['thumb']; ?>" alt="<?php echo $image['name']; ?>" title="<?php echo $image['name']; ?>" /></span>
          <label>
            <input type="checkbox" name="path[]" value="<?php echo $image['path']; ?>" />
            <?php echo $image['name']; ?></label>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
      <br />
      <?php } ?>
	  <input type="hidden" value="<?php echo $directory; ?>" id="dir">
	  <?php echo $pagination; ?>
	  
	
	 
    </div>
	</div>
   
  </div>

 
<script type="text/javascript">
//$('#myModal').modal('show');
function SelectFile( fileUrl )
{
window.opener.document.getElementById("88_textInput").value = fileUrl;
//window.opener.document.getElementById("ImagePreviewBox").innerHTML="<img src='" + fileUrl + "' id='PreviewImage' />" + window.opener.document.getElementById("ImagePreviewBox").innerHTML;
window.close();
}
  function getUrlParam( paramName ) {
            var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
            var match = window.location.search.match( reParam );

            return ( match && match.length > 1 ) ? match[1] : null;
        }
	 function returnFileUrl(href) {

            var funcNum = getUrlParam( 'CKEditorFuncNum' );
            var fileUrl = href;
            window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl );
            window.close();
        }
$( "body" ).delegate( ".spanthumb", "click", function() {
  //alert($(this).attr('thumb'));
	//$('#thumb-image img').attr("src",$(this).attr('thumb'));
	//alert('hi');
	
	 returnFileUrl($(this).attr('thumb'));
	
	
	window.close();
//SelectFile( $(this).attr('href') );
	//$('#myModal').modal('hide');
});

$( "body" ).delegate( ".directory", "click", function() {
	
	$.ajax({
				url: $(this).attr('href'),
				type: 'post',
				
				
				success: function(json) {
					$("#myimage").html(json);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
	
});
$( "body" ).delegate( "#parent", "click", function() {
	// event.preventDefault();
	$.ajax({
				url: $(this).attr('href'),
				type: 'post',
				
				
				success: function(json) {
					$("#myimage").html(json);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
	
});
$( "body" ).delegate( "#refresh", "click", function() {
	// event.preventDefault();
	$.ajax({
				url: $(this).attr('href'),
				type: 'post',
				
				
				success: function(json) {
					$("#myimage").html(json);
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
	
});
$( "body" ).delegate( "#button-upload", "click", function() {

	$('#form-upload').remove();

	$('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" value="" /></form>');

	$('#form-upload input[name=\'file\']').trigger('click');

	if (typeof timer != 'undefined') {
    	clearInterval(timer);
	}

	timer = setInterval(function() {
		if ($('#form-upload input[name=\'file\']').val() != '') {
			clearInterval(timer);
			var url='filemanager.php?upload=upload';
			var d=$('dir').val();
			if($('#dir').val().length != 0 )
				url += '&directory=' + $('#dir').val();
			$.ajax({
				url: url,
				type: 'post',
				dataType: 'json',
				data: new FormData($('#form-upload')[0]),
				cache: false,
				contentType: false,
				processData: false,
				beforeSend: function() {
					$('#button-upload i').replaceWith('<i class="fa fa-circle-o-notch fa-spin"></i>');
					$('#button-upload').prop('disabled', true);
				},
				complete: function() {
					$('#button-upload i').replaceWith('<i class="fa fa-upload"></i>');
					$('#button-upload').prop('disabled', false);
				},
				success: function(json) {
					if (json['error']) {
						alert(json['error']);
					}

					if (json['success']) {
						alert(json['success']);

						$('#refresh').trigger('click');
					}
				},
				error: function(xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		}
	}, 500);
});
$( "body" ).delegate( "#button-folder", "click", function() {
	 $(this).popover({
	html: true,
	placement: 'bottom',
	trigger: 'click',
	title: 'New folder',
	content: function() {
		html  = '<div class="input-group">';
		html += '  <input type="text" name="folder" value="" placeholder="New Folder" class="form-control">';
		html += '  <span class="input-group-btn"><button type="button" title="Create Folder" id="button-create" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></span>';
		html += '</div>';

		return html;
	}
	});
});
$( "body" ).delegate( "#button-folder", "shown.bs.popover", function() {
    $( 'body').delegate( "#button-create", "click", function() {
		$.ajax({
		
			url:   $('#dir').val().length != 0? 'filemanager.php?createfolder=createfolder&directory=' + $('#dir').val(): 'filemanager.php?createfolder=createfolder',
			type: 'post',
			dataType: 'json',
			data: 'folder=' + encodeURIComponent($('input[name=\'folder\']').val()),
			beforeSend: function() {
				$('#button-create').prop('disabled', true);
			},
			complete: function() {
				$('#button-create').prop('disabled', false);
			},
			success: function(json) {
				if (json['error']) {
					alert(json['error']);
				}

				if (json['success']) {
					alert(json['success']);

					$('#refresh').trigger('click');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});
	});
$( "body" ).delegate( "#myimage #button-delete", "click", function() {

	if (confirm('Are you Sure?')) {
		$.ajax({
			url: 'filemanager.php?delete=delete',
			type: 'post',
			dataType: 'json',
			data: $('input[name^=\'path\']:checked'),
			beforeSend: function() {
				$('#button-delete').prop('disabled', true);
			},
			complete: function() {
				$('#button-delete').prop('disabled', false);
			},
			success: function(json) {
				if (json['error']) {
					alert(json['error']);
				}

				if (json['success']) {
					alert(json['success']);

					$('#refresh').trigger('click');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
});
</script>
