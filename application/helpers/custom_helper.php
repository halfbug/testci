<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function my_var_dump($string)
{
    $http_host = isset($_SERVER['HTTP_HOST']) ? true : false;
    $line_break = isset($_SERVER['HTTP_HOST']) ? "<br>" : "\n";
    $pre_tag_open = isset($_SERVER['HTTP_HOST']) ? "<pre>" : "\n";
    $pre_tag_close = isset($_SERVER['HTTP_HOST']) ? "</pre>" : "\n";

	if(is_array($string) or is_object($string))
	{
		echo $pre_tag_open;
		print_r($string);
		echo $pre_tag_close;
	}
	elseif(is_string($string))
	{
		echo $string.$line_break;
	}
	else
	{
		echo $pre_tag_open;
		var_dump($string);
		echo $pre_tag_close;
	}
}


function delete_file($path_and_filename)
{
	if(file_exists($path_and_filename))
	{
		if(is_file($path_and_filename))
		{
			if(unlink($path_and_filename))
			{
				return true;
			}
			else return false;
		}else return false;
	}else return false;
}

function isValidEmail($email)
{
	//return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email);
	
	if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 
	{
    	//$msg = 'email is not valid';
		return false;
	}
	else
	{
		return true;
	}
}

function isValidURL($url)
{
	return preg_match('|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url);
}
function addhttp($url) 
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}
function my_redirect($url,$target='')
{
	echo "<script>window.parent.location=\"".$url."\"</script>";
}

function display_success_message()
{
	if(isset($_SESSION['msg_success']))
	{
		$errors	=	array();
		$numarray	=	array();
		$strarray	=	array();
		$string ="";
		$string2 ="";
		if(is_array($_SESSION['msg_success']))
		{
			foreach($_SESSION['msg_success'] as $msgvalue)
			{
					$strarray[]	=	$msgvalue;
			}
			$string	.=	implode("<br>",$strarray);
		}
		else
		{
			$string	.=	$_SESSION['msg_success'];
		}

		unset($_SESSION['msg_success']);
		return "$string";
	}
	else
	{
		return "";
	}	
}
function display_error()
{
	if(isset($_SESSION['msg_error']))
	{
		$errors	=	array();
		$numarray	=	array();
		$strarray	=	array();
		$string ="";
		$string2 ="";
		if(is_array($_SESSION['msg_error']))
		{
			foreach($_SESSION['msg_error'] as $msgvalue)
			{
					$strarray[]	=	$msgvalue;
			}
			$string	.=	implode("<br>",$strarray);
		}
		else
		{
			$string	.=	$_SESSION['msg_error'];
		}

		unset($_SESSION['msg_error']);
		return "$string";
	}
	else
	{
		return "";
	}	
}


function resize_image2($url, $newWidth='', $newHeight='', $Base='')
{
	list($iw, $ih, $imageType) = getimagesize($url);
	$imageType = image_type_to_mime_type($imageType);
	
	switch($imageType)
	{
		case "image/gif":
			$image = imagecreatefromgif($url);
		break;
		
		case "image/pjpeg":
			$image = imagecreatefromjpeg($url);
		break;
		
		case "image/jpeg":
			$image = imagecreatefromjpeg($url);
		break;
		
		case "image/jpg":
			$image = imagecreatefromjpeg($url);
		break;
		
		case "image/png":
			$image = imagecreatefrompng($url);
		break;
		
		case "image/x-png":
			$image = imagecreatefrompng($url);
		break;
	}
	
	$orig_width = imagesx($image);
	$orig_height = imagesy($image);
	
	if($Base=='W')
	{
		$width = $newWidth;
		$height = (($orig_height * $newWidth) / $orig_width);
		$new_image = imagecreatetruecolor($newWidth, $height);
	}
	else if($Base=='H')
	{
		$width = (($orig_width * $newHeight) / $orig_height);
		$height = $newHeight;
		$new_image = imagecreatetruecolor($width, $newHeight);
	}

	// preserve transparency
	if($imageType == "image/x-png" or $imageType == "image/png" or $imageType == "image/gif"){
		imagecolortransparent($new_image, imagecolorallocatealpha($new_image, 0, 0, 0, 127));
		imagealphablending($new_image, false);
		imagesavealpha($new_image, true);
	}

	imagecopyresized($new_image, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
	
	switch($imageType)
	{
		case "image/gif":
			imagegif($new_image, $url);
		break;
		
		case "image/pjpeg":
			imagejpeg($new_image, $url, 100);
		break;
		
		case "image/jpeg":
			imagejpeg($new_image, $url, 100);
		break;
		
		case "image/jpg":
			imagejpeg($new_image, $url, 100); 
		break;
		
		case "image/png":
			imagepng($new_image, $url);
		break;
		
		case "image/x-png":
			imagepng($new_image, $url);
		break;
	}
		
		
	
}

//You do not need to alter these functions
function get_height($image)
{
	$size = getimagesize($image);
	$height = $size[1];
	return $height;
}

//You do not need to alter these functions
function get_width($image)
{
	$size = getimagesize($image);
	$width = $size[0];
	return $width;
}
