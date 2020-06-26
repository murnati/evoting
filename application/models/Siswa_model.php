<?php
class Siswa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('upload');
    }
    public function getAllSiswa()
    {
        //menampilkan data dari database
        // $query = $this->db->get('users');
        // return $query->result_array();

        //lebih mudah menggunakan method chining (method berantai)
        return $this->db->get('users')->result_array();
    }

    public function tambahDataSiswa()
    {
        $tambahsiswa = [
            "nis" => $this->input->post('nis', true),
            "password" => $this->input->post('pass', true),
            "nama" => $this->input->post('nama', true),
            "tanggal_lahir" => $this->input->post('tgl', true),
            "jk" => $this->input->post('jk', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "pemilih" => 'n'
        ];

        $this->db->insert('users', $tambahsiswa);
    }

    public function tambahDataKandidat()
    {

        $tambahkandidat = [
            "nis" => $this->input->post('nis', true),
            "foto" => $this->Siswa_model->uploadImageNative('foto', base_url('assets/img/vote/')),
            "visi" => $this->input->post('visi', true),
            "misi" => $this->input->post('misi', true),
        ];
        $this->db->insert('kandidat', $tambahkandidat);
    }


    public function hapusDataSiswa($nis)
    {
        $this->db->where('nis', $nis);
        $this->db->delete('users');
    }

    public function hapusDataKandidat($no_kandidat)
    {
        $this->db->where('no_kandidat', $no_kandidat);
        $this->db->delete('kandidat');
    }

    public function getSiswaByNis($nis)
    {
        return $this->db->get_where('users', ['nis' => $nis])->row_array();
    }

    public function getKandidatByNo($no_kandidat)
    {
        return $this->db->get_where('kandidat', ['no_kandidat' => $no_kandidat])->row_array();
    }

    public function editDataSiswa()
    {
        $data = [
            "nis" => $this->input->post('nis', true),
            "nama" => $this->input->post('nama', true),
            "tanggal_lahir" => $this->input->post('tgl', true),
            "jk" => $this->input->post('jk', true),
            "id_kelas" => $this->input->post('id_kelas', true),
            "pemilih" => 'n'
        ];

        $this->db->where('nis', $this->input->post('nis'));
        $this->db->update('users', $data);
    }

    public function editDataKandidat()
    {
        $data = [
            "nis" => $this->input->post('nis', true),
            "foto" => $this->input->post('foto', true),
            "periode" => $this->input->post('periode', true),
        ];

        $this->db->where('no_kandidat', $this->input->post('no_kandidat'));
        $this->db->update('kandidat', $data);
    }

    public function cariDataSiswa()
    {
        $keyword = $this->input->post('keyword', true);

        $this->db->like('nama', $keyword);
        $this->db->or_like('jk', $keyword);
        $this->db->or_like('nis', $keyword);
        $this->db->or_like('id_kelas', $keyword);

        return $this->db->get('users')->result_array();
    }

    public function otomatisPass($pass)
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $pass);
    }

    public function imageData($name)
    {

        $config['upload_path'] = base_url('assets/img/vote/');
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name']            = $this->input->post($name, true);
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data($config['file_name']);
        }

        return "default.png";
    }

    public function uploadImageNative($name, $folder)
    {
        $namaFile = $_FILES[$name]['name'];
        $ukuranFile = $_FILES[$name]['size'];
        $error = $_FILES[$name]['error'];
        $tmpName = $_FILES[$name]['tmp_name'];

        $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            return false;
        }

        if ($ukuranFile > 5000000) {
            echo "<script>
            alert('ukuran gambar terlalu besar');
            </script>";
            return false;
        }
        $namaFileBaru = uniqid();
        $namaFileBaru = '.';
        $namaFileBaru = $ekstensiGambar;
        $hasil =  $namaFileBaru;

        move_uploaded_file($tmpName, $folder . $hasil);
        return $hasil;
    }
}
