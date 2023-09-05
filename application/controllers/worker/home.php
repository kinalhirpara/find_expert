<?php
	
	class home extends CI_Controller
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
		function index()
		{
			
		if(!$this->session->userdata('worker_id')){
				redirect('worker/login/index');
			}

			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$sql=$this->db->get('bid');
			$data['b_count']=$sql->num_rows();
			
			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$this->db->where('status',1);
			$sql=$this->db->get('bid');
			$data['pa_count']=$sql->num_rows();

			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$this->db->where('status',0);
			$sql=$this->db->get('bid');
			$data['pending_count']=$sql->num_rows();

			$this->db->where('worker_id',$this->session->userdata('worker_id'));
			$this->db->where('status',2);
			$sql=$this->db->get('bid');
			$data['disapproved_count']=$sql->num_rows();
			$this->load->view('worker/dashboard',$data);
		}
	}
?>
