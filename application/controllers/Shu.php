<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != 1) {
            $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Maaf! </strong>Anda belum login.</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('aktif') < 2) {
                if ($this->session->userdata('level') < 2) {
                    redirect('user');
                }
            }
        }
    }

    public function index()
    {
        $data['title'] = 'SHU';
        $data['sub_title'] = 'SHU';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('shu/index', $data);
        $this->load->view('templates/footer');
    }
}