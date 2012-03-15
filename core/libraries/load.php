<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');
class load{
	public function __construct()
	{
		
	}
	public static function view($view='',$vars=NULL,$return=FALSE)
	{
		if(file_exists('./'.APP_DIR.'/views/'.$view))
		{
			if(is_array($vars))
			{
				foreach($vars as $key=>$value)
				{
					$$key = $value;
				}			
			}		
			if($return)
			{
				ob_start();
				include('./'.APP_DIR.'/views/'.$view);
				$return_file = ob_get_contents();
				ob_end_clean();
				return $return_file;
			}
			else
			{
				include('./'.APP_DIR.'/views/'.$view);
			}				
		}
		else
		{
			echo 'View: '.$view.' not found';
			exit;
		}

	}
}
?>