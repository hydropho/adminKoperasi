<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class App_Models extends CI_Model
{
	public function getUserTable($table)
	{
		return $this->db->get_where($table, ['username' => $this->session->userdata('username')])->row_array();
	}

	public function getSelectedUserTable($username)
	{
		return $this->db->get_where('user', ['username' => $username])->row_array();
	}

	public function getSelectedUserDataTable($username)
	{
		return $this->db->get_where('userdata', ['username' => $username])->row_array();
	}

	public function getSelectedTable($table, $username)
	{
		return $this->db->get_where($table, ['username' => $username])->row_array();
	}

	public function deleteSelectedUser($username)
	{
		$this->db->delete('user', ['username' => $username]);
		$this->db->delete('userdata', ['username' => $username]);
	}

	public function getWhereNumRow($table)
	{
		return $this->db->get_where($table, ['username' => $this->session->userdata('username')])->num_rows();
	}

	public function getNumRow($table)
	{
		return $this->db->get($table)->num_rows();
	}

	public function getSimpananPokok($username)
	{
		$query = "SELECT SUM(simpanan) AS simpanan FROM simpanan WHERE username = '$username' AND jenis_simpanan = 'Simpanan Pokok' AND status = '2' ";

		return $this->db->query($query)->row_array();
	}

	public function getSimpananWajib($username)
	{
		$query = "SELECT SUM(simpanan) AS simpanan FROM simpanan WHERE username = '$username' AND jenis_simpanan = 'Simpanan Wajib' AND status = '2'";

		return $this->db->query($query)->row_array();
	}

	public function getSimpananSukarela($username)
	{
		$query = "SELECT SUM(simpanan) AS simpanan FROM simpanan WHERE username = '$username' AND jenis_simpanan = 'Simpanan Sukarela' AND status = '2'";

		return $this->db->query($query)->row_array();
	}

	public function getTotalSP()
	{
		$query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman` WHERE `keterangan` = 2) AS pinjaman,
                   (SELECT SUM(`simpanan`) FROM `simpanan` WHERE `status` = 2) AS simpanan
                    FROM `user` ";
		$total = $this->db->query($query)->row_array();

		return $total;
	}

	public function getUserTotalSP($username)
	{
		$query = " SELECT `username`, (SELECT SUM(`pinjaman_pokok`) FROM `pinjaman` WHERE `username` = '$username' AND `keterangan` = 2) AS pinjaman,
				  (SELECT SUM(`simpanan`) FROM `simpanan`  WHERE `username` = '$username' AND `status` = 2) AS simpanan
				  FROM `user` WHERE `username` = '$username' ";
		$total = $this->db->query($query)->row_array();

		return $total;
	}

	public function getTransaksi($table)
	{
		$query = "SELECT * FROM $table ORDER BY tgl_$table DESC LIMIT 5";

		return $this->db->query($query)->result_array();
	}

	public function getUserTransaksi($table, $username)
	{
		$query = "SELECT * FROM $table WHERE username = '$username' ORDER BY tgl_$table DESC LIMIT 5";

		return $this->db->query($query)->result_array();
	}


	public function setSetuju($no_pinjaman)
	{
		$query = "UPDATE `pinjaman` 
                SET `keterangan` = 2
                WHERE `no_pinjaman` = $no_pinjaman
                ";

		$this->db->query($query);
	}

	public function setBayar($tgl_bayar, $id)
	{
		$query = "UPDATE `angsuran` 
                SET `tgl_bayar` = $tgl_bayar,
                    `status`    = 1
                WHERE `id` = $id
                ";

		$this->db->query($query);
	}

	public function setTolak($id)
	{
		$query = "UPDATE `angsuran` 
                SET `status`    = 0
                WHERE `id` = $id
                ";

		$this->db->query($query);
	}

	public function setKonfirmasi($id)
	{
		$query = "UPDATE `angsuran` 
                SET `status`    = 2
                WHERE `id` = $id
                ";

		$this->db->query($query);
	}

	public function angsuran($tanggal, $jangka_waktu)
	{
		$query = "SELECT * FROM pinjaman  ORDER BY no_pinjaman DESC LIMIT 1";
		$pinjaman = $this->db->query($query)->row_array();

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
	}

	public function getPengurus()
	{
		$query = "SELECT `user`.`level`, `user`.`aktif`, `userdata`.*
                  FROM `user` JOIN `userdata`
                  ON `user`.`username` = `userdata`.`username`
				  WHERE level = 2";
		$userdata = $this->db->query($query)->result_array();

		return $userdata;
	}

	public function getAnggota()
	{
		$query = "SELECT `level`, `aktif`, `userdata`.*
							FROM `user` JOIN `userdata`
							ON `user`.`username` = `userdata`.`username`
							WHERE level = 1";

		$userdata = $this->db->query($query)->result_array();

		return $userdata;
	}

	public function setAktif($username)
	{
		$query = "UPDATE user SET aktif = 2 WHERE username = '$username'";
		$this->db->query($query);
	}

	public function setNonaktif($username)
	{
		$query = "UPDATE user SET aktif = 1 WHERE username = '$username'";
		$this->db->query($query);
	}

	public function editProfile()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim', [
			'required' => 'Nama harus diisi!'
		]);
		$this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required|trim', [
			'required' => 'Tempat lahir harus diisi!'
		]);
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required', [
			'required' => 'Tanggal lahir harus diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
			'required' => 'Alamat harus diisi!'
		]);
		$this->form_validation->set_rules('no_hp', 'No_hp', 'required|trim', [
			'required' => 'No HP harus diisi!'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User';
			$data['sub_title'] = 'Edit Profil';
			$data['corp_name'] = 'Kotree';
			$data['user'] = $this->app_models->getUserTable('user');
			$data['userdata'] = $this->app_models->getUserTable('userdata');

			// $this->load->view('templates/header', $data);
			// $this->load->view('templates/navbar', $data);
			// $this->load->view('templates/sidebar', $data);
			// $this->load->view('pengguna/edit_form/', $data);
			// $this->load->view('templates/footer');
			$this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Gagal! </strong>Semua data harus diisi!.</div>');
			redirect('pengguna/edit_form/' . $this->input->post('username'));
		} else {
			$config['upload_path']          = './assets/images/profile';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 10240;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('profil')) {
				$data = [
					'username' => htmlspecialchars($this->input->post('username', true)),
					'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
					'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
					'alamat' => htmlspecialchars($this->input->post('alamat', true)),
					'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
					'profil' => 'default.jpg'
				];
				$this->db->where('username', $data['username']);
				$this->db->update('userdata', $data);

				$this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil mengubah data.</div>');
				redirect('pengguna');
			} else {
				$profil =  $this->upload->data('file_name');
				$data = [
					'username' => htmlspecialchars($this->input->post('username', true)),
					'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
					'tempat_lahir' => htmlspecialchars($this->input->post('tempat_lahir', true)),
					'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin', true)),
					'alamat' => htmlspecialchars($this->input->post('alamat', true)),
					'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
					'profil' => $profil
				];
				$this->db->where('username', $data['username']);
				$this->db->update('userdata', $data);

				$this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Selamat! </strong>Anda berhasil mengubah data.</div>');
				redirect('pengguna');
			}
		}
	}

	public function getPinjaman()
	{
		$query = "SELECT * FROM pinjaman";
		$pinjaman = $this->db->query($query)->result_array();

		return $pinjaman;
	}

	public function getPinjamanAktif()
	{
		$query = "SELECT * FROM pinjaman WHERE keterangan = 2";
		$pinjaman = $this->db->query($query)->result_array();

		return $pinjaman;
	}

	public function getBunga()
	{
		$query = "SELECT (SUM(angsuran * jangka_waktu)) as total FROM pinjaman";
		$total = $this->db->query($query)->row_array();

		return $total['total'];
	}


	public function getBungaAktif()
	{
		$query = "SELECT (SUM(angsuran * jangka_waktu)) as total FROM pinjaman WHERE keterangan = 2";
		$total = $this->db->query($query)->row_array();

		return $total['total'];
	}

	public function getSimpanan()
	{
		$query = "SELECT * FROM simpanan";
		$simpanan = $this->db->query($query)->result_array();

		return $simpanan;
	}

	public function getSimpananAktif()
	{
		$query = "SELECT * FROM simpanan WHERE status = 2";
		$simpanan = $this->db->query($query)->result_array();

		return $simpanan;
	}

	public function getTotalSimpanan()
	{
		$query = "SELECT SUM(simpanan) as totalsimpanan FROM simpanan";
		$totalsimpanan = $this->db->query($query)->row_array();

		return $totalsimpanan['totalsimpanan'];
	}

	public function getTotalPinjaman()
	{
		$query = "SELECT SUM(pinjaman_pokok) as totalpinjaman FROM pinjaman";
		$totalsimpanan = $this->db->query($query)->row_array();

		return $totalsimpanan['totalpinjaman'];
	}

	public function getTotalSimpananAktif()
	{
		$query = "SELECT SUM(simpanan) as totalsimpanan FROM simpanan WHERE status = 2";
		$totalsimpanan = $this->db->query($query)->row_array();

		return $totalsimpanan['totalsimpanan'];
	}

	public function getTotalPinjamanAktif()
	{
		$query = "SELECT SUM(pinjaman_pokok) as totalPinjaman FROM pinjaman WHERE keterangan = 2";
		$totalPinjaman = $this->db->query($query)->row_array();

		return $totalPinjaman['totalPinjaman'];
	}

	public function getJumlahSimpanan()
	{
		$query = "SELECT no_simpanan FROM simpanan";
		$jumlahSimpanan = $this->db->query($query)->num_rows();

		return $jumlahSimpanan;
	}

	public function getJumlahPinjaman()
	{
		$query = "SELECT no_pinjaman FROM pinjaman";
		$jumlahPinjaman = $this->db->query($query)->num_rows();

		return $jumlahPinjaman;
	}

	public function getJumlahSimpananAktif()
	{
		$query = "SELECT no_simpanan FROM simpanan WHERE status = 2";
		$jumlahSimpanan = $this->db->query($query)->num_rows();

		return $jumlahSimpanan;
	}

	public function getJumlahPinjamanAktif()
	{
		$query = "SELECT no_pinjaman FROM pinjaman WHERE keterangan = 2";
		$jumlahPinjaman = $this->db->query($query)->num_rows();

		return $jumlahPinjaman;
	}
}
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */