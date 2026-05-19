<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp extends CI_Controller {

    public function kirim_notifikasi($id)
    {
        $this->db->select('
            peminjaman.*,
            anggota.nama,
            anggota.telepon
        ');

        $this->db->from('peminjaman');

        $this->db->join(
            'anggota',
            'anggota.nomor_anggota = peminjaman.anggota_id'
        );

        //berdasarkan id peminjaman
        $this->db->where('peminjaman.id', $id);

        $d = $this->db->get()->row();

        if(!$d){
            show_404();
        }

        $today = date('Y-m-d');

        $selisih = strtotime($today) - strtotime($d->tanggal_jatuh_tempo);

        $terlambat = $selisih > 0
            ? floor($selisih / 86400)
            : 0;

        //hanya kirim jika telat
        if($terlambat > 0){

            $pesan =
            "Halo ".$d->nama.", ".
            "Anda terlambat mengembalikan buku selama ".
            $terlambat." hari.";
            "Mohon segera dikembalikan ke perpustakaan.";

        $this->kirim_wa(
            $d->telepon,
            $pesan
        );

        $this->session->set_flashdata(
            'success',
            'Notifikasi WA berhasil dikirim'
        );

    } else {

    $this->session->set_flashdata(
            'error',
            'Anggota belum terlambat'
        );
    }

    redirect('peminjaman');
}
    // =====================
    //FUNCTION KIRIM WA
    // =====================
    private function kirim_wa($target, $message)
{
    $token = "XUQa2SMb9B6x6BoxioUd";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'target' => $target,
            'message' => $message
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ' . $token
        ),

        // Tambahkan ini untuk XAMPP localhost
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
    ));

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        $response = json_encode(array(
            'status' => false,
            'reason' => curl_error($curl)
        ));
    }

    curl_close($curl);

    return $response;
}
}