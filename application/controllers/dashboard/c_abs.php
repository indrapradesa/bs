<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_abs extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('m_bs/m_abs');

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Bank Sampah',
            'data_bs' => $this->m_abs->get_all(),

        );
        $this->load->view('bs/v_abs', $data);
        $this->session->set_userdata($data);
    }

    public function saldo()
    {
        $data = array(

            'title'     => 'Data Bank Sampah',
            'data_smph' => $this->m_abs->get_saldo(),

        );

        $this->load->view('bs/v_abs', $data);
    }

    public function lihat()
    {
        $data = array(

            'title'     => 'Data Bank Sampah',
            'data_bs' => $this->m_bs->get_all(),

        );

        $this->load->view('rc/v_lihatbs', $data);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Bank Sampah'

        );

        $this->load->view('tambah_bs', $data);
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['abs'] = $this->m_status->edit_data($where,'abs')->result();
    }

    public function update()
    {
        $id = $this->input->post('id');
        $saldo = $this->input->post('saldo');
 
    $data = array(
        'saldo' => $saldo
    );
 
    $where = array(
        'id' => $id
    );

    $this->m_abs->update_data($where,$data,'abs');

        //redirect
        redirect('dashboard/c_abs');

    }

    public function hapus($id)
    {
        $id['id'] = $this->uri->segment(3);

        $this->m_bs->hapus($id);

        //redirect
        redirect('bs/v_abs');

    }

}