<?php
require('common/image.php');

function resize($fileimage, $width, $height) {
	
	$image2=DIR_IMAGE.'/'.$fileimage;
		$test= pathinfo($fileimage);
				//echo '<br>';
				$dirname= substr($test['dirname'], strlen('catalog/'));
				if(!empty($dirname))
					$dirname .='/';
				//echo $dirname.'<br>';
				$fileexp=explode(".",$test['basename']);
				$filename=DIR_IMAGE.'/cache/'.$dirname.$fileexp[0].'_'.$width.'x'.$height.'.'.$fileexp[1];
				$chkdir=DIR_IMAGE.'/cache/'.$dirname;
			//	echo $filename;
				//$cacheimage=DIR_IMAGE.'/cache/'.$dirname.$fileexp[0].'_'.$width.'x'.$height.'.'.$fileexp[1];
				if (!file_exists($filename)) {
					if (!file_exists($chkdir)) {
						mkdir($chkdir,0777);
					}
					
					$cimage = new Image($image2); 
					//$cimage->load($image); 
					$cimage->resize($width,$height); 
					$cimage->save($filename); 
					//echo "The file $filename not  exist<br>";
				}
}