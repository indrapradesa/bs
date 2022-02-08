<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_angkut extends CI_model{

    private static $table = 'maps';
    private static $pk = 'id_map';

   public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('nama_bs',$this->session->userdata('nama_bs'))
                 ->order_by('id_map', 'DESC')
                 ->get();
        // $query = $this->db->query("select a.*,b.* from abs a join abs_smph b on a.id=b.id ");
        return $query->result();
    }
}