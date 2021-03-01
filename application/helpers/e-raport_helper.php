<?php

function is_logged_in()
{
    // UNTUK MENGGUNAKAN STRUKTUR FUNGSI THIS HARUS MEMANGGIL INSTANCE CI BARU UNTUK HELPER INI, DENGAM MEMANGGIL FUNGSI GET_INSTANCE
    $CI = get_instance();
    if (!$CI->session->userdata('Email')) {
        redirect('Auth');
    } else {
        $HakAkses_ID = $CI->session->userdata('HakAkses_ID');
        $Menu = $CI->uri->segment(1);

        $queryMENU = $CI->db->get_where('pengguna_menu', ['Menu' => $Menu])->row_array();

        $Menu_ID = $queryMENU['ID'];

        $PenggunaAkses = $CI->db->get_where('pengguna_akses_menu', [
            'HakAkses_ID' => $HakAkses_ID,
            'Menu_ID' => $Menu_ID
        ]);

        if ($PenggunaAkses->num_rows() < 1) {
            redirect('Auth/Blocked');
        }
    }
}

function is_check_access($HakAkses_ID, $Menu_ID)
{
    $CI = get_instance();
    //CARI YANG HAKAKSES APA KE MENU YANG MANA
    $CI->db->where('HakAkses_ID', $HakAkses_ID);
    $CI->db->where('Menu_ID', $Menu_ID);
    // //CARI SEMUA DATA
    $result = $CI->db->get('pengguna_akses_menu');

    if ($result->num_rows() > 0) {
        return "checked='checked'";
    }
}
//MERUBAH TAMPILAN TANGGAL PADA CODEIGNITER
if (!function_exists('changeDateFormat')) {
    function changeDateFormat($format = 'd-m-Y', $originalDate)
    {
        return date($format, strtotime($originalDate));
    }
}
