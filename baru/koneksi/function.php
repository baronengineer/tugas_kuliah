<?php 
include ("../koneksi/koneksi.php")

?>


<?php
function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows =[];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data){
    global $koneksi;
    $nama       = htmlspecialchars ($data["nama"]);
    $nim        = htmlspecialchars ($data["nim"]);
    $email      = htmlspecialchars ($data["email"]);
    //upload gambar
    $jurusan= upload();
    if(!$jurusan){
        return false;
    }

    $query ="insert into um_sumbardbase  values 
            ('','$nama','$nim','$email','$jurusan')";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function upload(){
    $namafile = $_FILES['jurusan']['name'];
    $ukuranfile =$_FILES['jurusan']['size'];
    $error =$_FILES['jurusan']['error'];
    $tmpname =$_FILES['jurusan']['tmp_name'];

    //cek apakah gambar tidak ada yang di upload
    if ($error == 4){
        echo "<script>
        alert('pilih gambar terlebih dahulu')
        </script>";
        return false;
    }
    

    //cek apakah yang di uppload gambar
    $ekstensijurusanvalid = ['jpeg','png','jpg','pdf','doc','docx'];
    $ekstensijurusan = explode('.',$namafile);
    $ekstensijurusan = strtolower(end($ekstensijurusan));
    if(!in_array($ekstensijurusan,$ekstensijurusanvalid)){
            echo "<script>
            alert('yang anda upload bukan gambar');
            </script>";
        return false;
    }

    //cek ukuran gambar
    if($ukuranfile > 1000000){
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
    return false;
    }

    //generate nama gambar baru
    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensijurusan;
    //gambar siap di upload
    move_uploaded_file($tmpname,'img/'.$namafilebaru);

    return $namafilebaru;
}



function hapus($id){
    global $koneksi;
    mysqli_query($koneksi,"DELETE FROM um_sumbardbase WHERE id = $id");
    return mysqli_affected_rows($koneksi);
}

function ubah($data){
    global $koneksi;

    $id         = $data["id"];
    $nama       = htmlspecialchars ($data["nama"]);
    $nim        = htmlspecialchars ($data["nim"]);
    $email      = htmlspecialchars ($data["email"]);
    
    $jurusanlama = htmlspecialchars ($data["jurusanlama"]);

    //cek user oilih gambar baru atau tidak
    if($_FILES['jurusan']['error'] === 4){
        $jurusan = $jurusanlama;
    }else{
        $jurusan = upload();
    }

    
    

    $query ="UPDATE  um_sumbardbase SET 
            nama = '$nama', 
            nim ='$nim', 
            email='$email', 
            jurusan ='$jurusan'
            WHERE id = $id
            ";
    mysqli_query($koneksi,$query);

    return mysqli_affected_rows($koneksi);
}

function cari($keyword){
    $query ="SELECT * FROM um_sumbardbase WHERE
    nama LIKE '%$keyword%'OR
    nim LIKE '%$keyword%'OR
    email LIKE '%$keyword%'OR
    jurusan LIKE '%$keyword%'
    "; 
    return query($query);
    
}

function registrasi($data){
    global $koneksi;

    $username = strtolower (stripslashes ($data["username"]));
    $passsword = mysqli_real_escape_string($koneksi,$data["password"]);
    $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

     //username sudah ada atau belum
     $result = mysqli_query($koneksi,"SELECT username FROM users WHERE username = '$username'");
     if(mysqli_fetch_assoc($result)){
         echo "<script>
         alert('username sudah terdaftar');
         </script>";
         return false;
     }
    
    //cek konfirmasi password
    if($passsword !== $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    

    // enkripsi password
    $password = password_hash($passsword,PASSWORD_DEFAULT);
    

    //tambahkan user baru ke database
    mysqli_query($koneksi,"INSERT INTO users VALUES('','$username','$password')");

    return mysqli_affected_rows($koneksi);

   
}





?>