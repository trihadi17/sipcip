<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    //hak akses
    public function __construct()
    {
        parent::__construct();
        //mengecek apakah dia sudah login/belum (gunanya biar supaya tidak bisa masuk tampilan admin ketika belum login)
        if (!$this->session->userdata('nip')) {
            redirect(auth);
        }
    }

    public function index()
    {

        $data['title'] = 'Dashboard';
        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');


    }

}