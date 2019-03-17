<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','bcrypt'));
        $this->load->model('m_admin');
        $this->load->helper('file');
        
        if(!$this->session->userdata('anony')){
            redirect('admin');
        }
    }
    
    function index(){
        $this->load->view('admin/template');
        $this->load->view('admin/admin');
        $this->load->view('admin/footer');
    }
    
    function update(){
        $path="assets/config/config.ini";
        $min=$this->input->post('start');
        $max=$this->input->post('stop');
        
        $regards="['WonxJowo-Team']\r\n";
        $txt1="\nmin = ".$min."\n";
        $txt2="\nmax = ".$max."\n";

        if($handle=read_file($path)){
            write_file($handle, $regards, 'wb');
            write_file($handle, $txt1, 'wb');
            write_file($handle, $txt2, 'wb');
        }else{
            $this->session->set_flashdata('message','Gagal mengubah');
        }
        redirect('dashboard');
    }
    
    function logout(){
        $this->session->unset_userdata('anony');
        redirect('web');
    }
    
    function reset(){
        $this->m_admin->drop("tbl_vote");
        redirect('dashboard');
    }
}
?>