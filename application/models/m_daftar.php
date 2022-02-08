<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_daftar extends CI_Model {

public function insert_image($image, $sk)
 {
  // assign the data to an array
  $data = array(
   'id_dbs' => $this->input->post('id_dbs'),
   'n_penggurus' => $this->input->post('n_penggurus'),
   'alamat' => $this->input->post('alamat'),
   'email' => $this->input->post('email'),
   'username' => $this->input->post('username'),
   'password' => $this->input->post('password'),
   'nama_bs' => $this->input->post('nama_bs'),
   'f_ktp' => $image,
   'f_sk' => $sk
  );
  //insert image to the database
  $this->db->insert('daftarbs', $data);
 }
 //get images from database
 public function get_images()
 {
  $this->db->select('*');
  $this->db->order_by('image_id');
  $query = $this->db->get('image_data');
  return $query->result();
 }
}