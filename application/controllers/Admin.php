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
        $data['title'] = 'Home';
        $data['sub_title'] = 'Dashboard';
        $data['status'] = 'Admin';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['total_anggota'] = $this->db->get_where('user', ['aktif' => 1])->num_rows();
        $data['anggota_pending'] = $this->db->get_where('user', ['aktif' => 0])->num_rows();
        $data['total_peminjam'] = $this->db->get('pinjaman')->num_rows();
        $data['total_penyimpan'] = $this->db->get('simpanan')->num_rows();

        $query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman`) AS pinjaman,
                                                    (SELECT SUM(`simpanan`) FROM `simpanan`) AS simpanan
                                                    FROM `user`
                                        ";
        $total = $this->db->query($query)->row_array();
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