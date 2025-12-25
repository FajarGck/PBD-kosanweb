<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>KOSAN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="./style.css">

</head>
<body>
<div class="container shadow-lg mb-4 pb-4">
	<div class="wrapper row">
		<div class="quotes col-12 col-md-5 d-flex flex-column justify-content-center ml-3">
			<h2 class="pt-3">Selamat Datang <br/> di Official Website KOSAN</h2>
			<p>KAMI MENYEDIAKAN BERBAGAI MACAM KAMAR <br/> DENGAN BERBAGAI FASILITAS</p>
			<a href="home.php?page=kamar"><button type="button" class="btn btn-primary mb-3">CEK KAMAR!</button></a>
		</div>
		<div class="banner col-12 col-md-7">
			<img src="./assets/banner.jpg">
		</div>
	</div>
</div>
<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];

		switch ($page) {
			case 'kamar':
				include "kamar.php";
				break;		
			default:
				echo"";
				break;
		}
	}

	 ?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
