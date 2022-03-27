<?php
require_once('./app/config/config.php');
require_once('./'.CORE_DIR.'/libraries/load.php');
require_once('./'.CORE_DIR.'/libraries/controller.php');
if(USE_COMPOSER)
{
	require_once COMPOSER_PATH.'/autoload.php';
}


$requested_url = $_SERVER['REQUEST_URI'];

if(file_exists('./'.APP_DIR.'/controllers/base_controller.php'))
{
	include_once('./'.APP_DIR.'/controllers/base_controller.php');
	$superob = new base_controller();
}
else
{
	$superob = new controller();
}


if($requested_url =='/')
{
	$controller = DEFAULT_CONTROLLER;
	$method 	= DEFAULT_METHOD;
	include('./'.APP_DIR.'/controllers/'.$controller.'.php');
	$superob->$controller = new $controller;
	if(USE_DB)
	{
		require_once('./'.CORE_DIR.'/NotORM/NotORM.php');
		$pdo = new PDO('mysql:host=' . DBHOST . ';dbname='.DBNAME , DBUSER , DBPASSWORD);
		$superob->db = new NotORM($pdo);
	}
	if( method_exists( $superob->$controller,$method ) )
	{
		$superob->$controller->$method();
	}
	else
	{
		echo 'Method '.$method.'does not exists';
	}
}
else
{
	$new_requested_url = rtrim($requested_url, '/');
	$segments= explode('/',$new_requested_url);
	$controller = $segments[1];
	$method = isset($segments[2])?$segments[2]:DEFAULT_METHOD;

	//check for static pages
	if (USE_STATIC_PAGES && $controller==STATIC_PAGES_SUFIX)
	{
		load :: view('pages/'.$method.'.php');
	}
	else
	{
		//else look for controller/method lo load
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

		if(USE_DB)
		{
			require_once('./'.CORE_DIR.'/NotORM/NotORM.php');
			$pdo = new PDO('mysqli:host=' . DBHOST . ';dbname='.DBNAME , DBUSER , DBPASSWORD);
			$superob->$controller->db = new NotORM($pdo);
		}


		if(method_exists($superob->$controller,$method))
			{
				if(count($segments)>1)
				{
					foreach($segments as $key=>$value)
					{
						$_[$value] = $value;
					}
				}
				$superob->$controller->$method();
			}
		else
		{
			$debug['method'] = $method;
			$superob->load->view('errors/method-not-found.php', $debug);
		}

	}





}

?>

