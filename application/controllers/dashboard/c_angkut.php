<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_angkut extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bs/m_angkut', '', TRUE); 
    }


    public function index()
    {
        //$this->session->userdata('n_penggurus');
        $data = array(

            'title'     => 'Status',
            'data_angkut' => $this->m_angkut->get_all(),

        );
        $this->load->view('bs/v_angkut', $data);
    }
}

