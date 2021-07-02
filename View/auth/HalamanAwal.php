<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            
            background-image: url("assets/image/bg2.png");
            background-size: cover;
        }
        .btn {
            width: 320px;
	        height: 50px;
            font-size: 20px;
            color: #ff6435;
            font-weight: bold;
	        border-radius: 25px;
            background-color: #170f15;
        }

        .container .card {
            background: transparent;
            outline-width: 0px;
            outline: transparent;
            
        }

        h2 {
            color: #ff6435;
        }
    </style>
    <title>Halaman Awal</title>
</head>

<body>
    <center>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">

                    <h2>Selamat Datang Di Sistem Perpustakaan</h2>

                </div>
                <div class="card-body">
                    <!-- <br><a href="index.php?page=auth&aksi=loginAdmin" class="btn btn-light">Login Admin</a></br> -->
                    <br><a href="index.php?page=auth&aksi=loginAnggota" class="btn btn-light">Login Anggota</a></br>
                    <br><a href="index.php?page=auth&aksi=daftarAnggota" class="btn btn-light">Daftar Anggota</a></br>
                </div>
            </div>
        </div>
    </center>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>