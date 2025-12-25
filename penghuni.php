<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <button type="button" class="btn btn-warning mx-2 my-3 m-0 pb-2 px-4 pt-2">
        <a href="tambahpenghuni.php" class="text-light text-decoration-none">+ TAMBAH PENGHUNI</a>
    </button>
    <button type="button" class="btn btn-warning end-0 mx-2 my-3 m-0 pb-2 px-4 pt-2">
        <a class="nav-link text-light" href="home.php?page=laporan">LAPORAN</a>
    </button>
    <br>
    <h2 class="text-center m-0 mx-auto rounded " style="max-width: fit-content;">DATA PENGHUNI</h2>
    <table class="table table-secondary table-striped-columns text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Penghuni</th>
                <th>Nama Penghuni</th>
                <th>Kelamin</th>
                <th>Tanggal Masuk</th>
                <th>Id Kamar</th>
                <th>Rencana Tinggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, 'SELECT * FROM penghuni ORDER BY NamaPenghuni');
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['IdPenghuni']; ?></td>
                    <td><?php echo $d['NamaPenghuni']; ?></td>
                    <td><?php echo $d['JenisKelamin']; ?></td>
                    <td><?php echo $d['TanggalMasuk']; ?></td>
                    <td><?php echo $d['IdKamar']; ?></td>
                    <td><?php echo $d['RencanaTinggal']; ?> Bulan</td>
                    <td>
                        <button type="button" class="btn btn-success">
                            <a href="editpenghuni.php?idpenghuni=<?php echo $d['IdPenghuni']; ?>" class="text-light text-decoration-none">Edit</a>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo $d['IdPenghuni']; ?>')">Hapus</button>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script>
        function confirmDelete(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Apakah kamu yakin ingin menghapusnya?',
                text: "Data tidak dapat di kembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus!',
                cancelButtonText: 'Batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Data Dihapus!",
                        text: "Data Berhasil dihapus!",
                        icon: "success",
                    });
                    window.location.href = `hapuspenghuni.php?idpenghuni=${id}`
                }else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: 'Dibatalkan',
                        text: 'Data batal dihapus',
                        icon: 'error'
                    });
                }
            });
        }
    </script>
</body>
</html>
