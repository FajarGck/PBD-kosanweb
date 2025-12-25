<?php 
// koneksi database
include 'koneksi.php';
// menangkap data yang di kirim dari form tambah pelanggan
$id = $_POST['idpenghuni'];
$nama = $_POST['namapenghuni'];
$kelamin = $_POST['kelamin'];
$tanggalmasuk = $_POST['tanggalmasuk'];
$idkamar = $_POST['idkamar'];
$rencana = $_POST['rencana'];
// menginput data ke database
$query = "update penghuni set NamaPenghuni='$nama', JenisKelamin='$kelamin', TanggalMasuk='$tanggalmasuk', IdKamar='$idkamar', RencanaTinggal='$rencana' where IdPenghuni='$id'";

// mengalihkan halaman kembali
if (mysqli_query($koneksi, $query)) {
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

