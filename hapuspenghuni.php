<?php 
// Koneksi database
include 'koneksi.php';

// Menangkap data id penghuni yang akan dihapus dari URL
$id_penghuni = $_GET['idpenghuni'];

// Mengambil informasi kamar terkait penghuni yang akan dihapus
$query_info_kamar = "SELECT IdKamar FROM penghuni WHERE IdPenghuni = '$id_penghuni'";
$result_info_kamar = mysqli_query($koneksi, $query_info_kamar);

if ($result_info_kamar) {
    $row = mysqli_fetch_assoc($result_info_kamar);
    $id_kamar = $row['IdKamar'];

    // Menghapus penghuni dari database
    $query_delete_penghuni = "DELETE FROM penghuni WHERE IdPenghuni = '$id_penghuni'";
    if (mysqli_query($koneksi, $query_delete_penghuni)) {
        // Update ketersediaan kamar menjadi belum disewa
        $update_query = "UPDATE kamar SET ketersediaan = 'belum disewa' WHERE IdKamar = '$id_kamar'";
        mysqli_query($koneksi, $update_query);
        
        // Jika berhasil, alihkan halaman kembali
        header("Location: home.php?page=penghuni");
        exit(); // Pastikan tidak ada kode yang dieksekusi setelah header
    } else {
        // Jika terjadi error saat menghapus penghuni, tampilkan pesan error
        echo "Error: " . $query_delete_penghuni . "<br>" . mysqli_error($koneksi);
    }
} else {
    // Jika terjadi error saat mencari informasi kamar, tampilkan pesan error
    echo "Error: " . $query_info_kamar . "<br>" . mysqli_error($koneksi);
}

// Menutup koneksi
mysqli_close($koneksi);
?>
