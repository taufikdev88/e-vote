<?php
class M_paslon extends CI_Model{
    private $table="tbl_calon";
    private $primary="id";
    
    function semua(){
        $this->db->order_by($this->primary,'asc');
        return $this->db->get($this->table);
    }
    
    function tambah($info){
        $this->db->insert($this->table,$info);
    }
    
    function edit($id,$info){
        $this->db->where($this->primary,$id);
        $this->db->update($this->table,$info);
    }
    
    function hapus($info){
        $this->db->where($this->primary,$info);
        $this->db->delete($this->table);
    }
    
    function cek($info){
        $this->db->where($this->primary,$info);
        return $this->db->get($this->table);
    }
    
    function getNo(){
        $query=mysql_query("select max(id) as id from tbl_calon");
        $data=mysql_fetch_array($query);
        return $data['id'];
    }
    
    function getFoto($info){
        $query=mysql_query("select foto from tbl_calon where id = $info");
        $data=mysql_fetch_array($query);
        return $data['foto'];
    }
}