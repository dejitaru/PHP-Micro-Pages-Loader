<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class example4 extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function index()
	{
		$this->data['var1']= 'Hello';
		$this->data['my_content'] = $this->load->view('examples/example4_view.php',$this->data,TRUE);
		$this->load->view('templates/layout.php',$this->data);
	}
}
?>