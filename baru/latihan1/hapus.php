<?php
session_start();

 if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
 }


?>

<?php include ("../koneksi/function.php");?>
<?php


$id = $_GET["id"];

if(hapus($id) > 0){
    echo "<script>
        alert('data berhasil dihapus');
        document.location.href='latihan.php';
    </script>";
}else{
    echo "<script>
        alert('data gagal dihapus');
        document.location.href='latihan.php';
    </script>";
}

?>