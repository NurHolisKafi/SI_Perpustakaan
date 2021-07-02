<?php

class anggotaModel{
    // public function index(){
    //     require_once("View/auth/loginAnggota.php");
    // }

    public function get($id)
    {
        $sql = "SELECT * FROM anggota WHERE id_anggota = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    // public function editProfile(){
    //     $id = $_SESSION['anggota']['id_anggota'];
    //     $data = $this->get($id);
    //     require_once("View/Anggota/edit.php");
    // }

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

    // public function daftarbuku(){
    //     $data=$this->getdaftarbuku();
    //     extract($data);
    //     require_once("View/buku/daftarbuku.php");
    // }


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


    // public function viewPinjaman(){
    //     $id_anggota = $_SESSION['anggota']['id_anggota'];
    //     $data = $this->prosesViewPinjaman($id_anggota);
    //     extract($data);
    //     require_once("View/Anggota/lihatpinjambuku.php");
    // }



    public function prosesEdit($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp,$id){
        $sql = "update anggota set nama='$nama', jenis_kelamin='$jenis_kelamin', 
        tanggal_lahir='$tanggal_lahir', alamat='$alamat', password='$password', no_telp='$no_telp'
        WHERE id_anggota='$id'";
        return koneksi()->query($sql);
    }

    // public function cekEditProfile(){
    //     $id = $_POST['id'];
    //     $nama = $_POST['nama'];
    //     $jenis_kelamin = $_POST['jenis_kelamin'];
    //     $tanggal_lahir = $_POST['anggal_lahir'];
    //     $alamat = $_POST['alamat'];
    //     $password = $_POST['password'];
    //     $no_telp = $_POST['no_telp'];
    //     $data = $this->prosesEdit($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp,$id);
    //     if($data){
    //         header("location:index.php?page=anggota&aksi=pinjambuku&pesan=Berhasil");
    //     }else{
    //         header("location:index.php?page=auth&aksi=daftarAnggota&pesan=Gagal");
    //     }
    // }

    public function getDaftarPetugas(){
        $sql = " SELECT id_petugas,nama FROM petugas";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    // public function daftarPetugas(){
    //     $data=$this->getDaftarPetugas();
    //     extract($data);
    //     require_once("View/Anggota/pinjam.php");
    // }

    public function prosescari($judul_buku){
        $sql = "SELECT * FROM view_buku WHERE judul_buku LIKE '$judul_buku%'";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }
    
    // public function cariBuku(){
    //     $judul = $_POST['judul_buku'];
    //     $data = $this->prosescari($judul);
    //     if($data){
    //         extract($data);
    //         require_once("View/buku/daftarbuku.php");
    //     }else{
    //         echo "<script type='text/javascript'>
    //         alert('Buku Yang Anda Cari Tidak Ada');
    //         window.location='index.php?page=anggota&aksi=pinjambuku';
    //         </script>";
    //         //header("location:index.php?page=admin&aksi=viewBuku&pesan=Buku Tidak Ada");
    //     }
    // }


    public function prosesPinjamBuku($id_anggota,$id_buku,$id_petugas,$tanggal_peminjaman,$tanggal_pengembalian){
        $sql = "insert into peminjaman_buku (id_anggota,id_buku,id_petugas,tanggal_peminjaman,tanggal_pengembalian) values
        ($id_anggota,$id_buku,$id_petugas,'$tanggal_peminjaman','$tanggal_pengembalian')";
        return koneksi()->query($sql);
    }

    // public function pinjamBuku(){
    //     $id_anggota = $_POST['id_anggota'];
    //     $id_buku = $_POST['id_buku']; 
    //     $id_petugas = $_POST['nama'];
    //     $tanggal_peminjaman = $_POST['pinjam_buku'];
    //     $tanggal_pengembalian = $_POST['kembalikan_buku'];
    //     $data = $this->prosesPinjamBuku($id_anggota,$id_buku,$id_petugas,$tanggal_peminjaman,$tanggal_pengembalian);       
    //     if($data){
    //         header("location:index.php?page=anggota&aksi=pinjambuku&pesan=Berhasil");
    //     }else{
    //         header("location:index.php?page=anggota&aksi=pinjam&pesan=Gagal");
    //     }
    // }

    public function prosesBatalPinjam($id_buku){
        $sql = "delete from peminjaman_buku where id_buku = $id_buku";
        return koneksi()->query($sql);
    }

    // public function batalPinjam(){
    //     $id_peminjaman = $_GET['id_buku'];
    //     if($this->prosesBatalPinjam($id_peminjaman)){
    //         echo "<script type='text/javascript'>
    //         alert('Buku Batal Di Pinjam');
    //         window.location='index.php?page=anggota&aksi=pinjambuku';
    //         </script>";
    //         //header("location:index.php?page=anggota&aksi=&pesan=Berhasil");
    //     }else{
            
    //         //header("location:index.php?page=admin&aksi=viewBuku&pesan=Gagal");
    //     }
    // }

    public function prosescekBuku($id_anggota){
        $sql = "select id_peminjaman from peminjaman_buku where id_anggota = $id_anggota ";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    // public function cekBuku(){
    //     $id_anggota = $_SESSION['anggota']['id_anggota'];
    //     $id_buku = $_GET['id_buku'];
    //     if($this->prosescekBuku($id_anggota)){
    //         echo "<script type='text/javascript'>
    //         alert('Anda Telah Meminjam Buku');
    //         window.location='index.php?page=anggota&aksi=pinjambuku';
    //         </script>";
    //         //header("location:index.php?page=anggota&aksi=pinjambuku");
    //     }else{
    //         header("location:index.php?page=anggota&aksi=pinjam&id_buku=$id_buku");
    //     }
    // }
}
// $tes = new anggotaModel;
// var_export($tes->getLastPeminjaman());
// die;