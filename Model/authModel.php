<?php

class authModel{
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

    public function prosesAuthAdmin($nama,$password){
        $sql = "select * from petugas where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function authAdmin(){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->prosesAuthAdmin($nama,$password);
        if($data){
            $_SESSION['role']='admin';
            $_SESSION['admin']=$data;
            header("location:index.php?page=admin&aksi=daftarpeminjam&pesan=Berhasil");
        }else{
            header("location:index.php?page=auth&aksi=loginAdmin&pesan=Gagal Login");
        }
    }

    public function prosesAuthAnggota($nama,$password){
        $sql = "select * from anggota where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function authAnggota(){
        $nama = $_POST['nama'];
        $password = $_POST['password'];
        $data = $this->prosesAuthAnggota($nama,$password);
        if($data){
            $_SESSION['role']='anggota';
            $_SESSION['anggota']=$data;
            header("location:index.php?page=anggota&aksi=pinjambuku&pesan=Berhasil");
        }else{
            header("location:index.php?page=auth&aksi=loginAnggota&pesan=Gagal Login");
        }
    }

    public function prosesinputAnggota($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp){
        $sql = "insert into anggota (nama, jenis_kelamin, tanggal_lahir, alamat, password, no_telp) values
        ('$nama', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$password', '$no_telp')";
        return koneksi()->query($sql);
    }

    public function inputAnggota(){
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['anggal_lahir'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        $no_telp = $_POST['no_telp'];
        $data = $this->prosesinputAnggota($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp);
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

// $tes = new authModel;
// var_export($tes->prosesinputAnggota('akue', 'laki-laki', '2001-03-02', 'Malang', '123', '0812345679'));
// die;