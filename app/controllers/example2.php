<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class example2 extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	
	public function index()
	{
		$this->data['var1'] = 'Hello';
		$this->data['var2'] = 'World!';
		$this->load->view('examples/example2_view.php',$this->data);
	}

}
?>