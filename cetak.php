<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KOSAN</title>
	<link rel="stylesheet" type="text/css" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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
                </tr>
                <?php 
            }
            ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<script>
window.print();
</script>
</body>
</html>