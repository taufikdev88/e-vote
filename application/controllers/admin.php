<?php
class Admin extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','bcrypt'));
        $this->load->model('m_admin');
        
        if($this->session->userdata('anony')){
            redirect('dashboard');
        }
    }
    
    function index(){
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }
    
    function cek(){
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Masukkan Username dan Password dengan benar');
            redirect('admin');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            
            $row=$this->m_admin->cek($username);
            //$row=$row->row_array();
            if($this->bcrypt->check_password($password, $row['password'])){
                $this->session->set_userdata('anony', $username);
                redirect('dashboard');
            }else{
                $this->session->set_flashdata('message', 'Username dan Password salah');
                redirect('admin');
            }
        }
    }
    
//    function setPassword($info){
//        $password=$this->bcrypt->hash_password($info);
//        $this->m_admin->hash($password);
//        redirect('admin');
//    }
}