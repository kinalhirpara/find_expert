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
				$review=$this->input->post('wr_title');
				$star=$this->input->post('star');
				$saveArr=array(
					'wr_title'=>$review,
					'wr_star'=>$star,
					'assign_id'=>$id
				);
				$this->db->insert('w_review',$saveArr);
				redirect('client/manage_payment/show_payment_details');
			}
			$this->load->view('client/worker_review_form');
		}
	}
?>
