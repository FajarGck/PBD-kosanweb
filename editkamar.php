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
	$idkamar = $_GET['idkamar'];
	$data = mysqli_query($koneksi,"select * from kamar where IdKamar='$idkamar'");
	while($d = mysqli_fetch_array($data)){
		?>
		<div class="container">
		<h2	h2	h2 class="text-center m-0 pb-0 px-4 pt-2 shadow-lg pb-2 mx-auto rounded" style="max-width: fit-content;">EDIT DATA KAMAR</h2>
		<br/>
		<button type="button" class="btn btn-danger mx-2">
			<a href="home.php?page=kamar" class="text-light text-decoration-none">KEMBALI</a>
		</button>
		<br/>
		<br/>
		<form method="post" action="editkamar_aksi.php" class="row g-3">
		<div class="col-md-4">
			<label for="input-namakamar" class="form-label">NAMA KAMAR</label>
			<input type="text" class="form-control" id="input-namakamar" name="namakamar" value="<?php echo $d['NamaKamar']; ?>" required>
		</div>
		<div class="col-md-4">
			<label for="input-fasilitas" class="form-label">FASILITAS</label>
			<input type="text" class="form-control" id="input-fasilitas" name="fasilitas" value="Wifi, Kamar mandi, dapur" required>
		</div>
		
		<div class="col-md-4">
			<label for="input-harga" class="form-label">HARGA</label>
			<input type="number" class="form-control" id="input-harga" name="harga" value="800000" required>
		</div>
		<div class="col-md-3">
			<label for="input-jenis" class="form-label">KAMAR</label>
			<select class="form-select" id="input-jenis" name="jenis" required>
			<option selected disabled value="">Pilih Tipe Kamar</option>
			<option>TipeA</option>
			<option>TipeB</option>
			</select>
		</div>
		<div class="col-md-3">
			<label for="input-ketersediaan" class="form-label">KETERSEDIAAN</label>
			<select class="form-select" id="input-ketersediaan" name="ketersediaan" required>
			<option selected disabled>Ketersedian</option>
			<option value="disewa">Disewa</option>
			<option value="belum disewa">Belum Disewa</option>
			</select>
		</div>
		<div class="col-md-4">
			<input type="hidden" class="form-control" id="input-idkamar" name="idkamar" value="<?php echo $d['IdKamar']; ?>" required>
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
			case 'kamar':
				include "kamar.php";
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