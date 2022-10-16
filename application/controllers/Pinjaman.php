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
        $query = "SELECT * FROM pinjaman  ORDER BY no_pinjaman DESC LIMIT 1";
        $pinjaman = $this->db->query($query)->row_array();

        $tanggal = $this->input->post('tgl_pinjaman');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $angsuran_ke = 1;
        while ($angsuran_ke <= $jangka_waktu) {

            if ($angsuran_ke == 1) {
                $sisa = ($pinjaman['angsuran'] * $pinjaman['jangka_waktu']) - $pinjaman['angsuran'];
            } else {
                $query = "SELECT * FROM angsuran  ORDER BY id DESC LIMIT 1";
                $sisa = $this->db->query($query)->row_array();
                $sisa = $sisa['sisa'] - $sisa['bayar'];
            }

            $angsuran = '+' . $angsuran_ke . ' months';
            $jatuh_tempo = date('Y-m-d', strtotime($tanggal . $angsuran));


            $data = [
                'no_pinjaman' => $pinjaman['no_pinjaman'],
                'angsuran' => $angsuran_ke,
                'jatuh_tempo' => $jatuh_tempo,
                'bayar' => $pinjaman['angsuran'],
                'sisa' => $sisa,
                'denda' => 0,
                'jumlah' => $pinjaman['angsuran'] + 0,
                'status' => 0
            ];
            $this->db->insert('angsuran', $data);
            $angsuran_ke++;
        }

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

    public function bayar()
    {
        $id = $this->input->post('id');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $query = "UPDATE `angsuran` 
                SET `tgl_bayar` = $tgl_bayar,
                    `status`    = 1
                WHERE `id` = $id
                ";

        $this->db->query($query);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil Membayar! </strong>Akan dicek kembali oleh admin.</div>');
        redirect('pinjaman/tagihan');
    }

    public function tolak($id)
    {
        $query = "UPDATE `angsuran` 
                SET `status`    = 0
                WHERE `id` = $id
                ";

        $this->db->query($query);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Berhasil! </strong>Menolak pembayaran user.</div>');
        redirect('pinjaman/tagihan');
    }

    public function konfirmasi($id)
    {
        $query = "UPDATE `angsuran` 
                SET `status`    = 2
                WHERE `id` = $id
                ";

        $this->db->query($query);
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil! </strong>Mengonfirmasi pembayaran user.</div>');
        redirect('pinjaman/tagihan');
    }

    public function test()
    {
        echo 'Rp. ' . number_format(1000000, 2, ',', '.');
        // $jatuh_tempo = new DateTime("2022-09-19");
        // $tanggal_jatuhtempo = $jatuh_tempo->format('Y-m-d');
        // $hari_ini = new DateTime();
        // $tanggal_hariini = $hari_ini->format('Y-m-d');

        // echo $tanggal_hariini . '<br>';
        // echo $tanggal_jatuhtempo;

        // if ($hari_ini > $jatuh_tempo) {
        //     $interval = $hari_ini->diff($jatuh_tempo);
        //     $hari = $interval->d;

        //     $denda = 110000 * (1 * $hari / 100);
        //     echo $hari . '<br>';
        //     echo $denda;
        // }
        // $tanggal = new DateTime("2022-11-16");
        // $tanggal2 = new DateTime("2022-11-18");
        // echo $tanggal->format('Y-m-d');
        // if ($tanggal2 > $tanggal) {
        //     $interval = $tanggal->diff($tanggal2);
        //     $hari = $interval->d;

        //     $denda = 110000 * (1 * $hari / 100);
        //     echo $denda;
        // }
        // echo "<br>";
        // echo 'telat' . $interval->d . 'hari';
        // var_dump($interval);
        // var_dump($tanggal < $tanggal2);
        // var_dump($tanggal > $tanggal2);

        // $query = "SELECT * FROM pinjaman  ORDER BY no_pinjaman DESC LIMIT 1";
        // $pinjaman = $this->db->query($query)->row_array();
        // var_dump($pinjaman);
    }
}