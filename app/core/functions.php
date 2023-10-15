<?php 

function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
} 

function set_value($key)
{

	if(!empty($_POST[$key]))
	{
		return $_POST[$key];
	}

	return '';
}
 
function redirect($link)
{
	header("Location: ". ROOT."/".$link);
	die;
}


function message($msg = '',$erase = false) 
{
	if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}else{
		if(!empty($_SESSION['message']))
		{
			$msg = $_SESSION['message'];
			if($erase){
				unset($_SESSION['message']);  
			}
			return $msg;
		}
	}
	return false;
} 

function getHourDiffer($startT) 
{
	$start = strtotime($startT);
	//$startTT = date("Y-m-d H:i");
	$endT = strtotime(date("Y-m-d H:i"));
    $diff = $endT - $start;
    $hours = $diff / ( 60 * 60 );
	return $hours;
}
   