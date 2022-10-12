<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function list_notifikasi()
    {
        $this->load->view('list_notifikasi_v');
    }
}
