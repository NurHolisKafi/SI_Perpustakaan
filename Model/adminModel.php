<?php

class adminModel{
    public function daftarPeminjam(){
        require_once("View/admin/admin.php");
    }

    public function tambah(){
        require_once("View/admin/tambahbuku.php");
    }

    public function edit(){
        require_once("View/admin/editbuku.php");
    }

    public function getdaftarbuku(){
        $sql = "select * from view_buku";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function daftarbuku(){
        $data=$this->getdaftarbuku();
        extract($data);
        require_once("View/buku/daftarbukuAdmin.php");
    }

    public function prosesTambahBuku($judul,$id_penerbit,$pengarang){
        $sql = "insert into buku(judul_buku, id_penerbit, pengarang) values ('$judul',$id_penerbit,'$pengarang')";
        return koneksi()->query($sql);
    }

    public function cekTambahBuku(){
        $judul = $_POST['judul_buku'];
        $id_penerbit = $_POST['id_penerbit'];
        $pengarang = $_POST['pengarang'];
        if($this->prosesTambahBuku($judul,$id_penerbit,$pengarang)){
            header("location:index.php?page=admin&aksi=daftarpeminjam&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=tambah&pesan=gagal");
        }
    }

    public function cari(){
        $_GET['judul_buku'];
        $sql = "SELECT * FROM buku";
        if(isset($_GET['judul_buku'])){
            $sql = "SELECT * FROM buku WHERE judul_buku LIKE '%".$_GET['judul_buku']."%'";
        }
        return koneksi()->query($sql);
    }
    
    public function caribuku(){
        $data=$this->cari();
        extract($data);
        require_once("View/buku/daftarbukuAdmin.php");
    }

    public function penerbit(){
        $sql = "SELECT * FROM penerbit";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function daftarpenerbit(){
        $data=$this->penerbit();
        extract($data);
        require_once("View/admin/daftarpenerbit.php");
    }
}
// $tes = new adminModel;
// var_export($tes->prosesTambahBuku('apa',1,'Budi'));
// die;