<?php 

class manage_blog extends CI_Controller
{                public function __construct() {
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
    	$this->load->model('visitor/getcat_mdl');
			$data['cat']=$this->getcat_mdl->getcat();
			
        $sql=$this->db->get('blog');
        $rows=$sql->result_array(); 
        $data['blog']=$rows;
        $this->load->view('visitor/blog_details',$data);
//         $this->load->view('visitor/blog_details',$data);
    }
}

?>
