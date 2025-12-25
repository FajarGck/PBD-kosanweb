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
	<div class="container">
		<h2 class="text-center m-0 pb-0 px-4 pt-2 shadow-lg pb-2 mx-auto rounded" style="max-width: fit-content;">TAMBAH DATA PENGHUNI</h2>
		<br/>
		<button type="button" class="btn btn-danger mx-2">
			<a href="home.php?page=penghuni" class="text-light text-decoration-none">KEMBALI</a>
		</button>
		<br/>
		<br/>
		<form method="post" action="tambahpenghuni_aksi.php" class="row g-3">
		<div class="col-md-4">
			<label for="input-idpeghuni" class="form-label">ID PENGHUNI</label>
			<input type="text" class="form-control" id="input-idpeghuni" name="idpenghuni" value="ph-" required>
		</div>
		<div class="col-md-4">
			<label for="input-namapenghuni" class="form-label">NAMA PENGHUNI</label>
			<input type="text" class="form-control" id="input-namapenghuni" name="namapenghuni" required>
		</div>
		<div class="col-md-4">
		<label for="input-kelamin" class="form-label">JENIS KELAMIN</label>
			<select class="form-select" id="input-kelamin" name="kelamin" required>
			<option selected disabled >Pilih Tipe Jenis Kelamin</option>
			<option>pria</option>
			<option>perempuan</option>
			</select>
		</div>
		<div class="col-md-4">
			<label for="input-tanggal" class="form-label">TANGGAL MASUK</label>
			<input type="date" class="form-control" id="input-tanggal" name="tanggalmasuk" required>
		</div>
		<div class="col-md-4">
			<?php 
			include 'koneksi.php';
			$idkamar = mysqli_query($koneksi, 'SELECT IdKamar FROM kamar WHERE ketersediaan="belum disewa"');
			?>
			<label for="input-idkamar" class="form-label">ID KAMAR</label>
			<select class="form-select" id="input-idkamar" name="idkamar" required>
				<option selected disabled>Kamar yang Tersedia</option>
				<?php 
				while($d = mysqli_fetch_assoc($idkamar)) {
				?>
					<option value="<?php echo $d['IdKamar']; ?>"><?php echo $d['IdKamar']; ?></option>
				<?php 
				}
				?>
			</select>
		</div>
		<div class="col-md-4">
			<label for="input-rencana" class="form-label">RENCANA TINGGAL (BULAN)</label>
			<input type="number" class="form-control" id="input-rencana" name="rencana" value="8" required>
		</div>
		<div class="col-12">
			<button class="btn btn-primary" type="submit">TAMBAH PENGHUNI</button>
		</div>
		</form>	
	</div>
	
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	const submitAlert = (form) => {
		Swal.fire({
		title: "Good job!",
		text: "You clicked the button!",
		icon: "success"
		});
	}
</script>

</body>
</html>