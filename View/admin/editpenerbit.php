<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Edit Buku</title>
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
                <h2>Edit Penerbit</h2>
            </div>
            <div class="card-body">
                <form action="index.php?page=admin&aksi=cekEditPenerbit&id_penerbit=<?=$_GET['id_penerbit'] ?>" method="POST">
                    <div class="form-group">
                        <label class="label">Nama Penerbit : </label>
                        <input type="text" class="form-control" name="nama_penerbit">
                    </div>
                    <div class="form-group">
                        <label class="label">Tahun Terbit : </label>
                        <input type="text" class="form-control" name="tahun_terbit">
                    </div>                   
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Edit</button>
                    <a href="index.php?page=admin&aksi=daftarpenerbit" class="btn btn-dark btn-lg btn-block">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>