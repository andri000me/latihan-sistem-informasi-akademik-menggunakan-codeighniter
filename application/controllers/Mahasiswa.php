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
        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required');

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

    public function detailDataMahasiswa($id)
    {
        $data['judul'] = 'Halaman Detail';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswaById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('detail', $data);
        $this->load->view('templates/footer');
    }

    public function print()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswa();

        $this->load->view('print_mahasiswa', $data);
    }

    public function pdf()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswa();

        $this->load->view('laporan_pdf', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation, $html);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_mahasiswa.pdf", ['Attachment' => 0]);
    }
}
