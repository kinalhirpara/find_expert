<?php

class manage_inquiry extends CI_Controller
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
            
        if($this->input->post())
        {
            $this->form_validation->set_rules('in_name','Full Name','required');
            $this->form_validation->set_rules('in_email','Email','required');
            $this->form_validation->set_rules('in_subject','Subject','required');
            $this->form_validation->set_rules('in_message','Message','required');
            if($this->form_validation->run()==FALSE)
            {
             //echo validation_errors();
            }
            else
            {
                $name=$this->input->post('in_name');
                $email=$this->input->post('in_email');
                $msg=$this->input->post('in_message');
                $subject=$this->input->post('in_subject');

                $saveArr=array(
                    'in_name'=>$name,
                    'in_email'=>$email,
                    'in_subject'=>$subject,
                    'in_msg'=>$msg
                );
                $sql=$this->db->insert('inquiry',$saveArr);
                if($sql)
                {
                    $this->session->set_flashdata('success','Your messsage sent');
                }
            }
        }
        $this->load->view('visitor/inquiry_form',$data);
    }
}

?>
