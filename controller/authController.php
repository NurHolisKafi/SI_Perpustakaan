<?php

class authController{
    private $model;

    public function __construct()
    {
        $this->model = new authModel();
    }

    public function index(){
        require_once("View/auth/HalamanAwal.php");
    }

    public function loginAdmin(){
        require_once("View/auth/loginAdmin.php");
    }

    public function loginAnggota(){
        require_once("View/auth/loginAnggota.php");
    }

    public function daftarAnggota(){
        require_once("View/auth/daftar.php");
    }

    public function authAdmin(){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAdmin($nama,$password);
        if($data){
            $_SESSION['role']='admin';
            $_SESSION['admin']=$data;
            header("location:index.php?page=admin&aksi=daftarpeminjam&pesan=Berhasil");
        }else{
            echo "<script type='text/javascript'>
            alert('Username atau Password Anda Salah');
            window.location='index.php?page=auth&aksi=loginAdmin';
            </script>";
            //header("location:index.php?page=auth&aksi=loginAdmin&pesan=Gagal Login");
        }
    }

    public function authAnggota(){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->model->prosesAuthAnggota($nama,$password);
        if($data){
            $_SESSION['role']='anggota';
            $_SESSION['anggota']=$data;
            header("location:index.php?page=anggota&aksi=pinjambuku&pesan=Berhasil");
        }else{
            echo "<script type='text/javascript'>
            alert('Username atau Password Anda Salah');
            window.location='index.php?page=auth&aksi=loginAnggota';
            </script>";
            //header("location:index.php?page=auth&aksi=loginAnggota&pesan=Gagal Login");
        }
    }

    public function inputAnggota(){
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['anggal_lahir'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        $no_telp = $_POST['no_telp'];
        $data = $this->model->prosesinputAnggota($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp);
        if($data){
            header("location:index.php?page=auth&aksi=HalamanAwal&pesan=Berhasil");
        }else{
            header("location:index.php?page=auth&aksi=daftarAnggota&pesan=Gagal");
        }
    }
    public function logout(){
        session_destroy();
        header("location:index.php?page=auth&aksi=HalamanAwal&pesan=Berhasil Logout");
    }
}