<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('aktif');
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil keluar! </strong>Selamat tinggal.</div>');
        redirect('auth');
    }
}