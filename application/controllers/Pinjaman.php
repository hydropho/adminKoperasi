<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Data Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pinjaman/index', $data);
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

    public function tambah()
    {
        $tanggal = $this->input->post('tgl_pinjaman');
        $jangka_waktu = '+' . $this->input->post('jangka_waktu') . ' months';
        $tgl_selesai = date('Y-m-d', strtotime($tanggal . $jangka_waktu));

        $angsuran = $this->input->post('pinjaman_pokok') / $this->input->post('jangka_waktu') + ($this->input->post('pinjaman_pokok') * ($this->input->post('bunga') / 100));
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'pinjaman_pokok' => htmlspecialchars($this->input->post('pinjaman_pokok', true)),
            'bunga' => htmlspecialchars($this->input->post('bunga', true)),
            'tgl_pinjaman' => htmlspecialchars($this->input->post('tgl_pinjaman', true)),
            'jangka_waktu' => htmlspecialchars($this->input->post('jangka_waktu', true)),
            'tgl_selesai' => $tgl_selesai,
            'angsuran' => $angsuran
        ];
        $this->db->insert('pinjaman', $data);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil meminjam! </strong>Silahkan tunggu admin menyetujui.</div>');
        redirect('pinjaman');
    }

    public function setuju($no_pinjaman)
    {
        $user = $this->db->get_where('pinjaman', ['no_pinjaman' => $no_pinjaman])->row_array();

        $data = [
            'no_pinjaman' => $user['no_pinjaman'],
            'username' => $user['username'],
            'pinjaman_pokok' => $user['pinjaman_pokok'],
            'bunga' => $user['bunga'],
            'tgl_pinjaman' => $user['tgl_pinjaman'],
            'jangka_waktu' => $user['jangka_waktu'],
            'tgl_selesai' => $user['tgl_selesai'],
            'angsuran' => $user['angsuran'],
            'keterangan' => 2
        ];
        $this->db->where('no_pinjaman', $no_pinjaman);
        $this->db->update('pinjaman', $data);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil menyetujui pinjaman anggota.</div>');
        redirect('pinjaman/index');
    }
}
