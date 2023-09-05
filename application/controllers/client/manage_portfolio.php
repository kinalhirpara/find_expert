<?php

class manage_portfolio extends CI_Controller
{            public function __construct() {
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
			$this->session->set_flashdata('wid',$id);	
			$sq=$this->db->get_where('worker',array('worker_id'=>$id));
			$rows=$sq->row_array();
			$data['wrecord']=$rows;
			$qry=$this->db->get_where('portfolio',array('worker_id'=>$id));
			$rows=$qry->row_array();
			$data['precord']=$rows;
			$qry=$this->db->get_where('education',array('worker_id'=>$id));
			$rows=$qry->row_array();
			$data['edrecord']=$rows;
			$qry=$this->db->get_where('experience',array('worker_id'=>$id));
			$rows=$qry->row_array();
			$data['exrecord']=$rows;
			$this->load->view('client/portfolio_details',$data);
		}
}
?>
