<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{

    public function baru()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Tambah Pinjaman Baru';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/baru', $data);
        $this->load->view('templates/footer');
    }

    public function data()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Data Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/data', $data);
        $this->load->view('templates/footer');
    }

    public function tagihan()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Tagihan Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/tagihan', $data);
        $this->load->view('templates/footer');
    }
}
