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
        return $this->db->get('tb_mahasiswa', ['id' => $id])->row_array();
    }

    public function tambahDataMahasiswa()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'nim' => htmlspecialchars($this->input->post('nim', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'jurusan' => $this->input->post('jurusan')
        ];

        $this->db->insert('tb_mahasiswa', $data);
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
}
