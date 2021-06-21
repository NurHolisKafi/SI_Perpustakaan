<?php

// Koneksi
require_once("koneksi.php");

/**
 * Memanggil Model
 */
require_once("Model/authModel.php");
require_once("Model/adminModel.php");
require_once("Model/anggotaModel.php");
require_once("Model/bukuModel.php");

//Routing dari URL ke Obyek Class PHP
if (isset($_GET['page']) && isset($_GET['aksi'])) {

    session_start();

    $page = $_GET['page']; // Berisi nama page
    $aksi = $_GET['aksi']; // Aksi Dari setiap page
    
    if ($page == "auth") {

       //$auth = new authModel();

        if ($aksi == 'HalamanAwal') { 
            require_once("View/auth/HalamanAwal.php");
        }else if ($aksi == 'loginAdmin') {
            require_once("View/auth/loginAdmin.php");
        } else if ($aksi == 'loginAnggota') {
            //$auth->index();
            require_once("View/auth/loginAnggota.php");
        } 
    } else if ($page == "anggota"){
        //$anggota = new anggotaModel();
        if ($aksi == 'pinjambuku') {
            //$buku->daftarbuku();
            require_once("View/buku/daftarbuku");
        }else if($aksi == 'edit'){
            require_once("View/Anggota/edit.php");
        }
    } else if ($page == "buku"){
        $buku = new bukuModel();
        if ($aksi == 'daftarbuku') {
            $buku->daftarbuku();
            //require_once("View/buku/daftarbuku.php");
        }
    }else if ($page == "admin"){
        //$buku = new bukuModel();
        if ($aksi == 'daftarpeminjam') {
            //$buku->daftarbuku();
            require_once("View/admin/admin.php");
        } else if ($aksi == 'view') {
            require_once("View/buku/daftarbuku.php");
        } else if ($aksi == 'tambah') {
            require_once("View/admin/tambahbuku.php");
        }
    }else if ($page == "daftar"){
        //$buku = new bukuModel();
        if ($aksi == 'daftarAnggota') {
            //$buku->daftarbuku();
            require_once("View/daftarAnggota/daftar.php");
        }
    }else {
            echo "Halaman Tidak Ditemukan";
    }
} else {
    header("location: index.php?page=auth&aksi=HalamanAwal"); //Jangan ada spasi habis location
}
