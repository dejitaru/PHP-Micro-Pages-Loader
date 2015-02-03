<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class Main extends Base_controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index()
	{
		$this->load->view('index.php');
	}
}
?>