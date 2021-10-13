<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {

        $this->form_validation->set_rules('nip', 'Nip', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //validasi sukses
            $this->_login();
        }
    }


    private function _login()
    {
        $nip = $this->input->post('nip');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['nip' => $nip])->row_array();



        //jika usernya ada
        if ($user) {
            //usernya aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'nip' => $user['nip'],
                        'role_id' => $user['role_id']
                    ];
                    //sessionnya
                    $this->session->set_userdata($data);
                    //cek apakah user atau admin
                    if ($user['role_id'] == 1) {
                        redirect('dashboard/admin');
                    } elseif ($user['role_id'] == 2) {
                        redirect('dashboard/pegawai');
                    } elseif ($user['role_id'] == 3) {
                        redirect('dashboard/sekretaris');
                    } elseif ($user['role_id'] == 4) {
                        redirect('dashboard/kepegawaian');
                    } elseif ($user['role_id'] == 5) {
                        redirect('dashboard/perencanaan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                    "role="alert">Password Salah</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                "role="alert">Akun Ini Belum Di Aktifkan</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
            "role="alert">Akun Tidak Teregistrasi</div>');
            redirect('auth');
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('nip', 'nip', 'required|trim|is_unique[user.nip]', ['is_unique' => 'Data Sudah Ada']);
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]', ['min_length' => 'Password Terlalu Pendek']);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header');
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert">Congratulation! your account has been created. Please Login </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            "role="alert" style="margin-left:30px;margin-right:30px;"><p style="text-align:center;">Anda Sudah Keluar</p></div>');
        redirect('auth');
    }
}