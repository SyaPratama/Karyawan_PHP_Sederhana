<?php

require_once '../../model/Karyawan.php';

use app\model\Karyawan;

if (isset($_POST["id"])) {
    $karyawan = new Karyawan();
    $result = $karyawan->update($_POST);
    if ($result > 0) {
        header('Location: ' . BASEURL);
        exit;
    }
}else{
    header('Location: '.BASEURL,true);
    exit;
}
