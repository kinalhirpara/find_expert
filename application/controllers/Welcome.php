<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public $db; // Declare the property

	public function __construct()
	{
		parent::__construct();
		$this->load->database(); // Initialize the database connection
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->database(); // Initialize the database connection
		$this->load->library('email'); // Load the URL Helper


//$this->db = $this->load->database('findexpert',true); // Store the connection in the property
		$query = $this->db->get('worker');
		$result = $query->result(); // Get results as an array of objects

	}

	public function worker_payment($id = 0)
	{
		$this->load->library('pagination');
		$this->load->library('session'); // Load session library
		$this->db->join('worker', 'worker.worker_id=bid.worker_id');
		$this->db->join('project', 'project.project_id=bid.project_id');
		$this->db->where('bid_id', $id);
		$sql = $this->db->get('bid');
		$res = $sql->row_array();

		$this->session->set_userdata('bid_id', $id);

		//echo '<pre>';print_r($data['record']);die;
		$budget = ($res['budget'] - ($res['budget'] * 10 / 100));
		//echo $budget;die;

		$rs = array(
			'budget' => $budget,
			'project_title' => $res['project_title'],
			'mobileno' => $res['mobileno'],
			'worker_email' => $res['worker_email'],
			'worker_name' => $res['worker_name']
		);
		$data['record'] = $rs;
		$this->db->join('country', 'country.country_id=worker.country_id');
		$this->db->join('city', 'city.city_id=worker.city_id');
		$this->db->join('state', 'state.state_id=worker.state_id');
		$qry = $this->db->get_where('worker', array('worker_id' => $res['worker_id']));
		$row = $qry->row_array();
		$data['address'] = $row;
		//echo '<pre>';print_r($row);die;
		$this->load->view('worker_product_form', $data);
	}

	public function index($id = 0)
	{
		$this->load->library('pagination');
		$this->load->library('session'); // Load session library
		$this->session->set_userdata('client', 'y');
		$this->db->join('worker', 'worker.worker_id=bid.worker_id');
		$this->db->join('project', 'project.project_id=bid.project_id');
		$this->db->where('bid_id', $id);
		$sql = $this->db->get('bid');
		$res = $sql->row_array();
		$data['record'] = $res;
		$this->session->set_userdata('bid_id', $id);

		$this->db->join('country', 'country.country_id=worker.country_id');
		$this->db->join('city', 'city.city_id=worker.city_id');
		$this->db->join('state', 'state.state_id=worker.state_id');
		$qry = $this->db->get_where('worker', array('worker_id' => $res['worker_id']));
		$row = $qry->row_array();
		$data['address'] = $row;

//		http://localhost/FindExpert/index.php/admin/login/index
		//echo '<pre>';print_r($row);die;
// 		$this->load->view('admin/authentication-login.php',$data);
// 		$this->load->view('client/authentication-login.php',$data);
// 		$this->load->view('visitor/login_form.php',$data);
		///
//		$this->load->model('visitor/getcat_mdl');
//		$data['cat'] = $this->getcat_mdl->getcat();
//		$this->load->model('visitor/getcat_mdl');
//		$data['records'] = $this->getcat_mdl->get_project();
		///
		$sql=$this->db->get('worker');
		$data['w_count']=$sql->num_rows();
		$sql=$this->db->get('client');
		$data['c_count']=$sql->num_rows();

		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();

		$sql=$this->db->get('project');
		$data['pa_count']=$sql->num_rows();
		$this->db->where('client_accept',0);
		$sql=$this->db->get('project');
		$data['avail_project']=$sql->num_rows();

		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();

		$this->load->model('visitor/getcat_mdl');
		$data['records']=$this->getcat_mdl->get_project();

		$this->db->select('cat_id, COUNT(cat_id) as total');
		$this->db->group_by('cat_id');
		$q=$this->db->get('project');
		$total=$q->result_array();
		$data['cnt']=$total;
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();

		/*blog*/
		$this->load->model('visitor/getcat_mdl');
		$data['cat']=$this->getcat_mdl->getcat();

		$sql=$this->db->get('blog');
		$rows=$sql->result_array();
		$data['blog']=$rows;

///
		$this->load->view('visitor/dashboard.php', $data);
		//$this->session->set_userdata('from_client','no');


	}

	public function check()
	{
		$this->load->library('pagination');
		$this->load->library('session'); // Load session library
		$amount = $this->input->post('payble_amount');
		$product_info = $this->input->post('product_info');
		$customer_name = $this->input->post('customer_name');
		$customer_emial = $this->input->post('customer_email');
		$customer_mobile = $this->input->post('mobile_number');
		$customer_address = $this->input->post('customer_address');

		//payumoney details


		$MERCHANT_KEY = "JKIFIztb"; //change  merchant with yours
		$SALT = "4apvPnnsS0";  //change salt with yours

		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		//optional udf values
		$udf1 = '';
		$udf2 = '';
		$udf3 = '';
		$udf4 = '';
		$udf5 = '';

		$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
		$hash = strtolower(hash('sha512', $hashstring));

		$success = site_url() . '/Status';
		$fail = site_url() . '/Status';
		$cancel = site_url() . '/Status';


		$data = array(
			'mkey' => $MERCHANT_KEY,
			'tid' => $txnid,
			'hash' => $hash,
			'amount' => $amount,
			'name' => $customer_name,
			'productinfo' => $product_info,
			'mailid' => $customer_emial,
			'phoneno' => $customer_mobile,
			'address' => $customer_address,
			'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
			'sucess' => $success,
			'failure' => $fail,
			'cancel' => $cancel
		);
		$this->load->view('confirmation', $data);

	}

	public function check_worker()
	{
		$this->load->library('pagination');
		$this->load->library('session'); // Load session library
		$amount = $this->input->post('payble_amount');
		$product_info = $this->input->post('product_info');
		$customer_name = $this->input->post('customer_name');
		$customer_emial = $this->input->post('customer_email');
		$customer_mobile = $this->input->post('mobile_number');
		$customer_address = $this->input->post('customer_address');

		//payumoney details


		$MERCHANT_KEY = "JKIFIztb"; //change  merchant with yours
		$SALT = "4apvPnnsS0";  //change salt with yours

		$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		//optional udf values
		$udf1 = '';
		$udf2 = '';
		$udf3 = '';
		$udf4 = '';
		$udf5 = '';

		$hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
		$hash = strtolower(hash('sha512', $hashstring));

		$success = site_url() . '/worker_status';
		$fail = site_url() . '/worker_status';
		$cancel = site_url() . '/worker_status';


		$data = array(
			'mkey' => $MERCHANT_KEY,
			'tid' => $txnid,
			'hash' => $hash,
			'amount' => $amount,
			'name' => $customer_name,
			'productinfo' => $product_info,
			'mailid' => $customer_emial,
			'phoneno' => $customer_mobile,
			'address' => $customer_address,
			'action' => "https://sandboxsecure.payu.in", //for live change action  https://secure.payu.in
			'sucess' => $success,
			'failure' => $fail,
			'cancel' => $cancel
		);
		$this->load->view('confirmation', $data);

	}

	public function help()
	{
		$this->load->library('pagination');
		$this->load->library('session'); // Load session library
		$this->load->view('help');
	}
}
