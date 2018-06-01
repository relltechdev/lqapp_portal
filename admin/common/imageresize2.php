<?php
require('common/SimpleImage.php');

function resize2($fileimage, $width, $height) {
	//echo 'inside resiez'.$fileimage.'<br>';
	$dirimage='C:/xampp/htdocs/lqapp/admin/images/';
	

	
	$image2=$dirimage.'/'.$fileimage;
		$test= pathinfo($fileimage);
				//echo '<br>';
				//print_r($test);
				//echo substr($test['dirname'], strlen('catalog/')).'- sub';
				$dirname= substr($test['dirname'], strlen('catalog/'));
				//echo 'directory-'.$dirname;
				if(!empty($dirname))
					$dirname .='/';
				//echo 'next='.$dirname.'<br>';
				$fileexp=explode(".",$test['basename']);
				$filename=$dirimage.'/cache/'.$dirname.$fileexp[0].'_'.$width.'x'.$height.'.'.$fileexp[1];
				//echo $filename;
				$chkdir=$dirimage.'/cache/'.$dirname;
				
				//$cacheimage=$dirimage.'/cache/'.$dirname.$fileexp[0].'_'.$width.'x'.$height.'.'.$fileexp[1];
				if (!file_exists($filename)) {
					if (!file_exists($chkdir)) {
						mkdir($chkdir,0777);
					}
					$image = new SimpleImage(); 
					$image->load($image2); 
					$image->resize($width,$height); 
					$image->save($filename); 
					
				}
}