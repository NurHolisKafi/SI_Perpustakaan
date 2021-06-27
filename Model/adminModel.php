<?php

class adminModel{
    public function daftarPeminjam(){
        require_once("View/admin/admin.php");
    }

    public function tambah(){
        require_once("View/admin/tambahbuku.php");
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
}
// $tes = new adminModel;
// var_export($tes->prosesTambahBuku('apa',1,'Budi'));
// die;