<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Halaman Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswa();

        if ($this->input->post('keyword')) {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('mahasiswa', $data);
        $this->load->view('templates/footer');
    }

    public function tambahDataMahasiswa()
    {
        $this->Mahasiswa_model->tambahDataMahasiswa();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Ditambahkan<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('Mahasiswa');
    }

    public function hapusDataMahasiswa($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Mobil Berhasil Dihapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Mahasiswa Berhasil Diubah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
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

    public function excel()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllDataMahasiswa();

        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("Ahmad Mishbakhud Diyar");
        $object->getProperties()->setLastModifiedBy("Ahmad Mishbakhud Diyar");
        $object->getProperties()->setTitle("Ahmad Mishbakhud Diyar");

        $object->setActiveSheetIndex(0);

        $object->setActiveSheet()->setCellValue('A1', 'NO');
        $object->setActiveSheet()->setCellValue('B1', 'NAMA MAHASISWA');
        $object->setActiveSheet()->setCellValue('C1', 'NIM');
        $object->setActiveSheet()->setCellValue('D1', 'TANGGAL LAHIR');
        $object->setActiveSheet()->setCellValue('E1', 'JURUSAN');
        $object->setActiveSheet()->setCellValue('F1', 'ALAMAT');
        $object->setActiveSheet()->setCellValue('G1', 'EMAIL');
        $object->setActiveSheet()->setCellValue('H1', 'NO. TELEPON');

        $baris = 2;
        $no = 1;

        foreach ($data['mahasiswa'] as $mhs) {
            $object->getActiveSheet()->setCellValue('A' . $baris, $no++);
            $object->getActiveSheet()->setCellValue('B' . $baris, $mhs['nama']);
            $object->getActiveSheet()->setCellValue('C' . $baris, $mhs['nim']);
            $object->getActiveSheet()->setCellValue('D' . $baris, $mhs['tgl_lahir']);
            $object->getActiveSheet()->setCellValue('E' . $baris, $mhs['jurusan']);
            $object->getActiveSheet()->setCellValue('F' . $baris, $mhs['alamat']);
            $object->getActiveSheet()->setCellValue('G' . $baris, $mhs['email']);
            $object->getActiveSheet()->setCellValue('H' . $baris, $mhs['no_telp']);

            $baris++;
        }

        $filename = "Data Mahasiswa" . 'xlsx';

        $object->getActiveSheet()->setTitle("Data Mahasiswa");

        header('Content-type: application/
            vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename"' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = PHPExcel_IOFactory::createWriter($object, 'excel2007');
        $writer->save('php://output');

        exit;
    }
}
