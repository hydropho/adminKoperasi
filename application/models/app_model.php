<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_Model extends CI_Model
{
	//Query manual
	function manualQuery($q)
	{
		return $this->db->query($q);
	}

	//Konversi tanggal
	public function tgl_sql($date)
	{
		$exp = explode('-', $date);
		if (count($exp) == 3) {
			$date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
		}
		return $date;
	}
	public function tgl_str($date)
	{
		$exp = explode('-', $date);
		if (count($exp) == 3) {
			$date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
		}
		return $date;
	}

	public function ambilTgl($tgl)
	{
		$exp = explode('-', $tgl);
		$tgl = $exp[2];
		return $tgl;
	}

	public function ambilBln($tgl)
	{
		$exp = explode('-', $tgl);
		$tgl = $exp[1];
		$bln = $this->app_model->getBulan($tgl);
		$hasil = substr($bln, 0, 3);
		return $hasil;
	}

	public function tgl_indo($tgl)
	{
		$jam = substr($tgl, 11, 10);
		$tgl = substr($tgl, 0, 10);
		$tanggal = substr($tgl, 8, 2);
		$bulan = $this->app_model->getBulan(substr($tgl, 5, 2));
		$tahun = substr($tgl, 0, 4);
		return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam;
	}

	public function getBulan($bln)
	{
		switch ($bln) {
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}

	public function hari_ini($hari)
	{
		date_default_timezone_set('Asia/Jakarta'); // PHP 6 mengharuskan penyebutan timezone.
		$seminggu = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		//$hari = date("w");
		$hari_ini = $seminggu[$hari];
		return $hari_ini;
	}

	//query login
	public function getLoginData($usr, $psw)
	{
		$u = ($usr);
		$p = md5($psw);
		$q_cek_login = $this->db->get_where('admins', array('username' => $u, 'password' => $p));
		if (count($q_cek_login->result()) > 0) {
			foreach ($q_cek_login->result() as $qck) {
				foreach ($q_cek_login->result() as $qad) {
					$sess_data['logged_in'] = 'aingLoginYeuh';
					$sess_data['username'] = $qad->username;
					$sess_data['nama_lengkap'] = $qad->nama_lengkap;
					$sess_data['foto'] = $qad->foto;
					$sess_data['level'] = $this->app_model->CariLevel($qad->level);
					$sess_data['gudang'] = $qad->id_gudang;
					$this->session->set_userdata($sess_data);
				}
				header('location:' . base_url() . 'index.php/home');
			}
		} else {
			$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
			header('location:' . base_url() . 'index.php/login');
		}
	}
}
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */
