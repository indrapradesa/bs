<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_status extends CI_model{

    private static $table = 'abs_smph';
    private static $pk = 'id_smph';

    public function is_exist($where)
    {
        return $this->db->where($where)->get(self::$table)->row_array();
    }

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('abs_smph')
                 ->where('namabs',$this->session->userdata('nama_bs'))
                 ->where('s_smph','Ambil')
                 ->order_by('id_smph', 'DESC')
                 ->get();
        return $query->result();
    }

    function edit_data($where,$table)
    {      
        return $this->db->get_where($table,$where);

    }

   function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function prosses($data, $id_smph)
    {
        return $this->db->set($data)->where(self::$pk, $id_smph)->update(self::$table);
    
    }   
}