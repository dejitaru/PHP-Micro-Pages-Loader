<?php
class contacto extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index()
	{
		$this->vars['saludo']= 'hola';
		$this->vars['saludo2']= 'mundo';
		
		$this->load->view('contacto/index.php',$vars);
	}
	

}
?>