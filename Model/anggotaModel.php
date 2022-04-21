<?php

class anggotaModel{
    
    public function get($id)
    {
        $sql = "SELECT * FROM anggota WHERE id_anggota = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    

    //Untuk meminjam Buku
    public function getdaftarbuku(){
        $sql = "select * from view_buku";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    

    public function prosesViewPinjaman($id_anggota){
        $sql = "select a.judul_buku,b.tanggal_peminjaman,b.tanggal_pengembalian from buku as a  
        join peminjaman_buku as b on b.id_buku = a.id_buku
        join anggota on anggota.id_anggota = b.id_anggota
        where anggota.id_anggota = $id_anggota" ;
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }


    


    public function prosesEdit($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp,$id){
        $sql = "update anggota set nama='$nama', jenis_kelamin='$jenis_kelamin', 
        tanggal_lahir='$tanggal_lahir', alamat='$alamat', password='$password', no_telp='$no_telp'
        WHERE id_anggota='$id'";
        return koneksi()->query($sql);
    }

    
    public function getDaftarPetugas(){
        $sql = " SELECT id_petugas,nama FROM petugas";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

   
    public function prosescari($judul_buku){
        $sql = "SELECT * FROM view_buku WHERE judul_buku LIKE '$judul_buku%'";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
    
   

    public function prosesPinjamBuku($id_anggota,$id_buku,$id_petugas,$tanggal_peminjaman,$tanggal_pengembalian){
        $sql = "insert into peminjaman_buku (id_anggota,id_buku,id_petugas,tanggal_peminjaman,tanggal_pengembalian) values
        ($id_anggota,$id_buku,$id_petugas,'$tanggal_peminjaman','$tanggal_pengembalian')";
        return koneksi()->query($sql);
    }

   

    public function prosesBatalPinjam($id_buku){
        $sql = "delete from peminjaman_buku where id_buku = $id_buku";
        return koneksi()->query($sql);
    }

   

    public function prosescekBuku($id_anggota){
        $sql = "select id_peminjaman from peminjaman_buku where id_anggota = $id_anggota ";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

   
}
// $tes = new anggotaModel;
// var_export($tes->getLastPeminjaman());
// die;