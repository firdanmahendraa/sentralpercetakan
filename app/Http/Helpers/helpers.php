<?php

function format_uang($angka){
    return number_format($angka, 0, ',' , '.');
}

function tambah_nol_didepan($value, $threshold = null){
    return sprintf("%0". $threshold . "s", $value);
}

function tanggal_indonesia($tgl){
    $nama_bulan = array(1 =>
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    );
    
    $tahun   = substr($tgl, 0, 4);
    $bulan   = $nama_bulan[(int) substr($tgl, 5, 2)];
    $tanggal = substr($tgl, 8, 2);
    $text    = '';

    $text   .= "$tanggal $bulan $tahun";
    return $text;
}