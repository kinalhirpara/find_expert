<?php		
	class manage_client extends CI_Controller
	{               public function __construct() {
                            parent::__construct();
                            $this->load->library('form_validation');
$this->load->helper('url');
$this->load->library('pagination');
$this->load->library('session');
$this->load->database(); // Initialize the database connection
$this->load->library('email');
                        }
		function show_client($id=0)
		{

			$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			
			$this->db->join('city','city.city_id=client.city_id');
			$this->db->join('state','state.state_id=client.state_id');
			$this->db->join('country','country.country_id=client.country_id');
			$sql=$this->db->get_where('client',array('client_id'=>$id));
			$rs=$sql->row_array();
			$data['record']=$rs;
			//print_r($res);die;

			$this->load->view('visitor/client_details',$data);	
		}
	}

?>
