<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {
 public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
$this->load->helper('url');
$this->load->library('pagination');
$this->load->library('session');
$this->load->database(); // Initialize the database connection
$this->load->library('email'); // Load the URL Helper
    }
	
	public function index()
	{
		$this->load->view('worker/dashboard');	
	}
}
