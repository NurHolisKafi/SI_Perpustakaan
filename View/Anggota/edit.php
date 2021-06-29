<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
            <div class="card-header text-center">
                <h2>Edit Profil</h2>
            </div>
            <div class="card-body">
                <form action="index.php?page=anggota&aksi=cekEditProfile" method="POST">
                    <!-- Diganti saat modul 3 -->
                    <input type="hidden" name="id" value="<?=$data['id_anggota']?>">
                    <div class="form-group">
                        <label class="label" for="">Nama</label>
                        <input type="text" name="nama" class="form-control" value="<?=$data['nama']?>">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Jenis Kelamin</label>
                        <input type="text" name="jenis_kelamin" class="form-control" value="<?=$data['jenis_kelamin']?>">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Tanggal Lahir</label>
                        <input type="text" name="tanggal_lahir" class="form-control" value="<?=$data['tanggal_lahir']?>">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">No.Telp</label>
                        <input type="text" name="no_telp" class="form-control" value="<?=$data['no_telp']?>">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>">
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Password</label>
                        <input type="password" name="password" class="form-control" value="<?=$data['password']?>">
                    </div>
                    
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Simpan</button>
                    <a href="index.php?page=anggota&aksi=pinjambuku" class="btn btn-drak float-right">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>