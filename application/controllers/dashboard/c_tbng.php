<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tbng extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bs/m_tbng', '', TRUE); 
    }


    public function index()
    {
        //$this->session->userdata('n_penggurus');
        $data = array(

            'title'     => 'Status',
            'data_tbng' => $this->m_tbng->get_all(),

        );
        $this->load->view('bs/v_tbng', $data);
    }

    public function setoran()
    {
        $data = array(

            'title'     => 'Status',
            'datas' => $this->m_tbng->setor(),

        );
        $this->load->view('bs/v_setoran', $data);
    }

    public function penarikan()
    {
        $data = array(

            'title'     => 'Status',
            'datas' => $this->m_tbng->get_all(),

        );
        $this->load->view('bs/v_penarikan', $data);
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->m_tbng->search_blog($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
    }

    function search(){
        $nik=$this->input->get('nik');
        $data['data']=$this->m_tbng->search_blog($nik);
 
        $this->load->view('bs/search_view',$data);
    }

    function searchpenarikan(){
        $nama=$this->input->get('nama');
        $data['data']=$this->m_tbng->search_blog($nama);
 
        $this->load->view('bs/search_viewpenarikan',$data);
    }

    public function simpan()
    {
            $id_abs                            = $this->input->post('id_abs');
            $tanggal                      = $this->input->post('tanggal');
            $setoran                       = $this->input->post('setoran');
            $saldo                        = $this->input->post('saldo');

        $data = array(

            'id_abs' => $id_abs,
            'setoran' => $setoran,
            'tanggal' => $tanggal,
            'saldo' => $saldo=$setoran+$saldo

        );

        $data1 = array(

            'saldoo' => $saldo

        );

        $where = array(
        'id' => $id_abs
        );

        $this->m_tbng->simpan($data, $data1, $where);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('dashboard/c_tbng');

    }

    public function simpanpenarikan()
    {
            $id_abs                            = $this->input->post('id_abs');
            $tanggal                      = $this->input->post('tanggal');
            $penarikan                       = $this->input->post('penarikan');
            $saldo                        = $this->input->post('saldo');

        $data = array(

            'id_abs' => $id_abs,
            'penarikan' => $penarikan,
            'tanggal' => $tanggal,
            'saldo' => $saldo=$saldo-$penarikan

        );

        $data1 = array(

            'saldoo' => $saldo

        );

        $where = array(
        'id' => $id_abs
        
        );

        $this->m_tbng->simpan($data, $data1, $where);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase.
                                                </div>');

        //redirect
        redirect('dashboard/c_tbng');

    }

    public function edit($nama)
    {
        $where = array('nama' => $nama);
        $data['abs'] = $this->m_tbng->edit_data($where,'abs')->result();
        $this->load->view('bs/edit_tbng', $data);
    }

    function update()
    {

    $id = $this->input->post('id');
    $s_tbng = $this->input->post('s_tbng');
    $saldo = $this->input->post('saldo');
 
    $data = array(
        's_tbng' => $s_tbng,
        'saldo' => $saldo
    );
 
    $where = array(
        'id' => $id
    );

    $this->m_tbng->update_data($where,$data,'abs');

        //redirect
        redirect('dashboard/c_tbng');

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
}

