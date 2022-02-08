<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_status extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bs/m_status', '', TRUE); 
    }


    public function index()
    {
        //$this->session->userdata('n_penggurus');
        $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_status->get_all(),

        );
        $this->load->view('bs/v_status', $data);
    }

   public function total($id_smph)
    {
        $where = array('id_smph' => $id_smph);
        $data['abs_smph'] = $this->m_status->edit_data($where,'abs_smph')->result();
        $this->load->view('bs/edit_smph', $data);
    }

    function update()
    {

    $id_smph = $this->input->post('id_smph');
    $h_plas = $this->input->post('h_plas');
    $h_ker = $this->input->post('h_ker');
    $h_bes = $this->input->post('h_bes');
    $h_tot = $this->input->post('h_tot');
 
    $data = array(
        'h_plas' => $h_plas,
        'h_ker' => $h_ker,
        'h_bes' => $h_bes,
        'h_tot' => $h_tot=$h_plas+$h_ker+$h_bes
    );
 
    $where = array(
        'id_smph' => $id_smph
    );

    $this->m_status->update_data($where,$data,'abs_smph');

        //redirect
        redirect('dashboard/c_status');

    }

    public function proses($id_smph)
    {
        
        $data = [
            's_smph' => 'Proses'
        ];

        $this->m_status->prosses($data, $id_smph);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('dashboard/c_status');
    }

    public function selesai($id_smph)
    {
        
        $data = [
            's_smph' => 'Selesai'
        ];

        $id_smph = $this->input->post('id_smph');
        $h_plas = $this->input->post('h_plas');
        $h_ker = $this->input->post('h_ker');
        $h_bes = $this->input->post('h_bes');
        $h_tot = $this->input->post('h_tot');
     
        $data1 = array(
            'h_plas' => $h_plas,
            'h_ker' => $h_ker,
            'h_bes' => $h_bes,
            'h_tot' => $h_tot=$h_plas+$h_ker+$h_bes
        );

        $this->m_status->prosses($data, $id_smph);
        $this->m_status->update_data($data1,'abs_smph');

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('dashboard/c_status');
    }
}

