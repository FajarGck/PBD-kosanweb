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
        <a href="tambahkamar.php" class="text-light text-decoration-none">+ TAMBAH KAMAR</a>
    </button>
    <br>
    <h2 class="text-center m-0 mx-auto rounded " style="max-width: fit-content;">DATA KAMAR</h2>
    <table class="table table-secondary table-striped-columns text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Kamar</th>
                <th>Nama Kamar</th>
                <th>Jenis</th>
                <th>Fasilitas</th>
                <th>Harga Bulanan</th>
                <th>Ketersediaan</th>
                <th>Penghuni</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, 'SELECT 
                    kamar.IdKamar, 
                    kamar.NamaKamar, 
                    kamar.JenisKamar, 
                    kamar.Fasilitas, 
                    kamar.HargaBulanan, 
                    kamar.ketersediaan, 
                    penghuni.NamaPenghuni
                FROM 
                    kamar 
                LEFT JOIN 
                    penghuni 
                ON 
                    kamar.IdKamar = penghuni.IdKamar
                ORDER BY kamar.JenisKamar');
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['IdKamar']; ?></td>
                    <td><?php echo $d['NamaKamar']; ?></td>
                    <td><?php echo $d['JenisKamar']; ?></td>
                    <td><?php echo $d['Fasilitas']; ?></td>
                    <td><?php echo $d['HargaBulanan']; ?></td>
                    <td><?php echo $d['ketersediaan']; ?></td>
                    <td><?php echo $d['NamaPenghuni']; ?></td>
                    <td>
                        <button type="button" class="btn btn-success">
                            <a href="editkamar.php?idkamar=<?php echo $d['IdKamar']; ?>" class="text-light text-decoration-none">Edit</a>
                        </button>
                        <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo $d['IdKamar']; ?>')">Hapus</button>
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
                    window.location.href = `hapuskamar.php?idkamar=${id}`;
                } else if (
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
