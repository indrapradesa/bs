<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_abs extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('abs')
                 ->where('namabs',$this->session->userdata('nama_bs'))
                 ->order_by('id', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_saldo()
    {
        $query = $this->db->select("*")
                 ->from('abs_smph')
                 ->where('namabs',$this->session->userdata('nama_bs'))
                 ->order_by('id_smph', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("bs", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    function edit_data($where,$table)
    {      
        return $this->db->get_where($table,$where);

    }

    public function update($data, $id_bs)
    {

        $query = $this->db->update("bs", $data, $id_bs);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("abs", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

}