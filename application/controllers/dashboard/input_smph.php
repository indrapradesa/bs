<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input_smph extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_bs/m_smph');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }

    public function index()
    {
             $this->load->view('bs/inputsmph');
            
    }
 
	public function tambah()
	{
		$nama_bs = $this->input->post('nama_bs');
		$lat = $this->input->post('lat');
		$lng = $this->input->post('lng');
		$plas = $this->input->post('plas');
		$ker = $this->input->post('ker');
		$bes = $this->input->post('bes');
 		
		$data = array(
			'nama_bs' => $nama_bs,
			'lat' => $lat,
			'lng' => $lng,
			'plas'=> $plas,
			// 'h_plas'=> $h_plas = $plas*3000,
			'ker' => $ker,
			// 'h_ker'=> $h_ker=$ker*4000,
			'bes' => $bes,
			// 'h_bes'=> $h_bes=$bes*5000,
			'tot' => $plas+$ker+$bes
			// 'h_tot'=> $h_plas+$h_bes+$h_ker
			);

		$id_map = $this->input->post('id_map');

		$data1= array(
			'map_id' => $id_map,
			'p_plas'=> $h_plas = $plas*3000,
			'p_ker'=> $h_ker=$ker*4000,
			'p_bes'=> $h_bes=$bes*5000,
			'p_tot'=> $h_plas+$h_bes+$h_ker
			);

		$this->m_smph->tambah($data, $data1,'maps');
		$this->load->view('bs/inputsmph');
	} 
}