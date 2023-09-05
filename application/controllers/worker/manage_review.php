<?php
	
	class manage_review extends CI_Controller
	{
	public function __construct() {
            parent::__construct();
            $this->load->library('form_validation');
$this->load->helper('url');
$this->load->library('pagination');
$this->load->library('session');
$this->load->database(); // Initialize the database connection
$this->load->library('email');
        }
		function index($id=0)
		{
			if($this->input->post())
			{
				$review=$this->input->post('cr_title');
				$star=$this->input->post('star');
				$saveArr=array(
					'cr_title'=>$review,
					'cr_star'=>$star,
					'assign_id'=>$id
				);
				$this->db->insert('c_review',$saveArr);
				redirect('worker/manage_payment/worker_payment');
			}
			$this->load->view('worker/client_review_form');
		}
	}
?>
