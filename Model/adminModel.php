<?php

class adminModel{

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

    public function prosesDaftarPeminjam($id_petugas){
        $sql = "select distinct anggota.id_anggota,anggota.nama,anggota.no_telp,anggota.alamat from anggota 
        join peminjaman_buku on peminjaman_buku.id_anggota = anggota.id_anggota
        join petugas on petugas.id_petugas = peminjaman_buku.id_petugas
        where petugas.id_petugas = $id_petugas";
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;
    }

    public function daftarPeminjam(){
        $id_petugas = $_SESSION['admin']['id_petugas'];
        $data = $this->prosesDaftarPeminjam($id_petugas);
        extract($data);
        require_once("View/admin/admin.php");
    }

    public function prosesDaftarPinjamanBuku($id_petugas,$id_anggota){
        $sql = "select judul_buku from buku  
        join peminjaman_buku on peminjaman_buku.id_buku = buku.id_buku
        join petugas on petugas.id_petugas = peminjaman_buku.id_petugas
        join anggota on anggota.id_anggota = peminjaman_buku.id_anggota
        where petugas.id_petugas = $id_petugas AND anggota.id_anggota = $id_anggota" ;
        $query = koneksi()->query($sql);
        $hasil = [];
        while($data = $query->fetch_assoc()){
            $hasil[] = $data;
        }
        return $hasil;        
    }

    public function DaftarPinjamanBuku(){
        $id_petugas = $_SESSION['admin']['id_petugas'];
        $id_anggota = $_GET['id_anggota'];
        $data = $this->prosesDaftarPinjamanBuku($id_petugas,$id_anggota);
        extract($data);
        require_once("View/admin/lihatpeminjambuku.php");
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

    public function prosesEditBuku($judul,$id_penerbit,$pengarang,$id_buku){
        $sql = "update buku set judul_buku='$judul',id_penerbit=$id_penerbit,pengarang='$pengarang'
        where id_buku=$id_buku";
        return koneksi()->query($sql);
    }

    public function cekEditBuku(){
        $id_buku=$_GET['id_buku'];
        $judul = $_POST['judul_buku'];
        $id_penerbit = $_POST['id_penerbit'];
        $pengarang = $_POST['pengarang'];
        if($this->prosesEditBuku($judul,$id_penerbit,$pengarang,$id_buku)){
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=editBuku&pesan=gagal");
        } 
    }


    public function prosesDeleteBuku($id_buku){
        $sql = "delete from buku where id_buku = $id_buku";
        return koneksi()->query($sql);
    }

    public function deleteBuku(){
        $id_buku = $_GET['id_buku'];
        if($this->prosesDeleteBuku($id_buku)){
            header("location:index.php?page=admin&aksi=viewBuku&pesan=Berhasil");
        }else{
            echo "<script type='text/javascript'>
            alert('Buku Tidak Bisa Dihapus Karena Sedang Di Pinjam');
            window.location='index.php?page=admin&aksi=viewBuku';
            </script>";
            //header("location:index.php?page=admin&aksi=viewBuku&pesan=Gagal");
        }
    }


    public function prosesTambahPenerbit($nama_penerbit,$tahun_terbit){
        $sql = "insert into penerbit (nama_penerbit, tahun_terbit) values ('$nama_penerbit','$tahun_terbit')";
        return koneksi()->query($sql);
    }

    public function cekTambahPenerbit(){
        $nama_penerbit = $_POST['nama_penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        if($this->prosesTambahPenerbit($nama_penerbit,$tahun_terbit)){
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=tambahPenerbit&pesan=gagal");
        }
    }

    public function prosesEditPenerbit($nama_penerbit,$tahun_terbit,$id_penerbit){
        $sql = "update penerbit set nama_penerbit='$nama_penerbit',tahun_terbit='$tahun_terbit'
        where id_penerbit=$id_penerbit";
        return koneksi()->query($sql);
    }

    public function cekEditPenerbit(){
        $id_penerbit = $_GET['id_penerbit'];
        $nama_penerbit= $_POST['nama_penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        if($this->prosesEditPenerbit($nama_penerbit,$tahun_terbit,$id_penerbit)){
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=editPenerbit&pesan=gagal");
        } 
    }

    public function prosesDeletePenerbit($id_penerbit){
        $sql = "delete from penerbit where id_penerbit = $id_penerbit";
        return koneksi()->query($sql);
    }

    public function deletePenerbit(){
        $id_penerbit = $_GET['id'];
        if($this->prosesDeletePenerbit($id_penerbit)){
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Berhasil");
        }else{
            header("location:index.php?page=admin&aksi=daftarpenerbit&pesan=Gagal");
        }
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
// $tes = new adminModel;
// var_export($tes->prosesDaftarPinjamanBuku(1,3));
// die;