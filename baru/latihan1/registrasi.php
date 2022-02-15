<?php

include("../koneksi/function.php");

 if(isset($_POST["register"])){
     if(registrasi($_POST) > 0){
            echo "<script>
                alert('user baru berhasil ditambahkan');
                document.location.href= 'registrasi.php';
            </script>";
     }else{
         echo mysqli_error($koneksi);
     }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
    <style>
        label{
            display: block;
        }
    </style>
</head>
<body>
    <h1>Halaman registrasi</h1>

    <form action="" method="post">

    <ul>
        <li>
            <label for="username">username :</label>
            <input type="text" name="username" id="username" required>
        </li>
        <li>
            <label for="password">password :</label>
            <input type="password" name="password" id="password" required>
        </li>
        <li>
            <label for="password2">konfiramsi password :</label>
            <input type="password" name="password2" id="password2" required>
        </li>
        <li>
            <button type="submit" name="register">register</button>
        </li>
    </ul>

    </form>
</body>
</html>