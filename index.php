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
    
    if ($page == "View") {

       //$auth = new authModel();

        if ($aksi == 'proses') {
            require_once("View/auth/loginAdmin.php");
         } else if ($aksi == 'loginAnggota') {
            //$auth->index();
            require_once("View/auth/loginAnggota.php");
         } else if ($aksi == 'daftarbuku') {
             //$auth->index();
             require_once("View/buku/daftarbuku.php");
         }
    
    } else {
            echo "Page Not Found";
    }
} else {
    header("location: index.php?page=View&aksi=proses"); //Jangan ada spasi habis location
}
