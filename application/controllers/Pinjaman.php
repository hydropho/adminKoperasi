<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pinjaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if ($this->session->userdata('login') != 1) {
            $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Maaf! </strong>Anda belum login.</div>');
            redirect('auth');
        } else {
            if ($this->session->userdata('aktif') < 0) {
                redirect('user');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Pinjaman';
        $data['sub_title'] = 'Data Pinjaman';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
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
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();

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
        $this->_angsuran();
    }

    private function _angsuran()
    {
        $tanggal = $this->input->post('tgl_pinjaman');
        $jangka_waktu = $this->input->post('jangka_waktu');

        $this->app_models->angsuran($tanggal, $jangka_waktu);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil meminjam! </strong>Silahkan tunggu admin menyetujui.</div>');
        redirect('pinjaman');
    }

    public function setuju($no_pinjaman)
    {
        $this->app_models->setSetuju($no_pinjaman);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil menyetujui pinjaman anggota.</div>');
        redirect('pinjaman');
    }

    public function bayar()
    {
        $id = $this->input->post('id');
        $tgl_bayar = $this->input->post('tgl_bayar');

        $this->app_models->setBayar($tgl_bayar, $id);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil Membayar! </strong>Akan dicek kembali oleh admin.</div>');
        redirect('pinjaman/tagihan');
    }

    public function tolak($id)
    {
        $this->app_models->setTolak($id);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Berhasil! </strong>Menolak pembayaran user.</div>');
        redirect('pinjaman/tagihan');
    }

    public function konfirmasi($id)
    {
        $this->app_models->setKonfirmasi($id);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil! </strong>Mengonfirmasi pembayaran user.</div>');
        redirect('pinjaman/tagihan');
    }
}