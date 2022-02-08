<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_smphabs extends CI_model{

    private static $table = 'abs_smph';
    private static $pk = 'id_smph';

   public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('abs_smph')
                 ->where('namabs',$this->session->userdata('nama_bs'))
                 ->where('s_smph','Selesai')
                 ->order_by('id_smph', 'DESC')
                 ->get();
        return $query->result();
    }

    public function tambah($data)
    {

        $query = $this->db->insert("abs_smph", $data);

        if($query){
            return true;
        }else{
            return false;
        }
    }
}