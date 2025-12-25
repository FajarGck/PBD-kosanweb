<?php 
$koneksi = mysqli_connect("sql312.infinityfree.com","rif0_36711539oot","0Ce5vkyM9bz","if0_36711539_kost");

// Cek Koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>

<!-- $koneksi = mysqli_connect("localhost","root","","kost"); -->