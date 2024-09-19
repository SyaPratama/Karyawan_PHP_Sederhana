<?php
require_once '../../model/Karyawan.php';

use app\model\Karyawan;

$karyawan = new Karyawan();

if(isset($_POST["nama"])){
    $result = $karyawan->post($_POST);
    if($result > 0){
        header('Location: '.BASEURL);
        exit;
    }
}
?>