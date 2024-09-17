<?php

require_once "model\Karyawan.php";

use model\Karyawan;

if(isset($_GET["id"])){
    $karyawan = new Karyawan();
    $result = $karyawan->getKaryawan();
    $findId = array_filter($result,fn($data) => hash('sha256',$data["id"]) == $_GET["id"]);
    if(count($findId) > 0){
        foreach($findId as $k){
            $karyawan->deleteKaryawan($k["id"]);
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