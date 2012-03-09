<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');
class main extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function index()
	{
		$this->load->view('main/index.php');
	}
}
?>