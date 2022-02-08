<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model {

public function __construct()
 {
 parent::__construct();
 $this->load->database();
 }

// Listing
 public function listing() {
 $this->db->select('*');
 $this->db->from('maps');
 $this->db->where('nama_bs',$this->session->userdata('nama_bs'));
 $this->db->where('p_status','Sudah Dibayar');
 $query = $this->db->get();
 return $query->result();
 }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */