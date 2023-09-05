<?php		
	class manage_worker extends CI_Controller
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
		function show_worker($id=0)
		{

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			
			$sql=$this->db->get_where('worker',array('worker_id'=>$id));
			$res=$sql->row_array();

			$data['record']=$res;
			//print_r($res);die;

			$this->load->view('visitor/worker_details',$data);	
		}
	}

?>
