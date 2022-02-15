<?php

require_once __DIR__ . '/autoload.php';

include("../koneksi/function.php");
$mahasiswa = query("SELECT * FROM um_sumbardbase ");

$mpdf = new \Mpdf\Mpdf();

$html ='<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <title>data mahasiswa</title>
</head>
<body>
    <h1>Daftar mahasiswa</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        
            <tr>
                <th>no</th>
                <th>nama</th>
                <th>nim</th>
                <th>email</th>
                <th>jurusan</th>
            </tr>';

            $i = 1;
            foreach($mahasiswa as $row ){
                $html .= '<tr>
                    <td>'.$i++.'</td>
                    <td>'.$row["nama"].'</td>
                    <td>'.$row["nim"].'</td>
                    <td>'.$row["email"].'</td>
                    <td><img src="../latihan1/img/'.$row["jurusan"].'" width="50"></td>

                </tr>';
            }
        
 $html .=    '</table>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('daftar-mahasiswa.pdf','I');