<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./assets/style.css">
	<title>KOSAN</title>
</head>
<body>
<div class="content">
	<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a href="home.php?page=beranda" class="navbar-brand text-decoration-none fs-3 fw-bold text-dark px-2">KOSAN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="home.php?page=beranda" class="nav-link">BERANDA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?page=kamar">KAMAR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?page=penghuni">PENGHUNI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?page=pengelola">PEMILIK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php?page=pembayaran">PEMBAYARAN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

	

    <div class="badan">
	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		switch ($page) {
			case 'beranda':
				include "beranda.php";
				break;
			case 'kamar':
				include "kamar.php";
				break;
			case 'penghuni':
				include "penghuni.php";
				break;	
			case 'pengelola':
				include "pengelola.php";
				break;		
			case 'pembayaran':
				include "pembayaran.php";
				break;		
			case 'laporan':
				include "laporan.php";
				break;		
			case 'cetak':
				include "cetak.php";
				break;		
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "beranda.php";
	}

	 ?>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>