<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title>Login</title>
</head>

<body style="background-image: url('assets/image/bg2.png')">
    <form action="index.php?page=View&aksi=loginAnggota" method="POST">
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
				<button type="submit" class="btn btn-dark btn-lg btn-block" style="color: #ff6435">Login</button>
			
		</form>
	</div>
</body>
</html>