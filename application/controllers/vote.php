<?php
class Vote extends CI_Controller{
    #code
    
    function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_peserta');
        
        if(!$this->session->userdata('username')){
            redirect('web');
        }
    }
    
    function index(){
        if(!$this->session->userdata('timeout')){
            redirect('vote/end');
        }
        if(!$this->session->userdata('vote')){
            redirect('vote/end');
        }
        
        $data['user']=$this->session->userdata('username');
        $data['timeout']=$this->session->userdata('timeout');
        $data['calon']=$this->m_peserta->calon()->result();
        $data['sesim']=$this->session->userdata('mm');
        $data['sesid']=$this->session->userdata('dd');
        
        $this->load->view('template/header');
        $this->load->view('web/vote', $data);
        $this->load->view('template/footer');
    }
    
    function proses(){
        $this->form_validation->set_rules('username','Pilihan','required|trim|xss_clean');
        $this->form_validation->set_rules('pilihan','Pilihan','required|trim|xss_clean');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Pilihan harus valid');
            redirect('vote');
        }else{
            $username=$this->input->post('username');
            $pilihan=$this->input->post('pilihan');
            $tanggal=date('Y-m-d');
            
            $info=array(
                'username'=>$username,
                'tanggal'=>$tanggal,
                'pilihan'=>$pilihan
            );
            
            try{
                $hasil=$this->m_peserta->proses($info);
                
                $this->session->set_flashdata('message','Berhasil pilih');
                $this->session->unset_userdata('vote');
                $this->session->unset_userdata('timeout');
                redirect('vote/end');
            }catch(Exception $e){
                redirect('vote/end');
            }
        }
    }
    
    function end(){
        $username=$this->session->userdata('username'); 
        $data['nama']=$this->m_peserta->lihat($username)->result();
        $this->load->view('template/header');
        $this->load->view('web/end',$data);
        $this->load->view('template/footer');
    }
    
    function logout(){
        $username=$this->session->userdata('username');
        $this->m_peserta->logout($username);
        $this->session->unset_userdata('username');
        redirect('web');
    }
    
//    function session(){
//        $username=$this->session->userdata('username');
//        $mm = $this->input->post('mm');
//        $dd = $this->input->post('dd');
//        $this->session->set_userdata('mm',$mm);
//        $this->session->set_userdata('dd',$dd);
//        
//        $waktu = $this->m_peserta->sesUp($mm, $dd, $username);
//        echo $this->session->userdata('mm').":".$this->session->userdata('dd');
//    }
}