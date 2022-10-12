<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Simpanan extends CI_Controller {

    public function data() {
        $data['title'] = 'Simpanan';
        $data['sub_title'] = 'Data Simpanan';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('simpanan/data', $data);
        $this->load->view('templates/footer');
    }

    public function jenis() {
        $data['title'] = 'Simpanan';
        $data['sub_title'] = 'Jenis Simpanan';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('simpanan/jenis', $data);
        $this->load->view('templates/footer');
    }
}