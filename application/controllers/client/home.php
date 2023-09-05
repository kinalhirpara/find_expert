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
			
		if(!$this->session->userdata('client_id')){
				redirect('client/login/index');
			}
			$sql=$this->db->get('worker');
			$data['w_count']=$sql->num_rows();
			
			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status',1);
			$sql=$this->db->get('project');
			$data['pa_count']=$sql->num_rows();

			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status',0);
			$sql=$this->db->get('project');
			$data['pending_count']=$sql->num_rows();

			$this->db->where('client_id',$this->session->userdata('client_id'));
			$this->db->where('status',2);
			$sql=$this->db->get('project');
			$data['disapproved_count']=$sql->num_rows();
			
			$this->load->view('client/dashboard',$data);
		}
	}
?>
