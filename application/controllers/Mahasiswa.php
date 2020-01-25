<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Halaman Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswa();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambahDataMahasiswa()
    {
        $this->Mahasiswa_model->tambahDataMahasiswa();
        redirect('Mahasiswa');
    }

    public function hapusDataMahasiswa($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        redirect('Mahasiswa');
    }

    public function ubahDataMahasiswa($id)
    {
        $data['judul'] = 'Halaman Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswaById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            redirect('Mahasiswa');
        }
    }
}
