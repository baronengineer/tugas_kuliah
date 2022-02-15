<?php
session_start();

 if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
 }


?>

<?php
//cek tombol submit sudah di tekan atau belum
include ("../koneksi/function.php");
if(isset($_POST["submit"])){
    
    

    if(tambah($_POST) > 0){
        echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href= 'latihan.php';
        </script>";
    }else{
        echo "<script>
            alert('data gagal ditambahkan');
            document.location.href= 'latihan.php';
        </script>";
    }
    



}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data mahasiswa</title>
</head>
<body>
    <h1>tambah data mahasiswa</h1>
    <a href="latihan.php">kembali</a>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">nama :</label>
                <input type="text" name="nama" id="nama" required>
                <br></br>
            </li>
            <li>
                <label for="nim">nim :</label>
                <input type="text" name="nim" id="nim" required>
            </li>
            <li>
                <label for="email">email :</label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">jurusan</label>
                <input type="file" name="jurusan" id="jurusan" >
            </li>
            <li>
                <button type="submit" name="submit">tambah data</button>
            </li>
        </ul>

    </form>
</body>
</html>