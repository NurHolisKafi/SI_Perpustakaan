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
       $auth = new authModel();
        if ($aksi == 'HalamanAwal') { 
            $auth->index();
        }else if ($aksi == 'loginAdmin') {
            $auth->loginAdmin();
        } else if ($aksi == 'loginAnggota') {
            $auth->loginAnggota();
        }else if ($aksi == 'authAnggota'){
            $auth->authAnggota();
        }else if($aksi == 'authAdmin'){
            $auth->authAdmin();
        } else if ($aksi == 'logout') {
            $auth->logout();
        } else if ($aksi == 'daftarAnggota') {
           $auth->daftarAnggota();
        } else if ($aksi == 'inputAnggota') {
            $auth->inputAnggota();
        } else {
            echo "Method Not Found";
        }


    } else if ($page == "anggota"){
        if($_SESSION['role'] == 'anggota'){
            $anggota = new anggotaModel();
            if ($aksi == 'pinjambuku') {
                $anggota->daftarbuku();
            }else if($aksi == 'edit'){
                require_once("View/Anggota/edit.php");
            }
        }else{
            header("location:index.php?page=auth&aksi=loginAnggota");
        }


    }else if ($page == "admin"){
        if($_SESSION['role']=='admin'){
            $admin = new adminModel();
            if ($aksi == 'daftarpeminjam') {
                $admin->daftarPeminjam();
            } else if ($aksi == 'view') {
                $admin->daftarbuku();
            } else if ($aksi == 'tambahbuku') {
                $admin->tambah();
            }else if ($aksi == 'cekTambahBuku'){
                $admin->cekTambahBuku();
            }else if ($aksi == 'cekEditBuku'){
                $admin->edit();
            }
            else if ($aksi == 'cari'){
                $admin->cari();
            }
            else if ($aksi == 'lihatpinjambuku'){
                //$admin->cari();
                require_once("View/admin/lihatpeminjambuku.php");
            }else if ($aksi == 'daftarpenerbit'){
                $admin->daftarpenerbit();
            }else if ($aksi == 'editpenerbit'){
                //$admin->daftarpenerbit();
                require_once("View/admin/editpenerbit.php");
            }else if ($aksi == 'tambahpenerbit'){
                //$admin->daftarpenerbit();
                require_once("View/admin/tambahpenerbit.php");
            }
        }else{
            header("location:index.php?page=auth&aksi=loginAdmin");
        }    
        


    }else if ($page == "daftar"){
        //$buku = new bukuModel();
        if ($aksi == 'daftarAnggota') {
            //$buku->daftarbuku();
            require_once("View/auth/daftar.php");
        }
    }else {
            echo "Halaman Tidak Ditemukan";
    }


} else {
    header("location: index.php?page=auth&aksi=HalamanAwal"); //Jangan ada spasi habis location
}
