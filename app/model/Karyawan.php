<?php
namespace app\model;

require_once 'Model.php';

use app\model\Model;

class Karyawan extends Model{

    public function get() : Array{
        $this->db->query("SELECT * FROM karyawan");
        return $this->db->fetchAll();
    }

    public function pageKaryawan( int $min, int $max) : Array{
        $this->db->query("SELECT * FROM karyawan LIMIT $min,$max");
        return $this->db->fetchAll();
    }

    public function post(Array $data) : int{
        $nama = filter_var($data["nama"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nik = filter_var($data["nik"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $alamat = filter_var($data["alamat"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->db->query("INSERT INTO karyawan VALUES('',:nik,:nama,:alamat,'')");
        $this->db->bind('nik',$nik);
        $this->db->bind('nama',$nama);
        $this->db->bind('alamat',$alamat);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update(Array $data) : int{
        $id = $data["id"];
        $nama = filter_var($data["nama"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nik = filter_var($data["nik"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $alamat = filter_var($data["alamat"],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->db->query("UPDATE karyawan SET nik = :nik, nama = :nama, alamat = :alamat WHERE id = $id");
        $this->db->bind("nik", $nik);
        $this->db->bind("nama",$nama);
        $this->db->bind("alamat", $alamat);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete(int $id) : int{
        $this->db->query("DELETE FROM karyawan WHERE id = :id");
        $this->db->bind("id",$id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}