<?php

class Vote extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Voting');
        $this->load->model('Siswa_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
        // header('Cache-Control: no-cache, must-revalidate, max-age=0');
        // header('Cache-Control: post-check=0, pre-check=0', false);
        // header('Pragma: no-cache');
    }
    public function user()
    {
        $data['kandidat'] = $this->db->get('kandidat')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header_user', $data);
        $this->load->view('home/user', $data);
        // $this->load->view('templates/footer');
    }

    public function operator()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header_operator', $data);
        $this->load->view('home/operator');
        $this->load->view('templates/footer');
    }

    public function admin()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('home/admin');
        $this->load->view('templates/footer');
    }

    public function siswa()
    {
        $data['tb_users'] = $this->db->get('users')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        if ($this->input->post('keyword')) {
            $data['tb_users'] = $this->Siswa_model->cariDataSiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('siswa/index');
        $this->load->view('templates/footer');
    }

    public function siswaOp()
    {
        $data['tb_users'] = $this->db->get('users')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        if ($this->input->post('keyword')) {
            $data['tb_users'] = $this->Siswa_model->cariDataSiswa();
        }
        $this->load->view('templates/header_operator', $data);
        $this->load->view('siswa/index_op');
        // $this->load->view('templates/footer');
    }

    public function tambahDataSiswa()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'tambah data siswa';
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['generate'] = $this->Siswa_model->otomatisPass(8);
        $this->form_validation->set_rules('nis', 'Nis', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('siswa/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahDataSiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('vote/siswa'));
        }
    }

    public function tambahDataSiswaOp()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'tambah data siswa';
        $data['kelas'] = $this->db->get('kelas')->result_array();
        $data['generate'] = $this->Siswa_model->otomatisPass(8);
        $this->form_validation->set_rules('nis', 'Nis', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('pass', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_operator', $data);
            $this->load->view('siswa/tambah_op', $data);
            // $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahDataSiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('vote/siswaOp'));
        }
    }

    public function kandidat()
    {
        $data['tb_kandidat'] = $this->db->get('kandidat')->result_array();
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('kandidat/index');
        $this->load->view('templates/footer');
    }

    public function tambahDataKandidat()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'tambah data kandidat';
        $data['generate'] = $this->Siswa_model->otomatisPass(8);
        $this->form_validation->set_rules('nis', 'Nis', 'required|numeric');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kandidat/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->tambahDataKandidat();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect(base_url('vote/kandidat'));
        }
    }


    public function voter()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('menu/voter');
        $this->load->view('templates/footer');
    }

    public function hasil()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header', $data);
        $this->load->view('menu/hasil');
        $this->load->view('templates/footer');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('home/index'));
    }

    public function hapus($nis)
    {
        $this->Siswa_model->hapusDataSiswa($nis);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('vote/siswa'));
    }

    public function hapus_op($nis)
    {
        $this->Siswa_model->hapusDataSiswa($nis);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('vote/siswaOp'));
    }

    public function edit($nis)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['siswa'] = $this->Siswa_model->getSiswaByNis($nis);
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('siswa/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editDataSiswa();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/siswa'));
        }
    }

    public function edit_op($nis)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['siswa'] = $this->Siswa_model->getSiswaByNis($nis);
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_operator', $data);
            $this->load->view('siswa/edit_op', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editDataSiswa();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/siswaOp'));
        }
    }

    public function editKandidat($no_kandidat)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form Edit Data Siswa';
        $data['kandidat'] = $this->Siswa_model->getKandidatByNo($no_kandidat);

        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('foto', 'Foto', 'required');
        $this->form_validation->set_rules('visi', 'Visi', 'required');
        $this->form_validation->set_rules('misi', 'Misi', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('kandidat/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->editDataKandidat();
            $this->session->set_flashdata('flash', 'Diedit');
            redirect(base_url('vote/kandidat'));
        }
    }

    public  function detail_kandidat($no_kandidat)
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Detail Data Kandidat';
        $data['kandidat'] = $this->Siswa_model->getKandidatByNo($no_kandidat);
        $this->load->view('templates/header', $data);
        $this->load->view('kandidat/detail', $data);
        $this->load->view('templates/footer');
    }

    public function hapus_kandidat($no_kandidat)
    {
        $this->Siswa_model->hapusDataKandidat($no_kandidat);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect(base_url('vote/kandidat'));
    }

    public function profile()
    {
    }

    public function visimisi()
    {
    }

    public function voting()
    {
    }
    public function gantipass()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'Form ganti password';
        $data['user'] = $this->db->get_where('users', ['nis' => $this->session->userdata('nis')])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('menu/ganti_pass');
        // $this->load->view('templates/footer');
    }
    public function gantipass_op()
    {
        $data['level'] = $this->session->level;
        $data['judul'] = 'E - Voting';
        $this->load->view('templates/header_operator', $data);
        $this->load->view('menu/ganti_pass_op');
        // $this->load->view('templates/footer');
    }
}
