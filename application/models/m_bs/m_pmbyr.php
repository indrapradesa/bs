<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pmbyr extends CI_model{

    private static $table = 'maps';
    private static $pk = 'id_map';

   public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->join('pembayaran','pembayaran.map_id=maps.id_map', 'left')
                 ->where('nama_bs',$this->session->userdata('nama_bs'))
                 ->where('status','Selesai')
                 //->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_cetak()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('nama_bs',$this->session->userdata('nama_bs'))
                 ->where('p_status','Sudah Dibayar')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }
}