<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class example5 extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function index()
	{
		$this->load->view('examples/example5_view.php');
		$this->load->view('examples/example5_view.php');
		$this->load->view('examples/example5_view.php');		
	}
}
?>