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

	public function getSelectedTable($table, $username)
	{
		return $this->db->get_where($table, ['username' => $username])->row_array();
	}

	public function deleteSelectedUser($username)
	{
		$user = $this->db->get_where('user', ['username' => $username])->row_array();
		$this->db->delete('user', ['username' => $username]);
		$this->db->delete('userdata', ['username' => $username]);

		return $user;
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

	public function getAnggota()
	{
		$queryUserdata = "SELECT `level`, `aktif`, `userdata`.*
                            FROM `user` JOIN `userdata`
                            ON `user`.`username` = `userdata`.`username`";

		return $this->db->query($queryUserdata)->result_array();
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
}
/* End of file app_model.php */
/* Location: ./application/models/app_model.php */