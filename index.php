<?php
require_once('./core/config/config.php')

$requested_url = $_SERVER['REQUEST_URI'];

include_once('/'.CORE_DIR.'/libraries/load.php');
include_once('/'.CORE_DIR.'/libraries/controller.php');
$superob = new controller();

if($requested_url =='/')
{
	$controller = DEFAULT_CONTROLLER;
	$method 	= DEFAULT_METHOD;
	include('./'.APP_DIR.'/controllers/'.$controller.'.php');
	$superob->$controller = new $controller;
	$superob->$controller->$method();
}
else
{

	$new_requested_url = rtrim($requested_url, '/');
	$segments= explode('/',$new_requested_url);
	$controller = $segments[1];
	$method = isset($segments[2])?$segments[2]:DEFAULT_METHOD;	
	
	if(file_exists('./'.APP_DIR.'/controllers/'.$controller.'.php'))
	{
		include('./'.APP_DIR.'/controllers/'.$controller.'.php');

	}
	else
	{
		load :: view('errors/404.php');
		exit;
	}

	$superob->$controller = new $controller;	
	
	if(method_exists($superob->$controller,$method))
		{
			if(count($segments)>1)
			{
				foreach($segments as $key=>$value)
				{
					$_{$value} = $value;	
				}
				
			}
			$superob->$controller->$method();	
		}
	else
	{

		$superob->load->view('errors/404.php');
	}			
}

?>

