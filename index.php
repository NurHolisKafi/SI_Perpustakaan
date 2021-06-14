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
    
    } else if ($page == "admin"){
        $buku = new bukuModel();
        if ($aksi == 'daftarbuku') {
            $buku->index();
            //require_once("View/buku/daftarbuku.php");
        }
    }else {
            echo "Page Not Found";
    }
} else {
    header("location: index.php?page=auth&aksi=HalamanAwal"); //Jangan ada spasi habis location
}
