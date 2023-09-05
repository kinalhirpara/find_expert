<?php 
	
class manage_payment extends CI_Controller
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
	function worker_payment()
	{	
		$this->db->select('w_payment_history.*,worker.worker_name');
		$this->db->join('project_assignment','project_assignment.assign_id=w_payment_history.assign_id');
		$this->db->join('worker','worker.worker_id=project_assignment.worker_id');
		$qry=$this->db->get('w_payment_history');
		$wres=$qry->result_array();

		$data['records']=$wres;
		
		$this->load->view('worker/payment_details',$data);
	}
}

?>
