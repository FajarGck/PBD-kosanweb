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
	<?php
	include 'koneksi.php';
	$idpenghuni = $_GET['idpenghuni'];
	$data = mysqli_query($koneksi,"select * from penghuni where IdPenghuni='$idpenghuni'");
	while($d = mysqli_fetch_array($data)){
		?>
		<div class="container">
		<h2	h2	h2 class="text-center m-0 pb-0 px-4 pt-2 shadow-lg pb-2 mx-auto rounded" style="max-width: fit-content;">EDIT DATA PENGHUNI</h2>
		<br/>
		<button type="button" class="btn btn-danger mx-2">
			<a href="home.php?page=penghuni" class="text-light text-decoration-none">KEMBALI</a>
		</button>
		<br/>
		<br/>
		<form method="post" action="editpenghuni_aksi.php" class="row g-3">
		<div class="col-md-4" hidden>
			<input type="text" class="form-control" id="input-idpenghuni" name="idpenghuni" value="<?php echo $d['IdPenghuni'] ?>" required>
		</div>
		<div class="col-md-4">
			<label for="input-namapenghuni" class="form-label">NAMA PENGHUNI</label>
			<input type="text" class="form-control" id="input-nama" name="namapenghuni" value="<?php echo $d['NamaPenghuni'] ?>" required>
		</div>
		<div class="col-md-4">
		<label for="input-kelamin" class="form-label">JENIS KELAMIN</label>
			<select class="form-select" id="input-kelamin" name="kelamin" value="<?php echo $d['JenisKelamin'] ?>" required>
			<option selected disabled >Pilih Tipe Jenis Kelamin</option>
			<option>pria</option>
			<option>perempuan</option>
			</select>
		</div>
		<div class="col-md-4">
			<label for="input-tanggal" class="form-label">TANGGAL MASUK</label>
			<input type="date" class="form-control" id="input-tanggal" name="tanggalmasuk" value="<?php echo $d['TanggalMasuk'] ?>" required>
		</div>
		<div class="col-md-4">
    <label for="input-idkamar" class="form-label">ID KAMAR</label>
    <select class="form-select" id="input-idkamar" name="idkamar" required>
        <?php
        // Query untuk mengambil semua kamar yang tersedia
        $query = "SELECT IdKamar FROM kamar WHERE ketersediaan='belum disewa'";
        $result = mysqli_query($koneksi, $query);

        $current_idkamar = $d['IdKamar'];

        $available_rooms = false;

        while ($row = mysqli_fetch_assoc($result)) {
            $idkamar = $row['IdKamar'];
            echo "<option value='$idkamar'>$idkamar</option>";
            // Memeriksa apakah ada kamar yang tersedia
            if ($current_idkamar == $idkamar) {
                $available_rooms = true;
            }
        }

        // Jika tidak ada kamar yang tersedia, tambahkan opsi untuk tetap menggunakan idkamar saat ini
        if (!$available_rooms) {
            echo "<option value='$current_idkamar' selected>$current_idkamar</option>";
        }
        ?>
    </select>
</div>

		<div class="col-md-4">
			<label for="input-rencana" class="form-label">RENCANA TINGGAL (BULAN)</label>
			<input type="number" class="form-control" id="input-rencana" name="rencana" value="<?php echo $d['RencanaTinggal'] ?>" required>
		</div>
		<div class="col-12">
			<button class="btn btn-primary" type="submit">SIMPAN</button>
		</div>
		</form>	
	</div>
		<?php 
	}
	?>

	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		switch ($page) {
			case 'penghuni':
				include "penghuni.php";
				break;		
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}

	 ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>