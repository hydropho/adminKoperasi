<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Print_Models extends CI_Model
{
    // ============================ PINJAMAN =================================== //
    public function getPinjaman()
    {
        $query = "SELECT * FROM pinjaman";
        $pinjaman = $this->db->query($query)->result_array();

        return $pinjaman;
    }

    public function getTotalPinjaman()
    {
        $query = "SELECT SUM(pinjaman_pokok) as totalpinjaman FROM pinjaman";
        $totalsimpanan = $this->db->query($query)->row_array();

        return $totalsimpanan['totalpinjaman'];
    }

    public function getBunga()
    {
        $query = "SELECT (SUM(angsuran * jangka_waktu)) as total FROM pinjaman";
        $total = $this->db->query($query)->row_array();

        return $total['total'];
    }

    public function getPinjamanByTanggal($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT * FROM pinjaman WHERE tgl_pinjaman >= '$tgl_awal' AND tgl_pinjaman <= '$tgl_akhir'";
        $pinjaman = $this->db->query($query)->result_array();

        return $pinjaman;
    }

    public function getTotalPinjamanByTanggal($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT SUM(pinjaman_pokok) as totalpinjaman FROM pinjaman WHERE tgl_pinjaman >= '$tgl_awal' AND tgl_pinjaman <= '$tgl_akhir'";
        $totalpinjaman = $this->db->query($query)->row_array();

        return $totalpinjaman['totalpinjaman'];
    }

    public function getBungaByTanggal($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT (SUM(angsuran * jangka_waktu)) as total FROM pinjaman WHERE tgl_pinjaman >= '$tgl_awal' AND tgl_pinjaman <= '$tgl_akhir'";
        $total = $this->db->query($query)->row_array();

        return $total['total'];
    }

    // ============================ SIMPAAN =================================== //

    public function getSimpanan($jenis_simpanan)
    {
        $query = "SELECT * FROM simpanan WHERE jenis_simpanan = '$jenis_simpanan'";
        $simpanan = $this->db->query($query)->result_array();

        return $simpanan;
    }

    public function getTotalSimpanan($jenis_simpanan)
    {
        $query = "SELECT SUM(simpanan) as totalsimpanan FROM simpanan WHERE jenis_simpanan = '$jenis_simpanan'";
        $totalsimpanan = $this->db->query($query)->row_array();

        return $totalsimpanan['totalsimpanan'];
    }

    public function getSimpananByTanggalAndJenis($tgl_awal, $tgl_akhir, $jenis_simpanan)
    {
        $query = "SELECT * FROM simpanan WHERE tgl_simpanan >= '$tgl_awal' AND tgl_simpanan <= '$tgl_akhir' AND jenis_simpanan = '$jenis_simpanan'";
        $simpanan = $this->db->query($query)->result_array();

        return $simpanan;
    }
    public function getTotalSimpananByTanggalAndJenis($tgl_awal, $tgl_akhir, $jenis_simpanan)
    {
        $query = "SELECT SUM(simpanan) as totalsimpanan FROM simpanan WHERE tgl_simpanan >= '$tgl_awal' AND tgl_simpanan <= '$tgl_akhir' AND jenis_simpanan = '$jenis_simpanan'";
        $totalsimpanan = $this->db->query($query)->row_array();

        return $totalsimpanan['totalsimpanan'];
    }
}
