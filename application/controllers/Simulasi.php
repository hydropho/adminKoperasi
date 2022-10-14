<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Simulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Simulasi Pinjaman';
        $data['sub_title'] = 'Simulasi Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('simulasi/index', $data);
        $this->load->view('templates/footer');
    }
}