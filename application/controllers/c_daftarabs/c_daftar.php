<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_daftar extends CI_Controller {
public function __construct()
 {
  parent::__construct();
  $this->load->model('m_bs/m_daftar');
 }
 public function index()
 {
  $this->load->view('bs/daftar');
 }
 // add image from form
 public function add_image()
 {
    // CI form validation
    $this->form_validation->set_rules('n_penggurus', 'Nama Penggurus', 'required');
    $this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('nama_bs', 'Nama BS', 'required');
    if ($this->form_validation->run() == FALSE){
     $this->load->view('bs/daftar');
          }
    else {
     // configurations from upload library
     $config['upload_path'] = './assets/images';
     $config['allowed_types'] = 'gif|jpg|png|jpeg';
     $config['max_size'] = '1024'; // max size in KB
     // load CI libarary called upload
     $this->load->library('upload', $config);
     // body of if clause will be executed when image uploading is failed
     if(!$this->upload->do_upload()){
      $errors = array('error' => $this->upload->display_errors());
      // This image is uploaded by deafult if the selected image in not uploaded
      $image = 'no_image.png';
      $sk = 'no_image.png';    
     }
     // body of else clause will be executed when image uploading is succeeded
     else{
      $data = array('upload_data' => $this->upload->data());
      $image = $_FILES['userfile']['name'];  //name must be userfile
      $sk = $_FILES['sk']['name'];
     }
     $this->m_daftar->insert_image($image, $sk);
     $this->session->set_flashdata('success','Image stored');
     redirect('Image');
    }
 }
 // view images fetched from database
 public function view_images()
 {
  $data['images'] = $this->m_daftar->get_images();
  $this->load->view('image_view', $data);
 }
 public function get_ajax()
    {
        $username = $this->input->post('username');
        // $where = "username='".$username."'";
        // $data = $this->m_daftar->edit($where,'daftarbs')->result();
        echo json_encode($username);
    }
}