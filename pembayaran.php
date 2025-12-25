<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KOSAN</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br>
    <h2 class="text-center m-0 mx-auto rounded " style="max-width: fit-content;">DATA PEMILIK</h2>
    <table class="table table-secondary table-striped-columns text-center">
        <thead>
            <tr>
                <th>Id Pembayaran</th>
                <th>Id Penghuni</th>
                <th>Tanggal Pembayaran</th>
                <th>Jumlah Pembayaran</th>
                <th>Metode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $data = mysqli_query($koneksi, 'SELECT * from pembayaran');
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $d['IdPembayaran']; ?></td>
                    <td><?php echo $d['IdPenghuni']; ?></td>
                    <td><?php echo $d['TanggalPembayaran']; ?></td>
                    <td><?php echo $d['JumlahPembayaran']; ?></td>
                    <td><?php echo $d['MetodePembayaran']; ?></td>
                    <td>
                        <button type="button" disabled class="btn btn-success">Edit</button>
                        <button type="button" disabled class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>