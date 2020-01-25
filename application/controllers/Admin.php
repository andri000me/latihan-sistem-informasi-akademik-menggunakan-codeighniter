<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Siakad';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
