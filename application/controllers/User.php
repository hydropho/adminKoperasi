<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Home';
        $data['sub_title'] = 'Dashboard';
        $data['status'] = 'User';
        $data['corp_name'] = 'Kotree';
        $data['kelompok'] = 'Kelompok 3';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['userdata'] = $this->db->get_where('userdata', ['username' => $this->session->userdata('username')])->row_array();
        $data['jumlah_pinjaman'] = $this->db->get_where('pinjaman', ['username' => $this->session->userdata('username')])->num_rows();
        $data['jumlah_simpanan'] = $this->db->get_where('simpanan', ['username' => $this->session->userdata('username')])->num_rows();

        $username = $this->session->userdata('username');
        $query = "SELECT * FROM simpanan WHERE username = '$username' ORDER BY tgl_simpanan DESC LIMIT 5";
        $data['transaksi_simpanan'] = $this->db->query($query)->result_array();
        $query = "SELECT * FROM pinjaman WHERE username = '$username' ORDER BY tgl_pinjaman DESC LIMIT 5";
        $data['transaksi_pinjaman'] = $this->db->query($query)->result_array();

        $username = $this->session->userdata('username');
        $query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman` WHERE `username` = '$username') AS pinjaman,
                                                    (SELECT SUM(`simpanan`) FROM `simpanan`  WHERE `username` = '$username') AS simpanan
                                                    FROM `user` WHERE `username` = '$username'
                                        ";
        $total = $this->db->query($query)->row_array();
        $persen = $total['simpanan'] + $total['pinjaman'];
        $data['total'] = $total['simpanan'] + $total['pinjaman'];
        $data['total_simpanan'] = $total['simpanan'];
        $data['total_pinjaman'] = $total['pinjaman'];
        $data['total'] = $total['simpanan'] + $total['pinjaman'];
        $data['simpanan'] = round(($total['simpanan'] / $persen) * 100);
        $data['pinjaman'] = round(($total['pinjaman'] / $persen) * 100);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }
}