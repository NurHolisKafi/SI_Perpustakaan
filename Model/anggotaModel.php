<?php

class anggotaModel{
    public function index(){
        require_once("View/auth/loginAnggota.php");
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
}
// $tes = new anggotaModel;
// var_export($tes->ceklogin('Michael','123'));
// die;