<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginbs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model ('bs');

    }

    public function index()
    {
    	if($this->bs->logged_bs())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("dashboard/c_dashboardbs");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->bs->check_login('daftarbs', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'id_dbs'   => $apps->id_dbs,
                            'n_penggurus' => $apps->n_penggurus,
                            'username' => $apps->username,
                            'password' => $apps->password,
                            'nama_bs' => $apps->nama_bs,
                            'lat'     => $apps->lat,
                            'lng'     => $apps->lng,
                            'f_profil'     => $apps->f_profil,
                            'bs_status' => $apps->bs_status,
                            'v_status' => $apps->v_status
                            );

                       //set session userdata
                        $this->session->set_userdata($session_data);

                        if($this->session->userdata('v_status') == 'Sudah'){
                            redirect('dashboard/c_dashboardbs');
                        }elseif ($this->session->userdata('v_status') == 'Belum') {
                            redirect('dashboard/c_dashboardbs/validasi');
                        }

                    }

                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';

                    $this->load->view('loginbs', $data);
                }

            }else{
            

                $this->load->view('loginbs');
            }
        }
    }
}