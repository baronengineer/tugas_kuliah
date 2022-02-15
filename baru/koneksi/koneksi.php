<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "data mahasiswa";

$koneksi =mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("gagal terkoneksi");
}