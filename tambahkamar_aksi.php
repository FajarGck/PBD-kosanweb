<?php 
// koneksi database
include 'koneksi.php';
// menangkap data yang di kirim dari form tambah pelanggan
$id = $_POST['idkamar'];
$nama = $_POST['namakamar'];
$jenis = $_POST['jenis'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];
$ketersediaan = $_POST['ketersediaan'];
$idpemilik = $_POST['idpemilik'];
// menginput data ke database

$query = "insert into kamar values('$id','$nama','$jenis','$fasilitas','$harga', '$ketersediaan', '$idpemilik')";

// mengalihkan halaman kembali
if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, alihkan halaman kembali
    header("Location: home.php?page=kamar");
    exit(); // Pastikan tidak ada kode yang dieksekusi setelah header
} else {
    // Jika terjadi error, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

?>

