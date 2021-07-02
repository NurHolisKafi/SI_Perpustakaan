<?php

class adminController{
    private $model;

    public function __construct()
    {
        $this->model = new adminModel();
    }

    public function tambahBuku(){
        require_once("View/admin/tambahbuku.php");
    }

    public function editbuku(){
        require_once("View/admin/editbuku.php");
    }
    public function tambahpenerbit(){
        require_once("View/admin/tambahpenerbit.php");
    }

    public function editpenerbit(){
        require_once("View/admin/editpenerbit.php");
    }

    public function daftarPeminjam(){
        $id_petugas = $_SESSION['admin']['id_petugas'];
        $data = $this->model->prosesDaftarPeminjam($id_petugas);
        extract($data);
        require_once("View/admin/admin.php");
    }

    public function DaftarPinjamanBuku(){
        $id_petugas = $_SESSION['admin']['id_petugas'];
        $id_anggota = $_GET['id_anggota'];
        $data = $this->model->prosesDaftarPinjamanBuku($id_petugas,$id_anggota);
        extract($data);
        require_once("View/admin/lihatpeminjambuku.php");
    }

    public function daftarbuku(){
        $data=$this->model->getdaftarbuku();
        extract($data);
        require_once("View/buku/daftarbukuAdmin.php");
    }

    public function daftarpenerbit(){
        $data=$this->model->penerbit();
        extract($data);
        require_once("View/admin/daftarpenerbit.php");
    }

    public function cekTambahBuku(){
        $judul = $_POST['judul_buku'];
        $id_penerbit = $_POST['id_penerbit'];
        $pengarang = $_POST['pengarang'];
        if($this->model->prosesTambahBuku($judul,$id_penerbit,$pengarang)){
            header("location:index.php?page=admin&aksi=daftarpeminjam&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=tambah&pesan=gagal");
        }
    }

    public function cekEditBuku(){
        $id_buku=$_GET['id_buku'];
        $judul = $_POST['judul_buku'];
        $id_penerbit = $_POST['id_penerbit'];
        $pengarang = $_POST['pengarang'];
        if($this->model->prosesEditBuku($judul,$id_penerbit,$pengarang,$id_buku)){
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=editBuku&pesan=gagal");
        } 
    }

    public function deleteBuku(){
        $id_buku = $_GET['id_buku'];
        if($this->model->prosesDeleteBuku($id_buku)){
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        }else{
            echo "<script type='text/javascript'>
            alert('Buku Tidak Bisa Dihapus Karena Sedang Di Pinjam');
            window.location='index.php?page=admin&aksi=viewBuku';
            </script>";
            //header("location:index.php?page=admin&aksi=viewBuku&pesan=Gagal");
        }
    }

    public function cekTambahPenerbit(){
        $nama_penerbit = $_POST['nama_penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        if($this->model->prosesTambahPenerbit($nama_penerbit,$tahun_terbit)){
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=tambahPenerbit&pesan=gagal");
        }
    }

    public function cekEditPenerbit(){
        $id_penerbit = $_GET['id_penerbit'];
        $nama_penerbit= $_POST['nama_penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        if($this->model->prosesEditPenerbit($nama_penerbit,$tahun_terbit,$id_penerbit)){
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=editPenerbit&pesan=gagal");
        } 
    }

    public function deletePenerbit(){
        $id_penerbit = $_GET['id'];
        if($this->model->prosesDeletePenerbit($id_penerbit)){
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Gagal");
        }
    }

    public function cariBuku(){
        $judul = $_POST['judul_buku'];
        $data = $this->model->prosescari($judul);
        if($data){
            extract($data);
            require_once("View/buku/daftarbukuAdmin.php");
        }else{
            echo "<script type='text/javascript'>
            alert('Buku Yang Anda Cari Tidak Ada');
            window.location='index.php?page=admin&aksi=viewBuku';
            </script>";
            //header("location:index.php?page=admin&aksi=viewBuku&pesan=Buku Tidak Ada");
        }   
    }
}