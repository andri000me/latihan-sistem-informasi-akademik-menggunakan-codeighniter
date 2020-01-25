<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
    public function getAllDataMahasiswa()
    {
        return $this->db->get('tb_mahasiswa')->result_array();
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
}
