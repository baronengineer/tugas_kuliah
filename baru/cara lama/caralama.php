<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>data mahasiswa</title>
</head>
<body>
    <h1>daftar mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>no.</th>
            <th>aksi</th>
            <th>nama</th>
            <th>nim</th>
            <th>email</th>
            <th>jurusan</th>
        </tr>
        <?php $i = 1; ?>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $i;?></td>
            <td>
                <a href="">ubah</a>
                <a href="">hapus</a>
            </td>
            <td><?= $row["nama"];?></td>
            <td><?= $row["nim"];?></td>
            <td><?= $row["email"];?></td>
            <td><?= $row["jurusan"];?></td>

        </tr>
        <?php $i++; ?>
        <?php endwhile; ?>
    </table>
</body>
</html>//$result = mysqli_query($koneksi,"SELECT * FROM um_sumbardbase");

//ambil data (fetch) um_sumbardbase ddari object result
//mysqli_fetch_row() mengembalikan array numerik
//mysqli_fetch_assoc()mengembalikan array asosiatif
//mysqli_fetch_array()mengembalikan keduanya
//mysqli_fetch_object()

// while ($mhs=mysqli_fetch_assoc($result)){
// var_dump($mhs["nama"]);
// }
// $nama       =$_POST["nama"];
    // $nim        =$_POST["nim"];
    // $email      =$_POST["email"];
    // $jurusan   =$_POST["jurusan"];

    //query insert data
    // $query ="insert into um_sumbardbase  values ('','$nama','$nim','$email','$jurusan')";
    // $q1    =mysqli_query($koneksi,$query);

    //cek keberhasilan
    // if(mysqli_affected_rows($koneksi)> 0) {
    //     echo "berhasil input data";
    // }else{
    //     echo "gagal";
    //     echo "<br>";
    //     echo mysqli_error($koneksi);
    // }
    function tambah($data){
    global $koneksi;
    $nama       = htmlspecialchars ($data["nama"]);
    $nim        = htmlspecialchars ($data["nim"]);
    $email      = htmlspecialchars ($data["email"]);
    $jurusan    = htmlspecialchars ($data["jurusan"]);

    $query ="insert into um_sumbardbase  values 
            ('','$nama','$nim','$email','$jurusan')";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}