<?php
class M_suara extends CI_Model{
    private $table="tbl_calon";
    
    function dataCalon(){
        return $this->db->get($this->table);
    }
    
    function dataTotal($info){
        $query=mysql_query("select count(v.username) as jml from tbl_vote v where pilihan=$info");
        $result=mysql_fetch_array($query);
        return $result['jml'];
    }
    
    function dataTanggal($info,$tgl){
        $query=mysql_query("select count(v.username) as jml from tbl_vote v where pilihan=$info and tanggal='$tgl'");
        $result=mysql_fetch_array($query);
        return $result['jml'];
    }
    
    function totalSuara(){
        $data=$this->db->get('tbl_vote');
        return $data->num_rows();
    }
    
    function dataSingle($info1,$info2){
        $this->db->where($info1,$info2);
        return $this->db->get('tbl_vote');
    }

    function golput(){
        $this->db->where('username not in (select username from tbl_vote)');
        $this->db->order_by('kelas','nama');
        return $this->db->get('tbl_userdata');
    }
}