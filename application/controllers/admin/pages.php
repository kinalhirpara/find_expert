<?php 

class pages extends CI_Controller
{    public function __construct() {
             parent::__construct();
             $this->load->library('form_validation');
$this->load->helper('url');
$this->load->library('pagination');
$this->load->library('session');
$this->load->database(); // Initialize the database connection
$this->load->library('email');
         }
	function admin_details()
	{
		$this->load->view('admin/admin_details');
	}
	public function index()
	{
		$this->load->view('admin/authentication-login');
	}
	function category_form()
	{
		$this->load->view('admin/category_form');
	}
	function category_details()
	{
		$this->load->view('admin/category_details');
	}

	function admin_form()
	{
		$this->load->view('admin/admin_form');
	}
}

?>
