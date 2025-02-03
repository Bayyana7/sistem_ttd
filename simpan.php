<?php 
$data_uri = $_POST['foto'];
/*kode asli
$encoded_image = explode(",", $data_uri)[1];
$encoded_image = explode(",", $data_uri)[1];
$decoded_image = base64_decode($encoded_image);
file_put_contents("signature.png", $decoded_image);
*/
$encoded_image = explode(",", $data_uri)[1];
$encoded_image = explode(",", $data_uri)[1];
$decoded_image = base64_decode($encoded_image);
$name = uniqid().'.png';
$file = 'signatures/'.$name;
file_put_contents($file, $decoded_image);
//Simpan ke database
include "system/koneksi.php";
$simpan=mysqli_query($koneksi,"INSERT INTO tb_ttd VALUES ('','$file')");
if ($simpan)
{
    header("location:show.php?pesan=sukses");
}
?>