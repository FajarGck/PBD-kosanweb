<?php
// koneksi database
include 'koneksi.php';
$username=$_GET['namapemilik'];
$sandi=$_GET['idpemilik'];
$data = mysqli_query($koneksi,"select namapemilik,idpemilik from
tbkaryawan where namakaryawan='$username' and
idpemilik='$sandi'");
$row=mysqli_fetch_assoc($data);
if($username==$row['namapemilik'] && $psw==$row['idpemilik']){
header("Location: home.php");
}
else{
echo "Gagal Login";
}
?>