<?php
class M_anggota extends CI_Model{
    private $table="tbl_userdata";
    private $primary="username";
    
    function semua(){
        $this->db->order_by($this->primary, 'asc');
        return $this->db->get($this->table);
    }
    
    function ambilData($limit,$index){
        $this->db->limit($limit, $index);
        return $this->db->get($this->table);
    }
    
    function cari($info,$limit){
        $this->db->like('username',$info);
        $this->db->or_like('nama',$info);
        return $this->db->get($this->table,$limit);
    }
    
    function cek($info){
        $this->db->where($this->primary,$info);
        return $this->db->get($this->table);
    }
    
    function tambah($info,$pass){
        $this->db->insert($this->table,$info);
        $this->db->insert('tbl_user',$pass);
    }
    
    function update($info,$data,$pass){
        $this->db->where($this->primary,$info);
        $this->db->update($this->table,$data);
        
        $this->db->where($this->primary,$info);
        $this->db->update('tbl_user',$pass);
    }
    
    function getPw($info){
        $this->db->where($this->primary,$info);
        return $this->db->get('tbl_user');
    }
    
    function hapus($info){
        $this->db->where($this->primary,$info);
        $this->db->delete($this->table);
        
        $this->db->where($this->primary,$info);
        $this->db->delete('tbl_user');
    }
}