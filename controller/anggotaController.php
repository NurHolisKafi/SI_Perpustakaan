<?php

class anggotaController{
    private $model;

    public function __construct()
    {
        $this->model = new anggotaModel();
    }

    public function index(){
        require_once("View/auth/loginAnggota.php");
    }

    public function editProfile(){
        $id = $_SESSION['anggota']['id_anggota'];
        $data = $this->model->get($id);
        require_once("View/Anggota/edit.php");
    }

    public function daftarbuku(){
        $data=$this->model->getdaftarbuku();
        extract($data);
        require_once("View/buku/daftarbuku.php");
    }

    public function viewPinjaman(){
        $id_anggota = $_SESSION['anggota']['id_anggota'];
        $data = $this->model->prosesViewPinjaman($id_anggota);
        extract($data);
        require_once("View/Anggota/lihatpinjambuku.php");
    }

    public function cekEditProfile(){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['anggal_lahir'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        $no_telp = $_POST['no_telp'];
        $data = $this->model->prosesEdit($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp,$id);
        if($data){
            header("location:index.php?page=anggota&aksi=pinjambuku&pesan=Berhasil");
        }else{
            header("location:index.php?page=auth&aksi=daftarAnggota&pesan=Gagal");
        }
    }

    public function daftarPetugas(){
        $data=$this->model->getDaftarPetugas();
        extract($data);
        require_once("View/Anggota/pinjam.php");
    }

    public function cariBuku(){
        $judul = $_POST['judul_buku'];
        $data = $this->model->prosescari($judul);
        if($data){
            extract($data);
            require_once("View/buku/daftarbuku.php");
        }else{
            echo "<script type='text/javascript'>
            alert('Buku Yang Anda Cari Tidak Ada');
            window.location='index.php?page=anggota&aksi=pinjambuku';
            </script>";
            //header("location:index.php?page=admin&aksi=viewBuku&pesan=Buku Tidak Ada");
        }
    }

    public function pinjamBuku(){
        $id_anggota = $_POST['id_anggota'];
        $id_buku = $_POST['id_buku']; 
        $id_petugas = $_POST['nama'];
        $tanggal_peminjaman = $_POST['pinjam_buku'];
        $tanggal_pengembalian = $_POST['kembalikan_buku'];
        $data = $this->model->prosesPinjamBuku($id_anggota,$id_buku,$id_petugas,$tanggal_peminjaman,$tanggal_pengembalian);       
        if($data){
            header("location:index.php?page=anggota&aksi=pinjambuku&pesan=Berhasil");
        }else{
            header("location:index.php?page=anggota&aksi=pinjam&pesan=Gagal");
        }
    }

    public function batalPinjam(){
        $id_peminjaman = $_GET['id_buku'];
        if($this->model->prosesBatalPinjam($id_peminjaman)){
            echo "<script type='text/javascript'>
            alert('Buku Batal Di Pinjam');
            window.location='index.php?page=anggota&aksi=pinjambuku';
            </script>";
            //header("location:index.php?page=anggota&aksi=&pesan=Berhasil");
        }else{
            
            //header("location:index.php?page=admin&aksi=viewBuku&pesan=Gagal");
        }
    }

    public function cekBuku(){
        $id_anggota = $_SESSION['anggota']['id_anggota'];
        $id_buku = $_GET['id_buku'];
        if($this->model->prosescekBuku($id_anggota)){
            echo "<script type='text/javascript'>
            alert('Anda Telah Meminjam Buku');
            window.location='index.php?page=anggota&aksi=pinjambuku';
            </script>";
            //header("location:index.php?page=anggota&aksi=pinjambuku");
        }else{
            header("location:index.php?page=anggota&aksi=pinjam&id_buku=$id_buku");
        }
    }
}