<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function construct()
    {
        parent::construct();
        cek_login();
        cek_admin();
    }
    public function index()
    {
        $data['judul']='Dashboard';
        $data['user']=$this->ModelUser->cekData(['email'=>$this->session->userdata('email')])->row_array();
        $data['anggota']=$this->ModelUser->getUserLimit()->result_array();
        $data['buku']=$this->ModelBuku->getBuku()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
/* Copyright - Kelompok 2 ~ 12.3A.21 ~  Universitas Bina Sarana Informatika Purwokerto */