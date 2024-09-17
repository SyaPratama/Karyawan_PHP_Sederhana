<?php

namespace model;

require_once "config/Connection.php";

use config\Connection;

class Karyawan{

    private $db;

    public function __construct(){
        $this->db = new Connection;
    }

    public function getKaryawan(){
        $this->db->query("SELECT * FROM karyawan");
        return $this->db->fetchAll();
    }

    public function pageKaryawan($min,$max){
        $this->db->query("SELECT * FROM karyawan LIMIT $min,$max");
        return $this->db->fetchAll();
    }

    public function addKaryawan($data){
        $nama = filter_var($data["nama"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nik = (int)(filter_var($data["nik"],FILTER_SANITIZE_NUMBER_INT));
        $alamat = filter_var($data["alamat"],FILTER_SANITIZE_SPECIAL_CHARS);
        var_dump($nama, $nik, $alamat);
        $this->db->query("INSERT INTO karyawan VALUES('',:nik,:nama,:alamat,'')");
        $this->db->bind('nik',$nik);
        $this->db->bind('nama',$nama);
        $this->db->bind('alamat',$alamat);
        $this->db->execute();
        return $this->db->rowCount();
    }
}