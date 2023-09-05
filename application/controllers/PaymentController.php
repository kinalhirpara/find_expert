<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'libraries/stripe/stripe-php/init.php';

class PaymentController extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->database(); // Initialize the database connection
		$this->load->library('email');
		\Stripe\Stripe::setApiKey('sk_test_51NlaHOGpD8ucXiKl65AzNdG1ZbIpY2NeMh7v3U5Q1tOVJDPuzMSdseSPcSZ0jGFI9nZA5CXfoxQNLarKkAV1J5ZL00kYF4mOVw');
	}

	public function index() {
//		$data['title'] = 'Stripe Payment Test';
//		$this->load->view('payment_form', $data);
//	}
//
//	public function initiatePayment() {
		// Handle payment form submission and initiate the payment
//		$amount = 1000; // Amount in cents
		$this->load->library('pagination');
		$this->load->library('session'); // Load session library
//		$amount = 1350;
		$amount = $this->input->post('amount');
		$product_info = $this->input->post('product_info');
		$customer_name = $this->input->post('customer_name');
		$customer_emial = $this->input->post('customer_email');
		$customer_mobile = $this->input->post('mobile_number');
		$customer_address = $this->input->post('customer_address');

		$description = 'Test Payment';

		try {
			$paymentIntent = \Stripe\PaymentIntent::create([
				'amount' => $amount,
				'currency' => 'usd',
				'description' => $description,
			]);

			$data['client_secret'] = $paymentIntent->client_secret;
			$data['status'] = "Success";
			$data['amount']=$amount;
			$data['txnid'] = "";
			///

			$this->db->join('worker','worker.worker_id=project_assignment.worker_id');
			$this->db->join('client','client.client_id=project_assignment.client_id');
			$this->db->join('project','project.project_id=project_assignment.project_id');
			$sql=$this->db->get_where('project_assignment',array('bid_id'=>$this->session->userdata('bid_id')));
			$rows=$sql->row_array();
			$assign_id=$rows['assign_id'];
			//echo '<pre>';print_r($rows);die;
			$worker_name=$rows['worker_name'];
			$client_name=$rows['client_name'];
			$p_title=$rows['project_title'];
			$txn_id=$this->input->post('txnid');
			$amt=$this->input->post('amount');
			$p_time=$this->input->post('addedon');
//			$status=$this->input->post('status');

			$w_arr=array(
				'assign_id'=>$assign_id,
				'client_name'=>$client_name,
				'project_title'=>$p_title,
				'txn_id'=>$txn_id,
				'payment_amt'=>$amt,
				'payment_time'=>$p_time,
				'status'=>"Success"
			);
			$this->db->where('assign_id',$assign_id);
			$this->db->update('project_assignment',array('status'=>1));
			$this->db->insert('w_payment_history',$w_arr);


			$saveArr=array();
//			if (empty($status)) {
//				redirect('Welcome');
//			}
			$status="success";
			$firstname = $this->input->post('firstname');
			$amount = $this->input->post('amount');
			$txnid = $this->input->post('txnid');
			$posted_hash = $this->input->post('hash');
			$key = $this->input->post('key');
			$productinfo = $this->input->post('productinfo');
			$email = $this->input->post('email');
			$salt = "4apvPnnsS0"; //  Your salt
			$add = $this->input->post('additionalCharges');
			If (isset($add)) {
				$additionalCharges = $this->input->post('additionalCharges');
				$retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			} else {

				$retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
			}
			$data['hash'] = hash("sha512", $retHashSeq);
			$data['amount'] = $amount;
			$data['txnid'] = $txnid;
			$data['posted_hash'] = $posted_hash;
			$data['status'] = $status;
			if($status == 'success'){
				redirect('admin/manage_payment/client_payment');
			}
			else{
				$this->load->view('failure', $data);
			}

			/// /
//			$this->load->view('success',$data);
//			$this->load->view('confirmation', $data);
		} catch (\Stripe\Exception\CardException $e) {
			// Handle card errors
			$data['amount']=$amount;
			$data['status'] = $e;
			$data['txnid'] = "";
			$this->load->view('failure', $data);
		} catch (Exception $e) {
			// Handle other errors
			$data['status'] = $e;
			$data['amount']=$amount;
			$data['txnid'] = "";
			$this->load->view('failure',$data);
		}
	}

	public function paymentSuccess() {
		// Handle successful payment, update your database, and show a success message
		$data['status'] = "Success";
		$data['amount']=$amount;
		$data['txnid'] = "";
		$this->load->view('success',$data);
	}

	public function paymentFailure() {
		$data['status'] = "Success";
		$data['amount']=$amount;
		$data['txnid'] = "";
		// Handle failed payment, log the error, and show an error message to the user
		$this->load->view('failure',$data);
	}
}
