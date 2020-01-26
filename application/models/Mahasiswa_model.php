<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function getAllDataMahasiswa()
    {
        return $this->db->get('tb_mahasiswa')->result_array();
    }

    public function getAllDataMahasiswaById($id)
    {
        return $this->db->get_where('tb_mahasiswa', ['id' => $id])->row_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'jurusan' => $this->input->post('jurusan'),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
            'foto' => $this->_uploadGambar()
        ];

        $this->db->insert('tb_mahasiswa', $data);
    }

    private function _uploadGambar()
    {
        $config['upload_path']          = './assets/imgDataMahasiswa/';
        $config['allowed_types']        = 'jpeg|jpg|png|gif';
        $config['max_size']             = '5000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
        }
    }

    public function ubahDataMahasiswa()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'jurusan' => $this->input->post('jurusan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->delete('tb_mahasiswa', ['id' => $id]);
    }

    public function cariDataMahasiswa()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);

        return $this->db->get('tb_mahasiswa')->result_array();
    }
}
