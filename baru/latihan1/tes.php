<?php
include("../koneksi/koneksi.php")

?>
<?php include("../koneksi/function.php");
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

<body>
    <h1 class="text-center">data mahasiswa</h1>
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-3 container bg-black border-1">
                <div class="row bg-danger mb-5">
                <h1>baron</h1>
                </div>
                <div class="row bg-success"><h1>br</h1></div> 
            </div>
            
            <div class="col-7 bg-success">
    <div class="container border ">
        <div class="row">
        <h1 class="text-center" >Daftar mahasiswa</h1>
        <a href="tambah_data.php">tambah data mahasiswa</a>
        <br></br>
        <form action="" method="post">
            
        <input type="text " name="keyword" size="20" autofocus placeholder="search" autocomplete="off" >
        <button type="submit" name="cari"  >search</button>
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="table-dark ">
                                            <th scope="col">no</th>
                                            <th scope="col">aksi</th>
                                            <th scope="col">nama</th>
                                            <th scope="col">nim</th>
                                            <th scope="col">email</th>
                                            <th scope="col">jurusan</th>
                                            


                                        </tr>
                                    </thead>
                                    
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>
                                            
                                            <div class="row border-1 pb-5">
                                                sertifikat
                                            </div>
                                            <div class="row border-1 pb-5">
                                                penghargaan
                                            </div>
                                            <div class="row">
                                                kegiatan
                                            </div>
                                            
                                        </td>
                                        </div>
        </div>
        </div>
        </div>
        </div>
</body>

</html>