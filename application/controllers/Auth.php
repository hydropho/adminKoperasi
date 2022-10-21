<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if ($this->session->userdata('login') > 0) {
            redirect('admin');
        }
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username harus diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login - Kotree';
            $this->load->view('auth/page-login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // CEK AKUN
        if ($user) {

            // CEK PASSWORD
            if (password_verify($password, $user['password'])) {

                // CEK ADMIN
                if ($user['level'] == 1) {

                    // CEK STATUS
                    if ($user['aktif'] == 2) {
                        $data = [
                            'username' => $user['username'],
                            'level' => $user['level'],
                            'aktif' => 2,
                            'login' => 1
                        ];

                        $this->session->set_userdata($data);
                        redirect('user');
                    } else if ($user['aktif'] == 1) {
                        $data = [
                            'username' => $user['username'],
                            'level' => $user['level'],
                            'aktif' => 1,
                            'login' => 1
                        ];

                        $this->session->set_userdata($data);
                        redirect('daftar/hold');
                    } else {
                        $data = [
                            'username' => $user['username'],
                            'level' => $user['level'],
                            'aktif' => 0,
                            'login' => 1
                        ];

                        $this->session->set_userdata($data);
                        redirect('daftar');
                    }
                } else {
                    $data = [
                        'username' => $user['username'],
                        'level' => $user['level'],
                        'login' => 1
                    ];

                    $this->session->set_userdata($data);
                    redirect('admin');
                }
            } else {
                $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Login gagal! </strong>Password salah.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('alert_message', '<div class="alert alert-danger alert-dismissible fade show"><strong>Login gagal! </strong>Username tidak terdaftar.</div>');
            redirect('auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Name', 'required|trim|is_unique[user.nama_lengkap]', [
            'required' => 'Nama harus diisi!',
            'is_unique' => 'Nama lengkap telah digunakan'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'required' => 'Username harus diisi!',
            'is_unique' => 'Username sudah digunakan!'
        ]);
        $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[5]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password minimal 5 karakter!',
            'required' => 'Password harus diisi!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register - Kotree';
            $this->load->view('auth/page-register', $data);
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true))
            ];
            $this->db->insert('user', $data);

            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'nama_lengkap' => htmlspecialchars($this->input->post('nama_lengkap', true)),
                'tempat_lahir' => '',
                'tanggal_lahir' => '',
                'jenis_kelamin' => '',
                'alamat' => '',
                'no_hp' => '',
                'profil' => ''
            ];
            $this->db->insert('userdata', $data);

            $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil mendaftar! </strong>Silahkan login.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('aktif');
        $this->session->set_flashdata('alert_message', '<div class="alert alert-success alert-dismissible fade show"><strong>Berhasil keluar! </strong>Selamat tinggal.</div>');
        redirect('auth');
    }
}
