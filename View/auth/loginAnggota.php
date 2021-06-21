<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Login</title>
	<style>
		.btn {

		background: transparent;
		margin-top: 10px;
		width: 320px;
		height: 50px;
		font-size: 18px;
		color: #ff6435;
		font-weight: bold;
		border-radius: 10px;
		}
	</style>
</head>

<body style="background-image: url('assets/image/bg2.png')">
    <form action="index.php?page=buku&aksi=daftarbuku" method="POST">
	<h1 class="judul">Login Anggota</h1>
	<div class="box">
		<h2>Login</h2>
		<form>
			<div class="InputBox">
				<input type="text" name="nama" required="">
				<label>Username</label>
			<div class="InputBox">
				<input type="password"  name="password" required="">
				<label>Password</label>
			</div>
				<button type="submit" class="btn btn-dark btn-lg btn-block">Login</button>
				<a href="index.php?page=auth&aksi=HalamanAwal" class="btn btn-dark btn-lg btn-block">Kembali</a>
		</form>
	</div>
</body>
</html>