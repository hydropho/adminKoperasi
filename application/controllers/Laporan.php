<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller
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
        $data['title'] = 'Laporan';
        $data['sub_title'] = 'Laporan';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');

        $data['totalPinjaman'] = $this->app_models->getTotalPinjaman();
        $data['totalPinjamanAktif'] = $this->app_models->getTotalPinjamanAktif();
        $data['jumlahPinjaman'] = $this->app_models->getJumlahPinjaman();
        $data['jumlahPinjamanAktif'] = $this->app_models->getJumlahPinjamanAktif();

        $data['totalSimpanan'] = $this->app_models->getTotalSimpanan();
        $data['totalSimpananAktif'] = $this->app_models->getTotalSimpananAktif();
        $data['jumlahSimpanan'] = $this->app_models->getJumlahSimpanan();
        $data['jumlahSimpananAktif'] = $this->app_models->getJumlahSimpananAktif();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);

        $this->load->view('laporan/laporan_pinjaman');
        $this->load->view('laporan/laporan_simpanan_pokok');
        $this->load->view('laporan/laporan_simpanan_wajib');
        $this->load->view('laporan/laporan_simpanan_sukarela');

        $this->load->view('laporan/index', $data);
        $this->load->view('templates/footer');
    }

    public function bukti()
    {
        $data['title'] = 'Laporan';
        $data['sub_title'] = 'Bukti Bayar';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('laporan/bukti', $data);
        $this->load->view('templates/footer');
    }

    public function printPinjamanAktif()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['pinjaman'] = $this->app_models->getPinjamanAktif();
        $data['totalPinjaman'] = $this->app_models->getTotalPinjamanAktif();
        $data['totalBunga'] = $this->app_models->getBungaAktif();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printPinjamanAktifAdmin', $data);
    }

    public function printPinjamanAktifExcel()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['pinjaman'] = $this->app_models->getPinjamanAktif();
        $data['totalPinjaman'] = $this->app_models->getTotalPinjamanAktif();
        $data['totalBunga'] = $this->app_models->getBungaAktif();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printPinjamanAktifAdminExcel', $data);
    }

    public function printPinjaman()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['pinjaman'] = $this->app_models->getPinjaman();
        $data['totalPinjaman'] = $this->app_models->getTotalPinjaman();
        $data['totalBunga'] = $this->app_models->getBunga();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printPinjamanAdmin', $data);
    }

    public function printPinjamanExcel()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['pinjaman'] = $this->app_models->getPinjaman();
        $data['totalPinjaman'] = $this->app_models->getTotalPinjaman();
        $data['totalBunga'] = $this->app_models->getBunga();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printPinjamanAdminExcel', $data);
    }

    public function printSimpananAktif()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['simpanan'] = $this->app_models->getSimpananAktif();
        $data['totalSimpanan'] = $this->app_models->getTotalSimpananAktif();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printSimpananAktifAdmin', $data);
    }

    public function printSimpananAktifExcel()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['simpanan'] = $this->app_models->getSimpananAktif();
        $data['totalSimpanan'] = $this->app_models->getTotalSimpananAktif();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printSimpananAktifAdminExcel', $data);
    }

    public function printSimpanan()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['simpanan'] = $this->app_models->getSimpanan();
        $data['totalSimpanan'] = $this->app_models->getTotalSimpanan();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printSimpananAdmin', $data);
    }

    public function printSimpananExcel()
    {
        $data['title'] = 'Laporan';
        $data['corp_name'] = 'Kotree';
        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['tanggal'] = new DateTime();
        $data['simpanan'] = $this->app_models->getSimpanan();
        $data['totalSimpanan'] = $this->app_models->getTotalSimpanan();


        $this->load->view('templates/header', $data);
        $this->load->view('print/printSimpananAdminExcel', $data);
    }
}
