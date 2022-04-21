<?php

class adminModel{

    public function prosesDaftarPeminjam($id_petugas){
        $sql = "select distinct a.id_anggota,a.nama,a.no_telp,a.alamat from anggota as a 
        join peminjaman_buku as b on b.id_anggota = a.id_anggota
        join petugas on petugas.id_petugas = b.id_petugas
        where petugas.id_petugas = $id_petugas";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

  

    public function prosesDaftarPinjamanBuku($id_petugas,$id_anggota){
        $sql = "select a.judul_buku,b.tanggal_peminjaman,b.tanggal_pengembalian from buku as a  
        join peminjaman_buku as b on b.id_buku = a.id_buku
        join petugas on petugas.id_petugas = b.id_petugas
        join anggota on anggota.id_anggota = b.id_anggota
        where petugas.id_petugas = $id_petugas AND anggota.id_anggota = $id_anggota" ;
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;        
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

   

    public function penerbit(){                     //Menerapkan Procedure
        $sql = "call daftar_penerbit()";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }



    public function prosesTambahBuku($judul,$id_penerbit,$pengarang){
        $sql = "insert into buku(judul_buku, id_penerbit, pengarang) values ('$judul',$id_penerbit,'$pengarang')";
        return koneksi()->query($sql);
    }

    

    public function prosesEditBuku($judul,$id_penerbit,$pengarang,$id_buku){
        $sql = "update buku set judul_buku='$judul',id_penerbit=$id_penerbit,pengarang='$pengarang'
        where id_buku=$id_buku";
        return koneksi()->query($sql);
    }

   


    public function prosesDeleteBuku($id_buku){
        $sql = "delete from buku where id_buku = $id_buku";
        return koneksi()->query($sql);
    }

    


    public function prosesTambahPenerbit($nama_penerbit,$tahun_terbit){
        $sql = "insert into penerbit (nama_penerbit, tahun_terbit) values ('$nama_penerbit','$tahun_terbit')";
        return koneksi()->query($sql);
    }

   

    public function prosesEditPenerbit($nama_penerbit,$tahun_terbit,$id_penerbit){
        $sql = "update penerbit set nama_penerbit='$nama_penerbit',tahun_terbit='$tahun_terbit'
        where id_penerbit=$id_penerbit";
        return koneksi()->query($sql);
    }

   

    public function prosesDeletePenerbit($id_penerbit){
        $sql = "delete from penerbit where id_penerbit = $id_penerbit";
        return koneksi()->query($sql);
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
    
   
    
}
// $tes = new adminModel;
// var_export($tes->prosesDaftarPinjamanBuku(1,3));
// die;