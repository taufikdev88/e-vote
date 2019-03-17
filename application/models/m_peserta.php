<?php
class M_peserta extends CI_Model{
    private $table="tbl_user";
    private $table_="tbl_userdata";
    private $primary="username";

    function cek($kode,$pass,$ver){
        $this->db->where("username",$kode);
        $this->db->where("password",$pass);
        $this->db->where("tgl_lahir",$ver);
        $query=$this->db->get("v_login");
        
        return $query;
    }
    
    function ceklog($kode){
        $today=date('Y-m-d H:i');
        $minute=date('H:i:s');
        $minute=strtotime("+5 minutes", strtotime($minute));
        $info=array(
            'log'=>"Last logon: ".$today,
            'waktu'=>date('H:i:s',$minute)
        );
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table_,$info);
        return date('H:i:s',$minute);
    }
    
    function calon(){
        return $this->db->get('tbl_calon');
    }
    
    function proses($info){
        $this->db->insert('tbl_vote',$info);
        return $this->db->insert_id();
    }
    
    function lihat($kode){
        return $this->db->query("select nama from tbl_userdata where `username` = '$kode'");
    }
    
    function logout($kode){
        $info=array(
            'status'=>'N'
        );
        $this->db->where($this->primary,$kode);
        $this->db->update($this->table_,$info);
    }
    
    function sesUp($mm, $dd, $id){
        $waktu = $mm.":".$dd;
        $info=array(
            'waktu'=>$waktu
        );
        $this->db->where($this->primary,$id);
        $this->db->update($this->table_,$info);
    }
    
    function mulai(){
        return $this->db->get('tbl_buka');
    }
}