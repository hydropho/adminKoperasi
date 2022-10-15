<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Simpanan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Simpanan';
        $data['sub_title'] = 'Data Simpanan';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('simpanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function user()
    {
        $data['title'] = 'Simpanan';
        $data['sub_title'] = 'Detail Simpanan';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('simpanan/user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'tgl_simpanan' => $this->input->post('tgl_simpanan'),
            'simpanan' => htmlspecialchars($this->input->post('simpanan', true)),
            'jenis_simpanan' => htmlspecialchars($this->input->post('jenis_simpanan', true))
        ];
        $this->db->insert('simpanan', $data);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil menambah simpanan! </strong>Periksa kembali bukti bayar anda.</div>');
        redirect('simpanan');
    }

    public function hapus($no_simpanan)
    {
        $this->db->delete('simpanan', ['no_simpanan' => $no_simpanan]);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Berhasil! </strong>Data dihapus.</div>');
        redirect('simpanan/data');
    }
}