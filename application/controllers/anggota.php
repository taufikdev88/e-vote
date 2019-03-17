<?php
class Anggota extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->library(array('form_validation','bcrypt','pagination'));
        $this->load->helper('url');
        $this->load->model('m_anggota');
        
        if(!$this->session->userdata('anony')){
            redirect('admin');
        }
    }
    
    function index(){
        $data=$this->pager();
        $this->load->view('admin/template');
        $this->load->view('anggota/pengguna',$data);
        $this->load->view('admin/footer');
    }
    
    function cari(){
        $info=$this->input->post('data');
        $data['anggota']=$this->m_anggota->cari($info,'10')->result();
        $this->load->view('anggota/cari',$data);
    }
    
    function edit($username){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $nama=$this->input->post('nama');
            $kelas=$this->input->post('kelas');
            $tgl_lahir=$this->input->post('tgl_lahir');
            $status=$this->input->post('status');

            $info=array(
                'username'=>$username,
                'nama'=>$nama,
                'kelas'=>$kelas,
                'tgl_lahir'=>$tgl_lahir,
                'status'=>$status
            );
            
            $info_=array(
                'username'=>$username,
                'password'=>$password,
            );
            
            $data['message']="<div class='alert alert-success'>Data Berhasil diupdate</div>";
            $this->m_anggota->update($username,$info,$info_);
            $data['a']=$this->m_anggota->cek($username)->row_array();
            $data['b']=$this->m_anggota->getPw($username)->row_array();
            $this->load->view('admin/template');
            $this->load->view('anggota/edit',$data);
            $this->load->view('admin/footer');
        }else{
            $data['message']="";
            $data['a']=$this->m_anggota->cek($username)->row_array();
            $data['b']=$this->m_anggota->getPw($username)->row_array();
            $this->load->view('admin/template');
            $this->load->view('anggota/edit',$data);
            $this->load->view('admin/footer');
        }
    }
    
    function tambah(){
        $this->_set_rules();
        if($this->form_validation->run()==true){
            $username=$this->input->post('username');
            $cek=$this->m_anggota->cek($username)->num_rows();
            if($cek>0){
                $this->session->set_flashdata('message',"<div class='alert alert-warning'>NRP sudah digunakan</div>");
                redirect('anggota');
            }else{
                $password=$this->input->post('password');
                $nama=$this->input->post('nama');
                $kelas=$this->input->post('kelas');
                $tgl_lahir=$this->input->post('tgl_lahir');
                $status=$this->input->post('status');
                
                $info=array(
                    'username'=>$username,
                    'nama'=>$nama,
                    'kelas'=>$kelas,
                    'tgl_lahir'=>$tgl_lahir,
                    'status'=>$status
                );

                $info_=array(
                    'username'=>$username,
                    'password'=>$password,
                );
                
                $this->m_anggota->tambah($info,$info_);
                $data['message']="<div class='alert alert-success'>Data Berhasil ditambahkan</div>";

                $data=$this->pager();

                $this->load->view('admin/template');
                $this->load->view('anggota/pengguna',$data);
                $this->load->view('admin/footer');
            }
        }else{
            $data=$this->pager();

            $this->load->view('admin/template');
            $this->load->view('anggota/pengguna',$data);
            $this->load->view('admin/footer');
        }
    }
    
    function del($username,$value){
        switch($value){
            case "true":
                $this->m_anggota->hapus($username);
                $data['message']="<div class='alert alert-success'>Data Berhasil dihapus</div>";
                $this->session->set_flashdata('message',"<div class='alert alert-success'>Data Berhasil dihapus</div>");
                redirect('anggota');
                break;
            case "false":
                $this->load->view('anggota/hapus');
                break;
        }
    }
    
    function _set_rules(){
        $this->form_validation->set_rules('username','Username','required|max_length[12]');
        $this->form_validation->set_rules('password','Password','required|max_length[50]');
        $this->form_validation->set_rules('nama','Nama Terang','required|max_length[30]');
        $this->form_validation->set_rules('kelas','Kelas','required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required|max_length[12]');
        $this->form_validation->set_rules('status','Status','required|max_length[2]');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }


    function pager(){
        $jumlah_data=$this->m_anggota->semua()->num_rows();
        $index=$this->uri->segment(3);
        $limit=10;
        if($jumlah_data>0){
            $config['base_url']=base_url()."/anggota/index";
            $config['total_rows']=$jumlah_data;
            $config['per_page']=$limit;
            $config['full_tag_open']="<ul class='pagination center'>";
            $config['full_tag_close']="</ul>";
            $config['first_tag_open']="<li>";
            $config['first_tag_close']="</li>";
            $config['last_tag_open']="<li>";
            $config['last_tag_close']="</li>";
            $config['next_tag_open']="<li>";
            $config['next_tag_close']="</li>";
            $config['prev_tag_open']="<li>";
            $config['prev_tag_close']="</li>";
            $config['cur_tag_open']="<li class='active'><span>";
            $config['cur_tag_close']="</span></li>";
            $config['num_tag_open']="<li>";
            $config['num_tag_close']="</li>";
            
            $this->pagination->initialize($config);
            $data['links']=$this->pagination->create_links();
        }
                
        $data['message']="";
        $data['anggota']=$this->m_anggota->ambilData($limit, $index)->result();
        return $data;
    }
}
?>