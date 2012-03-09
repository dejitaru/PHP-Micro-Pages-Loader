<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class galeria extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index()
	{
		$this->load->view('galeria/index.php');
		$this->load->view('galeria/index.php');
	}
	
	public function agregar()
	{
		$vars['hola'] = 'hola';
		$this->load->view('galeria/agregar.php',$vars);
	}
}
?>