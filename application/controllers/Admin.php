<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // TITTLE
        $data['title'] = 'Home';
        $data['sub_title'] = 'Dashboard';
        $data['status'] = 'Admin';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';

        $data['user'] = $this->app_models->getUserTable('user');
        $data['userdata'] = $this->app_models->getUserTable('userdata');
        $data['total_anggota'] = $this->db->get_where('user', ['aktif' => 2])->num_rows();
        $data['anggota_pending'] = $this->db->get_where('user', ['aktif' => 1])->num_rows();

        $data['transaksi_pinjaman'] = $this->app_models->getTransaksi('pinjaman');
        $data['total_peminjam'] = $this->app_models->getNumRow('pinjaman');
        $data['total_penyimpan'] = $this->app_models->getNumRow('simpanan');
        $data['transaksi_simpanan'] = $this->app_models->getTransaksi('simpanan');

        $total = $this->app_models->getTotalSP();
        $persen = $total['simpanan'] + $total['pinjaman'];


        $data['total'] = $total['simpanan'] + $total['pinjaman'];
        $data['total_simpanan'] = $total['simpanan'];
        $data['total_pinjaman'] = $total['pinjaman'];
        $data['simpanan'] = round(($total['simpanan'] / $persen) * 100);
        $data['pinjaman'] = round(($total['pinjaman'] / $persen) * 100);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}