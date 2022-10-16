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
        $username = $this->session->userdata('username');
        $query = "SELECT SUM(simpanan) AS simpanan FROM simpanan WHERE username = '$username' AND jenis_simpanan = 'Simpanan Pokok' AND status = '2' ";
        $data['simpanan_pokok'] = $this->db->query($query)->row_array();

        $query = "SELECT SUM(simpanan) AS simpanan FROM simpanan WHERE username = '$username' AND jenis_simpanan = 'Simpanan Wajib' AND status = '2'";
        $data['simpanan_wajib'] = $this->db->query($query)->row_array();

        $query = "SELECT SUM(simpanan) AS simpanan FROM simpanan WHERE username = '$username' AND jenis_simpanan = 'Simpanan Sukarela' AND status = '2'";
        $data['simpanan_sukarela'] = $this->db->query($query)->row_array();
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

    public function tambah_user()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'tgl_simpanan' => $this->input->post('tgl_simpanan'),
            'simpanan' => htmlspecialchars($this->input->post('simpanan', true)),
            'jenis_simpanan' => htmlspecialchars($this->input->post('jenis_simpanan', true))
        ];
        $this->db->insert('simpanan', $data);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil menambah simpanan! </strong>Periksa kembali bukti bayar anda.</div>');
        redirect('simpanan/user');
    }

    public function hapus($no_simpanan)
    {
        $this->db->delete('simpanan', ['no_simpanan' => $no_simpanan]);

        $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Berhasil! </strong>Data dihapus.</div>');
        redirect('simpanan');
    }

    public function tolak($no_simpanan)
    {
        $query = "UPDATE `simpanan` 
                SET `status`    = 0
                WHERE `no_simpanan` = '$no_simpanan'
                ";

        $this->db->query($query);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Berhasil! </strong>Menolak pembayaran user.</div>');
        redirect('simpanan');
    }

    public function setuju($no_simpanan)
    {
        $query = "UPDATE `simpanan` 
                SET `status`    = 2
                WHERE `no_simpanan` = '$no_simpanan'
                ";

        $this->db->query($query);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil! </strong>Mengonfirmasi pembayaran user.</div>');
        redirect('simpanan');
    }
}