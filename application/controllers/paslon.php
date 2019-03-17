<?php
class Paslon extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','bcrypt','upload'));
        $this->load->model('m_paslon');
        $this->load->helper('file');
        
        if(!$this->session->userdata('anony')){
            redirect('admin');
        }
    }
    
    function index(){
        $data['message']="";
        $data['anggota']=$this->m_paslon->semua()->result();
        
        $this->load->view('admin/template');
        $this->load->view('paslon/paslon.php',$data);
        $this->load->view('admin/footer');
    }
    
    function tambah(){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $nama=$this->input->post('nama');
            $cek=$this->m_paslon->cek($nama)->num_rows();
            if($cek>0){
                $data['message']="<div class='alert alert-warning'>Nama sudah digunakan</div>";
                $this->load->view('admin/template');
                $this->load->view('paslon/paslon', $data);
                $this->load->view('admin/footer');
            }else{
                $config['upload_path']='./assets/img/paslon/';
		        $config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG';
                $config['max_size'] = "10000";
                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('foto')){
                    $foto="";
                    $foro=$this->upload->error;
                }else{
                    $foto=$this->upload->file_name;
                }
                
                $no=$this->m_paslon->getNo();
                $no+=1;
                
                $info=array(
                    'id'=>$no,
                    'nama'=>$nama,
                    'foto'=>$foto
                );
                
                $this->m_paslon->tambah($info);
                $this->session->set_flashdata('message',"<div class='alert alert-success'>Data Berhasil ditambahkan</div>");
                redirect('paslon');
            }
        }else{
            $data['message']="<div class='alert alert-warning'>Isi data dengan benar</div>";
            $this->load->view('admin/template');
            $this->load->view('paslon/paslon',$data);
            $this->load->view('admin/footer');
        }
    }
        
    function edit($username){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $nama=$this->input->post('nama');
            $cek=$this->m_paslon->cek($nama)->num_rows();
            if($cek>0){
                $data['message']="<div class='alert alert-warning'>Nama sudah digunakan</div>";
                $this->load->view('admin/template');
                $this->load->view('paslon/paslon.php', $data);
            }else{
                $config['upload_path']='./assets/img/paslon/';
		        $config['allowed_types'] = 'jpg|png|jpeg|JPEG|JPG';
                $id=$this->input->post('id');
                                
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('foto')){
                    $foto=$this->m_paslon->getFoto($id);
                }else{
                    $fo=$this->m_paslon->getFoto($id);
                    unlink("./assets/img/paslon/".$fo);
                
                    $foto=$this->upload->file_name;
                }
                
                $info=array(
                    'nama'=>$nama,
                    'foto'=>$foto
                );
                
                $this->m_paslon->edit($id,$info);
                $this->session->set_flashdata('message',"<div class='alert alert-success'>Data Berhasil diubah</div>");
                redirect('paslon/edit/'.$id);
            }
        }else{
            $data['a']=$this->m_paslon->cek($username)->row_array();
            $data['message']="";
            $this->load->view('admin/template');
            $this->load->view('paslon/edit',$data);
            $this->load->view('admin/footer');
        }
    }
        
    function del($id,$value){
        switch($value){
            case "true":
                $foto=$this->m_paslon->getFoto($id);
                unlink("./assets/img/paslon/".$foto);
                
                $this->m_paslon->hapus($id);
                $this->session->set_flashdata('message',"<div class='alert alert-success'>Data Berhasil dihapus</div>");
                redirect('paslon/index');
                break;
            case "false":
                $this->load->view('paslon/index');
                break;
        }
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('nama','Nama Terang','required|max_length[30]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}
?>