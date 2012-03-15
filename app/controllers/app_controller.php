<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class app_controller extends Controller
{
	public $data;
	
	public function __construct()
	{
		parent::__construct();	
		$this->data['name'] = 'Carlos';
	}
}
?>