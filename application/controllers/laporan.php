<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan=$this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.nomor_anggota = peminjaman.anggota_id');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m")=', $bulan);
        }
        $data['data']= $this->db->get()->result();
        $data['bulan']= $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function anggota()
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

        $data['bulan'] = $bulan;
        $data['nama'] = $nama;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/anggota', $data);
        $this->load->view('templates/footer');
    }

    public function buku()
    {
        $penulis = $this->input->get('penulis');
        $penerbit = $this->input->get('penerbit');

        $this->db->from('buku');

        if($penulis){
            $this->db->where('penulis', $penulis);
        }
        if($penerbit){
            $this->db->where('penerbit', $penerbit);
        }
        
        $data['data'] = $this->db->get()->result();
        $data['penulis'] = $penulis;
        $data['penerbit'] = $penerbit;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/buku', $data);
        $this->load->view('templates/footer');
    }
}