<?php
session_start();
require_once '../../model/Karyawan.php';

use app\model\Karyawan;

$karyawan = new Karyawan();

if(isset($_POST["nama"])){
    $data = $karyawan->get();
    $findData = array_search($_POST["nik"],array_column($data,'nik'));

    if($findData !== false){
        $_SESSION["alert"] = "NIK Sudah Ada!";
        header('Location: '.BASEURL.'/views/Karyawan/tambah.php');
        exit;
    }

    $result = $karyawan->post($_POST);
    if($result > 0){
        header('Location: '.BASEURL);
        exit;
    }
}
?>