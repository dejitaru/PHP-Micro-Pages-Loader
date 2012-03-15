<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class example1 extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index()
	{
		$this->load->view('examples/example1_view.php');
	}
}
?>