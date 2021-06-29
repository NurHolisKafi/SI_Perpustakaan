<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pinjam</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
        body {
            
            background: url("assets/image/bg2.png");
            background-size: cover;
        }
        .btn {
            margin-top: 20px;
            margin-left:2%;
            width: 30%;
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
            margin-bottom: 5px;
            color: #ff6435; 
        }
    </style>
</head>

<body>
    <center>
        <div class="container">

            <div class="card mt-5">
                <div class=" card-header">
                    <h2>Peminjaman Buku</h2>
                </div>
                <div class="card-body">
                    <form action="index.php?page=anggota&aksi=pinjam" method="POST">
                        <div class="row">
                            <div class="col">
                                <label class="label" for="">Nama Petugas : </label>
                                <select  name="nama" class="form-control" required>
                                    <?php foreach($data as $row) : ?>
                                    <option value="<?= $row['id_petugas'] ?>"><?= $row['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label class="label" for="">Peminjaman Buku : </label>
                                <input type="date" name="pinjam_buku" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="label" for="">Pengembalian Buku : </label>
                                <input type="date" name="kembalikan_buku" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark">Pinjam</button>
                        <a href="index.php?page=anggota&aksi=pinjambuku" class="btn btn-dark">Kembali</a>
                    </form>
                    

                </div>
            </div>
        </div>
    </center>

    <script src="assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.css"></script>
</body>

</html>