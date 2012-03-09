<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');
class load{
	public function __construct()
	{
		
	}
	public static function view($view='',$vars=NULL)
	{
		if(is_array($vars))
		{
			foreach($vars as $key=>$value)
			{
				$$key = $value;
			}			
		}

		
		include('./'.APP_DIR.'/views/'.$view);
	}
}
?>