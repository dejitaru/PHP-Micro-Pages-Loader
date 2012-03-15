<?php
if (!defined('BASEPATH')) exit('Direct access not allowed');

class example3 extends Controller
{
	public function __construct()
	{
		parent::__construct();	
	}
	public function index()
	{
		$this->data['my_content'] = $this->load->view('examples/example3_view.php',$this->data,TRUE);
		$this->load->view('templates/layout.php',$this->data);
	}
}
?>