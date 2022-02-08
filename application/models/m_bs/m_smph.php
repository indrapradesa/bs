<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_smph extends CI_model{

	private static $table = 'maps';
    private static $pk = 'id_map';

public function tampil_data(){
		return $this->db->get('maps');
	}
 
public function tambah($data, $data1, $where)
    {

        $query = $this->db->insert("maps", $data);
        $query1 = $this->db->insert("pembayaran", $data1, $where);
                 $this->db->join('maps','maps.id_map=pembayaran.map_id', 'left');
                 $this->db->where($where);
        if($query and $query1){
            return true;
        }else{
            return false;
        }
    }
}