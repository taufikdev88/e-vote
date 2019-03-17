<?php
class Suara extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model('m_suara');
        
        if(!$this->session->userdata('anony')){
            redirect('admin');
        }
    }
    
    function index(){
        $tanggal1='2018-02-28';
        $tanggal2='2018-03-1';
        
        $get=$this->m_suara->dataCalon()->result();
        $i=0;
        $data['tanggal'][0]=$tanggal1;
        $data['tanggal'][1]=$tanggal2;
        foreach($get as $g):
            $data['id'][$i]=$g->id;
            $data['nama'][$i]=$g->nama;
            $data['foto'][$i]=$g->foto;
        
            $data['total'][$i]=$this->m_suara->dataTotal($g->id);
            $data['hari1'][$i]=$this->m_suara->dataTanggal($g->id, $tanggal1);
            $data['hari2'][$i]=$this->m_suara->dataTanggal($g->id, $tanggal2);
        $i++;
        endforeach;
        
        $data['jumlah']=$this->m_suara->totalSuara();
        
        $this->load->view('suara/final',$data);
        $this->load->view('admin/footer');
    }
    
    function mine(){
        $param['anggota']=$this->m_suara->golput()->result();

        $this->load->view('admin/template');
        $this->load->view('suara/notvote',$param);
        $this->load->view('admin/footer');
    }
}
?>