<?php

class anggotaModel{
    public function index(){
        require_once("View/auth/loginAnggota.php");
    }

    public function buku(){
    	require_once("View/buku/daftarbuku.php");
    }
}