<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model');
        if (!$this->session->userdata('login')){
            redirect('login');
        }
        $this->load->model('auth_model');
    }

    public function index()
    {
        $data['anggota'] = $this->Anggota_model->get_all();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'tanggal_daftar' => $this->input->post('tanggal_daftar')
        ];

        $this->Anggota_model->insert($data);
        redirect('anggota');
    }

    public function edit($nomor_anggota)
    {
        $data['anggota'] = $this->Anggota_model->get_by_id($nomor_anggota);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    public function update($nomor_anggota)
    {
      $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
            'tanggal_daftar' => $this->input->post('tanggal_daftar')
        ];

        $this->Anggota_model->update($nomor_anggota, $data);
        redirect('anggota');
    }

    public function hapus($nomor_anggota)
    {
        $this->Anggota_model->delete($nomor_anggota);
        redirect('anggota');
    }

    public function cetak_anggota()
    {
        $bulan = $this->input->get('bulan');
        $nama = $this->input->get('nama');

        $this->db->from('anggota');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_daftar, "%Y-%m")=', $bulan);
        }
        if($nama){
            $this->db->like('nama', $nama);
        }
        $data['data'] = $this->db->get()->result();
        $data['bulan']= $bulan;
        $data['nama']= $nama;

        $this->load->view('laporan/cetak_daftar', $data);
    }
}