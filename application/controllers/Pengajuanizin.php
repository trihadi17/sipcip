<?php

class Pengajuanizin extends CI_Controller
{
    //pegawai
    public function index()
    {
        $data['title'] = 'Pengajuan Izin';

        //mengambil nip,nama,bidang, dll dari tabel pegawai
        $data['info'] = $this->db->get_where('pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        //menampilkan tabel pengajuan sesuai nip
        $data['pengajuan_tabel'] = $this->db->get_where('pengajuan_izin', ['nip' => $this->session->userdata('nip'), 'tgl_pengajuan' => $b])->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuanizin/index', $data);
        $this->load->view('templates/footer', $data);
    }


    //sekabid
    public function indexsekabid()
    {
        $data['title'] = 'Pengajuan Izin SEKABID';

        //mengambil nip,nama,bidang, dll dari tabel pegawai
        $data['info'] = $this->db->get_where('pegawai', ['nip' => $this->session->userdata('nip')])->row_array();
        $a = new DateTime('now');
        $b = $a->format('Y-m-d');
        //menampilkan tabel pengajuan sesuai nip
        $data['pengajuan_tabel'] = $this->db->get_where('pengajuan_izin', ['nip' => $this->session->userdata('nip'), 'tgl_pengajuan' => $b])->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuanizin/sekabid', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('jenis_izin', 'Jenis_izin', 'required|trim', ['required' => 'Izin Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jam_mulai', 'Jam_mulai', 'required|trim', ['required' => 'Jam Mulai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jam_selesai', 'Jam_selesai', 'required|trim', ['required' => 'Jam Selesai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required|trim', ['required' => 'Perihal Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_pengajuan', 'Tgl_pengajuan', 'required|trim', ['required' => 'Tanggal Pengajuan Tidak Boleh Kosong']);



        $jenis = $this->input->post('jenis_izin');
        $a = new DateTime($this->input->post('jam_mulai'));
        $b = new DateTime($this->input->post('jam_selesai'));
        $c = $a->diff($b)->h;
        $e = $a->format('H');
        $f = $b->format('H');


        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            if ($a > $b | $a == $b | $e < 8 | $e > 16 | $f > 16) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                "role="alert">Jam Invalid / Tidak Sesuai Jam Kerja</div>');
                redirect('pengajuanizin/index');
            } else {
                if ($jenis == 'Sakit') {
                    $data = [
                        'nip' => $this->input->post('nip'),
                        'nama' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'jenis_izin' => $jenis,
                        'jam_mulai' => $this->input->post('jam_mulai'),
                        'jam_selesai' => $this->input->post('jam_selesai'),
                        'jumlah' => $c,
                        'perihal' => $this->input->post('perihal'),
                        'status' => 'Tunggu Persetujuan Kepala Bidang',
                        'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
                    ];

                    $this->db->insert('pengajuan_izin', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Izin Sakit Berhasil Ditambah</div>');
                    redirect('pengajuanizin/index');
                } elseif ($jenis == 'Keperluan Dinas') {
                    $data = [
                        'nip' => $this->input->post('nip'),
                        'nama' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'jenis_izin' => $jenis,
                        'jam_mulai' => $this->input->post('jam_mulai'),
                        'jam_selesai' => $this->input->post('jam_selesai'),
                        'jumlah' => $c,
                        'perihal' => $this->input->post('perihal'),
                        'status' => 'Tunggu Persetujuan Kepala Bidang',
                        'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
                    ];

                    $this->db->insert('pengajuan_izin', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Izin Sakit Berhasil Ditambah</div>');
                    redirect('pengajuanizin/index');
                } else {
                    if ($c > 5) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Pengajuan Izin Ditolak</div>');
                        redirect('pengajuanizin/index');
                    } else {
                        $data = [
                            'nip' => $this->input->post('nip'),
                            'nama' => $this->input->post('nama'),
                            'bidang' => $this->input->post('bidang'),
                            'jenis_izin' => $jenis,
                            'jam_mulai' => $this->input->post('jam_mulai'),
                            'jam_selesai' => $this->input->post('jam_selesai'),
                            'jumlah' => $c,
                            'perihal' => $this->input->post('perihal'),
                            'status' => 'Tunggu Persetujuan Kepala Bidang',
                            'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
                        ];

                        $this->db->insert('pengajuan_izin', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    "role="alert">Pengajuan Izin Alasan Penting Berhasil Ditambah</div>');
                        redirect('pengajuanizin/index');
                    }
                }
            }
        }
    }


    public function tambahhsekabid()
    {
        $this->form_validation->set_rules('jenis_izin', 'Jenis_izin', 'required|trim', ['required' => 'Izin Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jam_mulai', 'Jam_mulai', 'required|trim', ['required' => 'Jam Mulai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jam_selesai', 'Jam_selesai', 'required|trim', ['required' => 'Jam Selesai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('perihal', 'Perihal', 'required|trim', ['required' => 'Perihal Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_pengajuan', 'Tgl_pengajuan', 'required|trim', ['required' => 'Tanggal Pengajuan Tidak Boleh Kosong']);



        $jenis = $this->input->post('jenis_izin');
        $a = new DateTime($this->input->post('jam_mulai'));
        $b = new DateTime($this->input->post('jam_selesai'));
        $c = $a->diff($b)->h;
        $e = $a->format('H');
        $f = $b->format('H');



        if ($this->form_validation->run() == false) {
            $this->indexsekabid();
        } else {
            if ($a > $b | $a == $b | $e < 8 | $e > 16 | $f > 16) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                "role="alert">Jam Invalid / Tidak Sesuai Jam Kerja </div>');
                redirect('pengajuanizin/indexsekabid');
            } else {
                if ($jenis == 'Sakit') {
                    $data = [
                        'nip' => $this->input->post('nip'),
                        'nama' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'jenis_izin' => $jenis,
                        'jam_mulai' => $this->input->post('jam_mulai'),
                        'jam_selesai' => $this->input->post('jam_selesai'),
                        'jumlah' => $c,
                        'perihal' => $this->input->post('perihal'),
                        'status' => 'Tunggu Persetujuan Sekretaris',
                        'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
                    ];

                    $this->db->insert('pengajuan_izin', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Izin Sakit Berhasil Ditambah</div>');
                    redirect('pengajuanizin/indexsekabid');
                } elseif ($jenis == 'Keperluan Dinas') {
                    $data = [
                        'nip' => $this->input->post('nip'),
                        'nama' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'jenis_izin' => $jenis,
                        'jam_mulai' => $this->input->post('jam_mulai'),
                        'jam_selesai' => $this->input->post('jam_selesai'),
                        'jumlah' => $c,
                        'perihal' => $this->input->post('perihal'),
                        'status' => 'Tunggu Persetujuan Sekretaris',
                        'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
                    ];

                    $this->db->insert('pengajuan_izin', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Izin Sakit Berhasil Ditambah</div>');
                    redirect('pengajuanizin/indexsekabid');
                } else {
                    if ($c > 5) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Pengajuan Izin Ditolak</div>');
                        redirect('pengajuanizin/indexsekabid');
                    } else {
                        $data = [
                            'nip' => $this->input->post('nip'),
                            'nama' => $this->input->post('nama'),
                            'bidang' => $this->input->post('bidang'),
                            'jenis_izin' => $jenis,
                            'jam_mulai' => $this->input->post('jam_mulai'),
                            'jam_selesai' => $this->input->post('jam_selesai'),
                            'jumlah' => $c,
                            'perihal' => $this->input->post('perihal'),
                            'status' => 'Tunggu Persetujuan Sekretaris',
                            'tgl_pengajuan' => $this->input->post('tgl_pengajuan')
                        ];

                        $this->db->insert('pengajuan_izin', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    "role="alert">Pengajuan Izin Alasan Penting Berhasil Ditambah</div>');
                        redirect('pengajuanizin/indexsekabid');
                    }
                }
            }
        }
    }

    public function lihat($id)
    {
        $data['title'] = 'Pengajuan Izin';

        $where = array('id_izin' => $id);
        $data['pengajuan_izin'] = $this->pegawai_model->lihat_dataizin('pengajuan_izin', $where)->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuanizin/lihat', $data);
        $this->load->view('templates/footer', $data);
    }


    public function oke($id)
    {
        $this->load->library('mypdf');
        $data['title'] = 'Surat Izin';
        $where = array('id_izin' => $id);
        $data['ambil'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->result();
        $data['pengajuan_izin'] = $this->pegawai_model->lihat_dataizin('pengajuan_izin', $where)->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->mypdf->generate('pengajuanizin/oke', $data, 'surat_izin', 'A4', 'portrait');
        $this->load->view('templates/footer', $data);
    }
}