<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$id = $_POST['idkamar'];
$nama = $_POST['namakamar'];
$jenis = $_POST['jenis'];
$fasilitas = $_POST['fasilitas'];
$harga = $_POST['harga'];
$ketersediaan = $_POST['ketersediaan'];

// update data ke database
$query = "update kamar set NamaKamar='$nama',JenisKamar='$jenis',Fasilitas='$fasilitas', HargaBulanan='$harga', ketersediaan='$ketersediaan' where IdKamar='$id'";

if (mysqli_query($koneksi, $query)) {
    // Jika berhasil, alihkan halaman kembali
    header("Location: home.php?page=kamar");
    exit(); // Pastikan tidak ada kode yang dieksekusi setelah header
} else {
    // Jika terjadi error, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);

?>