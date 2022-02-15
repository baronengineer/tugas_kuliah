<?php
session_start();

 if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
 }


?>

<?php
include ("../koneksi/function.php")

?>



<?php
//cek tombol submit sudah di tekan atau belum
$id =$_GET["id"];

$mhs=query("SELECT * FROM um_sumbardbase WHERE id = $id ")[0];
if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "<script>
            alert('data berhasil diubah');
            document.location.href='latihan.php';
        </script>";
    }else{
        echo "<script>
            alert('data gagal diubah');
            document.location.href='latihan.php';
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
    <title>ubah data mahasiswa</title>
</head>
<body>
    <h1>ubah data mahasiswa</h1>
    <a href="latihan.php">kembali</a>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
             <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
             <input type="hidden" name="jurusanlama" value="<?= $mhs["jurusan"]; ?>">
            <li>
                <label for="nama">nama :</label>
                <input type="text" name="nama" id="nama" required
                value="<?= $mhs["nama"]; ?>">
                <br></br>
            </li>
            <li>
                <label for="nim">nim :</label>
                <input type="text" name="nim" id="nim" required
                value="<?= $mhs["nim"]; ?>">
            </li>
            <li>
                <label for="email">email :</label>
                <input type="text" name="email" id="email" required
                value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">jurusan</label><br>
                <img src="img/<?= $mhs['jurusan']; ?>" width="40"><br>
                <input type="file" name="jurusan" id="jurusan">
            </li>
            <li>
                <button type="submit" name="submit">ubah data</button>
            </li>
        </ul>

    </form>
</body>
</html>