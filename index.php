<?php

if($_SERVER["REQUEST_METHOD"] == "GET" && $_SERVER["REQUEST_URI"] == "/tugas/"){
    header("Location: http://localhost/tugas/app/views/karyawan",true);
    exit;
}