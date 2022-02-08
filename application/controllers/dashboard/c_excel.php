<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_excel extends CI_Controller {

// Load database
 public function __construct() {
 parent::__construct();
 $this->load->model('m_bs/excel_model');
 }

public function index() {
 $data = array( 'title' => 'Data excel',
 'excel' => $this->excel_model->listing());
 $this->load->view('excel',$data);
 }

public function export_excel(){
 $data = array( 'title' => 'Laporan Pembayaran Excel',
 'excel' => $this->excel_model->listing());
 $this->load->view('excel/laporan_excel',$data);
 }

}

/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */