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
    <button type="button" disabled class="btn btn-warning mx-2 my-3 m-0 pb-2 px-4 pt-2">
        + TAMBAH PEMILIK</a>
    </button>
    <br>
    <h2 class="text-center m-0 mx-auto rounded " style="max-width: fit-content;">DATA PEMILIK</h2>
    <table class="table table-secondary table-striped-columns text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Kontak</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            include 'koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi, 'SELECT * from pemilik');
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['IdPemilik']; ?></td>
                    <td><?php echo $d['NamaPemilik']; ?></td>
                    <td><?php echo $d['KontakPemilik']; ?></td>
                    <td><?php echo $d['AlamatPemilik']; ?></td>
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