<?php

class Pengajuancuti extends CI_Controller
{
    //pegawai
    public function index()
    {
        $data['title'] = 'Pengajuan Cuti';

        //mencari jumlah cuti tahunan yang sudah di konfirmasi
        $data['tahunan'] = $this->pengajuan_model->jumlahcuti()->result();

        //mencari jumlah cuti besar yang sudah di konfirmasi
        $data['besar'] = $this->pengajuan_model->jumlahcutibesar()->result();

        //mengambil nip,nama,bidang, dll dari tabel pegawai
        $data['info'] = $this->db->get_where('pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

        //menampilkan tabel pengajuan sesuai nip
        $data['pengajuan_tabel'] = $this->db->get_where('pengajuan_cuti', ['nip' => $this->session->userdata('nip')])->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuancuti/index', $data);
        $this->load->view('templates/footer', $data);
    }
    //tampilan sekretaris kabid
    public function indexsekabid()
    {
        $data['title'] = 'Pengajuan Cuti SEKABID';

        //mencari jumlah cuti tahunan yang sudah di konfirmasi
        $data['tahunan'] = $this->pengajuan_model->jumlahcuti()->result();

        //mencari jumlah cuti besar yang sudah di konfirmasi
        $data['besar'] = $this->pengajuan_model->jumlahcutibesar()->result();

        //mengambil nip,nama,bidang, dll dari tabel pegawai
        $data['info'] = $this->db->get_where('pegawai', ['nip' => $this->session->userdata('nip')])->row_array();

        //menampilkan tabel pengajuan sesuai nip
        $data['pengajuan_tabel'] = $this->db->get_where('pengajuan_cuti', ['nip' => $this->session->userdata('nip')])->result();

        //mengambil data berdasarkan akun yang login
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        //untuk tampilan sekabid
        $this->load->view('pengajuancuti/sekabid', $data);
        $this->load->view('templates/footer', $data);
    }


    //pegawai
    public function tambah()
    {

        $this->form_validation->set_rules('jenis_cuti', 'Jenis_cuti', 'required|trim', ['required' => 'Cuti Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_mulai', 'Tgl_mulai', 'required|trim', ['required' => 'Tanggal Mulai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_selesai', 'Tgl_selesai', 'required|trim', ['required' => 'Tanggal Selesai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('alasan', 'alasan', 'required|trim', ['required' => 'Alasan Tidak Boleh Kosong']);

        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $bidang = $this->input->post('bidang');
        $jeniscuti = $this->input->post('jenis_cuti');
        $mulai = new DateTime($this->input->post('tgl_mulai'));
        $selesai = new DateTime($this->input->post('tgl_selesai'));
        $jumlahhari = $mulai->diff($selesai)->days;
        $alasan = $this->input->post('alasan');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('no_hp');



        $tahun = $this->input->post('jtahun');
        $besar = $this->input->post('jbesar');
        $t1 = new DateTime($this->input->post('tgl_bekerja'));
        $t2 = new DateTime('now');
        $t3 = $t1->diff($t2)->y;
        $t4 = $t2->format('Y');


        $daterange = new DatePeriod($mulai, new DateInterval('P1D'), $selesai);
        //mendapatkan range antara dua tanggal dan di looping
        $i = 0;
        $x = 0;
        $end = 1;

        foreach ($daterange as $date) {
            $daterange = $date->format("Y-m-d");
            $datetime = DateTime::createFromFormat('Y-m-d', $daterange);

            //Convert tanggal untuk mendapatkan nama hari
            $day = $datetime->format('D');

            //Check untuk menghitung yang bukan hari sabtu dan minggu
            if ($day != "Sun" && $day != "Sat") {
                //echo $i;
                $x += $end - $i;
            }
            $end++;
            $i++;
        }

        //cek apakah jumlah cuti diajukan + jumlah cuti yang pernah di ajukan
        $cek = $tahun + $x;

        /*  $data = [
            'nip' => $nip,
            'nama' => $nama,
            'bidang' => $bidang,
            'jenis_cuti' => $jeniscuti,
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'jumlah' => $x,
            'alasan' => $alasan,
            'alamat' => $alamat,
            'no_hp' => $nohp,
            'status' => 'Tunggu Persetujuan Kepala Bidang'

        ];

        $this->db->insert('pengajuan_cuti', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        "role="alert">Pengajuan Cuti Berhasil Ditambah</div>');
        redirect('pengajuancuti/index'); */

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {

            //cek apakah tanggal nya valid atau enggak
            if ($mulai > $selesai | $mulai < $t2 | $selesai < $t2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                "role="alert">Tanggal Invalid</div>');
                redirect('pengajuancuti/index');
            } else {
                //cek jenis cuti
                if ($jeniscuti == 'Tahunan') {
                    // Cek Masa Kerja
                    if ($t3 < 1) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Anda Hanya Bisa Mengajukan Jika Sudah 1 Tahun Kerja </div>');
                        redirect('pengajuancuti/index');
                    } else {
                        //cek apakah sudah mengambil cuti besar atau belum
                        if ($besar > 0) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                            "role="alert">Cuti Tahunan Tidak Bisa Di Ajukan Karna Anda Sudah Ambil Cuti Besar </div>');
                            redirect('pengajuancuti/index');
                        } else {
                            //cek jumlah cuti tahunan yang sudah dipakai
                            if ($tahun >= 12) {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                "role="alert">Cuti Tahunan Anda Habis </div>');
                                redirect('pengajuancuti/index');
                            } else {
                                // cek jumlah cuti tahunan  + jumlah yang diajukan sekarang
                                if ($cek > 12) {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                    "role="alert">Jumlah Cuti Yang Anda Ajukan Sudah Melebihi Jatah Cuti Tahunan </div>');
                                    redirect('pengajuancuti/index');
                                } else {
                                    if ($x > 12) {
                                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                    "role="alert">Jumlah Cuti Tahunan Anda Melebihi Jatah Cuti </div>');
                                        redirect('pengajuancuti/index');
                                    } else {
                                        $data = [
                                            'nip' => $nip,
                                            'nama' => $nama,
                                            'bidang' => $bidang,
                                            'jenis_cuti' => $jeniscuti,
                                            'tgl_mulai' => $this->input->post('tgl_mulai'),
                                            'tgl_selesai' => $this->input->post('tgl_selesai'),
                                            'jumlah' => $x,
                                            'alasan' => $alasan,
                                            'alamat' => $alamat,
                                            'no_hp' => $nohp,
                                            'status' => 'Tunggu Persetujuan Kepala Bidang',
                                            'tahun' => $t4

                                        ];

                                        $this->db->insert('pengajuan_cuti', $data);
                                        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                                    "role="alert">Pengajuan Cuti Tahunan Berhasil Ditambah</div>');
                                        redirect('pengajuancuti/index');
                                    }
                                }
                                //cek untuk inputan tahunan kalau lebih dari 12

                            }
                        }
                    }

                    //cek jenis cuti
                } elseif ($jeniscuti == 'Sakit') {
                    $data = [
                        'nip' => $nip,
                        'nama' => $nama,
                        'bidang' => $bidang,
                        'jenis_cuti' => $jeniscuti,
                        'tgl_mulai' => $this->input->post('tgl_mulai'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                        'jumlah' => $jumlahhari,
                        'alasan' => $alasan,
                        'alamat' => $alamat,
                        'no_hp' => $nohp,
                        'status' => 'Tunggu Persetujuan Kepala Bidang',
                        'tahun' => $t4

                    ];

                    $this->db->insert('pengajuan_cuti', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Cuti Sakit Berhasil Ditambah</div>');
                    redirect('pengajuancuti/index');
                } elseif ($jeniscuti == 'Melahirkan') {
                    if ($jumlahhari > 90) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Jumlah Cuti Melahirkan Melebihi Ketentuan</div>');
                        redirect('pengajuancuti/index');
                    } else {
                        $data = [
                            'nip' => $nip,
                            'nama' => $nama,
                            'bidang' => $bidang,
                            'jenis_cuti' => $jeniscuti,
                            'tgl_mulai' => $this->input->post('tgl_mulai'),
                            'tgl_selesai' => $this->input->post('tgl_selesai'),
                            'jumlah' => $jumlahhari,
                            'alasan' => $alasan,
                            'alamat' => $alamat,
                            'no_hp' => $nohp,
                            'status' => 'Tunggu Persetujuan Kepala Bidang',
                            'tahun' => $t4

                        ];

                        $this->db->insert('pengajuan_cuti', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    "role="alert">Pengajuan Cuti Hamil Berhasil Ditambah</div>');
                        redirect('pengajuancuti/index');
                    }
                } elseif ($jeniscuti == 'Alasan Penting') {
                    $data = [
                        'nip' => $nip,
                        'nama' => $nama,
                        'bidang' => $bidang,
                        'jenis_cuti' => $jeniscuti,
                        'tgl_mulai' => $this->input->post('tgl_mulai'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                        'jumlah' => $jumlahhari,
                        'alasan' => $alasan,
                        'alamat' => $alamat,
                        'no_hp' => $nohp,
                        'status' => 'Tunggu Persetujuan Kepala Bidang',
                        'tahun' => $t4

                    ];

                    $this->db->insert('pengajuan_cuti', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Cuti Alasan Penting Berhasil Ditambah</div>');
                    redirect('pengajuancuti/index');
                } elseif ($jeniscuti == 'Besar') {
                    if ($t3 < 6) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Anda Hanya Bisa Mengajukan Jika Sudah 6 Tahun Kerja </div>');
                        redirect('pengajuancuti/index');
                    } else {
                        if ($jumlahhari > 90) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                            "role="alert">Jumlah Cuti Besar Melebihi Ketentuan</div>');
                            redirect('pengajuancuti/index');
                        } else {
                            $data = [
                                'nip' => $nip,
                                'nama' => $nama,
                                'bidang' => $bidang,
                                'jenis_cuti' => $jeniscuti,
                                'tgl_mulai' => $this->input->post('tgl_mulai'),
                                'tgl_selesai' => $this->input->post('tgl_selesai'),
                                'jumlah' => $jumlahhari,
                                'alasan' => $alasan,
                                'alamat' => $alamat,
                                'no_hp' => $nohp,
                                'status' => 'Tunggu Persetujuan Kepala Bidang',
                                'tahun' => $t4

                            ];

                            $this->db->insert('pengajuan_cuti', $data);
                            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                        "role="alert">Pengajuan Cuti Besar Berhasil Ditambah</div>');
                            redirect('pengajuancuti/index');
                        }
                    }
                } elseif ($jeniscuti == 'Diluar Tanggungan Negara') {
                    if ($t3 < 5) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Anda Hanya Bisa Mengajukan Jika Sudah 5 Tahun Kerja </div>');
                        redirect('pengajuancuti/index');
                    } else {
                        if ($jumlahhari > 1095) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                            "role="alert">Jumlah Cuti Diluar Tanggungan Negara Melebihi Ketentuan</div>');
                            redirect('pengajuancuti/index');
                        } else {
                            $data = [
                                'nip' => $nip,
                                'nama' => $nama,
                                'bidang' => $bidang,
                                'jenis_cuti' => $jeniscuti,
                                'tgl_mulai' => $this->input->post('tgl_mulai'),
                                'tgl_selesai' => $this->input->post('tgl_selesai'),
                                'jumlah' => $jumlahhari,
                                'alasan' => $alasan,
                                'alamat' => $alamat,
                                'no_hp' => $nohp,
                                'status' => 'Tunggu Persetujuan Kepala Bidang',
                                'tahun' => $t4

                            ];

                            $this->db->insert('pengajuan_cuti', $data);
                            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                        "role="alert">Pengajuan Cuti Diluar Tanggungan Negara Berhasil Ditambah</div>');
                            redirect('pengajuancuti/index');
                        }
                    }
                }
            }
        }
    }
    //sekabid
    public function tambahh()
    {

        $this->form_validation->set_rules('jenis_cuti', 'Jenis_cuti', 'required|trim', ['required' => 'Cuti Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_mulai', 'Tgl_mulai', 'required|trim', ['required' => 'Tanggal Mulai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_selesai', 'Tgl_selesai', 'required|trim', ['required' => 'Tanggal Selesai Tidak Boleh Kosong']);
        $this->form_validation->set_rules('alasan', 'alasan', 'required|trim', ['required' => 'Alasan Tidak Boleh Kosong']);

        $nip = $this->input->post('nip');
        $nama = $this->input->post('nama');
        $bidang = $this->input->post('bidang');
        $jeniscuti = $this->input->post('jenis_cuti');
        $mulai = new DateTime($this->input->post('tgl_mulai'));
        $selesai = new DateTime($this->input->post('tgl_selesai'));
        $jumlahhari = $mulai->diff($selesai)->days;
        $alasan = $this->input->post('alasan');
        $alamat = $this->input->post('alamat');
        $nohp = $this->input->post('no_hp');



        $tahun = $this->input->post('jtahun');
        $besar = $this->input->post('jbesar');
        $t1 = new DateTime($this->input->post('tgl_bekerja'));
        $t2 = new DateTime('now');
        $t3 = $t1->diff($t2)->y;
        $t4 = $t2->format('Y');



        $daterange = new DatePeriod($mulai, new DateInterval('P1D'), $selesai);
        //mendapatkan range antara dua tanggal dan di looping
        $i = 0;
        $x = 0;
        $end = 1;

        foreach ($daterange as $date) {
            $daterange = $date->format("Y-m-d");
            $datetime = DateTime::createFromFormat('Y-m-d', $daterange);

            //Convert tanggal untuk mendapatkan nama hari
            $day = $datetime->format('D');

            //Check untuk menghitung yang bukan hari sabtu dan minggu
            if ($day != "Sun" && $day != "Sat") {
                //echo $i;
                $x += $end - $i;
            }
            $end++;
            $i++;
        }

        //cek apakah jumlah cuti diajukan + jumlah cuti yang pernah di ajukan
        $cek = $tahun + $x;

        /*  $data = [
            'nip' => $nip,
            'nama' => $nama,
            'bidang' => $bidang,
            'jenis_cuti' => $jeniscuti,
            'tgl_mulai' => $this->input->post('tgl_mulai'),
            'tgl_selesai' => $this->input->post('tgl_selesai'),
            'jumlah' => $x,
            'alasan' => $alasan,
            'alamat' => $alamat,
            'no_hp' => $nohp,
            'status' => 'Tunggu Persetujuan Kepala Bidang'

        ];

        $this->db->insert('pengajuan_cuti', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
        "role="alert">Pengajuan Cuti Berhasil Ditambah</div>');
        redirect('pengajuancuti/index'); */

        if ($this->form_validation->run() == false) {
            $this->indexsekabid();
        } else {

            //cek apakah tanggal nya valid atau enggak
            if ($mulai > $selesai | $mulai < $t2 | $selesai < $t2) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                "role="alert">Tanggal Invalid</div>');
                redirect('pengajuancuti/indexsekabid');
            } else {
                //cek jenis cuti
                if ($jeniscuti == 'Tahunan') {
                    // Cek Masa Kerja
                    if ($t3 < 1) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Anda Hanya Bisa Mengajukan Jika Sudah 1 Tahun Kerja </div>');
                        redirect('pengajuancuti/indexsekabid');
                    } else {
                        //cek apakah sudah mengambil cuti besar atau belum
                        if ($besar > 0) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                            "role="alert">Cuti Tahunan Tidak Bisa Di Ajukan Karna Anda Sudah Ambil Cuti Besar </div>');
                            redirect('pengajuancuti/indexsekabid');
                        } else {
                            //cek jumlah cuti tahunan yang sudah dipakai
                            if ($tahun >= 12) {
                                $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                "role="alert">Cuti Tahunan Anda Habis </div>');
                                redirect('pengajuancuti/indexsekabid');
                            } else {
                                // cek jumlah cuti tahunan  + jumlah yang diajukan sekarang
                                if ($cek > 12) {
                                    $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                    "role="alert">Jumlah Cuti Yang Anda Ajukan Sudah Melebihi Jatah Cuti Tahunan </div>');
                                    redirect('pengajuancuti/indexsekabid');
                                } else {
                                    if ($x > 12) {
                                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                                    "role="alert">Jumlah Cuti Tahunan Anda Melebihi Jatah Cuti </div>');
                                        redirect('pengajuancuti/indexsekabid');
                                    } else {
                                        $data = [
                                            'nip' => $nip,
                                            'nama' => $nama,
                                            'bidang' => $bidang,
                                            'jenis_cuti' => $jeniscuti,
                                            'tgl_mulai' => $this->input->post('tgl_mulai'),
                                            'tgl_selesai' => $this->input->post('tgl_selesai'),
                                            'jumlah' => $x,
                                            'alasan' => $alasan,
                                            'alamat' => $alamat,
                                            'no_hp' => $nohp,
                                            'status' => 'Tunggu Persetujuan Admin',
                                            'tahun' => $t4
                                        ];

                                        $this->db->insert('pengajuan_cuti', $data);
                                        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                                    "role="alert">Pengajuan Cuti Tahunan Berhasil Ditambah</div>');
                                        redirect('pengajuancuti/indexsekabid');
                                    }
                                }
                                //cek untuk inputan tahunan kalau lebih dari 12

                            }
                        }
                    }

                    //cek jenis cuti
                } elseif ($jeniscuti == 'Sakit') {
                    $data = [
                        'nip' => $nip,
                        'nama' => $nama,
                        'bidang' => $bidang,
                        'jenis_cuti' => $jeniscuti,
                        'tgl_mulai' => $this->input->post('tgl_mulai'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                        'jumlah' => $jumlahhari,
                        'alasan' => $alasan,
                        'alamat' => $alamat,
                        'no_hp' => $nohp,
                        'status' => 'Tunggu Persetujuan Admin',
                        'tahun' => $t4

                    ];

                    $this->db->insert('pengajuan_cuti', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Cuti Sakit Berhasil Ditambah</div>');
                    redirect('pengajuancuti/indexsekabid');
                } elseif ($jeniscuti == 'Melahirkan') {
                    if ($jumlahhari > 90) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Jumlah Cuti Melahirkan Melebihi Ketentuan</div>');
                        redirect('pengajuancuti/indexsekabid');
                    } else {
                        $data = [
                            'nip' => $nip,
                            'nama' => $nama,
                            'bidang' => $bidang,
                            'jenis_cuti' => $jeniscuti,
                            'tgl_mulai' => $this->input->post('tgl_mulai'),
                            'tgl_selesai' => $this->input->post('tgl_selesai'),
                            'jumlah' => $jumlahhari,
                            'alasan' => $alasan,
                            'alamat' => $alamat,
                            'no_hp' => $nohp,
                            'status' => 'Tunggu Persetujuan Admin',
                            'tahun' => $t4

                        ];

                        $this->db->insert('pengajuan_cuti', $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" 
                    "role="alert">Pengajuan Cuti Hamil Berhasil Ditambah</div>');
                        redirect('pengajuancuti/indexsekabid');
                    }
                } elseif ($jeniscuti == 'Alasan Penting') {
                    $data = [
                        'nip' => $nip,
                        'nama' => $nama,
                        'bidang' => $bidang,
                        'jenis_cuti' => $jeniscuti,
                        'tgl_mulai' => $this->input->post('tgl_mulai'),
                        'tgl_selesai' => $this->input->post('tgl_selesai'),
                        'jumlah' => $jumlahhari,
                        'alasan' => $alasan,
                        'alamat' => $alamat,
                        'no_hp' => $nohp,
                        'status' => 'Tunggu Persetujuan Admin',
                        'tahun' => $t4

                    ];

                    $this->db->insert('pengajuan_cuti', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" 
                "role="alert">Pengajuan Cuti Alasan Penting Berhasil Ditambah</div>');
                    redirect('pengajuancuti/indexsekabid');
                } elseif ($jeniscuti == 'Besar') {
                    if ($t3 < 6) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Anda Hanya Bisa Mengajukan Jika Sudah 6 Tahun Kerja </div>');
                        redirect('pengajuancuti/indexsekabid');
                    } else {
                        if ($jumlahhari > 90) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                            "role="alert">Jumlah Cuti Besar Melebihi Ketentuan</div>');
                            redirect('pengajuancuti/indexsekabid');
                        } else {
                            $data = [
                                'nip' => $nip,
                                'nama' => $nama,
                                'bidang' => $bidang,
                                'jenis_cuti' => $jeniscuti,
                                'tgl_mulai' => $this->input->post('tgl_mulai'),
                                'tgl_selesai' => $this->input->post('tgl_selesai'),
                                'jumlah' => $jumlahhari,
                                'alasan' => $alasan,
                                'alamat' => $alamat,
                                'no_hp' => $nohp,
                                'status' => 'Tunggu Persetujuan Admin',
                                'tahun' => $t4

                            ];

                            $this->db->insert('pengajuan_cuti', $data);
                            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                        "role="alert">Pengajuan Cuti Besar Berhasil Ditambah</div>');
                            redirect('pengajuancuti/indexsekabid');
                        }
                    }
                } elseif ($jeniscuti == 'Diluar Tanggungan Negara') {
                    if ($t3 < 5) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                        "role="alert">Anda Hanya Bisa Mengajukan Jika Sudah 5 Tahun Kerja </div>');
                        redirect('pengajuancuti/indexsekabid');
                    } else {
                        if ($jumlahhari > 1095) {
                            $this->session->set_flashdata('message', '<div class="alert alert-danger" 
                            "role="alert">Jumlah Cuti Diluar Tanggungan Negara Melebihi Ketentuan</div>');
                            redirect('pengajuancuti/indexsekabid');
                        } else {
                            $data = [
                                'nip' => $nip,
                                'nama' => $nama,
                                'bidang' => $bidang,
                                'jenis_cuti' => $jeniscuti,
                                'tgl_mulai' => $this->input->post('tgl_mulai'),
                                'tgl_selesai' => $this->input->post('tgl_selesai'),
                                'jumlah' => $jumlahhari,
                                'alasan' => $alasan,
                                'alamat' => $alamat,
                                'no_hp' => $nohp,
                                'status' => 'Tunggu Persetujuan Admin',
                                'tahun' => $t4

                            ];

                            $this->db->insert('pengajuan_cuti', $data);
                            $this->session->set_flashdata('message', '<div class="alert alert-success" 
                        "role="alert">Pengajuan Cuti Diluar Tanggungan Negara Berhasil Ditambah</div>');
                            redirect('pengajuancuti/indexsekabid');
                        }
                    }
                }
            }
        }
    }



    public function lihat($id)
    {
        $data['title'] = 'Pengajuan Cuti';

        $where = array('id_cuti' => $id);
        $data['pengajuan_cuti'] = $this->pegawai_model->lihat_data('pengajuan_cuti', $where)->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuancuti/lihat', $data);
        $this->load->view('templates/footer', $data);
    }


    public function oke($id)
    {
        $this->load->library('mypdf');
        $data['title'] = 'Surat Cuti';
        $where = array('id_cuti' => $id);
        $data['pengajuan_cuti'] = $this->pegawai_model->lihat_data('pengajuan_cuti', $where)->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->mypdf->generate('pengajuancuti/oke', $data, 'surat_cuti', 'A4', 'portrait');
        $this->load->view('templates/footer', $data);
    }
    //pengajuancuti sekretaris dan kabid 


    /* //ujicoba print
    public function print()
    {
        $data['title'] = 'Pengajuan Cuti';
        $data['pengajuan_tabel'] = $this->db->get_where('pengajuan_cuti', ['nip' => $this->session->userdata('nip')])->result();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        //mengambil template (dipecah pecah biar di index cuman sintak html aja)
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengajuancuti/oke', $data);
        $this->load->view('templates/footer', $data);
    } */
}