<?php

class bukuModel{
    //Untuk melihat Daftar Buku di Databases
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

// $tes = new bukuModel();
// var_export($tes->getdaftarbuku());
// die;