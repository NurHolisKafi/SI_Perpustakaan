<?php

class authModel{
    public function index(){
        require_once("View/admin/admin.php");
    }

    public function loginAdmin(){
        require_once("View/auth/loginAdmin.php");
    }

    public function loginAnggota(){
        require_once("View/auth/loginAnggota.php");
    }

    public function authAdmin(){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        
        if ($this->prosesAuthAdmin($nama,$password)){
            header("location: index.php?page=admin&aksi=daftarpeminjam&pesan=Berhasil login");
        }else{
            echo "<script type='text/javascript'>
            alert('Username Atau Password Anda Salah');
            window.location='index.php';
            </script>";
            //header("location: index.php?page=login&aksi=View&pesan=Upaya login digagalkan");
            
        }
    }

    public function prosesAuthAdmin($nama,$password){
        $sql = "SELECT * FROM petugas WHERE nama = '$nama' AND password = '$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function authAnggota(){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        
        if ($this->prosesAuthAnggota($nama,$password)){
            header("location: index.php?page=buku&aksi=daftarbuku&pesan=Berhasil login");
        }else{
            echo "<script type='text/javascript'>
            alert('Username Atau Password Anda Salah');
            window.location='index.php';
            </script>";
            //header("location: index.php?page=login&aksi=View&pesan=Upaya login digagalkan");
            
        }
    }

    public function prosesAuthAnggota($nama,$password){
        $sql = "SELECT * FROM anggota WHERE nama = '$nama' AND password = '$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }
}