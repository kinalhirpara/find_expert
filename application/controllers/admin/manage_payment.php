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
	function client_payment()
	{
		$this->db->select('c_payment_history.*,client.client_name,project_assignment.status');
		$this->db->join('project_assignment','project_assignment.assign_id=c_payment_history.assign_id');
		$this->db->join('client','client.client_id=project_assignment.client_id');
		$qry=$this->db->get('c_payment_history');
		$cres=$qry->result_array();

		$data['records']=$cres;
		
		$this->load->view('admin/client_payment_details',$data);
	}
	function worker_payment()
	{	
		$this->db->select('w_payment_history.*,worker.worker_name');
		$this->db->join('project_assignment','project_assignment.assign_id=w_payment_history.assign_id');
		$this->db->join('worker','worker.worker_id=project_assignment.worker_id');
		$qry=$this->db->get('w_payment_history');
		$wres=$qry->result_array();

		$data['records']=$wres;
		
		$this->load->view('admin/worker_payment_details',$data);
	}
	function pay_worker($id=0)
	{
		//echo $id;die;
		$qry=$this->db->get_where('project_assignment',array('assign_id'=>$id));
		$rs=$qry->row_array();
		redirect('welcome/worker_payment/'.$rs['bid_id']); 
	}
}

?>
