<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_smphabs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bs/m_smphabs', '', TRUE); 
    }


    public function index()
    {
        //$this->session->userdata('n_penggurus');
        $data = array(

            'title'     => 'Status',
            'data_smphabs' => $this->m_smphabs->get_all(),

        );
        $this->load->view('bs/v_smphabs', $data);
    }

    public function tambah()
    {
        
        $data = array(
            'h_tot'=> 'plas'*2000+'bes'*3000+'ker'*2500
            );
        $this->m_smphabs->tambah($data,'abs_smph');
        $this->load->view('bs/v_smphabs');
    } 
}

