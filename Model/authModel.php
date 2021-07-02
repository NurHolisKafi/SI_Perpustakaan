<?php

class authModel{

    public function prosesAuthAdmin($nama,$password){
        $sql = "select * from petugas where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesAuthAnggota($nama,$password){
        $sql = "select * from anggota where nama='$nama' and password='$password'";
        $query = koneksi()->query($sql);
        return $query->fetch_assoc();
    }

    public function prosesinputAnggota($nama, $jenis_kelamin, $tanggal_lahir, $alamat, $password, $no_telp){
        $sql = "insert into anggota (nama, jenis_kelamin, tanggal_lahir, alamat, password, no_telp) values
        ('$nama', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$password', '$no_telp')";
        return koneksi()->query($sql);
    }

}

// $tes = new authModel;
// var_export($tes->prosesinputAnggota('akue', 'laki-laki', '2001-03-02', 'Malang', '123', '0812345679'));
// die;