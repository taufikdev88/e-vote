<?php
class M_admin extends CI_Model{
    private $table="tbl_admin";
    
    function cek($info){
        $this->db->where('username',$info);
        return $this->db->get($this->table)->row_array();
    }
    
    function hash($p){
        $info=array(
            'password'=>$p
        );
        $this->db->where('username','admin');
        $this->db->update('tbl_admin',$info);
    }
    
    function drop($info){
        $this->db->empty_table($info);
    }
}