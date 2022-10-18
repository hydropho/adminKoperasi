<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shu extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'SHU';
        $data['sub_title'] = 'Simulasi';
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