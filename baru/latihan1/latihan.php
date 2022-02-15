<?php
session_start();

 if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
 }


?>


<?php
include("../koneksi/function.php");
$mahasiswa = query("SELECT * FROM um_sumbardbase ");

//jika tombol cari di klik
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css" type="text/css">

    <title>data mahasiswa</title>
</head>
<style>
    @media print{
        .logout, .tambah, .form-cari, .caricari{
            display: none;
        }
    }
</style>

<body>
    
    <div class="container border ">
        <div class="row">
        <a href="logout.php" class="logout">logout</a><a href="../vendor/cetak.php" target="_blank" >cetak</a>
        <h1 class="text-center"  >Daftar mahasiswa</h1>
        <a href="tambah_data.php" class="tambah">tambah data mahasiswa</a>
        
        <br></br>
        <form action="" method="post">
            
        <input type="text " name="keyword" size="20" autofocus placeholder="search" autocomplete="off" class="caricari" >
        <button type="submit" name="cari" class="form-cari"  >search</button>
        </form>

        <br></br>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-dark">
                                            <th scope="col">no</th>
                                            <th scope="col">aksi</th>
                                            <th scope="col">nama</th>
                                            <th scope="col">nim</th>
                                            <th scope="col">email</th>
                                            <th scope="col">jurusan</th>


                                        </tr>
                                    </thead>

                                    <?php $i = 1; ?>
                                    <?php foreach ($mahasiswa as $row) : ?>
                                        <tbody>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td>
                                                    <a href="ubah.php?id= <?= $row['id']; ?> ">ubah</a>

                                                    <a href="hapus.php?id= <?= $row['id']; ?>" onclick="return confirm
                ('yakin?')"> hapus</a>
                                                </td>
                                                <td><a href="tambah_data.php"><?= $row['nama']; ?></a></td>
                                                <td><?= $row["nim"]; ?></td>
                                                <td><?= $row["email"]; ?></td>
                                                <td><img src="img/<?= $row["jurusan"]; ?>" width="50"></td>


                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        </tbody>
                                </table>
                          
                    
                </div>
        </div>
   
</body>

</html>