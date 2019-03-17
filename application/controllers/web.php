<?php
class Web extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('m_peserta','m_suara'));
        if($this->session->userdata('username')){
            redirect('vote');
        }
    }
    
    function index(){
        $param['tanggal'][0]='2018-02-28';
        $param['tanggal'][1]='2018-03-01';
        $param['jumlah'][0]=$this->m_suara->dataSingle('tanggal',$param['tanggal'][0])->num_rows();
        $param['jumlah'][1]=$this->m_suara->dataSingle('tanggal',$param['tanggal'][1])->num_rows();
        $param['total']=$this->m_suara->dataSingle('tanggal',date('Y-m-d'))->num_rows();
        $param['today']=date('Y-m-d');

        $this->load->view('template/header');
        $this->load->view('web/index',$param);
        $this->load->view('template/footer');
    }
    
    function proses(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim|xss_clean');
        $this->form_validation->set_rules('password','Password','required|trim|xss_clean');
        $this->form_validation->set_rules('ttl','Tanggal Lahir','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $ttl=$this->input->post('ttl');
            
            $cek=$this->m_peserta->cek($username,$password,$ttl);
            if($cek->num_rows()>0){
                $timeout=$this->m_peserta->ceklog($username);
                $data=array(
                    'username'=>$username,
                    'vote'=>'true',
                    'timeout'=>$timeout
                );
                $this->session->set_userdata($data);
                redirect('vote');
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web');
            }
        }
    }
}