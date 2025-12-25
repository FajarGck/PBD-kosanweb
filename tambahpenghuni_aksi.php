<?php 
// Koneksi database
include 'koneksi.php';

// Menangkap data yang dikirim dari form tambah pelanggan
$id = $_POST['idpenghuni'];
$nama = $_POST['namapenghuni'];
$kelamin = $_POST['kelamin'];
$tanggalmasuk = $_POST['tanggalmasuk'];
$idkamar = $_POST['idkamar'];
$rencana = $_POST['rencana'];

// Menginput data ke database
$query = "INSERT INTO penghuni VALUES('$id', '$nama', '$kelamin', '$tanggalmasuk', '$idkamar', '$rencana')";

// Mengalihkan halaman kembali
if (mysqli_query($koneksi, $query)) {
    // Pastikan nilai disewa dikelilingi tanda kutip
    $update_query = "UPDATE kamar SET ketersediaan = 'disewa' WHERE IdKamar = '$idkamar'";
    mysqli_query($koneksi, $update_query);
    
    // Jika berhasil, alihkan halaman kembali
    header("Location: home.php?page=penghuni");
    exit(); // Pastikan tidak ada kode yang dieksekusi setelah header
} else {
    // Jika terjadi error, tampilkan pesan error
    echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
