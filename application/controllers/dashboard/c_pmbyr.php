<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pmbyr extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bs/m_pmbyr', '', TRUE); 
    }


    public function index()
    {
        //$this->session->userdata('n_penggurus');
        $data = array(

            'title'     => 'Status',
            'data_pmbyr' => $this->m_pmbyr->get_all(),

        );
        $this->load->view('bs/v_pmbyr', $data);
    }

    public function cetak()
    {

        $data = array(

            'title'     => 'Rincian Pembayaran',
            'data_cetak' => $this->m_pmbyr->get_cetak(),

        );
            $this->load->view('bs/v_print', $data);
    }
}

