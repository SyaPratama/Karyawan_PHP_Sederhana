<?php

require_once "../../model\Karyawan.php";

use app\model\Karyawan;

if(isset($_POST["id"])){
    $karyawan = new Karyawan();
    $result = $karyawan->get();
    $findId = array_filter($result,fn($data) => hash('sha256',$data["id"]) == $_POST["id"]);
    if(count($findId) > 0){
        foreach($findId as $k){
            $karyawan->delete($k["id"]);
            header("Location: ".BASEURL,true);
            exit;
        }
    }else{
        header("Location: ".BASEURL,true);
        exit;
    }
}else{
    header("Location: ".BASEURL,true);
    exit;
}