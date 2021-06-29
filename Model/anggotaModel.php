<?php

class anggotaModel{
    public function index(){
        require_once("View/auth/loginAnggota.php");
    }

    public function get($id)
    {
        $sql = "SELECT * FROM anggota WHERE id_anggota = $id";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function editProfile(){
        $id = $_SESSION['anggota']['id_anggota'];
        $data = $this->get($id);
        require_once("View/Anggota/edit.php");
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

    public function daftarbuku(){
        $data=$this->getdaftarbuku();
        extract($data);
        require_once("View/buku/daftarbuku.php");
    }



    public function prosesEdit($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp,$id){
        $sql = "update anggota set nama='$nama', jenis_kelamin='$jenis_kelamin', 
        tanggal_lahir='$tanggal_lahir', alamat='$alamat', password='$password', no_telp='$no_telp'
        WHERE id_anggota='$id'";
        return koneksi()->query($sql);
    }

    public function cekEditProfile(){
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tanggal_lahir = $_POST['anggal_lahir'];
        $alamat = $_POST['alamat'];
        $password = $_POST['password'];
        $no_telp = $_POST['no_telp'];
        $data = $this->prosesEdit($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp,$id);
        if($data){
            header("location:index.php?page=auth&aksi=HalamanAwal&pesan=Berhasil");
        }else{
            header("location:index.php?page=auth&aksi=daftarAnggota&pesan=Gagal");
        }
    }

    public function getDaftarPetugas(){
        $sql = " SELECT nama FROM petugas";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function daftarPetugas(){
        $data=$this->getDaftarPetugas();
        extract($data);
        require_once("View/Anggota/pinjam.php");
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
    
    public function cariBuku(){
        $judul = $_POST['judul_buku'];
        $data = $this->prosescari($judul);
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
}
// $tes = new anggotaModel;
// var_export($tes->get(2));
// die;