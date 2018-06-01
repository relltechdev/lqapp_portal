 <?php
//declare(encoding='UTF-8');
//header("Access-Control-Allow-Origin: *");
require('common/image.php');
require('common/pagination.php');
$image_dir='C:/xampp/htdocs/lqapp/admin/images/';
$baseurl2='http://localhost/lqapp/admin/';
$baseurlsite='http://localhost/lqapp/admin/';
//$cfile= basename(__FILE__, '.php'); ;
if(isset($_REQUEST['directory']) || isset($_REQUEST['parent']) ||  isset($_REQUEST['refresh']) ||  isset($_REQUEST['upload'])  ||  isset($_REQUEST['createfolder']) ||  isset($_REQUEST['delete']) )
{
	//
}
if(isset($_REQUEST['upload']))
{
	$json = array();

		

		// Make sure we have the correct directory
		if (isset($_REQUEST['directory'])) {
			$directory = rtrim($image_dir . '/catalog/'.str_replace(array('../', '..\\', '..'), '',  urldecode($_REQUEST['directory'])), '/');
			//echo $directory.'<br>';
		} else {
			$directory = $image_dir.'/catalog' ;
		}

		// Check its a directory
		if (!is_dir($directory)) {
			$json['error'] = 'Directory not exist';
		}

		if (!$json) {
			if (!empty($_FILES['file']['name']) && is_file($_FILES['file']['tmp_name'])) {
				// Sanitize the filename
				$filename = basename(html_entity_decode($_FILES['file']['name']));

				// Validate the filename length
				if ((strlen($filename) < 3) || (strlen($filename) > 255)) {
					$json['error'] = 'Filename must be a between 3 and 255!';
				}

				// Allowed file extension types
				$allowed = array(
					'jpg',
					'jpeg',
					'gif',
					'png'
				);

				if (!in_array(strtolower(substr(strrchr($filename, '.'), 1)), $allowed)) {
					$json['error'] = 'Incorrect file type';
				}

				// Allowed file mime types
				$allowed = array(
					'image/jpeg',
					'image/pjpeg',
					'image/png',
					'image/x-png',
					'image/gif'
				);

				if (!in_array($_FILES['file']['type'], $allowed)) {
					$json['error'] = 'Incorrect file type';
				}

				// Check to see if any PHP files are trying to be uploaded
				$content = file_get_contents($_FILES['file']['tmp_name']);

				if (preg_match('/\<\?php/i', $content)) {
					$json['error'] = 'Incorrect file type';
				}

				// Return any upload error
				if ($_FILES['file']['error'] != UPLOAD_ERR_OK) {
					$json['error'] = 'File could not be uploaded for an unknown reason!';
				}
			} else {
				$json['error'] = 'Error in uploading file';
			}
		}

		if (!$json) {
			move_uploaded_file($_FILES['file']['tmp_name'], $directory . '/' . $filename);

			$json['success'] = 'Successfully Uploaded!!!';
		}

		
		echo  json_encode($json);
		exit;
		
}
if(isset($_REQUEST['createfolder']))
{
	$json = array();

		
		// Make sure we have the correct directory
		if (isset($_REQUEST['directory'])) {
			$directory = rtrim($image_dir . '/catalog/'.str_replace(array('../', '..\\', '..'), '',  urldecode($_REQUEST['directory'])), '/');
		} else {
			$directory = $image_dir.'/catalog' ;
		}

		// Check its a directory
		if (!is_dir($directory)) {
			$json['error'] = 'Directory does not exist!';
		}

		if (!$json) {
			// Sanitize the folder name
			$folder = str_replace(array('../', '..\\', '..'), '', basename(html_entity_decode($_REQUEST['folder'])));

			// Validate the filename length
			if ((strlen($folder) < 3) || (strlen($folder) > 128)) {
				$json['error'] = ' Folder name must be a between 3 and 255!';
			}

			// Check if directory already exists or not
			if (is_dir($directory . '/' . $folder)) {
				$json['error'] = 'A file or directory with the same name already exists!';
			}
		}

		if (!$json) {
			mkdir($directory . '/' . $folder, 0777);
			chmod($directory . '/' . $folder, 0777);

			$json['success'] ='Directory Created';
		}

		
		echo json_encode($json);
		exit;
}
if(isset($_REQUEST['delete']))
{
			$json = array();

		
		if (isset($_REQUEST['path'])) {
			$paths = $_REQUEST['path'];
		} else {
			$paths = array();
		}

		// Loop through each path to run validations
		foreach ($paths as $path) {
			$path = rtrim($image_dir . str_replace(array('../', '..\\', '..'), '', $path), '/');

			// Check path exsists
			if ($path == $image_dir . 'catalog') {
				$json['error'] =  'You can not delete this directory!';

				break;
			}
		}

		if (!$json) {
			// Loop through each path
			foreach ($paths as $path) {
				$path = rtrim($image_dir . str_replace(array('../', '..\\', '..'), '', $path), '/');

				// If path is just a file delete it
				if (is_file($path)) {
					unlink($path);

				// If path is a directory beging deleting each file and sub folder
				} elseif (is_dir($path)) {
					$files = array();

					// Make path into an array
					$path = array($path . '*');

					// While the path array is still populated keep looping through
					while (count($path) != 0) {
						$next = array_shift($path);

						foreach (glob($next) as $file) {
							// If directory add to path array
							if (is_dir($file)) {
								$path[] = $file . '/*';
							}

							// Add the file to the files to be deleted array
							$files[] = $file;
						}
					}

					// Reverse sort the file array
					rsort($files);

					foreach ($files as $file) {
						// If file just delete
						if (is_file($file)) {
							unlink($file);

						// If directory use the remove directory function
						} elseif (is_dir($file)) {
							rmdir($file);
						}
					}
				}
			}

			$json['success'] = 'Successfully Deleted !!!';
		}

	echo json_encode($json);
		exit;
}
		if (isset($_REQUEST['filter_name'])) {
			$filter_name = rtrim(str_replace(array('../', '..\\', '..', '*'), '', $_REQUEST['filter_name']), '/');
		} else {
			$filter_name = null;
		}
		// Make sure we have the correct directory
		$directory='';
		if (isset($_REQUEST['directory'])) {
			$directory = rtrim($image_dir . '/catalog/'.str_replace(array('../', '..\\', '..'), '', $_REQUEST['directory']), '/');
			//echo $directory.'<br>';
		} else {
			$directory = $image_dir.'/catalog' ;
		}
		//echo $_REQUEST['directory'].'<br>';
		//print_r(explode('/',$_REQUEST['directory']));
//echo substr(dirname($directory),0 ,strpos($directory,$_REQUEST['directory'])).'<br>';
		if (isset($_REQUEST['page'])) {
			$page = $_REQUEST['page'];
		} else {
			$page = 1;
		}

		$data['images'] = array();

		

		// Get directories
		$directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);

		if (!$directories) {
			$directories = array();
		}

		// Get files
		$files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);

		if (!$files) {
			$files = array();
		}

		// Merge directories and files
		$images = array_merge($directories, $files);
//print_r($images);
		// Get total number of files and directories
		$image_total = count($images);

		// Split the array based on current page number and max number of items per page of 10
		$images = array_splice($images, ($page - 1) * 16, 16);
		
		$url = '';

				if (isset($_REQUEST['target'])) {
					$url .= '&target=' . $_REQUEST['target'];
				}

				if (isset($_REQUEST['thumb'])) {
					$url .= '&thumb=' . $_REQUEST['thumb'];
				}
				$imagesarr=array();
		foreach ($images as $image) {
			$name = str_split(basename($image), 14);

			if (is_dir($image)) {
				//echo dirname($image).'<br>';

				$imagesarr[] = array(
					'thumb' => '',
					'name'  => implode(' ', $name),
					'imagetype'  => 'directory',
					'path'  => substr($image, strlen($image_dir)),
					'href'  => $baseurl2. 'filemanager.php?directory=' . urlencode(substr($image, strlen($image_dir . '/catalog/'))) 
				);
				//echo $image.'<br>'.strlen($image_dir . 'catalog/').'<br>'.$image_dir . 'catalog/<br>';
				//echo substr($image, strlen($image_dir . '/catalog/')).'<br>';
				//print_r($imagesarr);
			} elseif (is_file($image)) {
				// Find which protocol to use to pass the full image link back
					//$server = $baseurl2;
				//echo $image;
				//print_r( pathinfo($image));
				
				$test= pathinfo($image);
				//echo '<br>';
				$dirname= substr($test['dirname'], strlen($image_dir.'/catalog/'));
				if(!empty($dirname))
					$dirname .='/';
				//echo $dirname.'<br>';
				$fileexp=explode(".",$test['basename']);
				$filename=$image_dir.'/cache/'.$dirname.$fileexp[0].'_100x100.'.$fileexp[1];
				$chkdir=$image_dir.'/cache/'.$dirname;
				$thumbimage=$baseurlsite.'images/cache/'.$dirname.$fileexp[0].'_100x100.'.$fileexp[1];
				//$cacheimage=$image_dir.'/cache/'.$dirname.$fileexp[0].'_100x100.'.$fileexp[1];
				
				if (!file_exists($filename)) {
					if (!file_exists($chkdir)) {
						mkdir($chkdir,0777);
					}
					$cimage = new Image($image); 
					//$cimage->load($image); 
					$cimage->resize(100,100); 
					$cimage->save($filename); 
					//echo "The file $filename not  exist<br>";
				} 
				//$cimage = new SimpleImage(); 
				//$cimage->load($image); 
				//$cimage->resize(100,100); 
				//$cimage->save($image.'_100x100.jpg'); 
				$imagesarr[] = array(
					'thumb' => $thumbimage,
					'name'  => implode(' ', $name),
					'imagetype'  => 'image',
					'path'  => substr($image, strlen($image_dir)),
					'href'  =>  substr($image, strlen($image_dir)+1)
				);
			}
		}
//print_r($images);
		if (isset($_REQUEST['directory'])) {
			$directory = urlencode($_REQUEST['directory']);
		} else {
			$directory = '';
		}

		if (isset($_REQUEST['filter_name'])) {
			$filter_name = $_REQUEST['filter_name'];
		} else {
			$filter_name = '';
		}

		// Return the target ID for the file manager to set the value
		if (isset($_REQUEST['target'])) {
			$target = $_REQUEST['target'];
		} else {
			$target = '';
		}

		// Return the thumbnail for the file manager to show a thumbnail
		if (isset($_REQUEST['thumb'])) {
			$thumb = $_REQUEST['thumb'];
		} else {
			$thumb = '';
		}

		// Parent
		$url = '';

		if (isset($_REQUEST['directory'])) {
			$pos = strrpos($_REQUEST['directory'], '/');

			if ($pos) {
				$url .= 'directory=' . urlencode(substr($_REQUEST['directory'], 0, $pos));
			}
			//echo $url;
		}
		/*
$path = $_REQUEST['directory'];
$point1= strripos($path, "/");
if(!empty($point1))
	echo $point1;
$filename =substr( $_REQUEST['directory'],0, strripos($path, "/"));
echo $filename; // "index.html"
*/
		$parent = $baseurl2. 'filemanager.php?parent=parent';
		
		if(!empty($url))
			$parent .= '&'.$url;
//echo $parent;
		// Refresh
		$url = '';

		if (isset($_REQUEST['directory'])) {
			$url .= '&directory=' . urlencode($_REQUEST['directory']);
		}

		

		$refresh = $baseurl2.'filemanager.php?refresh=refresh'. $url;

		$url = '';

		if (isset($_REQUEST['directory'])) {
			$url .= 'directory=' . urlencode($_REQUEST['directory']);
		}
	

		$pagination = new Pagination();
		$pagination->total = $image_total;
		$pagination->page = $page;
		$pagination->limit = 16;
		if(!empty($url))
			$pagination->url = $baseurl2.'filemanager.php?'. $url . '&page={page}';
		else
			$pagination->url = $baseurl2.'filemanager.php?'.'page={page}';

		$pagination = $pagination->render();
		if(isset($_REQUEST['directory']))
			$directory= urldecode($_REQUEST['directory']);
		else
			$directory='';
		if(isset($_REQUEST['directory']) || isset($_REQUEST['parent']) ||  isset($_REQUEST['refresh']) ||  isset($_REQUEST['page'])){
			echo fileimagerender($imagesarr,$pagination,$parent,$refresh,$directory);
			
		}
 function fileimagerender($imagesarr, $pagination,$parent,$refresh, $directory) {
	$output='';
	$output .= '<div class="row">
        <div class="col-sm-5"><span href=" '.$parent.'" data-toggle="tooltip" title="Parent" id="parent"style="cursor:pointer;" class="btn btn-default"><i class="fa fa-level-up"></i></span> <span href=" '.$refresh.'" data-toggle="tooltip" title="Refresh" style="cursor:pointer;" id="refresh" class="btn btn-default"><i class="fa fa-refresh"></i></span>
          <button type="button" data-toggle="tooltip" title="Upload Images" id="button-upload" class="btn btn-primary"><i class="fa fa-upload"></i></button>
          <button type="button" data-toggle="tooltip" title="New Folder" id="button-folder" class="btn btn-default"><i class="fa fa-folder"></i></button>
          <button type="button" data-toggle="tooltip" title="Delete" id="button-delete" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
        </div> 
		</div>
      <hr />';
	 foreach (array_chunk($imagesarr, 4) as $image) { 
      $output .= '<div class="row">';
         foreach ($image as $image) { 
		
        $output .= '<div class="col-sm-3 text-center">';
           if ($image['imagetype'] == 'directory') { 
          $output .= '<div class="text-center"><span thumb="'. $image['thumb'] .'" href="'. $image['href'].'" class="directory thumbnail" style="vertical-align: middle;color:#367fa9;cursor:pointer"><i class="fa fa-folder fa-5x"></i></span></div>
          <label>
            <input type="checkbox" name="path[]" value="'. $image['path'].'" />'.
             $image['name'].'</label>';
           } 
           if ($image['imagetype'] == 'image') { 
         $output .=' <span thumb="'. $image['thumb'].'" style="cursor:pointer;" href="'.$image['href'].'" class="thumbnail spanthumb"><img src="'. $image['thumb'].'" alt="'.  $image['name'].'" title="'. $image['name'].'" /></span>
          <label>
            <input type="checkbox" name="path[]" value="'. $image['path'].'" />
            '. $image['name'].'</label>';
           } 
        $output .=' </div>';
         } 
      $output .=' </div>';
      $output .=' <br />';
       } 
	   $output .= '<input type="hidden" value="'.$directory.'" id="dir">';
	   $output .=$pagination;
	 $output .=' </div>';
	   return $output;
}
?>