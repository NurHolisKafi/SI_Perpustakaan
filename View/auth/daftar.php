<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Daftar Anggota</title>
    <style>
        body {
            
            background: url("assets/image/bg2.png");
            background-size: cover;
        }
        .btn {
            margin-top: 15px;
            margin-left:17%;
            width: 25%;
	        height: 50px;
            font-size: 20px;
            color: #ff6435;
            font-weight: bold;
	        border-radius: 25px;
            background-color: #170f15;
        }

        .container .card {
            background: transparent;
            outline-width: 10px;
            outline: transparent;
            
        }

        h2 {
            text-align: center;
            color: #ff6435;
        }

        .label {
            margin-top : 5px;
            color: #ff6435; 
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Daftar Anggota</h2>
            </div>
            <div class="card-body">
                <form action="index.php?page=auth&aksi=inputAnggota" method="POST">
                    <div class="form-group">
                        <label class="label">Nama : </label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label class="label">Jenis Kelamin : </label>
                        <input type="text" class="form-control" name="jenis_kelamin">
                    </div>
                    <div class="form-group">
                        <label class="label">Tanggal Lahir : </label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="label">No.Telpon : </label>
                        <input type="text" class="form-control" name="no_telp">
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat : </label>
                        <input type="text" class="form-control" name="alamat">
                    </div>
                    <div class="form-group">
                        <label class="label">Password : </label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Daftar</button>
                    <a href="index.php?page=auth&aksi=HalamanAwal" class="btn btn-dark btn-lg btn-block">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>