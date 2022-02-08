<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tbng extends CI_model{

    private static $table = 'abs';
    private static $pk = 'id';

    public function is_exist($where)
    {
        return $this->db->where($where)->get(self::$table)->row_array();
    }

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('abs')
                 ->join('tabungan','tabungan.id_abs=abs.id', 'left')
                 ->where('namabs',$this->session->userdata('nama_bs'))
                 ->order_by('id_tbng', 'DESC')
                 ->get();
        return $query->result();
    }
    public function get_tbng()
    {
        $query = $this->db->select("*")
                 ->from('tabungan')
                 ->get();
        return $query->result();
    }

    public function setor()
    {
        $query = $this->db->select('abs.*,tabungan.*')
                 ->from('abs')
                 ->join('tabungan','tabungan.id_abs=abs.id', 'left')
                 ->where('namabs',$this->session->userdata('nama_bs'))
                 ->order_by('saldo','DESC')
                 ->get();
        return $query->result();
    }

     public function simpan($data, $data1, $where)
    {

        $query = $this->db->insert("tabungan", $data);
        $query1 = $this->db->update("abs", $data1, $where);
                 $this->db->join('tabungan','tabungan.id_abs=abs.id', 'left');
                 $this->db->where($where);
        if($query and $query1){
            return true;
        }else{
            return false;
        }

    }
    function search_blog($nik_bs){
        $this->db->like('nik_bs', $nik_bs , 'both');
        $this->db->join('tabungan','tabungan.id_abs=abs.id', 'left');
        $this->db->where('namabs',$this->session->userdata('nama_bs'));
        $this->db->order_by('saldo', 'DESC');
        $this->db->limit(1);
        return $this->db->get('abs')->result();
    }

    function edit_data($where,$table)
    {      
        return $this->db->get_where($table,$where);

    }

   function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }   
}