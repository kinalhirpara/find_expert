<?php
	class manage_portfolio extends CI_Controller
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

		function view_portfolio($id=0)
		{ 
			$this->db->where('worker_id',$id);
			$sql=$this->db->get('portfolio');
			$rows=$sql->result_array();
			$data['precords']=$rows;
			$this->db->where('worker_id',$id);
			$sql=$this->db->get('education');
			$rows=$sql->result_array();
			$data['edrecords']=$rows;
			$this->db->where('worker_id',$id);
			$sql=$this->db->get('experience');
			$rows=$sql->result_array();
			$data['exrecords']=$rows;
			$this->session->set_flashdata('wid',$id);
			$this->load->view('admin/portfolio_details',$data);
		}
	
		function portfolio_change_status($id=0,$status=0)
		{	
			$wid=$this->session->flashdata('wid');

			$this->db->where('portfolio_id',$id);
			$this->db->update('portfolio',array('status'=>$status));

			redirect('admin/manage_portfolio/view_portfolio/'.$wid);
		}
		function education_change_status($id=0,$status=0)
		{
			$wid=$this->session->flashdata('wid');
			$this->db->where('education_id',$id);
			$this->db->update('education',array('status'=>$status));

			redirect('admin/manage_portfolio/view_portfolio/'.$wid);
		}
		function experience_change_status($id=0,$status=0)
		{
			$wid=$this->session->flashdata('wid');
			$this->db->where('experience_id',$id);
			$this->db->update('experience',array('status'=>$status));

			redirect('admin/manage_portfolio/view_portfolio/'.$wid);
		}
	}
?>
