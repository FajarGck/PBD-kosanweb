<?php 
// koneksi database
include 'koneksi.php';

// menangkap data id yang di kirim dari url
$id = $_GET['idkamar'];

// menghapus data dari database
$query = "delete from kamar where IdKamar='$id'";

// mengalihkan halaman kembali
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