<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboardbs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bs');
    }

    public function index()
    {

	if($this->bs->logged_bs())
        {

            $this->load->view("bs/bs");         

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect('loginbs');

        }
    }

    public function validasi()
    {

    if($this->bs->logged_bs())
        {

            $this->load->view("g");
        }
    }

    function inputsmph(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('bs_status')=='Aktif'){
      $this->load->view('bs/inputsmph');
    }else{
      $this->load->view('bs/nonaktif');
    }
  }

  function tbng(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('bs_status')=='Aktif'){
      redirect('dashboard/c_tbng');
    }else{
      $this->load->view('bs/nonaktif');
    }
  }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}